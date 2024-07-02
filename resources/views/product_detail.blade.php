@extends('layouts.front.template')

@section('content')
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light">

                        <div class="carousel-item active">
                            @if ($product->images->isNotEmpty())
                                <img class="w-100 h-100" style="height: 350px !important;" src="{{ asset('storage/' . $product->images->first()->path) }}" alt="{{ $product->name }}">
                            @else
                                <img class="w-100 h-100" style="height: 350px !important;" src="{{ asset('template/img/no-image.png') }}" alt="{{ $product->name }}">
                            @endif
                        </div>
                        @if ($product->children->isNotEmpty())
                            @foreach ($product->children as $child)
                                <div class="carousel-item">
                                    <img src="{{ asset('storage/' . $child->images->first()->path) }}" alt="{{ $child->name }}" class="w-100 h-100" style="height: 350px !important;">
                                </div>
                            @endforeach
                        @endif

                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev"><i class="fa fa-2x fa-angle-left text-dark"></i></a> <a class="carousel-control-next" href="#product-carousel" data-slide="next"><i class="fa fa-2x fa-angle-right text-dark"></i></a>
                </div>
            </div>
            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{ $product->name }}</h3>
                    <div class="d-flex mb-3">
                        <div class="text-primary mr-2"><small class="fas fa-star"></small> <small class="fas fa-star"></small> <small class="fas fa-star"></small> <small class="fas fa-star-half-alt"></small> <small class="far fa-star"></small></div>
                        <small class="pt-1">(99 Reviews)</small>
                    </div>
                    <h3 class="font-weight-semi-bold mb-4">Rp {{ number_format($product->price, 0, ',', '.') }}</h3>
                    <p class="mb-4">
                        {{ $product->description }}
                    </p>


                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width:130px;">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-minus"><i class="fa fa-minus"></i></button>
                            </div>
                            <input type="text" class="form-control bg-secondary border-0 text-center" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-primary btn-plus"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <button class="btn btn-primary px-3"><i class="fa fa-shopping-cart mr-1"></i> Add ToCart</button>
                    </div>
                    <div class="d-flex pt-2"><strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="text-dark px-2" href=""><i class="fab fa-twitter"></i></a>
                            <a class="text-dark px-2" href=""><i class="fab fa-linkedin-in"></i></a>
                            <a class="text-dark px-2" href=""><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-pane-1">
                            {{-- <h4 class="mb-3">Description</h4> --}}
                            {{ $product->description }}
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="list-group list-group-flush">

                                        @if ($product->children->isNotEmpty())
                                            @foreach ($product->children as $child)
                                                <li class="list-group-item px-0">
                                                    @if ($child->images->isNotEmpty())
                                                        <img src="{{ asset('storage/' . $child->images->first()->path) }}" alt="{{ $child->name }}" style="width: 50px; height: 50px;">
                                                    @else
                                                        <img src="{{ asset('template/img/no-image.png') }}" alt="Default Image" style="width: 50px; height: 50px;">
                                                    @endif
                                                    {{ $child->name }}
                                                    {{-- {{ number_format($child->price, 0, ',', '.') }} --}}
                                                </li>
                                            @endforeach
                                        @endif

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">

                    @foreach ($products as $product)
                        <div class="product-item bg-light">
                            <div class="product-img position-relative overflow-hidden">
                                @if ($product->images->isNotEmpty())
                                    <img class="img-fluid" style="height: 225px !important;" src="{{ asset('storage/' . $product->images->first()->path) }}" alt="{{ $product->name }}">
                                @else
                                    <img class="img-fluid" style="height: 225px !important;" src="{{ asset('template/img/product-1.jpg') }}" alt="Default Image">
                                @endif
                                <div class="product-action">
                                    <a href="javascript:void(0);" class="btn btn-outline-dark btn-square add-to-cart" data-id="{{ $product->id }}">
                                        <i class="fa fa-shopping-cart"></i>
                                    </a>
                                    <a class="btn btn-outline-dark btn-outline" href="{{ route('product_detail', $product->id) }}"><i class="fa fa-search"></i>detail</a>
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
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
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
