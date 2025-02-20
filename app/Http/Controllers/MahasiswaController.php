<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $rows = Mahasiswa::all();
        return view('mahasiswa.index', compact('rows')); // Fix: compact menggunakan 'rows'
    }

    public function create()
    {
        return view('mahasiswa.add');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|numeric|unique:mahasiswas,nim',
            'jurusan' => 'required|string|max:255',
            'notelp' => 'required|numeric',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nim.required' => 'NIM harus diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'nim.unique' => 'NIM sudah digunakan.',
            'jurusan.required' => 'Jurusan harus diisi.',
            'notelp.required' => 'Nomor telepon harus diisi.',
            'notelp.numeric' => 'Nomor telepon harus berupa angka.',
        ]);

        // Simpan data ke database
        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function show(Mahasiswa $mahasiswa) // Fix: parameter harus $mahasiswa
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa) // Fix: parameter harus $mahasiswa
    {
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        // Validasi input saat update
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|numeric', // Fix: tidak menggunakan unique
            'jurusan' => 'required|string|max:255',
            'notelp' => 'required|numeric',
        ], [
            'nama.required' => 'Nama harus diisi.',
            'nim.required' => 'NIM harus diisi.',
            'nim.numeric' => 'NIM harus berupa angka.',
            'jurusan.required' => 'Jurusan harus diisi.',
            'notelp.required' => 'Nomor telepon harus diisi.',
            'notelp.numeric' => 'Nomor telepon harus berupa angka.',
        ]);

        // Update data
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa) // Fix: parameter harus $mahasiswa
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
