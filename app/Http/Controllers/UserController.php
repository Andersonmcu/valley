<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'email'         => 'required|email|unique:users',
            // 'department_id' => 'required|department_id',
            'password'      => 'required|min:8',
        ]);

        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'telefono'      => $request->telefono,
            'department_id' => $request->department_id,
            'password'      => bcrypt($request->password),
        ]);

        return back();
    }

    public function show($user)
    {
        $users =  User::findOrFail($user);

        return view('users.show', [
            'users' => $users
        ]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {

        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->telefono     = $request->telefono;
        $user->department_id   = $request->department_id;
        $user->password     = bcrypt($request->password);

        $user->save();

        return redirect()
            ->route('users.edit', $user)
            ->with('info', 'El usuario ha sido actualizado correctamente');
        ;
        // $user = User::find($id);

        // // Actualizamos
        // $user->save();

        // return redirect()
        // ->route('users.index')
        // ->with('info','El usuario ha sido actualizado');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
