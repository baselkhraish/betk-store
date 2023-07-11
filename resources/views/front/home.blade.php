<x-front-layout>

    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            <div class="single-slider"
                                style="background-image: url({{ asset('webasset/assets/images/slider/2.jpg') }});">
                                <div class="content">
                                    <h2>
                                        Advertising word!

                                    </h2>
                                    <p>Advertising word!</p>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                            <!-- Start Single Slider -->
                            <div class="single-slider"
                                style="background-image: url({{ asset('webasset/assets/images/slider/4.jpg') }});">
                                <div class="content">
                                    <h2><span>Advertising word!</span>
                                        Advertising word!
                                    </h2>
                                    <p>Advertising word!</p>
                                </div>
                            </div>
                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner"
                                style="background-image: url('{{ asset('webasset/assets/images/1.jpg') }}');">
                                <div class="content">
                                    <h2 style="color: #fff;">
                                        Advertising word!
                                    </h2>
                                </div>
                            </div>
                            <!-- End Small Banner -->
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Advertising word!</h2>
                                    <p>Advertising word!.</p>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Featured Categories Area -->
    <section class="featured-categories section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ __('Featured Categories') }}</h2>
                        <p>{{ __('From here you can see the latest sections that have been added to the site.') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach ($categories as $category)
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-product">
                            <div class="product-image">
                                <a href="{{ route('category.show', $category->slug) }}">
                                    <img src="{{ $category->image_url }}" alt="{{ $category->title }}" style="height:200px; width: 300px; object-fit: cover">
                                </a>
                            </div>
                            <div class="product-info text-center">
                                <h4 class="title">
                                    <a href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                                </h4>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- End Features Area -->

    <!-- Start Trending Product Area -->
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>{{ __('Latest Product') }}</h2>
                        <p>{{ __('From here you can see the latest products that have been added to the site') }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-3 col-md-6 col-12">
                        <x-product-card :product="$product" />
                    </div>
                @endforeach


            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->

    <!-- Start Banner Area -->
    <section class="banner section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner" style="background-image:url('{{ asset('webasset/1.jpg') }}')">
                        <div class="content">
                            <h2>{{ __('All Categories on our website') }}</h2>
                                <div style="background-color: rgba(0,0,0,.6);">
                                    <p style="color: rgb(241, 241, 241)">{{ __('Browse our departments and buy our goods The best material and the highest quality') }} </p>

                                </div>
                            <div class="button">
                                <a href="{{ route('category.index') }}" class="btn">{{ __('View Details') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="single-banner custom-responsive-margin"
                        style="background-image:url('{{ asset('webasset/3.jpg') }}')">
                        <div class="content">
                            <h2>{{ __('All products on our website') }}</h2>
                            <div style="background-color: rgba(0,0,0,.6);">
                                <p style="color: #fff">{{ __('Browse our products and buy our goods, The best material and the highest quality') }}</p>
                            </div>
                            <div class="button">
                                <a href="{{ route('product.index') }}" class="btn">{{ __('Shop Now') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->


    @push('scripts')
        <script type="text/javascript">
            //========= Hero Slider
            tns({
                container: '.hero-slider',
                slideBy: 'page',
                autoplay: true,
                autoplayButtonOutput: false,
                mouseDrag: true,
                gutter: 0,
                items: 1,
                nav: false,
                controls: true,
                controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
            });

            //======== Brand Slider
            tns({
                container: '.brands-logo-carousel',
                autoplay: true,
                autoplayButtonOutput: false,
                mouseDrag: true,
                gutter: 15,
                nav: false,
                controls: false,
                responsive: {
                    0: {
                        items: 1,
                    },
                    540: {
                        items: 3,
                    },
                    768: {
                        items: 5,
                    },
                    992: {
                        items: 6,
                    }
                }
            });
        </script>
        <script>
            const finaleDate = new Date("February 15, 2023 00:00:00").getTime();

            const timer = () => {
                const now = new Date().getTime();
                let diff = finaleDate - now;
                if (diff < 0) {
                    document.querySelector('.alert').style.display = 'block';
                    document.querySelector('.container').style.display = 'none';
                }

                let days = Math.floor(diff / (1000 * 60 * 60 * 24));
                let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
                let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
                let seconds = Math.floor(diff % (1000 * 60) / 1000);

                days <= 99 ? days = `0${days}` : days;
                days <= 9 ? days = `00${days}` : days;
                hours <= 9 ? hours = `0${hours}` : hours;
                minutes <= 9 ? minutes = `0${minutes}` : minutes;
                seconds <= 9 ? seconds = `0${seconds}` : seconds;

                document.querySelector('#days').textContent = days;
                document.querySelector('#hours').textContent = hours;
                document.querySelector('#minutes').textContent = minutes;
                document.querySelector('#seconds').textContent = seconds;

            }
            timer();
            setInterval(timer, 1000);
        </script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 10000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })

        @if (session('success'))
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}'
            })
        @endif
    </script>
    @endpush
</x-front-layout>
