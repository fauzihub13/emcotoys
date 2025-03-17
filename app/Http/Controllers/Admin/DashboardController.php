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

    public function getTransactionChartData() {
        $monthlySales = Order::selectRaw('MONTH(created_at) as month, SUM(gross_amount) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->toArray();

        // Ensure all months are present, even if there's no data
        $chartData = array_fill(1, 12, 0);
        foreach ($monthlySales as $month => $total) {
            $chartData[$month] = $total;
        }

        return response()->json(array_values($chartData)); // Convert to JSON for JavaScript
    }

}
