<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function userListPage() {
        $user = auth()->user();
        return view('admin.pages.user.list-user', [
            'type_menu' => 'users',
            'users' => User::whereNot('id', $user->id)->get()
        ]);
    }

    public function editUserPage(User $user) {
        $data =  User::find($user->id);
        return view('admin.pages.user.edit-user', [
            'type_menu' => 'users',
            'user' => $data,
        ]);
    }

    public function updateUser(Request $request, User $user) {
        $validator = Validator::make($request->all(), [
            'name'=>'required|string|min:3|max:255',
            'email'=>'required|string|email|max:255',
            'phone_number'=>'required|string|min:12|max:15',
            'role'=>'required|string|in:user,admin,super_admin',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $user = User::findOrFail($user->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->role = $request->role;
            $user->save();

            return redirect()->route('user.list-page')->with('status', 'User updated successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to update user. Please try again.' . $th->getMessage());

        }
    }
    public function deleteUser(User $user) {
        try {
            $user = User::findOrFail($user->id);
            $user->delete();

            return redirect()->route('user.list-page')->with('status', 'User deleted successfully.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Failed to delete user. Please try again.' . $th->getMessage());

        }
    }
}
