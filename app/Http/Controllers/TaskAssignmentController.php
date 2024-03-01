<?php

namespace App\Http\Controllers;

use App\Models\TaskAssignment;
use App\Http\Requests\StoreTaskAssignmentRequest;
use App\Http\Requests\UpdateTaskAssignmentRequest;

use App\Http\Resources\TaskAssignmentCollection;
use App\Http\Resources\TaskAssignmentResource;
use Illuminate\Http\Request;
use App\Filters\TaskFilter;

class TaskAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new TaskFilter();
        $queryItems = $filter->transform($request);

        $taskAssignments = TaskAssignment::where($queryItems);
        $includeTaskAssignments = $request->query("includeTaskAssignments");
        if (count($queryItems) == 0) {
            return new TaskAssignmentCollection(TaskAssignment::paginate());
        } else {
            $taskAssignments = TaskAssignment::where($queryItems)->paginate();
            return new TaskAssignmentCollection($taskAssignments->appends($request->query()));
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
    public function store(StoreTaskAssignmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskAssignment $taskAssignment)
    {
        return new TaskAssignmentResource($taskAssignment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskAssignment $taskAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskAssignmentRequest $request, TaskAssignment $taskAssignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskAssignment $taskAssignment)
    {
        //
    }
}
