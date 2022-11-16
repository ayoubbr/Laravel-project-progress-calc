<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Upload;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::tree();
        return view('projects.index', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => '',
            'progress' => '',
            'type' => '',
        ]);
        $new_project = Project::create($formFields);

        if ($request->has('uploads')) {
            foreach ($request->file('uploads') as $upload) {
                $uploadName = $formFields['title'] . '-' . time() . $upload->extension();
                $upload->move(public_path('projects_uploads'), $uploadName);
                Upload::create([
                    'project_id' => $new_project->id,
                    'upload' => $uploadName
                ]);
            }
        }

        return redirect('/')->with('message');
    }

    public function createChild(Project $project)
    {
        return view('projects.create-child', [
            'project' => $project
        ]);
    }

    public function storeChild(Request $request, project $project)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'progress' => 'required|between:0,100',
            'type' => 'required',
        ]);

        $formFields['parent_id'] = $project->id;
        $new_project = project::create($formFields);
        $sumProgress = 0;

        $children = Project::with('children')->where('parent_id', $project->id)->get();

        foreach ($children as $child) {
            $sumProgress += $child->progress;
        }
        $totalProgress = $sumProgress / count($children);
        $p = round($totalProgress);
        $project->progress = $p;
        $project->update();

        $parent = Project::with('children')->where('id', $project->parent_id)->first();
        $siblings = Project::with('children')->where('parent_id', $project->parent_id)->get();

        $sumProgress2 = 0;

        foreach ($siblings as $sibling) {
            $sumProgress2 += $sibling->progress;
        }

        if ($parent) {
            $parent->progress = $sumProgress2 / count($siblings);
            $parent->update();
        }

        return redirect('/')->with('message', 'Child project updated succefully!');
    }

    private function getChildren($project)
    {
        $ids = [];
        $children = Project::with('children')->where('parent_id', $project->id)->get();
        foreach ($children as $project) {
            $ids[] = $project->id;
            $ids = array_merge($ids, $this->getChildren($project));
        }
        return $ids;
    }

    private function getParents($project)
    {
        $ids = [];
        $parents = Project::with('children')->where('id', $project->parent_id)->get();
        foreach ($parents as $project) {
            $ids[] = $project->id;
            $ids = array_merge($ids, $this->getParents($project));
        }
        return $ids;
    }
}
