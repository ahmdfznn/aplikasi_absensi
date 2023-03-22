<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.karyawan', [
            'title' => 'Karyawan',
            'karyawan' => Karyawan::latest()->get()->sortBy(['nama', 'asc'])
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.add-karyawan', [
            'title' => 'Add Karyawan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'profile_picture' => 'image',
            'nip' => 'required|unique:karyawan',
            'nik' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'jabatan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'no_telepon' => 'required',
            'alamat' => 'required',
        ]);

        $karyawans = Karyawan::where('id', $request->id)->first();

        // $rules = [
        //     'nip' => $request->nip,
        //     'nik' => $request->nik,
        //     'nama' => $request->nama,
        //     'jenis_kelamin' => $request->jenis_kelamin,
        //     'pangkat' => $request->pangkat,
        //     'jabatan' => $request->jabatan,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'tanggal_lahir' => $request->tanggal_lahir,
        //     'no_telepon' => $request->nomor,
        //     'agama' => $request->agama,
        //     'status_nikah' => $request->status,
        //     'alamat' => $request->alamat,
        //     'golongan' => $golongan,
        //     'keterangan' => $request->keterangan
        // ];

        if ($request->file('profile_picture')) {
            $validated['profile_picture'] = $request->file('profile_picture')->store('profile-picture');
        }

        Karyawan::create($validated);

        return redirect('karyawan')->with('add_karyawan', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(Karyawan $karyawan)
    {
        return view('pages.edit-karyawan', [
            'title' => 'Edit Karyawan',
            'data' => Karyawan::where('nama', $karyawan->nama)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nama)
    {
        $karyawans = Karyawan::where('nama', $nama)->first();

        $rules = [
            'nip' => $request->nip,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'jabatan' => $request->jabatan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
            'keterangan' => $request->keterangan
        ];

        if ($request->file('profile_picture')) {
            if ($karyawans->profile_picture) {
                Storage::delete($karyawans->profile_picture);
            }
            $rules['profile_picture'] = $request->file('profile_picture')->store('profile-picture');
        }

        Karyawan::where('nama', $nama)->update($rules);

        return redirect('karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::destroy($id);

        return redirect('karyawan')->with('delete-karyawan', 'Data berhasil dihapus!');
    }
}
