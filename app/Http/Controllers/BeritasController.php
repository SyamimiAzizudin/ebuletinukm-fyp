<?php

namespace App\Http\Controllers;

use App\Berita;
use App\Event;
use App\User;
use App\Category;
use Charts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Barryvdh\DomPDF\PDF;
use App\Notifications\Hebahan;

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
        // dd ($beritas);
        $categories = Category::all();
        return view('berita.papar', compact('beritas', 'categories'));
    }

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

    public function janalaporan()
    {
      $chart_berita = Charts::database(Berita::all(), 'bar', 'highcharts')
      ->title("Jumlah Hebahan Berita Setiap Bulan")
      ->elementLabel("Total")
      ->dimensions(1000, 500)
      ->responsive(false)
      ->groupByMonth('2017', true);

      $chart_acara = Charts::database(Event::all(), 'bar', 'highcharts')
      ->title("Jumlah Hebahan Acara Setiap Bulan")
      ->elementLabel("Total")
      ->dimensions(1000, 500)
      ->responsive(false)
      ->groupByMonth('2017', true);
        return view('laporan.index', ['chart_berita' => $chart_berita], ['chart_acara' => $chart_acara]);
    }

    public function showLaporanBerita() 
    {
      $beritas = Berita::with('user')->paginate(5);
         $pdf = app('dompdf.wrapper');
        $pdf->loadView('laporan.berita',compact('beritas'));
        return $pdf->stream('LaporanHebahanBerita.pdf');
    }

    public function showLaporanAcara() 
    {
        $events = Event::with('user')->paginate(5);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('laporan.event',compact('events'));
        return $pdf->stream('LaporanHebahanAcara.pdf');
    }

    public function notification($id)
    {
        $berita = Berita::findOrFail($id);
        $timestamp = Carbon::now();

        $user = $berita->user;
        $matrik = $berita->user->no_matrik;
        $nama_pembaca = $berita->user->username; 
        $tajuk = $berita->tajuk;
        $huraian = $berita->huraian;
        $lokasi = $berita->lokasi;
        $kumpulan_sasaran = $berita->kumpulan_sasaran;

        $user->notify(new Hebahan($timestamp, $matrik, $nama_pembaca, $tajuk, $huraian, $lokasi, $kumpulan_sasaran ));
        return back()->withMessage('Berita telah berjaya diemail.');

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
