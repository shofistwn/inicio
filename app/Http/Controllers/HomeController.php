<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function edit()
    {
        $user = UserAddress::where('user_id', auth()->user()->id)
        ->join('users', 'user_addresses.user_id', '=', 'users.id')
        ->first();

        // jika user address tidak ditemukan akan di set null
        if (is_null($user)) {
            $user = User::find(auth()->user()->id);
        }
        $provinces = Province::pluck('name', 'province_id');
        $city = City::where('province_id', $user->provinsi)->pluck('name', 'city_id');

        return view('pages.user.edit', compact('user', 'provinces', 'city'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'foto' => 'image|mimes:png,jpg,jpeg',
            'nama' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'kode_pos' => 'required',
            'alamat_detail' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'kecamatan' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        if ($request->file('foto') == "") {
            $user->update([
                'nama' => $request->nama,
                'telepon' => $request->telepon,
                'email' => $request->email,
            ]);
        } else {
            $foto = $request->file('foto');
            $foto->storeAs('public/user', time() . $foto->hashName());

            $user->update([
                'foto' => time() . $foto->hashName(),
                'nama' => $request->nama,
                'telepon' => $request->telepon,
                'email' => $request->email,
            ]);
        }

        $userAddress = UserAddress::where('user_id', $user->id)->first();

        if (is_null($userAddress)) {
            UserAddress::create([
                'user_id' => $user->id,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'alamat_detail' => $request->alamat_detail,
                'kode_pos' => $request->kode_pos,
            ]);
        } else {
            $userAddress->update([
                'user_id' => $user->id,
                'provinsi' => $request->provinsi,
                'kota' => $request->kota,
                'kecamatan' => $request->kecamatan,
                'alamat_detail' => $request->alamat_detail,
                'kode_pos' => $request->kode_pos,
            ]);
        }

        return redirect()->route('user.profile');
    }
}
