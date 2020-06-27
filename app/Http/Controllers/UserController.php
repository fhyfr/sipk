<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Menampilkan data user
        $users = \App\User::paginate(5);

        // Fitur Filter berdasarkan email, nama, dan username

        $filterKeyword = $request->get('keyword');

        if ($filterKeyword) {

            $users = \App\User::where('email', 'LIKE', "%$filterKeyword%")->orWhere('name', 'like', "%filterKeyword%")->orWhere('username', 'like', "%filterKeyword%")->paginate(20);
        }
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Membuat user baru
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  Tampung data untuk ditambahkan ke database
        $new_user = new \App\User;
        $new_user->name = $request->get('name');
        $new_user->username = $request->get('username');
        $new_user->roles = strtolower($request->get('roles'));
        $new_user->email = $request->get('email');
        $new_user->password = \Hash::make($request->get('password'));

        $new_user->save();

        return redirect()->route('users.index')->with('status', 'User berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Menampilkan detail user
        $user = \App\User::findOrFail($id);
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Edit data user
        $user = \App\User::findOrFail($id);

        return view('users.edit', ['user' => $user]);
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
        // Update data user ke database
        $user = \App\User::findOrFail($id);

        $user->name = $request->get('name');
        $user->roles = json_encode($request->get('roles'));
        $user->address = $request->get('address');
        $user->phone = $request->get('phone');
        $user->status = $request->get('status');

        if ($request->file('avatar')) {
            if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
                \Storage::delete('public/' . $user->avatar);
            }
            $file = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $file;
        }

        return redirect()->route('users.edit', [$id])->with('status', 'User berhasil diupdated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Hapus data user
        $user = \App\User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('status', 'User successfully deleted');
    }
}
