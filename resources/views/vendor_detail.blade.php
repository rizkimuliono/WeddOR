@extends('layouts.front.template')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/' . $vendor->profile_picture) }}" class="img-fluid rounded-circle mb-2" alt="{{ $vendor->name }}">
                    <h4 class="card-title">{{ $vendor->name }}</h4>
                    <p class="card-text">{{ $vendor->email }}</p>
                    <p class="card-text">{{ $vendor->vendor_name }}</p>
                    <p class="card-text">{{ $vendor->address }}</p>
                    <p class="card-text">{{ $vendor->telp }}</p>
                    <p class="card-text">{{ $vendor->phone }}</p>
                    <p class="card-text">{{ $vendor->province->name }}, {{ $vendor->city->name }}, {{ $vendor->district->name }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <h4>Products by {{ $vendor->vendor_name ?: $vendor->name }}</h4>
            <div class="row">
                @foreach($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4 animate__animated animate__fadeInUp">
                        <div class="product-img position-relative overflow-hidden">
                            @if ($product->images->isNotEmpty())
                                <img class="img-fluid w-100" style="height: 225px !important;" src="{{ asset('storage/' . $product->images->first()->path) }}" alt="{{ $product->name }}">
                            @else
                                <img class="img-fluid w-100" style="height: 225px !important;" src="{{ asset('template/img/product-1.jpg') }}" alt="Default Image">
                            @endif
                            <div class="product-action">
                                <a href="javascript:void(0);" class="btn btn-outline-dark btn-square add-to-cart" data-id="{{ $product->id }}">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                                <a class="btn btn-outline-dark btn-outline" href="{{ route('product_detail', $product->id) }}"><i class="fa fa-search"></i> detail</a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="">{{ $product->name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ number_format($product->price, 0, ',', '.') }}</h5>
                                <h6 class="text-muted ml-2"><del>{{ number_format($product->price, 0, ',', '.') }}</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
