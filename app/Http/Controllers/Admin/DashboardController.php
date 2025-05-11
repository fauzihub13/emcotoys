<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Phpml\Clustering\KMeans;

class DashboardController extends Controller
{
    public function dashboardPage()
    {

        return view('admin.pages.index', [
            'users' => User::count(),
            'articles' => Article::count(),
            'products' => Product::count(),
            'transactions' => Order::orderBy('created_at', 'asc')->get(),
        ]);
    }

    public function getTransactionChartData()
    {
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

        return response()->json(array_values($chartData));
    }

    public function getUserTransactionRecap()
    {

        $customerData = User::with('orders')
            ->get()
            ->map(function ($user) {
                $totalTransactions = $user->orders->count();
                $totalAmount = $user->orders->sum('gross_amount');
                $averageTransactionValue = $totalTransactions > 0 ? $totalAmount / $totalTransactions : 0;

                return [
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'transaction_average' => round($averageTransactionValue, 2),
                    'transaction_frequency' => $totalTransactions,
                ];
            })->toArray();

        // return response()->json($customerData);


        $samples = [];
        foreach ($customerData as $customer) {
            $samples[] = [
                $customer['transaction_average'],
                $customer['transaction_frequency'],
            ];
        }

        $numberOfClusters = 4;
        $kmeans = new KMeans($numberOfClusters);
        $clusteringResult = $kmeans->cluster($samples);

        $formattedResult = [];
        foreach ($clusteringResult as $clusterIndex => $cluster) {
            $formattedResult["$clusterIndex"] = $cluster;
        }

        return response()->json($formattedResult, 200, [], JSON_PRETTY_PRINT);
    }

    public function getTransactionPercentage() {
        $totalGrossAmount = Order::sum('gross_amount');

        $paidOrdersGrossAmount = Order::whereIn('transaction_status', ['capture', 'settlement'])
            ->sum('gross_amount');

        if ($totalGrossAmount > 0) {
            $paidSalesPercentage = ($paidOrdersGrossAmount / $totalGrossAmount) * 100;
        } else {
            $paidSalesPercentage = 0;
        }

        return response()->json([
            'total_gross_amount' => round($totalGrossAmount, 2),
            'paid_orders_gross_amount' => round($paidOrdersGrossAmount, 2),
            'paid_sales_percentage' => round($paidSalesPercentage, 2),
        ]);
    }
}
