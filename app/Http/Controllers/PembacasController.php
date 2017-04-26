<?php

namespace App\Http\Controllers;

use App\Pembaca;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PembacasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembacas = Pembaca::where('user_id',Auth::user()->id)->get();
        return view ('pembaca.profile', compact('pembacas'));
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
        $pembaca = Pembaca::findOrFail($id);
        return view('pembaca.edit', compact('pembaca'));
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
        $user = User::findOrFail($id);
        $pembaca = Pembaca::where('user_id', $id)->first();

        if ($request->hasFile('gambar')) 
        {
            $image = '/images/pembaca_image_' . time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('images/'), $image);
            $pembaca->gambar = $image;
        }

          // $user->no_matrik = $request->no_matrik;
          $user->username = $request->username;
          $user->email = $request->email;

          $pembaca->nama = $request->nama;
          $pembaca->telefon = $request->telefon;
          $pembaca->fakulti = $request->fakulti;
          $pembaca->jabatan = $request->jabatan;
          $pembaca->persatuan = $request->persatuan;
          $user->save();
          $pembaca->save();
                  
        return redirect()->action('PembacasController@index')->withMessage('Profil anda telah berjaya dikemaskini!');

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
