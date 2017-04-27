<?php

namespace App\Http\Controllers;

use App\Pengarang;
use App\Pembaca;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProfilesController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $users = User::with('profile')->where('id', auth()->id())->get();
        // dd($users);
            return view ('profile.profile', compact('users'));
    }

    public function edit()
    {
        $user = User::with('profile')->where('id', auth()->id())->firstOrFail();

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::with('profile')->where('id', auth()->id())->firstOrFail();

        $image = '';

        if ($request->hasFile('gambar'))
        {
            $image = '/images/' . time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('images/'), $image);
        }

        if ($user->userRole == 'pengarang') {
            $user->profile()->update([
                'nama'        => $request->nama,
                'telefon'     => $request->no_telefon,
                'fakulti'     => $request->fakulti,
                'persatuan'   => $request->persatuan,
                'jawatan'     => $request->jawatan,
                'gambar'      => $image,
            ]);
        } else {
            $user->profile()->update([
                'nama'        => $request->nama,
                'telefon'     => $request->no_telefon,
                'fakulti'     => $request->fakulti,
                'jabatan'     => $request->jabatan,
                'persatuan'   => $request->persatuan,
                'gambar'      => $image,
            ]);
        } 
        return redirect()->back()->withMessage('Profil anda telah berjaya dikemaskini!');

    }

}
