<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{

    public function AdminLogin(){
        return view('admin.admin_login');
    } // End login function

    // Show Admin Dashbourd
    public function adminDashboard(){
        return view('admin.index');
    } // End Method..


    // Logout Admin
    public function AdminLogout(Request $request) 
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } // Logout Admin Ends...

  
    public function AdminFrofile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile', compact('profileData'));
    } // End profile page

    public function AdminFrofileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->username = $request->username;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if($request->file('photo')){
            $file = $request->file('photo');
            @unlink(public_path('uploads/admin_images/'.$data->photo));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/admin_images'), $fileName);
            $data['photo'] = $fileName;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // End method

    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    } // End method

    public function AdminUpdatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        // Match the old password
        if(!Hash::check($request->old_password, Auth()->user()->password)){
            $notification = array(
                'message' => 'Old Password Does Not Match!',
                'alert-type' => 'error'
            );
    
            return back()->with($notification);
        } 

        // Update the new password
        User::whereId(Auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Updated Successfully!',
            'alert-type' => 'success'
        );

        return back()->with($notification);

    } // End method

    //////////// Admin User All Method ////////////////////

    public function AllAdmin(){
        $allAdmin = User::where('role', 'admin')->get();
        return view('backend.pages.admin.all_admin', compact('allAdmin'));
    } // End method

    public function AddAdmin(){
        $roles = Role::all();
        return view('backend.pages.admin.add_admin', compact('roles'));
    } // End method

    public function StoreAdmin(Request $request){
        $Admin = new User();

        $Admin->name = $request->name;
        $Admin->username = $request->uid;
        $Admin->email = $request->email;
        $Admin->phone = $request->phone;
        $Admin->address = $request->address;
        $Admin->role = "admin";
        $Admin->status = "active";
        $Admin->password = Hash::make($request->pwd);

        $Admin->save();

        if($request->roles){
            $Admin->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Admin Added Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);

    } // End method

    public function EditAdmin($id){
        $admin = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.pages.admin.edit_admin', compact('admin', 'roles'));
    } // End method

    public function UpdateAdmin(Request $request, $id){
        $admin = User::findOrFail($id);

        $admin->name = $request->name;
        $admin->username = $request->uid;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->role = "admin";
        $admin->status = "active";

        $admin->save();

        $admin->roles()->detach();
        if($request->roles){
            $admin->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'Admin User Updated Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('all.admin')->with($notification);
    } // End method

    public function DeleteAdmin($id){
        $admin = User::findOrFail($id);

        if(!is_null($admin))
        {
            $admin->delete();
        }
        
        $notification = array(
            'message' => 'Admin User Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    } // End method

}