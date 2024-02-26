<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;

use Illuminate\Http\Request;
use App\Filters\RoleFilter;
use App\Http\Resources\RoleCollection;
use App\Http\Resources\RoleResource;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new RoleFilter();
        $queryItems = $filter->transform($request);

        // Utiliza el método with() en la consulta para cargar la relación 'users'
        $roles = Role::where($queryItems);
        $includeUsers = $request->query("includeUsers");
        if ($includeUsers) {
            $users = $roles->with('users');
        }

        return new RoleCollection($roles->paginate()->appends($request->query()));
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
    public function store(StoreRoleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        $includeUsers = request()->query('includeUsers');
        if ($includeUsers) {
            return new RoleResource($role->loadMissing('users'));
        }
        return new RoleResource($role);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        //
    }
}
