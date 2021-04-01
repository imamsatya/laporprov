<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Laporan;
use App\Models\Kabupaten;
class LaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         $laporans = new Laporan;
         $laporans = $laporans->get()->sortBy('created_at');
         
        // return view('home2', compact('questions'));
        return Inertia::render('Lapor', ['laporans' => $laporans]);
    }

    public function getLaporan()
    {
        $laporans = new Laporan;
         $laporans = $laporans->get()->sortBy('created_at');

         return $laporans;
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
            // dd($request);
            // dd($request->file->getClientOriginalExtension());
             $kabupaten = new Kabupaten;
                 $kabupaten = $kabupaten->where('nama_kabupaten_kota', $request->kabupaten_kota)->first();

        
          $laporan=new Laporan;
          $laporan->siapa = $request->siapa;
        //   $laporan->kabupaten_kota = $request->kabupaten_kota;
          $laporan->laporan = $request->laporan;
          $laporan->status = 'false';
          $laporan->kabupaten_kota_id = $kabupaten->id;
          if ($request->anonim === 'true') {
          $laporan->anonim = TRUE;
          }else{
              $laporan->anonim = FALSE;
          }
          
          if ($request->rahasia === 'true') {
          $laporan->rahasia = TRUE;
          }else{
              $laporan->rahasia = FALSE;
          }
          $laporan->save();

          

            $fileName = $laporan->id.'.'.$request->file->getClientOriginalExtension();
          $request->file->move('./bukti', $fileName);
          dd($request->anonim);
          dd('end');
        
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
