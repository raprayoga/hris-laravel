<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:access');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return response()->json(['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return response()->json(['permissions' => $permissions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required|string|unique:roles,name',
            'permissions.*' => 'string'
        ]);

        $role = Role::create(['name' => $request->role]);
        $role->givePermissionTo($request->permissions);
        $role->permissions;
        
        return response()->json([
            'message' => 'success to add role',
            'role' => $role
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role->permissions;
        return response()->json(['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'role' => 'required|string',
            'permissions.*' => 'string'
        ]);
        
        $role->update(['name' => $request->role]);
        $role->syncPermissions($request->permissions);

        $role->permissions;
        return response()->json([
            'message' => 'success to update role',
            'role' => $role,
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->syncPermissions([]);
        $role->delete();
        return response()->json([
            'message' => 'success to delete role',
        ], 201);
    }
}
