<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Event;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class BeritasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $searchResults =Input::get('search');
        $beritas = Berita::where('tajuk','like','%'.$searchResults.'%');
        $beritas = Berita::with('user')->where('user_id', Auth::user()->id)->paginate(5);
        return view('berita.index', compact('beritas'));

    }

    public function category($id)
    {
        $beritas = Berita::whereHas('categories', function ($query) use ($id) {
            $query->where('category_id', $id);
        })->paginate();

        $categories = Category::all();

        return view('berita.papar', compact('categories', 'beritas'));
    }

    public function papar()
    {
        $beritas = Berita::with('user')->where('is_published', true);
        $searchResults =Input::get('search');
        $beritas = Berita::where('tajuk','like',"%$searchResults%")->paginate(5);
        $categories = Category::all();
        return view('berita.papar', compact('beritas', 'categories'));
    }

    // public function tetapan ()
    // {
    //     //
    //     return view('/tetapan', compact('categories', 'beritas'));
    // }

    // public function newsfunct(){

    //     $beritas = Berita::all();//get data from table
    //     return view('tetapan',compact('beritas'));//sent data to view

    // }

    // public function fingBySasaran(Request $request)
    // {
    //     $data=News::select('tajuk','id')->where('kumpulan_sasaran', $request->id)->take(100)->get();
    //     return response()->json($data);//then sent this data to ajax success
    // }

    public function home()
    {
        $beritas = Berita::with('user')->paginate(4);
        $events = Event::with('user')->paginate(4);
        return view('/home', compact('beritas' , 'events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');

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
            'lokasi' => 'required',
            'kumpulan_sasaran' => 'required',
        ]);

        if ($request->hasFile('gambar'))
        {
            $image = '/images/berita_image_' . time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('images/'), $image);
        }

        $berita = new Berita;
        $berita->tajuk = $request->tajuk;
        $berita->huraian = $request->huraian;
        $berita->lokasi = $request->lokasi;
        $berita->kumpulan_sasaran = $request->kumpulan_sasaran;
        $berita->gambar = $image;
        $berita->user_id = Auth::user()->id;
        $berita->save();

        return redirect()->action('BeritasController@store')->withMessage('Perincian berita telah berjaya dihebahkan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        // dd ($berita);
        return view('berita.details', compact('berita'));
    }

    public function laporan($id)
    {
        $berita = Berita::with('user.profile')->findOrFail($id);
        // dd ($berita);
        return view('berita.laporan', compact('berita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        // dd($berita->kumpulan_sasaran);
        return view('berita.edit', compact('berita'));
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
            'lokasi' => 'required',
            'kumpulan_sasaran' => 'required',
        ]);

        $berita = Berita::findOrFail($id);

        if ($request->hasFile('gambar'))
        {
            $image = '/images/berita_image_' . time() . '.' . $request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('images/'), $image);
            $berita->gambar = $image;
        }

        $berita->tajuk = $request->tajuk;
        $berita->huraian = $request->huraian;
        $berita->lokasi = $request->lokasi;
        $berita->kumpulan_sasaran = $request->kumpulan_sasaran;
        $berita->save();

        return redirect()->action('BeritasController@index')->withMessage('Perincian berita telah berjaya dikemaskini.');

    }

    public function published($id)
    {
      $berita = Berita::findOrFail($id);

      $berita->is_published = $berita->is_published == true ? false : true ;

      $berita->save();

      return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();
        return back()->withError('Berita telah berjaya dipadam.');

    }
}
