@extends('layouts.front.template')

@section('content')
    <div class="container-fluid">

        <div class="row px-xl-5">
            <h3 class="pl-3">All Vendors</h3>
        </div>
        <div class="row px-xl-5 mt-2">
            <div class="col-md-12">
                <!-- Filter Form -->
                <form action="{{ route('all_vendors') }}" method="GET">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <select name="province" id="province" class="form-control select2">
                                <option value="">Select Province</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->id }}" {{ request('province') == $province->id ? 'selected' : '' }}>
                                        {{ $province->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select name="city" id="city" class="form-control select2">
                                <option value="">Select City</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="district" id="district" class="form-control select2">
                                <option value="">Select District</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="category" class="form-control select2">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == request('category') ? 'selected' : '' }}>{{ $category->name }} ({{ $category->vendors_count }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Vendor List -->
        <div class="row px-xl-5 mt-4">
            {{-- @dd($vendors) --}}

            @forelse($vendors as $vendor)
                <div class="col-md-2 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('vendor.detail', $vendor->id) }}">
                                <img src="{{ asset('template/img/no-image.png') }}" class="img-fluid w-100 mb-3" alt="{{ $vendor->vendor_name }}">
                            </a>
                            <strong class="card-title">{{ $vendor->vendor_name ?: $vendor->name }}</strong>
                            <p class="card-text"><small>{{ $vendor->city->name }}, {{ $vendor->district->name }}</small></p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        No vendors found.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            // Load cities when province is selected
            $('#province').change(function() {
                var provinceId = $(this).val();
                $('#city').empty().append('<option value="">Select City</option>');
                $('#district').empty().append('<option value="">Select District</option>');
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
                }
            });

            // Load districts when city is selected
            $('#city').change(function() {
                var cityId = $(this).val();
                $('#district').empty().append('<option value="">Select District</option>');
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
                }
            });

            // Load cities and districts if province and city are already selected
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
                        @endif
                    }
                });
            @endif
        });
    </script>
@endpush
