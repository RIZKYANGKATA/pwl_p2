<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Barryvdh\DomPDF\Facade\Pdf;
//use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('image')){
            $image_name = $request->file('image')->store('images', 'public');
        }

        Articles::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured_image' => $image_name,
        ]);
        return 'Artikel berhasil disimpan';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $articles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Articles::find($id);
        return view('articles.edit', ['article' => $articles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articles = Articles::find($id);

        $articles->title = $request->title;
        $articles->content = $request->content;

        if($articles->featured_image && file_exists(storage_path('app/public/' . $articles->featured_image))) {
            Storage::delete('public/' . $articles->featured_image);
        }
    $image_name = $request->file('image')->store('images', 'public');
    $articles->featured_image = $image_name;
     
    $articles->save();
    return 'Artikel berhasil diubah';
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $articles)
    {
        //
    }

    public function cetak_pdf(){
        $articles = Articles::all();
        $pdf = PDF::loadview('articles.articles_pdf', ['articles'=>$articles]);
        return $pdf->stream();
    }
}
