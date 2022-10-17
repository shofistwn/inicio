<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('user')->get();
        return response()->json([
            'success' => true,
            'message' => 'Daftar Data Event',
            'data' => $events
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.event.create');
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
            'slug' => '',
            'mulai' => 'required',
            'selesai' => '',
            'lokasi' => 'required',
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
        $foto->storeAs('public/event', time() . $foto->hashName());

        Event::create([
            'user_id' => auth()->user()->id,
            'foto' => time() . $foto->hashName(),
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'lokasi' => $request->lokasi,
            'konten' => $dom->saveHTML()
        ]);

        return redirect()->route('event.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('pages.event.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'foto' => 'image|mimes:png,jpg,jpeg',
            'judul' => 'required',
            'slug' => '',
            'mulai' => 'required',
            'selesai' => '',
            'lokasi' => 'required',
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
            $event->update([
                'user_id' => auth()->user()->id,
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
                'lokasi' => $request->lokasi,
                'konten' => $dom->saveHTML()
            ]);
        } else {
            Storage::delete('public/event/' . $event->foto);

            $foto = $request->file('foto');
            $foto->storeAs('public/blog', time() . $foto->hashName());

            $event->update([
                'user_id' => auth()->user()->id,
                'foto' => time() . $foto->hashName(),
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'mulai' => $request->mulai,
                'selesai' => $request->selesai,
                'lokasi' => $request->lokasi,
                'konten' => $dom->saveHTML()
            ]);
        }

        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        Storage::delete('public/event/' . $event->foto);
        $event->delete();
    }
}
