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

        // $users = User::with('profile')->where('id', auth()->id())->get();
        $user = auth()->user()->load('profile');

        return view ('profile.profile', compact('user'));
    }

    /**
     *
     */
    public function edit()
    {
        // User::with('profile')->where('id', auth()->user()->id)->firstOrFail();
        // User::with('profile')->where('id', auth()->id())->firstOrFail();
        // User::with('profile')->whereId(auth()->id())->firstOrFail();
        $user = auth()->user()->load('profile');

        return view('profile.edit', compact('user'));
    }

    public function role()
    {

        // $users = User::with('profile')->where('id', auth()->id())->get();
        $user = auth()->user()->userRole;

        return view ('layouts.app', compact('user'));
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
        // dd($request->input());
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

        $user->save();

        return redirect()->action('ProfilesController@index')->withMessage('Profil anda telah berjaya dikemaskini!');

    }

}
