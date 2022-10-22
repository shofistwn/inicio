<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(8);
        return view('pages.shop.index', compact('products'));
    }

    public function search(Request $request)
    {
        $nama = $request->nama;

        $products = DB::table('products')
            ->where('nama', 'like', "%" . $nama . "%")
            ->paginate(8);

        return view('pages.shop.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.product.create');
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
            'harga' => 'required',
            'stok' => 'required',
            'berat' => 'required',
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
        $foto->storeAs('public/product', time() . $foto->hashName());

        Product::create([
            'user_id' => auth()->user()->id,
            'slug' => time() . '-' .\Str::slug($request->nama),
            'foto' => time() . $foto->hashName(),
            'nama' => $request->nama,
            'kategori' => $request->kategori,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'deskripsi' => $dom->saveHTML(),
            'berat' => $request->berat,
        ]);

        return redirect()->route('shop.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('pages.product.edit', compact('product'));
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
        $request->validate([
            'foto' => 'image|mimes:png,jpg,jpeg',
            'nama' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'berat' => 'required',
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

        $product = Product::find($id);
        if ($request->file('foto') == "") {
            $product->update([
                'user_id' => auth()->user()->id,
                'slug' => time() . '-' .\Str::slug($request->nama),
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'deskripsi' => $dom->saveHTML(),
                'berat' => $request->berat,
            ]);
        } else {
            $foto = $request->file('foto');
            $foto->storeAs('public/product', time() . $foto->hashName());

            $product->update([
                'user_id' => auth()->user()->id,
                'slug' => time() . '-' .\Str::slug($request->nama),
                'foto' => time() . $foto->hashName(),
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'stok' => $request->stok,
                'harga' => $request->harga,
                'deskripsi' => $dom->saveHTML(),
                'berat' => $request->berat,
            ]);
        }

        return redirect()->route('shop.index');
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
