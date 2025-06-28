<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Http\Request;

class PortfolioGalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Portfolio::with('user');
        $users = User::all();
        // Filter user
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }
        // Pencarian judul
        if ($request->filled('q')) {
            $query->where('title', 'like', '%'.$request->q.'%');
        }
        $portfolios = $query->latest()->paginate(12);
        return view('portfolios.gallery', compact('portfolios', 'users'));
    }
} 