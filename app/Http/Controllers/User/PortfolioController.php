<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    // Tampilkan daftar portofolio milik user yang sedang login
    public function index()
    {
        $portfolios = auth()->user()->portfolios;
        return view('user.portfolios.index', compact('portfolios'));
    }

    // Tampilkan form tambah portofolio
    public function create()
    {
        return view('user.portfolios.create');
    }

    // Simpan portofolio baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'skills' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'project_link' => 'nullable|url',
        ]);

        // Handle upload gambar (jika ada)
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        $data['user_id'] = auth()->id();
        Portfolio::create($data);

        return redirect()->route('user.portfolios.index')->with('success', 'Portofolio berhasil ditambahkan!');
    }

    // Tampilkan detail portofolio (opsional)
    public function show(Portfolio $portfolio)
    {
        // Pastikan hanya user pemilik yang bisa melihat
        abort_if($portfolio->user_id !== auth()->id(), 403);
        return view('user.portfolios.show', compact('portfolio'));
    }

    // Tampilkan form edit
    public function edit(Portfolio $portfolio)
    {
        abort_if($portfolio->user_id !== auth()->id(), 403);
        return view('user.portfolios.edit', compact('portfolio'));
    }

    // Update portofolio
    public function update(Request $request, Portfolio $portfolio)
    {
        abort_if($portfolio->user_id !== auth()->id(), 403);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'skills' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'project_link' => 'nullable|url',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }

        $portfolio->update($data);

        return redirect()->route('user.portfolios.index')->with('success', 'Portofolio berhasil diupdate!');
    }

    // Hapus portofolio
    public function destroy(Portfolio $portfolio)
    {
        abort_if($portfolio->user_id !== auth()->id(), 403);
        $portfolio->delete();
        return redirect()->route('user.portfolios.index')->with('success', 'Portofolio berhasil dihapus!');
    }
}