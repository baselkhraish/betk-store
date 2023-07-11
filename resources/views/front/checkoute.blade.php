<x-front-layout title="Personal Information">

    <x-slot:breadcrumb>
        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Personal Information</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li><a href="{{ route('product.index') }}">Shop</a></li>
                            <li><a href="{{ route('cart.index') }}">Cart</a></li>

                            <li>Personal Information</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    </x-slot:breadcrumb>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li>
                                <h6 class="title">
                                    {{ __('Enter your information and we will contact you as soon as possible') }}
                                </h6>
                                <section class="checkout-steps-form-content collapse show">
                                    <form action="{{ route('checkout') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>{{ __('User Name') }}</label>
                                                    <div class="row">
                                                        <div class="col-md-12 form-input form">
                                                            <input type="text" placeholder="Your Name" name="name">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>{{ __('Email Address') }}</label>
                                                    <div class="form-input form">
                                                        <input type="email" placeholder="Email Address" name="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="single-form form-default">
                                                    <label>{{ __('Whatsup Number') }}</label>
                                                    <div class="form-input form">
                                                        <input type="text" placeholder="Whatsup Number" name="phone_number">
                                                    </div>
                                                </div>
                                            </div>






                                            <div class="col-md-12">
                                                <div class="single-form button">
                                                    <button class="btn" type="submit">Send Now</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </section>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-front-layout>
