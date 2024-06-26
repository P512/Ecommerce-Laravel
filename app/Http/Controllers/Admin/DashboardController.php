<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    function index(){
        $totalProducts = Product::count();
        $totalCategories = category::count();
        $totalBrands = Brand::count();

        $totalAllUsers = User::count();
        $totalUser = User::where('role_as','0')->count();
        $totalAdmin = User::where('role_as','1')->count();

        $todayDate = Carbon::now()->format('d-m-Y');
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $totalOrder = Order::count();
        $todayOrder = Order::whereDate('created_at',$todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at',$thisMonth)->count('created_at');
        $thisYearOrder = Order::whereYear('created_at',$thisYear)->count('created_at');

        return view("admin.dashboard",compact(
            'totalProducts',
            'totalCategories',
            'totalBrands',
            'totalAllUsers',
            'totalUser',
            'totalAdmin',
            'totalOrder',
            'todayOrder',
            'thisMonthOrder',
            'thisYearOrder'
        ));
    }
}
