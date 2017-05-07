<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use App\MultipleGambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $searchResults =Input::get('search');
        $events = Event::where('tajuk','like','%'.$searchResults.'%')->with('MultipleGambar');
        $events = Event::with('user')->where('user_id', Auth::user()->id)->paginate(5);
        return view('event.index', compact('events'));

    }

    public function papar()
    {
        $searchResults =Input::get('search');
        $events = Event::where('tajuk','like','%'.$searchResults.'%')->with('MultipleGambar')->paginate(5);
        return view('event.papar', compact('events'));
    }

    public function category ($id)
    {
        $events = Event::with('Category')->findOrFail($id);
        return view('event.papar', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate ($request, [
            'tajuk' => 'required',
            'huraian' => 'required',
            'tarikh' => 'required',
            'masa' => 'required',
            'lokasi' => 'required',
            'tempoh' => 'required',
            'kumpulan_sasaran' => 'required',
            'max_peserta' => 'required',
            'penganjur' => 'required',
            'telephone' => 'required',
        ]);

        if ($request->hasFile('gambar')) 
        {
            $image = '/images/event_image_' . time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('images/'), $image);
        }

        $event = new Event;
        $event->tajuk = $request->tajuk;
        $event->huraian = $request->huraian;
        $event->tarikh = $request->tarikh;
        $event->masa = $request->masa;
        $event->lokasi = $request->lokasi;
        $event->tempoh = $request->tempoh;
        $event->kumpulan_sasaran = $request->kumpulan_sasaran;
        $event->max_peserta = $request->max_peserta;
        $event->penganjur = $request->penganjur;
        $event->telephone = $request->telephone;
        $event->gambar = $image;
        $event->user_id = Auth::user()->id;
        $event->save();

        if ($request->hasFile('images')) 
        {

            $loop = count($request->images) - 1;
            foreach(range(0, $loop) as $index) {
                $img = '/images/event_image_' . time() . (($index+1)*10) . '.' . $request->images[$index]->getClientOriginalExtension();
                $request->images[$index]->move(public_path('images/'), $img);

                $event_image = new MultipleGambar;
                $event_image->event_id = $event->id;
                $event_image->image_path = $img;
                $event_image->save();
            }
        }

        return redirect()->action('EventsController@store')->withMessage('Perincian program telah berjaya dihebahkan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        // $penggunas = Pengguna::where('user_id',Auth::user()->id)->get();
        // $event = Event::findOrFail($id);
        $event = Event::with('MultipleGambar')->findOrFail($id);
        return view('event.details', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::with('MultipleGambar')->findOrFail($id);
        return view('event.edit', compact('event'));
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
         $this->validate ($request, [
            'tajuk' => 'required',
            'huraian' => 'required',
            'tarikh' => 'required',
            'masa' => 'required',
            'lokasi' => 'required',
            'tempoh' => 'required',
            'kumpulan_sasaran' => 'required',
            'max_peserta' => 'required',
            'penganjur' => 'required',
            'telephone' => 'required',
        ]);

        $event = Event::findOrFail($id);

        if ($request->hasFile('gambar')) 
        {
            $image = '/images/event_image_' . time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('images/'), $image);
            $event->gambar = $image;
        }

        $event->tajuk = $request->tajuk;
        $event->huraian = $request->huraian;
        $event->tarikh = $request->tarikh;
        $event->masa = $request->masa;
        $event->lokasi = $request->lokasi;
        $event->tempoh = $request->tempoh;
        $event->kumpulan_sasaran = $request->kumpulan_sasaran;
        $event->max_peserta = $request->max_peserta;
        $event->penganjur = $request->penganjur;
        $event->telephone = $request->telephone;
        $event->save();

        if ($request->hasFile('images')) 
        {

            $loop = count($request->images) - 1;
            foreach(range(0, $loop) as $index) {
                $img = '/images/event_image_' . time() . (($index+1)*10) . '.' . $request->images[$index]->getClientOriginalExtension();
                $request->images[$index]->move(public_path('images/'), $img);

                $event_image = new MultipleGambar;
                $event_image->event_id = $event->id;
                $event_image->image_path = $img;
                $event_image->save();
            }
        }

        return redirect()->action('EventsController@index')->withMessage('Perincian program telah berjaya dikemaskini.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return back()->withError('Program telah berjaya dipadam.');
    }

    public function destroyImage ($id)
    {
        $MultipleGambar = MultipleGambar::findOrFail($id);
        $MultipleGambar->delete();
        return back()->withError('Gambar telah berjaya dipadam.');
    }

}
