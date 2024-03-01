<?php

namespace App\Http\Controllers;

use App\Models\UserHistoryAssignment;
use App\Http\Requests\StoreUserHistoryAssignmentRequest;
use App\Http\Requests\UpdateUserHistoryAssignmentRequest;

use App\Http\Resources\UserHistoryAssignmentCollection;
use App\Http\Resources\UserHistoryAssignmentResource;
use Illuminate\Http\Request;
use App\Filters\UserHistoryAssignmentFilter;

class UserHistoryAssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new UserHistoryAssignmentFilter();
        $queryItems = $filter->transform($request);

        $userHistoryAssignments = UserHistoryAssignment::where($queryItems);
        $includeUserHistoryAssignments = $request->query("includeUserHistoryAssignments");
        if (count($queryItems) == 0) {
            return new UserHistoryAssignmentCollection(UserHistoryAssignment::paginate());
        } else {
            $userHistoryAssignments = UserHistoryAssignment::where($queryItems)->paginate();
            return new UserHistoryAssignmentCollection($userHistoryAssignments->appends($request->query()));
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
    public function store(StoreUserHistoryAssignmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserHistoryAssignment $userHistoryAssignment)
    {
        return new UserHistoryAssignmentResource($userHistoryAssignment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserHistoryAssignment $userHistoryAssignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserHistoryAssignmentRequest $request, UserHistoryAssignment $userHistoryAssignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserHistoryAssignment $userHistoryAssignment)
    {
        //
    }
}
