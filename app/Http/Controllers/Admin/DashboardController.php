<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Order;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboardPage() {

        return view('admin.pages.index', [
            'users' => User::count(),
            'articles' => Article::count(),
            'products' => Product::count(),
            'transactions' => Order::orderBy('created_at', 'asc')->get(),
        ]);
    }
}
