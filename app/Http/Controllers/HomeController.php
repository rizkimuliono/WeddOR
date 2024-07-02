<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\City;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $data = [
            'title' => 'Home',
            'menu'  => 'home'
        ];

        $products = Product::with('images')->inRandomOrder()->limit(12)->get();
        $categories = Category::withCount('products')->get();
        return view('welcome', compact('data', 'products', 'categories'));
    }

    public function about()
    {
        $data = [
            'title' => 'About',
            'menu'  => 'about'
        ];

        return view('about', compact('data'));
    }


    public function product_detail($id)
    {
        $data = [
            'title' => 'Detail',
            'menu'  => 'detail'
        ];
        $product = Product::with(['category', 'parent', 'children', 'vendor', 'images'])->findOrFail($id);
        $products = Product::with('images')->get();
        return view('product_detail', compact('product', 'products', 'data'));
    }

    public function getCities($provinceId)
    {
        $cities = City::where('province_id', $provinceId)->get();
        return response()->json($cities);
    }

    public function getDistricts($cityId)
    {
        $districts = District::where('city_id', $cityId)->get();
        return response()->json($districts);
    }

    public function allVendors(Request $request)
    {
        $data = [
            'title' => 'All Vendors',
            'menu'  => 'all_vendors'
        ];

        // $categories = Category::withCount('products')->get();
        $categories = Category::withCount(['products as vendors_count' => function ($query) {
            $query->select(DB::raw('count(distinct vendor_id)'));
        }])->get();

        $provinces = Province::all();
        // Query to fetch vendors based on filter criteria
        $query = User::where('is_vendor', 1);

        if ($request->filled('province')) {
            $query->where('province_id', $request->province);
        }

        if ($request->filled('city')) {
            $query->where('city_id', $request->city);
        }

        if ($request->filled('district')) {
            $query->where('district_id', $request->district);
        }

        if ($request->filled('category')) {
            $query->whereHas('products.category', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        $vendors = $query->with('city','district')->get();

        return view('vendor_all', compact('data', 'vendors','provinces','categories'));
    }

    public function search(Request $request)
    {
        $data = [
            'title' => 'Cari',
            'menu'  => 'pencarian'
        ];

        $query = $request->input('query');

        // Search products
        $products = Product::where('name', 'LIKE', "%{$query}%")
                            ->orWhere('description', 'LIKE', "%{$query}%")
                            ->get();

        // Search vendors (assuming vendors have is_vendor flag set to 1)
        $vendors = User::where('is_vendor', 1)
                        ->where(function($q) use ($query) {
                            $q->where('name', 'LIKE', "%{$query}%")
                              ->orWhere('vendor_name', 'LIKE', "%{$query}%")
                              ->orWhere('email', 'LIKE', "%{$query}%");
                        })
                        ->get();

        return view('search', compact('data','products', 'vendors', 'query'));
    }

    public function vendorDetail($id)
    {
        $data = [
            'title' => 'Detail Vendor',
            'menu'  => 'vendor'
        ];
        $vendor = User::where('is_vendor', 1)->findOrFail($id);
        $products = Product::where('vendor_id', $id)->with('images')->get();

        return view('vendor_detail', compact('data','vendor', 'products'));
    }
}
