<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obat = Obat::with('user')->get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar Data Obat',
            'data' => $obat
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.obat.create');
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
            'nama' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'komposisi' => 'required',
            'dosis' => 'required',
            'aturan_pakai' => 'required',
            'manufaktur' => 'required',
            'berat' => 'required',
            'no_registrasi' => 'required',
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
        $foto->storeAs('public/obat', time() . $foto->hashName());

        Obat::create([
            'user_id' => auth()->user()->id,
            'slug' => \Str::slug($request->nama),
            'foto' => time() . $foto->hashName(),
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'deskripsi' => $dom->saveHTML(),
            'komposisi' => $request->komposisi,
            'dosis' => $request->dosis,
            'aturan_pakai' => $request->aturan_pakai,
            'manufaktur' => $request->manufaktur,
            'berat' => $request->berat,
            'no_registrasi' => $request->no_registrasi,
        ]);

        return redirect()->route('obat.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function edit(Obat $obat)
    {
        return view('pages.obat.edit', compact('obat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'foto' => 'image|mimes:png,jpg,jpeg',
            'nama' => 'required',
            'kategori' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'komposisi' => 'required',
            'dosis' => 'required',
            'aturan_pakai' => 'required',
            'manufaktur' => 'required',
            'berat' => 'required',
            'no_registrasi' => 'required',
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

        if ($request->file('foto') == "") {
            $obat->update([
                'user_id' => auth()->user()->id,
                'slug' => \Str::slug($request->nama),
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'deskripsi' => $dom->saveHTML(),
                'komposisi' => $request->komposisi,
                'dosis' => $request->dosis,
                'aturan_pakai' => $request->aturan_pakai,
                'manufaktur' => $request->manufaktur,
                'berat' => $request->berat,
                'no_registrasi' => $request->no_registrasi,
            ]);
        } else {
            Storage::delete('public/obat/' . $obat->foto);

            $foto = $request->file('foto');
            $foto->storeAs('public/obat', time() . $foto->hashName());

            $obat->update([
                'user_id' => auth()->user()->id,
                'slug' => \Str::slug($request->nama),
                'foto' => time() . $foto->hashName(),
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'deskripsi' => $dom->saveHTML(),
                'komposisi' => $request->komposisi,
                'dosis' => $request->dosis,
                'aturan_pakai' => $request->aturan_pakai,
                'manufaktur' => $request->manufaktur,
                'berat' => $request->berat,
                'no_registrasi' => $request->no_registrasi,
            ]);
        }

        return redirect()->route('obat.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Obat  $obat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        Storage::delete('public/obat/' . $obat->foto);
        $obat->delete();
    }
}
