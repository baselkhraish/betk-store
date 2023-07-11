<x-front-layout :title="$category->name">
    <x-slot:breadcrumb>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">{{ $category->name }}</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li><a href="{{ route('product.index') }}"> Shop</a></li>
                            <li>{{ $category->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:breadcrumb>



    <!-- Start Product Grids -->
    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <!-- Start Product Sidebar -->
                    <div class="product-sidebar">
                        <!-- Start Single Widget -->
                        <div class="product-sidebar">
                            <!-- Start Single Widget -->
                            <div class="single-widget search">
                                <h3>Search Product</h3>
                                <form action="{{ route('product.index') }}" method="get">
                                    <input type="text" placeholder="Search Here..." autocomplete="off"
                                        id="search-options" value="{{ request('name') }}" name="name">
                                    <button type="submit"><i class="lni lni-search-alt"></i></button>
                                </form>
                            </div>
                            <!-- End Single Widget -->
                            <!-- Start Single Widget -->
                            <div class="single-widget">
                                <h3>All Categories</h3>
                                <ul class="list">
                                    @php
                                        $categories = App\Models\Category::orderBy('created_at', 'DESC')->get();
                                    @endphp
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}
                                                ({{ $category->product->count() }})</a></li>
                                    @endforeach

                                </ul>
                            </div>
                            <!-- End Single Widget -->

                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <!-- End Product Sidebar -->
                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <div class="product-sorting">
                                        <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-4 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-grid" type="button" role="tab"
                                                aria-controls="nav-grid" aria-selected="true"><i
                                                    class="lni lni-grid-alt"></i></button>
                                            <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-list" type="button" role="tab"
                                                aria-controls="nav-list" aria-selected="false"><i
                                                    class="lni lni-list"></i></button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    @foreach ($category->product as $product)
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <x-product-card :product="$product" />
                                        </div>
                                    @endforeach

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Pagination -->
                                        <div class="pagination left">
                                            <ul class="pagination-list">
                                                <li><a href="javascript:void(0)">1</a></li>
                                                <li class="active"><a href="javascript:void(0)">2</a></li>
                                                <li><a href="javascript:void(0)">3</a></li>
                                                <li><a href="javascript:void(0)">4</a></li>
                                                <li><a href="javascript:void(0)"><i
                                                            class="lni lni-chevron-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <!--/ End Pagination -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-list" role="tabpanel"
                                aria-labelledby="nav-list-tab">
                                <div class="row">



                                    @foreach ($category->product as $product)
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <!-- Start Single Product -->
                                            <div class="single-product">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="product-image">
                                                            <img src="{{ $product->image_url }}" alt="#">
                                                            <div class="button">
                                                                <a href="{{ route('product.show', $product->slug) }}"
                                                                    class="btn"><i class="lni lni-cart"></i> Add to
                                                                    Cart</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-12">
                                                        <div class="product-info">
                                                            <span
                                                                class="category">{{ $product->category->name }}</span>
                                                            <h4 class="title">
                                                                <a
                                                                    href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                                            </h4>
                                                            <ul class="review">
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star-filled"></i></li>
                                                                <li><i class="lni lni-star"></i></li>
                                                                <li><span>4.0 Review(s)</span></li>
                                                            </ul>
                                                            <div class="price">
                                                                <span>{{ Currency::format($product->price) }}</span>
                                                                @if ($product->compar_price)
                                                                    <span
                                                                        class="discount-price">{{ Currency::format($product->compar_price) }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Product -->
                                        </div>
                                    @endforeach

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Pagination -->
                                        <div class="pagination left">
                                            <ul class="pagination-list">
                                                <li><a href="javascript:void(0)">1</a></li>
                                                <li class="active"><a href="javascript:void(0)">2</a></li>
                                                <li><a href="javascript:void(0)">3</a></li>
                                                <li><a href="javascript:void(0)">4</a></li>
                                                <li><a href="javascript:void(0)"><i
                                                            class="lni lni-chevron-right"></i></a></li>
                                            </ul>
                                        </div>
                                        <!--/ End Pagination -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grids -->



    @push('scripts')
        <script type="text/javascript">
            const current = document.getElementById("current");
            const opacity = 0.6;
            const imgs = document.querySelectorAll(".img");
            imgs.forEach(img => {
                img.addEventListener("click", (e) => {
                    //reset opacity
                    imgs.forEach(img => {
                        img.style.opacity = 1;
                    });
                    current.src = e.target.src;
                    //adding class
                    //current.classList.add("fade-in");
                    //opacity
                    e.target.style.opacity = opacity;
                });
            });
        </script>
    @endpush

</x-front-layout>
