<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\User;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with('user')->latest()->paginate(10);
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.portfolios.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'skills' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'project_link' => 'nullable|url',
        ]);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('portfolios', 'public');
        }
        Portfolio::create($data);
        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil ditambahkan!');
    }

    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolios.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio)
    {
        $users = User::all();
        return view('admin.portfolios.edit', compact('portfolio', 'users'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
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
        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil diupdate!');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('admin.portfolios.index')->with('success', 'Portofolio berhasil dihapus!');
    }
} 