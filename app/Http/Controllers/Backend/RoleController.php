<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\PermissionExport;
use App\Imports\PermissionImport;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    ///////////// All Permission methods ///////////////

    public function AllPermissions(){
        $permissions = Permission::all();
        return view('backend.pages.permissions.all_permissions', compact('permissions'));
    }// End method


    public function AddPermission(){
        return view('backend.pages.permissions.add_permission');
    } // End method

    public function StorePermission(Request $request){
        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name
        ]);

        $notification = array(
            'message' => 'Permission Created Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permissions')->with($notification);
    } // End method

    public function EditPermission($id){
        $permission = Permission::findOrFail($id);
        return view('backend.pages.permissions.edit_permission', compact('permission'));
        
    } // End mehtod

    public function UpdatePermission(Request $request){
        Permission::findOrFail($request->id)->update([
            'name' => $request->name, 
            'group_name' => $request->group_name
        ]);

        $notification = array(
            'message' => 'Permission Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permissions')->with($notification);

    } // End method

    public function DeletePermission($id){
        Permission::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Permission Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End method

    ///////////// Import & Export Permission Methods /////////////////////
    public function ImportPermission(){
        return view('backend.pages.permissions.import_permissions');
    } // End method

    public function Export(){
        return Excel::download(new PermissionExport, 'permissions.xlsx');
    } // End method

    public function Import(Request $request){
        Excel::import(new PermissionImport, $request->file('import_file'));

        $notification = array(
            'message' => 'Permission Imported Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.permissions')->with($notification);
    } // End method


    //////////////// All Role's Methods //////////////////////////////
    public function AllRoles(){
        $roles = Role::all();
        return view('backend.pages.roles.all_roles', compact('roles'));
    } // End method

    public function AddRole(){
        return view('backend.pages.roles.add_role');
    } // End method


    public function StoreRole(Request $request){
        Role::create([
            'name' => $request->name
        ]);

        $notification = array(
            'message' => 'Role Created Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    } // End method

    public function EditRole(Request $request, $id){
        $roles = Role::findOrFail($id);

        return view('backend.pages.roles.edit_role', compact('roles'));
    } // End method


    public function UpdateRole(Request $request){
        $role_id = $request->id;
        Role::findOrFail($role_id)->update([
            'name' => $request->name
        ]);

        $notification = array(
            'message' => 'Role Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.roles')->with($notification);
    } // End method


    public function DeleteRole($id){
        Role::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Role Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }// End method


    /////////////// Add Roles Permission All Methods ///////////////////////
    public function AddRolePermission(){
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.roleSetup.add_role_permission', compact('roles', 'permissions', 'permission_groups'));
    } // End method

    public function RolePermissionStore(Request $request){
        $data = array();
       $permissions = $request->permission;
       foreach($permissions as $key => $item){
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $item;

            DB::table('role_has_permissions')->insert($data);
       } // End foreach

       $notification = array(
        'message' => 'Role Permission Added Successfully!',
        'alert-type' => 'success'
    );

    return redirect()->route('all.roles.permission')->with($notification);
    } // End method

    public function AllRolesPermission(){
        $roles = Role::all();
        return view('backend.pages.roleSetup.all_roles_permission', compact('roles'));
    } // End method

    public function AdminEditRole($id){
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroups();
        return view('backend.pages.roleSetup.admin_edit_role', compact('role', 'permissions', 'permission_groups'));
    } // End method

    public function AdminRolesUpdate(Request $request, $id){
        $role = Role::findOrFail($id);
        $permissions = $request->permission;

            if(!empty($permissions)){
                $role->syncPermissions($permissions);
            }

            $notification = array(
                'message' => 'Role Permission Updated Successfully!',
                'alert-type' => 'success'
            );
        
            return redirect()->route('all.roles.permission')->with($notification);
    } // End method

    public function AdminDeleteRole($id){
        $role = Role::findOrFail($id);
        if(!is_null($role)){
            $role->delete();
        }

        $notification = array(
            'message' => 'Role Permission Deleted Successfully!',
            'alert-type' => 'success'
        );
    
        return redirect()->back()->with($notification);
    } // End method

}
