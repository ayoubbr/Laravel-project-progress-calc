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
        $project->update();
        $new_project = project::create($formFields);
        $pro = 0;
        $children = Project::with('children')->where('parent_id', $project->id)->get();
        $parent = Project::with('children')->where('id', $project->parent_id)->get();
        $siblings = Project::with('children')->where('parent_id', $project->parent_id)->get();

        // foreach ($parent as $item1) {
        //     foreach ($children as $item2) {
        //         $pro +=  $item2->progress;
        //         dd($pro);
        //         $project->progress = $pro / count($children);
        //         // $item1->progress = 
        //         dd($item1->progress);
        //     }
        // }

        $project->update();


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

        return redirect('/')->with('message', 'Child project updated succefully!');
    }
}
