<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('user')->get();
        return view('pages.blog.index', compact('blogs'));
        return response()->json([
            'data' => $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.blog.create');
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
            'konten' => 'required',
        ]);

        $konten = $request->konten;
        $dom = new \DomDocument();
        $dom->loadHtml($konten, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
        $foto->storeAs('public/blog', time() . $foto->hashName());

        Blog::create([
            'user_id' => auth()->user()->id,
            'foto' => time() . $foto->hashName(),
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'kategori' => $request->kategori,
            'konten' => $dom->saveHTML()
        ]);

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('pages.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'foto' => 'image|mimes:png,jpg,jpeg',
            'judul' => 'required',
            'kategori' => 'required',
            'konten' => 'required',
        ]);

        $konten = $request->konten;
        $dom = new \DomDocument();
        $dom->loadHtml($konten, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
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
            $blog->update([
                'user_id' => auth()->user()->id,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'kategori' => $request->kategori,
                'konten' => $dom->saveHTML()
            ]);
        } else {
            Storage::delete('public/blog/' . $blog->foto);

            $foto = $request->file('foto');
            $foto->storeAs('public/blog', time() . $foto->hashName());

            $blog->update([
                'user_id' => auth()->user()->id,
                'foto' => time() . $foto->hashName(),
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'kategori' => $request->kategori,
                'konten' => $dom->saveHTML()
            ]);
        }

        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        Storage::delete('public/blog/' . $blog->foto);
        $blog->delete();
    }
}
