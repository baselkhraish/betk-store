<x-front-layout title="About">
    <x-slot:breadcrumb>
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">About</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li>about</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot:breadcrumb>


    <!-- Start About Area -->
    @foreach ($abouts as $about)
    <section class="about-us section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-12">
                    <div class="content-left">
                        <img src="{{ $about->image_url }}" alt="#">
                        <a href="{{ $about->url }}"
                            class="glightbox video"><i class="lni lni-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- content-1 start -->
                    <div class="content-right">
                        <h2>{{ $about->title }}</h2>
                        <p>
                            {{ $about->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endforeach

    <!-- End About Area -->



        @push('scripts')
            <script type="text/javascript">

                //========= glightbox
                GLightbox({
                    'href': '{{ $about->url }}',
                    'type': 'video',
                    'source': 'youtube', //vimeo, youtube or local
                    'width': 900,
                    'autoplayVideos': true,
                });
            </script>
        @endpush

</x-front-layout>
