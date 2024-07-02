 <!-- Topbar Start -->
 <div class="container-fluid">
     <div class="row bg-secondary py-1 px-xl-5">
         <div class="col-lg-6 d-none d-lg-block">
             <div class="d-inline-flex align-items-center h-100">
                 <a class="text-body mr-3" href="{{ route('about') }}">About</a>
                 <a class="text-body mr-3" href="">Contact</a>
                 <a class="text-body mr-3" href="">Help</a>
                 <a class="text-body mr-3" href="">FAQs</a>
             </div>
         </div>
         <div class="col-lg-6 text-center text-lg-right">
             @auth
             Hai, <strong>{{ Auth::user()->name }}</strong>
            <a href="{{ route('logout') }}" class="btn px-0 ml-2">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
             @endauth

             @guest
             <a href="{{ route('login') }}" class="btn px-0 ml-2">
                <i class="fas fa-sign-in-alt"></i> Login
             </a>
             <a href="{{ route('login') }}" class="btn px-0 ml-2">
                <i class="fas fa-upload"></i> Sign Up
            </a>
             @endguest
             </div>
         </div>
     </div>
     <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
         <div class="col-lg-4">
             <a href="{{ route('home') }}" class="text-decoration-none">
                 <span class="h1 text-primary bg-dark px-2"><img src="{{ asset('template/img/ring.png') }}">Wedd</span>
                 <span class="h1 text-dark bg-primary px-2 ml-n1">OR</span>
             </a>
             <strong class="ml-2">Medan Wedding Markets</strong>
         </div>
         <div class="col-lg-4 col-6 text-left">

            <form action="{{ route('search') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" name="query" placeholder="Search for products" value="{{ request('query') }}">
                    <div class="input-group-append">
                        <button type="submit" class="input-group-text bg-transparent text-primary">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

         </div>
         <div class="col-lg-4 col-6 text-right">
             <p class="m-0">Customer Service</p>
             <h5 class="m-0">+0812 345 6789</h5>
         </div>
     </div>
 </div>
 <!-- Topbar End -->

 <!-- Navbar Start -->
 <div class="container-fluid bg-dark mb-30">
     <div class="row px-xl-5">
         <div class="col-lg-3 d-none d-lg-block">
             <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                 <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>Categories</h6>
                 <i class="fa fa-angle-down text-dark"></i>
             </a>
             <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                 <div class="navbar-nav w-100">
                    @php
                        $categories = \App\Models\Category::withCount('products')->get();
                    @endphp
                     @foreach ($categories as $category)
                     <div class="d-flex align-items-center justify-content-between">
                        <a href="allproduct?category={{ $category->id }}" class="nav-item nav-link">{{ $category->name }}</a>
                        <span class="badge border font-weight-normal mr-2">{{ $category->products_count }}</span>
                    </div>
                     @endforeach
                 </div>
             </nav>
         </div>
         <div class="col-lg-9">
             <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
                 <a href="" class="text-decoration-none d-block d-lg-none">
                     <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
                     <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
                 </a>
                 <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                     <span class="navbar-toggler-icon"></span>
                 </button>
                 <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                     <div class="navbar-nav mr-auto py-0">
                         <a href="{{ route('home') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                         <a href="{{ route('allproduct') }}" class="nav-item nav-link {{ request()->is('allproduct') ? 'active' : '' }}">All Product</a>
                         <a href="{{ route('all_vendors') }}" class="nav-item nav-link">Vendors</a>
                         <a href="" class="nav-item nav-link">Contact</a>

                         @auth
                         <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">My Dashboard <i class="fa fa-angle-down mt-1"></i></a>
                            <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                                <a href="{{ route('cart.index') }}" class="dropdown-item">Shopping Cart</a>
                                <a href="" class="dropdown-item">Checkout</a>
                            </div>
                        </div>
                         @endauth

                     </div>
                     @auth
                     <div class="navbar-nav ml-auto py-0 d-none d-lg-block">
                        <a href="{{ route('cart.index') }}" class="btn px-0 ml-3">
                            <i class="fas fa-shopping-cart text-primary"></i>
                            <span class="badge text-secondary border border-secondary rounded-circle" style="padding-bottom: 2px;">
                                {{ \App\Models\CartItem::whereHas('cart', function ($query) {
                                    $query->where('user_id', Auth::id());
                                })->sum('quantity') }}
                            </span>
                        </a>
                    </div>
                     @endauth
                 </div>
             </nav>
         </div>
     </div>
 </div>
 <!-- Navbar End -->
