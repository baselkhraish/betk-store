@extends('layouts.admin')
@section('title', 'About')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">About</li>
@stop
@section('content')

@foreach ($abouts as $about)
<div class="card">
    <div class="card-body">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="sticky-side-div">
                    <div class="card ribbon-box border shadow-none right">
                        <img src="{{asset('storage/'.$about->image)}}" alt=""
                            class="img-fluid rounded" />
                        <div class="position-absolute bottom-0 p-3">
                            <div class="position-absolute top-0 end-0 start-0 bottom-0 bg-white opacity-25"></div>
                            <div class="row justify-content-center">
                                <div class="col-3">
                                    <img src="{{ $about->img_url }}" alt="" class="img-fluid rounded" />
                                </div>
                                <div class="col-3">
                                    <img src="{{ $about->img_url }}" alt="" class="img-fluid rounded" />
                                </div>
                                <div class="col-3">
                                    <img src="{{ $about->img_url }}" alt=""
                                        class="img-fluid rounded h-100 object-cover" />
                                </div>
                                <div class="col-3">
                                    <img src="{{ $about->img_url }}" alt="" class="img-fluid rounded" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hstack gap-2">
                        <a class="btn btn-success w-100"
                            href="{{ $about->url }}"
                            target="_blank">youtube</a>
                    </div>
                </div>
            </div>
            <!--end col-->
            <div class="col-lg-8">
                <div class="mt-5 justify-content-center align-items-center">
                    <div class="dropdown float-end">
                        <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-primary"><i
                                class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a>
                    </div>
                    <h4>{{ $about->title }}</h4>
                    <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
                        <!--end row-->
                        <div class="mt-4 text-muted">
                            <h5 class="fs-14">Description :</h5>
                            <p>
                                {{ $about->description }}
                            </p>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </div>
</div>
@endforeach

@stop
