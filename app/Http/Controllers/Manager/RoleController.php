<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role as RoleLaravelPermission;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of roles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('name', 'DESC')->paginate(4);

        return view('manager.authorization.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.authorization.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('manager/authorization/roles/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        RoleLaravelPermission::create(['name' => $request->input('name')]);

        // flash messages...

        return redirect()->route('manager.authorization.roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = RoleLaravelPermission::findById($id);
        $currentPermissionsIds = [];
        $permissions = Permission::all();
        foreach($role->getAllPermissions() as $roles) {
            $currentPermissionsIds[] = $roles->id;
        }

        return view('manager.authorization.roles.edit', compact([
            'role',
            'currentPermissionsIds',
            'permissions'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = RoleLaravelPermission::findById($id);
        $permissionIds = $request->input('permisions');
        $allPermissions = Permission::all();

        $role->revokePermissionTo($allPermissions);

        foreach($allPermissions as $permission) {
            if (in_array($permission->id, $permissionIds)) {
                $role->givePermissionTo($permission->name);
            }
        }

        return redirect()->route('manager.roles.index');
    }
}
