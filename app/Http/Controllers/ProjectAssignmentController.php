<?php

namespace App\Http\Controllers;

use App\Models\ProjectAssignment;
use App\Http\Requests\StoreProjectAssignmentRequest;
use App\Http\Requests\UpdateProjectAssignmentRequest;

use App\Http\Resources\ProjectAssignmentCollection;
use App\Http\Resources\ProjectAssignmentResource;
use Illuminate\Http\Request;
use App\Filters\ProjectAssignmentFilter;


class ProjectAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new ProjectAssignmentFilter();
        $queryItems = $filter->transform($request);

        $projectAssignments = ProjectAssignment::where($queryItems);
        $includeprojectAssignments = $request->query("includeprojectAssignments");
        if (count($queryItems) == 0) {
            return new ProjectAssignmentCollection(ProjectAssignment::paginate());
        } else {
            $projectAssignments = ProjectAssignment::where($queryItems)->paginate();
            return new ProjectAssignmentCollection($projectAssignments->appends($request->query()));
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
    public function store(StoreProjectAssignmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ProjectAssignment $projectAssignment)
    {
        return new ProjectAssignmentResource($projectAssignment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProjectAssignment $projectAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectAssignmentRequest $request, ProjectAssignment $projectAssignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProjectAssignment $projectAssignment)
    {
        //
    }
}
