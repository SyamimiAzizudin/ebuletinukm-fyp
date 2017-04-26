<?php

namespace App\Http\Controllers;

use App\Pengarang;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PengarangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengarangs = Pengarang::where('user_id',Auth::user()->id)->get();
        // dd($user = auth()->user()->profile)
        return view ('profile.profile', compact('pengarangs'));
    }

    // public function profile()
    // {
    //     $user = auth()->user()->profile;

    //     return view('profile', compact('user'));
    // }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengarang = Pengarang::findOrFail($id);
        return view('profile.edit', compact('pengarang'));
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
        // dd(User::first());
        $user = User::findOrFail($id);
        $pengarang = Pengarang::where('user_id', $id)->first();

        if ($request->hasFile('gambar')) 
        {
            $image = '/images/pengarang_image_' . time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('images/'), $image);
            $pengarang->gambar = $image;
        }

          // $user->no_matrik = $request->no_matrik;
          $user->username = $request->username;
          $user->email = $request->email;

          $pengarang->nama = $request->nama;
          $pengarang->telefon = $request->telefon;
          $pengarang->fakulti = $request->fakulti;
          $pengarang->persatuan = $request->persatuan;
          $pengarang->jawatan = $request->jawatan;
          $user->save();
          $pengarang->save();
                  
        return redirect()->action('PengarangsController@index')->withMessage('Profil anda telah berjaya dikemaskini!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
