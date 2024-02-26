<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Http\Requests\StoreStateRequest;
use App\Http\Requests\UpdateStateRequest;

use Illuminate\Http\Request;
use App\Filters\StateFilter;
use App\Http\Resources\StateCollection;
use App\Http\Resources\StateResource;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new StateFilter();
        $queryItems = $filter->transform($request);
        #print_r($queryItems);
        $states = State::where($queryItems);
        $includeProjects = $request->query("includeProjects");
        if ($includeProjects) {
            $projects = $states->with('projects');
        }

        $includeUserHistories = $request->query("includeUserHistories");
        if ($includeUserHistories) {
            $userHistories = $states->with('userHistories');
        }

        $includeUserHistories = $request->query("includeTasks");
        if ($includeUserHistories) {
            $userHistories = $states->with('tasks');
        }

        return new StateCollection($states->paginate()->appends($request->query()));
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
    public function store(StoreStateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(State $state)
    {

        $includeProjects = request()->query('includeProjects');
        if ($includeProjects) {

            return new StateResource($state->loadMissing('projects'));
        }

        $includeUserHistories = request()->query('includeUserHistories');
        if ($includeUserHistories) {
            return new StateResource($state->loadMissing('userHistories'));
        }

        $includeTasks = request()->query('includeTasks');
        if ($includeTasks) {
            return new StateResource($state->loadMissing('tasks'));
        }

        return new StateResource($state);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStateRequest $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        //
    }
}
