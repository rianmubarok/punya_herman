<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Portfolio;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $portfolioCount = Portfolio::count();
        $users = User::all();
        $portfolios = Portfolio::with('user')->get();
        return view('admin.dashboard', compact('userCount', 'portfolioCount', 'users', 'portfolios'));
    }

    public function destroyUser(User $user)
    {
        // Jangan hapus admin diri sendiri!
        if ($user->role === 'admin') {
            return back()->with('error', 'Tidak bisa menghapus admin.');
        }
        $user->delete();
        return back()->with('success', 'User berhasil dihapus.');
    }

    public function destroyPortfolio(Portfolio $portfolio)
    {
        $portfolio->delete();
        return back()->with('success', 'Portofolio berhasil dihapus.');
    }
}
