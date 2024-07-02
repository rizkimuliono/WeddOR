@extends('layouts.front.template')

@section('content')
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-3 col-md-4">
                <!-- Filter Form -->
                <form action="{{ route('allproduct') }}" method="GET">
                    <h5 class="section-title position-relative mb-3"><span class="bg-secondary pr-3">Filter by Categories</span></h5>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <select name="category" class="form-control select2">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == request('category') ? 'selected' : '' }}>{{ $category->name }} ({{ $category->products_count }})</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h5 class="section-title position-relative mb-3"><span class="bg-secondary pr-3">Filter by Location</span></h5>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <select name="province" id="province" class="form-control select2">
                                <option value="">All Provinces</option>
                                <!-- Options for provinces -->
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}" {{ $province->id == request('province') ? 'selected' : '' }}>
                                        {{ $province->name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <select name="city" id="city" class="form-control select2">
                                <option value="">All Cities</option>
                                <!-- Options for cities -->
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" {{ $city->id == request('city') ? 'selected' : '' }}>
                                        {{ $city->name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <select name="district" id="district" class="form-control select2">
                                <option value="">All Districts</option>
                                <!-- Options for districts -->
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}" {{ $district->id == request('district') ? 'selected' : '' }}>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <h5 class="section-title position-relative mb-3"><span class="bg-secondary pr-3">Filter by Vendors</span></h5>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <select name="vendor" class="form-control select2">
                                <option value="">All Vendors</option>
                                @foreach ($vendors as $vendor)
                                    <option value="{{ $vendor->id }}" {{ request('vendor') == $vendor->id ? 'selected' : '' }}>
                                        {{ $vendor->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <h5 class="section-title position-relative mb-3"><span class="bg-secondary pr-3">Filter by price</span></h5>
                    <div class="row mb-3">

                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" {{ 'asc' == request('sort_price') ? 'checked' : '' }} type="radio" name="sort_price" id="sort_price_asc" value="asc">
                                <label class="form-check-label" for="sort_price_asc">Low to High</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" {{ 'desc' == request('sort_price') ? 'checked' : '' }} type="radio" name="sort_price" id="sort_price_desc" value="desc">
                                <label class="form-check-label" for="sort_price_desc">High to Low</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="number" name="min_price" class="form-control" placeholder="Min Price">
                        </div>
                        <div class="col-md-6">
                            <input type="number" name="max_price" class="form-control" placeholder="Max Price">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <select name="per_page" class="form-control">
                                <option value="">Showing</option>
                                <option value="12" {{ 12 == request('per_page') ? 'selected' : '' }}>12 per page</option>
                                <option value="21" {{ 21 == request('per_page') ? 'selected' : '' }}>21 per page</option>
                                <option value="31" {{ 31 == request('per_page') ? 'selected' : '' }}>31 per page</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block">Filter</button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <button class="btn btn-sm btn-light"><i class="fa fa-th-large"></i></button>
                                <button class="btn btn-sm btn-light ml-2"><i class="fa fa-bars"></i></button>
                            </div>
                            <div class="ml-2">
                                {{-- <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Sorting</button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <a class="dropdown-item" href="">Latest</a>
                                        <a class="dropdown-item" href="">Popularity</a>
                                        <a class="dropdown-item" href="">Best Rating</a>
                                    </div>
                                </div> --}}
                                <div class="btn-group ml-2">
                                    <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        @if (request('per_page') == 12)
                                            12 per page
                                        @elseif (request('per_page') == 21)
                                            21 per page
                                        @elseif (request('per_page') == 31)
                                            31 per page
                                        @else
                                            Showing
                                        @endif
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" style="">
                                        <a class="dropdown-item" href="#" onclick="updateURL('12')">12 per page</a>
                                        <a class="dropdown-item" href="#" onclick="updateURL('21')">21 per page</a>
                                        <a class="dropdown-item" href="#" onclick="updateURL('31')">31 per page</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @forelse ($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4">
                                <div class="product-img position-relative overflow-hidden">
                                    @if ($product->images->isNotEmpty())
                                        <img class="img-fluid w-100" style="height: 225px!important;" src="{{ asset('storage/' . $product->images->first()->path) }}" alt="{{ $product->name }}">
                                    @else
                                        <img class="img-fluid w-100" style="height: 225px!important;" src="{{ asset('template/img/product-1.jpg') }}" alt="no image">
                                    @endif
                                    <div class="product-action">
                                        {{-- <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-dark btn-square">
                                                <i class="fa fa-shopping-cart"></i>
                                            </button>
                                        </form> --}}
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
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning" role="alert">
                                No Product found.
                            </div>
                        </div>
                    @endforelse

                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();

            function loadVendors(provinceId, cityId, districtId) {
                var url = '/vendors';
                if (provinceId) url += '/' + provinceId;
                if (cityId) url += '/' + cityId;
                if (districtId) url += '/' + districtId;
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#vendor').empty().append('<option value="">Select Vendor</option>');
                        $.each(data, function(key, value) {
                            $('#vendor').append('<option value="' + value.id + '">' + value.vendor_name + '</option>');
                        });
                    }
                });
            }

            $('#province').change(function() {
                var provinceId = $(this).val();
                $('#city').empty().append('<option value="">Select City</option>');
                $('#district').empty().append('<option value="">Select District</option>');
                $('#vendor').empty().append('<option value="">Select Vendor</option>');
                if (provinceId) {
                    $.ajax({
                        url: '/cities/' + provinceId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                    loadVendors(provinceId);
                }
            });

            $('#city').change(function() {
                var cityId = $(this).val();
                var provinceId = $('#province').val();
                $('#district').empty().append('<option value="">Select District</option>');
                $('#vendor').empty().append('<option value="">Select Vendor</option>');
                if (cityId) {
                    $.ajax({
                        url: '/districts/' + cityId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#district').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                    loadVendors(provinceId, cityId);
                }
            });

            $('#district').change(function() {
                var districtId = $(this).val();
                var provinceId = $('#province').val();
                var cityId = $('#city').val();
                $('#vendor').empty().append('<option value="">Select Vendor</option>');
                if (districtId) {
                    loadVendors(provinceId, cityId, districtId);
                }
            });

            // Load cities, districts, and vendors if province, city, and district are already selected
            @if (request('province'))
                var provinceId = '{{ request('province') }}';
                $.ajax({
                    url: '/cities/' + provinceId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#city').append('<option value="' + value.id + '"' + (value.id == '{{ request('city') }}' ? ' selected' : '') + '>' + value.name + '</option>');
                        });

                        @if (request('city'))
                            var cityId = '{{ request('city') }}';
                            $.ajax({
                                url: '/districts/' + cityId,
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    $.each(data, function(key, value) {
                                        $('#district').append('<option value="' + value.id + '"' + (value.id == '{{ request('district') }}' ? ' selected' : '') + '>' + value.name + '</option>');
                                    });
                                }
                            });
                            loadVendors(provinceId, cityId, '{{ request('district') }}');
                        @else
                            loadVendors(provinceId);
                        @endif
                    }
                });
            @endif
        });
    </script>
    <script>
        function updateURL(perPageValue) {
            // Ambil URL saat ini
            var currentURL = new URL(window.location.href);

            // Tambahkan atau perbarui parameter 'per_page'
            currentURL.searchParams.set('per_page', perPageValue);

            // Redirect ke URL yang diperbarui
            window.location.href = currentURL.toString();
        }
    </script>
    <script>
        $(document).ready(function() {
        $('.add-to-cart').click(function(e) {
            e.preventDefault();
            var $button = $(this);
            var productId = $button.data('id');

            // Add zoom-up animation
            $button.addClass('zoom-up');

            // Remove zoom-up animation after it's done
            setTimeout(function() {
                $button.removeClass('zoom-up');
            }, 300); // 300ms matches the animation duration in CSS

            var form = $('<form>', {
                'method': 'POST',
                'action': '{{ route('cart.add', '') }}/' + productId
            });

            var token = $('<input>', {
                'type': 'hidden',
                'name': '_token',
                'value': '{{ csrf_token() }}'
            });

            form.append(token);
            $('body').append(form);
            form.submit();
        });
    });
    </script>
@endpush
