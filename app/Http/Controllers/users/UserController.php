<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\View\Components\Alert;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function delete(int $id)
    {
        $user = User::find($id);
        $this->authorize('delete', $user);
        if ($user) {
            $user->delete();
            $message = "Deleted user with id:" . $user->id;
        } else {
            $message = "User with id:" . $id . " not found or already deleted!";
        }
        return redirect()->route('home')->with(Alert::SESSION_KEY, $message);
    }

    public function edit(int $id)
    {

        $user = User::findOrFail($id);
        return view('users.edit', ['user' => $user, 'roles' => Role::all()]);
    }

    public function update(int $id, UpdateUserRequest $request)
    {
        $request->validated();

        $user = User::findOrFail($id);

        $this->authorize('update', $user);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->roles()->sync($request->roleIds);
        $user->save();

        return redirect()->route('home')->with(Alert::SESSION_KEY, 'User updated!');
    }
}
