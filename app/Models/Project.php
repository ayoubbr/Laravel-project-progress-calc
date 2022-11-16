<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function uploads()
    {
        return $this->hasMany(Upload::class);
    }


    public function children()
    {
        return $this->hasMany(Project::class, 'parent_id')->with('children');
    }

    public static function tree()
    {
        $allProjects = Project::get();

        $rootProjects= $allProjects->whereNull('parent_id');

        self::formatTree($rootProjects, $allProjects);

        return $rootProjects;
    }

    private static function formatTree($projects, $allProjects)
    {
        foreach ($projects as $project) {
            $project->children = $allProjects->where('parent_id', $project->id)->values();

            if ($project->children->isNotEmpty()) {
                self::formatTree($project->children, $allProjects);
            }
        }
    }

    public function isChild(): bool
    {
        return $this->parent_id !== null;
    }
}
