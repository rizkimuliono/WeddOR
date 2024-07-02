<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\City;
use App\Models\District;
use App\Models\Province;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // $query = Product::with(['category', 'children', 'vendor', 'images']);

        // if ($request->filled('province_id')) {
        //     $query->whereHas('vendor', function ($q) use ($request) {
        //         $q->where('province_id', $request->province_id);
        //     });
        // }

        // if ($request->filled('city_id')) {
        //     $query->whereHas('vendor', function ($q) use ($request) {
        //         $q->where('city_id', $request->city_id);
        //     });
        // }

        // if ($request->filled('district_id')) {
        //     $query->whereHas('vendor', function ($q) use ($request) {
        //         $q->where('district_id', $request->district_id);
        //     });
        // }

        // $products = $query->get();

        // return view('products.index', compact('products'));
    }

    public function allproduct(Request $request)
    {
        $data = [
            'title' => 'All Product',
            'menu'  => 'allproduct'
        ];

        $categories = Category::withCount('products')->get();
        $provinces = Province::all();
        $cities = City::all();
        $districts = District::all();
        $vendors = User::where('is_vendor', 1)->get();
        $query = Product::query();

        // Filter by category
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }

        // Filter by vendor
        if ($request->filled('vendor')) {
            $query->where('vendor_id', $request->vendor);
        }

        // Filter by province, city, district
        if ($request->filled('province')) {
            $query->whereHas('vendor', function ($q) use ($request) {
                $q->where('province_id', $request->province);
            });
        }

        if ($request->filled('city')) {
            $query->whereHas('vendor', function ($q) use ($request) {
                $q->where('city_id', $request->city);
            });
        }

        if ($request->filled('district')) {
            $query->whereHas('vendor', function ($q) use ($request) {
                $q->where('district_id', $request->district);
            });
        }

        // Filter by price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Sort by price
        if ($request->filled('sort_price')) {
            $query->orderBy('price', $request->sort_price);
        }

        // Paginate the results
        $products = $query->paginate($request->input('per_page', 12))->appends($request->except('page'));

        return view('product_all', compact('data', 'products', 'categories', 'provinces', 'cities', 'districts','vendors'));
    }

    public function category(Category $category)
    {
        $data = [
            'title' => 'Shop Products',
            'menu'  => 'shop'
        ];

        $categories = Category::withCount('products')->get();
        $products = Product::with('images')->where('category_id', $category->id)->get();
        return view('product_shop', compact('data', 'categories', 'products', 'category'));
    }

    public function show($id)
    {
        $product = Product::with(['category', 'parent', 'children', 'vendor', 'images'])->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        $categories = Category::all();
        $products = Product::all();
        $vendors = User::where('is_vendor', true)->get();
        return view('products.create', compact('categories', 'products', 'vendors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'parent_id' => 'nullable|exists:products,id',
            'vendor_id' => 'required|exists:users,id',
            'price' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        $product = Product::create($request->except('images'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('images');
                $product->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('products.index');
    }
}
