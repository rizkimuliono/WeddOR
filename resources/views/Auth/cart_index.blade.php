@extends('layouts.front.template')

@section('content')
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        {{-- @dd($cart->items) --}}
                        @foreach ($cart->items as $item)
                            <tr>
                                <td style="text-align:left;">
                                    @if ($item->product->images->isNotEmpty())
                                        <img src="{{ asset('storage/' . $item->product->images->first()->path) }}" alt="{{ $item->product->name }}" style="width: 50px;">
                                    @else
                                        <img src="{{ asset('template/img/no-image.png') }}" alt="{{ $item->product->name }}" style="width: 50px;">
                                    @endif

                                    {{ $item->product->name }}
                                </td>
                                <td class="align-middle">Rp{{ number_format($item->product->price, 0) }}</td>
                                <td class="align-middle">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="update-quantity-form">
                                        @csrf
                                        @method('PATCH')
                                        <div class="input-group quantity mx-auto" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-minus" type="button">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input type="number" name="quantity" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{ $item->quantity }}">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-primary btn-plus" type="button">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                                <td class="align-middle">Rp{{ number_format($item->product->price * $item->quantity, 0) }}</td>
                                <td class="align-middle">
                                    <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3">
                    <span class="bg-secondary pr-3">Cart Summary</span>
                </h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>Rp{{ number_format($cart->items->sum(function ($item) {return $item->product->price * $item->quantity;}),0) }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">Rp200.000</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>Rp{{ number_format($cart->items->sum(function ($item) {return $item->product->price * $item->quantity;}) + 200000,0) }}</h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('.btn-minus').click(function() {
                var $form = $(this).closest('form');
                var $input = $form.find('input[name="quantity"]');
                var quantity = parseInt($input.val());
                if (quantity < 1) {
                    quantity = 1; // Minimum quantity should be 1
                }
                $input.val(quantity);
                $form.submit();
            });

            $('.btn-plus').click(function() {
                var $form = $(this).closest('form');
                var $input = $form.find('input[name="quantity"]');
                var quantity = parseInt($input.val());
                $input.val(quantity);
                $form.submit();
            });
        });
    </script>
@endpush
