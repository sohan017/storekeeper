<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $sales = Sale::with('product')->orderBy('created_at', 'desc')->get();

    //     return view('sales.index', compact('sales'));
    // }

    public function index()
{
    $sales = Sale::with('product')->orderBy('created_at', 'desc')->get();

    //return view('sale.index', compact('sales'));
    return view('admin/sale/index', compact('sales'));
}



    //Dashboard 

    public function dashboard()
    {
        $todaySales = $this->getSalesForDate(now());
        $yesterdaySales = $this->getSalesForDate(now()->subDay());
        $thisMonthSales = $this->getSalesForDateRange(now()->startOfMonth(), now()->endOfMonth());
        $lastMonthSales = $this->getSalesForDateRange(now()->subMonth()->startOfMonth(), now()->subMonth()->endOfMonth());

        return view('admin/dashboard', compact('todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
    }

    private function getSalesForDate($date)
    {
        return Sale::whereDate('created_at', $date)->sum('quantity_sold');
    }

    private function getSalesForDateRange($startDate, $endDate)
    {
        return Sale::whereBetween('created_at', [$startDate, $endDate])->sum('quantity_sold');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
