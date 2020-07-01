<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

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

            $users = \App\User::where('name', 'like', "%$filterKeyword%")->orWhere('email', 'like', "%$filterKeyword%")->orWhere('username', 'like', "%$filterKeyword%")->orWhere('roles', 'like', "%$filterKeyword%")->latest()->paginate(20);
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
        $new_user->password = Hash::make($request->get('password'));

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
        $user->email = $request->get('email');
        $user->username = $request->get('username');

        // Cek apakah password berubah atau tidak, jika iya maka hash password baru
        if (Hash::needsRehash($user->password)) {
            $user->password = Hash::make($request->password);
        } else {
            if ($user->password != ($user->password = $request->get('password'))) {
                $user->password = Hash::make($request->password);
            }
        }

        // $user->password = $request->get('password');

        $user->roles = strtolower($request->get('roles'));

        $user->save();

        return redirect()->route('users.index', [$id])->with('status', 'User berhasil diupdated');
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

        return redirect()->route('users.index')->with('status', 'User berhasil dihapus');
    }

    /**
     * Remove all resource which selected by checkbox from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        \DB::table("users")->whereIn('id', explode(",", $ids))->delete();
        return response()->json(['success' => "Users Deleted successfully."]);
    }
}
