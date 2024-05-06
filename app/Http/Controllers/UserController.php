<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $table)
    {
        return $table->render('templates.datatable', [
            'title' => 'User Config',
            'buttons' => '<button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahUserModal"><i class="fas fa-sm fa-plus mr-2"></i> Tambah User</button>',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username',
            'roles' => 'required|string|max:255',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->roles = $request->roles;
        $user->status = "Aktif";

        if ($request->password && $request->password_2) {
            if ($request->password != $request->password_2) {
                return back()->withErrors(['password' => 'Password tidak sama']);
            } else {
                $user->password = bcrypt($request->password);
            }
        }

        $user->save();

        return redirect()->route('admin.user-config.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('auth.user.show', [
            'title' => 'User Detail',
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('auth.user.edit', [
            'title' => 'User Edit',
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'telp' => 'required|string|max:255',
            'roles' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->roles = $request->roles;
        $user->status = $request->status;

        if($request->password && $request->password_2) {
            if($request->password != $request->password_2) {
                return back()->withErrors(['password' => 'Password tidak sama']);
            } else {
                $user->password = bcrypt($request->password);
            }
        }

        $user->save();

        return redirect()->route('admin.user-config.edit', $user->id)->with('success', 'User berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
