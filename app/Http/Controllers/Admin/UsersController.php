<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Gate;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */


    public function index()
    {
        $users = User::all();
        return view('admin.users.index')->with('users', $users);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'roles' => 'required',
            'name' => 'required',
            'email' => 'required',
        ]);

    $user->roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

    return redirect()->route('admin.users.index')->with('success', 'Ieraksts atujaunināts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index')->with('error', 'Ieraksts dzēsts');
    }
}
