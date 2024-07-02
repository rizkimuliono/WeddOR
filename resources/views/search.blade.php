@extends('layouts.front.template')

@section('content')

    <div class="container-fluid">
        <h3>Hasil pencarian "{{ $query }}"</h3>

        <div class="mt-4">
            <h4>Products</h4>
            @if ($products->isEmpty())
                <p>No products found.</p>
            @else
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-2 mb-4">
                            <div class="card">
                                <img src="{{ asset('storage/' . $product->images->first()->path) }}" class="card-img-top" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">Rp{{ number_format($product->price, 0) }}</p>
                                    <a href="{{ route('product_detail', $product->id) }}" class="btn btn-primary">View Product</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="mt-4">
            <h4>Vendors</h4>
            @if ($vendors->isEmpty())
                <p>No vendors found.</p>
            @else
                <div class="row">
                    @foreach ($vendors as $vendor)
                    <div class="col-md-2 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <a href="">
                                    <img src="{{ asset('template/img/no-image.png') }}" class="img-fluid w-100 mb-3" alt="{{ $vendor->vendor_name }}">
                                </a>
                                <strong class="card-title">{{ $vendor->vendor_name ?: $vendor->name }}</strong>
                                <p class="card-text"><small>{{ $vendor->city->name }}, {{ $vendor->district->name }}</small></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

@endsection
