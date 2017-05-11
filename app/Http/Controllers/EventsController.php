<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use App\MultipleGambar;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\Notifications\NotifyEvent;

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

    public function category ($id)
    {
        $events = Event::whereHas('categories', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->paginate();

        $categories = Category::all();

        return view('event.papar', compact('categories', 'events'));
    }

    public function papar()
    {
        // $events = Event::with('user')->where('is_published', true)->paginate(5);
        $searchResults =Input::get('search');
        $events = Event::where('tajuk','like','%'.$searchResults.'%')->with('MultipleGambar')->paginate(5);
        $categories = Category::all();
        return view('event.papar', compact('events', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('event.create', compact('categories'));
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

        $category = Category::findOrFail($request->kategori_program);

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

        $event->categories()->save($category);

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
        $categories = Category::all();
        $event = Event::with('MultipleGambar', 'categories')->findOrFail($id);

        return view('event.edit', compact('event', 'categories'));
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

        $category = Category::findOrFail($request->kategori_program);

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

        if (!$category->id == $request->kategori_program) 
        {
            $event->categories()->save($category);
        }

        return redirect()->action('EventsController@index')->withMessage('Perincian program telah berjaya dikemaskini.');

    }

    public function published($id)
    {
      $event = Event::findOrFail($id);

      $event->is_published = $event->is_published == true ? false : true ;

      $event->save();

      return back();
    }

    public function notify($id)
    {
        $event = Event::findOrFail($id);
        $timestamp = Carbon::now();

        $user = $event->user;
        $matrik = $event->user->no_matrik;
        $nama_pengarang = $event->user->username; 
        $tajuk = $event->tajuk;
        $huraian = $event->huraian;
        $tarikh = $event->tarikh;
        $masa = $event->masa;
        $lokasi = $event->lokasi;
        $tempoh = $event->tempoh;
        $max_peserta = $event->max_peserta;
        $penganjur = $event->penganjur;
        $telephone = $event->telephone;
        $kumpulan_sasaran = $event->kumpulan_sasaran;

        $user->notify(new NotifyEvent($timestamp, $matrik, $nama_pengarang, $tajuk, $huraian, $tarikh, $masa, $lokasi, $tempoh, $max_peserta, $penganjur, $telephone, $kumpulan_sasaran ));
        return back()->withMessage('Perincian program telah berjaya diemail.');

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
