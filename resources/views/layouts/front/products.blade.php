<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Featured Products</span>
    </h2>
    <div class="row px-xl-5">

        @foreach ($products as $product)
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

        <div class="ml-auto mr-4">
            <a href="" class="btn btn-primary animate__animated animate__fadeInUp">Show All Products</a>
        </div>

    </div>

</div>
<!-- Products End -->
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
