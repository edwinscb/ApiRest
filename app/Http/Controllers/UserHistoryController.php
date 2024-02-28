<?php

namespace App\Http\Controllers;

use App\Models\UserHistory;
use App\Http\Requests\StoreUserHistoryRequest;
use App\Http\Requests\UpdateUserHistoryRequest;

use App\Http\Resources\UserHistoryCollection;
use App\Http\Resources\UserHistoryResource;
use Illuminate\Http\Request;
use App\Filters\UserHistoryFilter;

class UserHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new UserHistoryFilter();
        $queryItems = $filter->transform($request);

        $UserHistories = UserHistory::where($queryItems);
        $includeUserHistories = $request->query("includeUserHistories");
        if (count($queryItems) == 0) {
            return new UserHistoryCollection(UserHistory::paginate());
        } else {
            $UserHistories = UserHistory::where($queryItems)->paginate();
            return new UserHistoryCollection($UserHistories->appends($request->query()));
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
    public function store(StoreUserHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserHistory $userHistory)
    {
        return new UserHistoryResource($userHistory);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserHistory $userHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserHistoryRequest $request, UserHistory $userHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserHistory $userHistory)
    {
        //
    }
}
