<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataArtikel = Artikel::all();
        return response()->json($dataArtikel);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:png,jpg,jpeg',
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $deskripsi = $request->deskripsi;
        $dom = new \DomDocument();
        $dom->loadHtml($deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');

        foreach ($imageFile as $item => $image) {
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/upload/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $foto = $request->file('foto');
        $foto->storeAs('public/artikel', time() . $foto->hashName());

        Artikel::create([
            'user_id' => auth()->user()->id,
            'slug' => time() . '-' . \Str::slug($request->judul),
            'foto' => time() . $foto->hashName(),
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $dom->saveHTML(),
        ]);

        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        return response()->json($artikel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);
        return view('pages.artikel.edit', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'foto' => 'image|mimes:png,jpg,jpeg',
            'judul' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $deskripsi = $request->deskripsi;
        $dom = new \DomDocument();
        $dom->loadHtml($deskripsi, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('imageFile');

        foreach ($imageFile as $item => $image) {
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/upload/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $artikel = Artikel::find($id);
        if ($request->file('foto') == "") {
            $artikel->update([
                'user_id' => auth()->user()->id,
                'slug' => time() . '-' . \Str::slug($request->judul),
                'judul' => $request->judul,
                'kategori' => $request->kategori,
                'deskripsi' => $dom->saveHTML(),
            ]);
        } else {
            $foto = $request->file('foto');
            $foto->storeAs('public/artikel', time() . $foto->hashName());

            $artikel->update([
                'user_id' => auth()->user()->id,
                'slug' => time() . '-' . \Str::slug($request->judul),
                'foto' => time() . $foto->hashName(),
                'judul' => $request->judul,
                'kategori' => $request->kategori,
                'deskripsi' => $dom->saveHTML(),
            ]);
        }

        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);
        $artikel->delete();
        return redirect()->route('artikel.index');
    }
}
