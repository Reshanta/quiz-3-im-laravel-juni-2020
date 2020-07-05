<?php

namespace App\Http\Controllers;

use App\ArtikelModel;
use Illuminate\Http\Request;

class ArtikelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikels = Artikel::all();
        return view('artikels.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artikels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Artikel::create($request->all());
        return redirect('/artikels');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ArtikelModel  $artikelModel
     * @return \Illuminate\Http\Response
     */
    public function show(ArtikelModel $artikelModel)
    {
        return view('artikels.show', compact('artikelModel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ArtikelModel  $artikelModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ArtikelModel $artikelModel)
    {
        return view('artikels.edit', compact('artikelModel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ArtikelModel  $artikelModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArtikelModel $artikelModel)
    {
        Artikel::where('id', $artikelModel->id)->update([
                    'judul' => $request->judul,
                    'isi'   => $request->isi,
                    'slug'  => $request->slug,
                    'tag'   => $request->tag

        ]);
        return redirect('/artikels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ArtikelModel  $artikelModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArtikelModel $artikelModel)
    {
        Artikel::destroy($artikelModel->id);
        return redirect('/artikels');
    }
}
