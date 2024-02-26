<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\Request;
use App\Filters\ProjectFilter;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ProjectFilter();
        $queryItems = $filter->transform($request);


        $projects = Project::where($queryItems);
        $includeProjects = $request->query("includeProjects");
        if (count($queryItems) == 0) {
            return new ProjectCollection(Project::paginate());
        } else {
            $projects = Project::where($queryItems)->paginate();
            return new ProjectCollection($projects->appends($request->query()));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
