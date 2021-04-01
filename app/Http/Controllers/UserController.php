<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Laporan;
use App\Models\Kabupaten;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function __construct()
    {
        $this->middleware('auth');
    
    }

    public function login()
    {
         return Inertia\Inertia::render('Dashboard');



    }
    public function index()
    {
        //
    }

     public function jawaban(Request $request)
    {
        //     dd($request);
        //       $kabupaten = new Kabupaten;
        // $kabupaten = $kabupaten->where('nama_kabupaten_kota', $request->kabupaten_kota)->first();
        
        
        $laporan = new Laporan;
        $laporan = $laporan->where('id', $request->id)->first();
        $laporan->jawaban = $request->jawaban;
        $laporan->status = 1;
        $laporan->save();
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

    public function getLaporan()
    {
        $laporans = new Laporan;
         $laporans = $laporans->get()->sortBy('created_at');

         return $laporans;
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
        //
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
        //
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
