@php
    $categories = App\Models\Category::has('products')->orderBy('category_name', 'ASC')->get();
@endphp
<style>
.search-icon {
    margin-right: -8px; /* Adjust the margin as needed to control the space between the icon and text */
}
</style>
<header class="header-area header-style-1 header-height-2">
    <div class="mobile-promotion">
        <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
    </div>

    <div class="header-top header-top-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info">
                        <ul>
                            
                            <li><a href="{{ route('cartProducts') }}">My Cart</a></li>
                            <li><a href="{{ route('compareProducts') }}">Compare</a></li>
                            <li><a href="{{ route('wishlistProducts') }}">Wishlist</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-4">
                    <div class="text-center">
                        <div id="news-flash" class="d-inline-block">
                            <ul>
                                <li>100% Secure delivery without contacting the courier</li>
                                <li>Supper Value Deals - Save more with coupons</li>
                                <li>Trendy 25silver jewelry, save up 35% off today</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <div class="header-info header-info-right">
                        <ul>
                           
                            <li>
                                <a class="language-dropdown-active" href="#">English <i class="fi-rs-angle-small-down"></i></a>
                                <ul class="language-dropdown">
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-fr.png')}}" alt="" />Français</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-dt.png')}}" alt="" />Deutsch</a>
                                    </li>
                                    <li>
                                        <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/flag-ru.png')}}" alt="" />Pусский</a>
                                    </li>
                                </ul>
                            </li>

                             <li>Need help? Call Us: <strong class="text-brand"> {{ $siteDetails->support_phone }}</strong></li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="index.html"><img src="{{ asset('images/logo/' . $siteDetails->logo ) }}" alt="logo" /></a>
                </div>
                <div class="header-right">
                    <div class="search-style-2">

                        <form action="{{ route('searchProducts') }}" method="GET">
                            <select name="category" class="select-active">
                                <option value="" selected disabled>All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                            <input type="text" name="search" placeholder="Search for items..." />
                            <button type="submit" class="search-button">
                                <img src="{{ asset('frontend/assets/imgs/theme/icons/search.png') }}" alt="Search Icon" class="search-icon">
                            </button>
                        </form>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            @auth
                            {{-- Compare Page --}}
                                <div class="header-action-icon-2">
                                    <a href="{{ route('compareProducts') }}">
                                        <i class="fi-rs-shuffle fs-5"></i>
                                        <span class="pro-count blue" id="compareTotal">0</span>
                                    </a>
                                    <a href="{{ route('compareProducts') }}"><span class="lable">Compare</span></a>
                                </div>
                                {{-- Wishlist --}}
                                <div class="header-action-icon-2">
                                    <a href="{{ route('wishlistProducts') }}">
                                        <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                        <span class="pro-count blue" id="wishlistTotal">0</span>
                                    </a>
                                    <a href="{{ route('wishlistProducts') }}"><span class="lable">Wishlist</span></a>
                                </div>
                                {{-- Cart --}}
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{ route('cartProducts') }}">
                                        <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                        <span class="pro-count blue" id="totalProducts">0</span>
                                    </a>
                                    <a href="{{ route('cartProducts') }}"><span class="lable">Cart</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul id="shoppingCartList">
                                            {{-- <li>
                                                <div class="shopping-cart-img">
                                                    <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('frontend/assets/imgs/shop/thumbnail-3.jpg') }}" /></a>
                                                </div>
                                                <div class="shopping-cart-title">
                                                    <h4><a href="shop-product-right.html">Daisy Casual Bag</a></h4>
                                                    <h4><span>1 × </span>$800.00</h4>
                                                </div>
                                                <div class="shopping-cart-delete">
                                                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                </div>
                                            </li> --}}
                                        </ul>
                                        <div class="shopping-cart-footer">
                                            <div class="shopping-cart-total">
                                                <h4>Total <span id="totalPrice"></span></h4>
                                            </div>
                                            <div class="shopping-cart-button">
                                                <a href="{{ route('cartProducts') }}" class="outline">View cart</a>
                                                <a href="shop-checkout.html">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- Account --}}
                                <div class="header-action-icon-2">
                                    <a href="{{ route('userDashboard') }}">
                                        <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                    </a>
                                    <a href="{{ route('userDashboard') }}"><span class="lable ml-0">Account</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            <li>
                                                <a href="{{ route('userDashboard') }}"><i class="fi fi-rs-user mr-10"></i>My Account</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i class="fi fi-rs-label mr-10"></i>My Voucher</a>
                                            </li>
                                            <li>
                                                <a href="shop-wishlist.html"><i class="fi fi-rs-heart mr-10"></i>My Wishlist</a>
                                            </li>
                                            <li>
                                                <a href="page-account.html"><i class="fi fi-rs-settings-sliders mr-10"></i>Setting</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign out</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                            <div class="header-action-icon-2">
                                <a href="{{ route('login') }}">
                                    <img class="svgInject" alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-user.svg') }}" />
                                    <span class="lable ml-0">Account</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                    <ul>
                                        <li>
                                            <a href="{{ route('login') }}"><i class="fi fi-rs-user mr-10"></i>Login</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('register') }}"><i class="fi fi-rs-user mr-10"></i>Register</a>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{ asset('frontend/assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">

                    <form action="{{ route('searchProducts') }}" method="GET">
                        <input type="text" name="search" placeholder="Search for items..." />
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="shop-grid-right.html">shop</a>
                                <ul class="dropdown">
                                    <li><a href="shop-grid-right.html">Shop Grid – Right Sidebar</a></li>
                                    <li><a href="shop-grid-left.html">Shop Grid – Left Sidebar</a></li>
                                    <li><a href="shop-list-right.html">Shop List – Right Sidebar</a></li>
                                    <li><a href="shop-list-left.html">Shop List – Left Sidebar</a></li>
                                    <li><a href="shop-fullwidth.html">Shop - Wide</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Single Product</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Product – Right Sidebar</a></li>
                                            <li><a href="shop-product-left.html">Product – Left Sidebar</a></li>
                                            <li><a href="shop-product-full.html">Product – No sidebar</a></li>
                                            <li><a href="shop-product-vendor.html">Product – Vendor Infor</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="shop-filter.html">Shop – Filter</a></li>
                                    <li><a href="shop-wishlist.html">Shop – Wishlist</a></li>
                                    <li><a href="shop-cart.html">Shop – Cart</a></li>
                                    <li><a href="shop-checkout.html">Shop – Checkout</a></li>
                                    <li><a href="shop-compare.html">Shop – Compare</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Shop Invoice</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-invoice-1.html">Shop Invoice 1</a></li>
                                            <li><a href="shop-invoice-2.html">Shop Invoice 2</a></li>
                                            <li><a href="shop-invoice-3.html">Shop Invoice 3</a></li>
                                            <li><a href="shop-invoice-4.html">Shop Invoice 4</a></li>
                                            <li><a href="shop-invoice-5.html">Shop Invoice 5</a></li>
                                            <li><a href="shop-invoice-6.html">Shop Invoice 6</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="menu-item-has-children">
                                <a href="#">Mega menu</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children">
                                        <a href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Dresses</a></li>
                                            <li><a href="shop-product-right.html">Blouses & Shirts</a></li>
                                            <li><a href="shop-product-right.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="shop-product-right.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Jackets</a></li>
                                            <li><a href="shop-product-right.html">Casual Faux Leather</a></li>
                                            <li><a href="shop-product-right.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="shop-product-right.html">Gaming Laptops</a></li>
                                            <li><a href="shop-product-right.html">Ultraslim Laptops</a></li>
                                            <li><a href="shop-product-right.html">Tablets</a></li>
                                            <li><a href="shop-product-right.html">Laptop Accessories</a></li>
                                            <li><a href="shop-product-right.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="blog-category-fullwidth.html">Blog</a>
                                <ul class="dropdown">
                                    <li><a href="blog-category-grid.html">Blog Category Grid</a></li>
                                    <li><a href="blog-category-list.html">Blog Category List</a></li>
                                    <li><a href="blog-category-big.html">Blog Category Big</a></li>
                                    <li><a href="blog-category-fullwidth.html">Blog Category Wide</a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Single Product Layout</a>
                                        <ul class="dropdown">
                                            <li><a href="blog-post-left.html">Left Sidebar</a></li>
                                            <li><a href="blog-post-right.html">Right Sidebar</a></li>
                                            <li><a href="blog-post-fullwidth.html">No Sidebar</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="page-about.html">About Us</a></li>
                                    <li><a href="page-contact.html">Contact</a></li>
                                    <li><a href="page-account.html">My Account</a></li>
                                    <li><a href="page-login.html">Login</a></li>
                                    <li><a href="page-register.html">Register</a></li>
                                    <li><a href="page-forgot-password.html">Forgot password</a></li>
                                    <li><a href="page-reset-password.html">Reset password</a></li>
                                    <li><a href="page-purchase-guide.html">Purchase Guide</a></li>
                                    <li><a href="page-privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="page-terms.html">Terms of Service</a></li>
                                    <li><a href="page-404.html">404 Page</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="page-contact.html"><i class="fi-rs-marker"></i> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="page-login.html"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#"><i class="fi-rs-headphones"></i>(+01) - 2345 - 6789 </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-facebook-white.svg') }}" alt="" /></a>
                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-twitter-white.svg') }}" alt="" /></a>
                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-instagram-white.svg') }}" alt="" /></a>
                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-pinterest-white.svg') }}" alt="" /></a>
                    <a href="#"><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-youtube-white.svg') }}" alt="" /></a>
                </div>
                <div class="site-copyright">Copyright 2022 © Nest. All rights reserved. Powered by AliThemes.</div>
            </div>
        </div>
    </div>
    
    <div class="header-bottom header-bottom-bg-color sticky-bar">
        <div class="container">
            <div class="header-wrap header-space-between position-relative">
                <div class="logo logo-width-1 d-block d-lg-none">
                    <a href="index.html"><img src="{{ asset('frontend/assets/imgs/theme/logo.svg') }}" alt="logo" /></a>
                </div>
                <div class="header-nav d-none d-lg-flex">
                    <div class="main-categori-wrap d-none d-lg-block">
                        <a class="categories-button-active" href="#">
                            <span class="fi-rs-apps"></span>   All Categories
                            <i class="fi-rs-angle-down"></i>
                        </a>
                        <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                            <div class="d-flex categori-dropdown-inner">
                                <ul>
                                    @foreach ($categories->take(4) as $category)
                                        <li>
                                            <a href="{{ route('categoryProducts', ['id' => $category->id, 'slug' => $category->category_slug ])}}">
                                                <img src="{{ asset('images/categories/' . $category->category_image) }}" alt="" />{{ $category->category_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                        
                                <ul class="end">
                                    @foreach ($categories->slice(4, 4) as $category)
                                        <li>
                                            <a href="{{ route('categoryProducts', ['id' => $category->id, 'slug' => $category->category_slug ])}}"> 
                                                <img src="{{ asset('images/categories/' . $category->category_image) }}" alt="" />{{ $category->category_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="more_slide_open" style="display: none">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul>
                                        @foreach ($categories->slice(8, 1) as $category)
                                        <li>
                                            <a href="{{ route('categoryProducts', ['id' => $category->id, 'slug' => $category->category_slug ])}}"> 
                                                <img src="{{ asset('images/categories/' . $category->category_image) }}" alt="" />{{ $category->category_name }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>

                                    <ul class="end">
                                        @foreach ($categories->slice(9, 1) as $category)
                                        <li>
                                            <a href="{{ route('categoryProducts', ['id' => $category->id, 'slug' => $category->category_slug ] ) }}"> 
                                                <img src="{{ asset('images/categories/' . $category->category_image) }}" alt="" />{{ $category->category_name }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="more_categories"><span class="icon"></span> <span class="heading-sm-1">Show more...</span></div>
                        </div>
                    </div>

                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                        <nav>
                            <ul>
                                
                                <li>
                                    <a href="{{ route('home') }}">Home</a>
                                </li>

                                <li>
                                    <a href="{{ route('shopAllProducts') }}">Shop</a>
                                </li>
                                @foreach ($categories->take(4) as $category)
                                <li>
                                    <a href="{{ route('categoryProducts', ['id' => $category->id, 'slug' => $category->category_slug ])}}">{{ $category->category_name}}
                                    @php
                                        $subCategories = App\Models\SubCategory::has('products')->where('category_id', $category->id)->get();
                                    @endphp
                                        @if ( $subCategories != '[]' )
                                        <i class="fi-rs-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                @foreach ($subCategories as $subcategory)
                                                    <li><a href="{{ route('subcategoryProducts', ['id' => $subcategory->id, 'slug' => $subcategory->subCategory_slug ])}}">{{ $subcategory->subCategory_name }}</a></li>
                                                @endforeach
                                            </ul>
                                        @endif
                                </li>
                                @endforeach

                                <li>
                                    <a href="{{ route('blogs') }}">Blogs</a>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>


                <div class="hotline d-none d-lg-flex">
                    <img src="{{ asset('frontend/assets/imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                    <p>{{ $siteDetails->support_phone }}<span>24/7 Support Center</span></p>
                </div>
                <div class="header-action-icon-2 d-block d-lg-none">
                    <div class="burger-icon burger-icon-white">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"></span>
                        <span class="burger-icon-bottom"></span>
                    </div>
                </div>
                <div class="header-action-right d-block d-lg-none">
                    <div class="header-action-2">
                        <div class="header-action-icon-2">
                            <a href="shop-wishlist.html">
                                <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-heart.svg') }}" />
                                <span class="pro-count white">4</span>
                            </a>
                        </div>

                        <div class="header-action-icon-2">
                            <a class="mini-cart-icon" href="#">
                                <img alt="Nest" src="{{ asset('frontend/assets/imgs/theme/icons/icon-cart.svg') }}" />
                                <span class="pro-count white">2</span>
                            </a>
                            <div class="cart-dropdown-wrap cart-dropdown-hm2">

                                <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Nest" src="{{ asset('frontend/assets/imgs/shop/thumbnail-3.jpg') }}" /></a>
                                        </div>
                                        <div class="shopping-cart-title">
                                            <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                            <h3><span>1 × </span>$800.00</h3>
                                        </div>
                                        <div class="shopping-cart-delete">
                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>

                                </ul>
                                <div class="shopping-cart-footer">
                                    <div class="shopping-cart-total">
                                        <h4>Total <span>$383.00</span></h4>
                                    </div>
                                    <div class="shopping-cart-button">
                                        <a href="shop-cart.html">View cart</a>
                                        <a href="shop-checkout.html">Checkout</a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
@push('modelJs')
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (window.location.pathname !== '/login') {
            miniCartData();
        }
    });
    function miniCartData () {
        fetch('/mini/cart/data', {
            'method' : 'GET',
        }).then( (response) => response.json())
        .then( (result) =>{
            let totalProducts = result['totalProducts'];
            let totalPrice = result['totalPrice'];
            let wishlistTotal = result['wishlist'];
            let compareTotal = result['compare'];
            document.getElementById('totalProducts').innerText = totalProducts;
            document.getElementById('totalPrice').innerText = '$ ' + totalPrice;
            document.getElementById('wishlistTotal').innerText = wishlistTotal;
            document.getElementById('compareTotal').innerText = compareTotal;
            let products = result['products'];

            let shoppingCartList = document.getElementById('shoppingCartList');
            let li = '';
            Object.values(products).forEach(product => {
               if(totalProducts > 0) {
                 // let productName = product.name;
                 let shortenedName = product.name.substring(0, 13);
                li += `
                <li>
                    <div class="shopping-cart-img">
                        <a href="/product/details/${product.id}/${product.name}"><img alt="Nest" src="{{ asset('images/products/thumbnails/${product.options.thumbnail}') }}" /></a>
                    </div>
                    <div class="shopping-cart-title">
                        <h4><a href="/product/details/${product.id}/${product.name}">${shortenedName}...</a></h4>
                        <h4><span>${product.qty} × </span>$${product.price}</h4>
                    </div>
                    <div class="shopping-cart-delete">
                        <a onclick='productRemoveCart("${product.rowId}")'><i class="fi-rs-cross-small"></i></a>
                    </div>
                </li>
                `
               }else{
                shoppingCartList.innerHTML = '';
               }
            });
            shoppingCartList.innerHTML = li;
            if (window.location.pathname == '/cart/products') {
                mainCartData(result);
            } else if (window.location.pathname == '/checkout') {
                checkoutProduct(result);
            }
        }).catch( () =>{
            return;
        })
    };
    // document.addEventListener('DOMContentLoaded', function () {
    //     if( window.location.pathname !== '/login'){
    //         miniCartData();
    //      };
    // });
// product remove function
    function productRemoveCart(rowId){
        fetch('/product/remove/cart/' + rowId,{
            'method' : 'GET',
        }).then( (response) => response.json())
        .then( (result) => {
            miniCartData();
        }).catch( () => {
            return;
        })
    }
</script>
@endpush