<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Models\PermissionRole;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\AdminRequests\StorePermissionRoleRequest;
use App\Http\Requests\Api\V1\AdminRequests\UpdatePermissionRoleRequest;

class PermissionRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRoleRequest $request)
    {
        //
        // $var = DB::transaction(function () {
            
        // });

        // return $var;
    }

    /**
     * Display the specified resource.
     */
    public function show(PermissionRole $permissionRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRoleRequest $request, PermissionRole $permissionRole)
    {
        //
        // $var = DB::transaction(function () {
            
        // });

        // return $var;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PermissionRole $permissionRole)
    {
        //
    }
}
