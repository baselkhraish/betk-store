@extends('layouts.admin')
@section('title','All Categories')
@section('search')
<!-- Search-->
<form class="app-search d-none d-md-block">
    <div class="position-relative" action="{{ URL::current() }}" method="get" >
        <input type="text" class="form-control" placeholder="Search category..." autocomplete="off"
            id="search-options" value="{{ request('name') }}" name="name">
        <span class="mdi mdi-magnify search-widget-icon"></span>
        <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none"
            id="search-close-options"></span>
    </div>
</form>
@stop
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Categories</li>
<li class="breadcrumb-item active">Trash Categories</li>
@stop
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Trash Categories</h4>
                <div class="flex-shrink-0">
                    <div class="form-check form-switch form-switch-right form-switch-md">
                        <a href="{{ route('admin.categories.index') }}" class="
                        btn btn-success">All Categories</a>
                    </div>
                </div>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">image</th>
                                <th scope="col">name</th>
                                <th scope="col">Deletedat</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count=1;
                                @endphp
                            @forelse($categories as $category)
                                <tr>
                                    <th scope="row">{{$count++}}</th>
                                    <td><img src="{{asset('storage/'.$category->image)}}" alt="{{ $category->name }}" height="60px" ></td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->deleted_at->format('Y-m-d') }}</td>
                                    <td>
                                        <div class="d-flex justify-content-right">
                                            <form action="{{route('admin.categories.restore',$category->id)}}" method="post">
                                                @csrf
                                                @method('put')
                                                <input type="submit" value="Restore" class="btn btn-success" style="margin-left: 15px" onclick="return confirm('are you sure?')">
                                            </form>
                                            <form action="{{route('admin.categories.force-delete',$category->id)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <input type="submit" value="Delete" class="btn btn-danger" style="margin-left: 15px" onclick="return confirm('are you sure?')">
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger">No Data</td>
                            </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="d-none code-view">
<pre class="language-markup" style="height: 275px;"><code>&lt;table class=&quot;table table-nowrap&quot;&gt;
    &lt;thead&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;col&quot;&gt;ID&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Customer&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Date&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Invoice&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Action&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;fw-semibold&quot;&gt;#VZ2110&lt;/a&gt;&lt;/th&gt;
            &lt;td&gt;Bobby Davis&lt;/td&gt;
            &lt;td&gt;October 15, 2021&lt;/td&gt;
            &lt;td&gt;$2,300&lt;/td&gt;
            &lt;td&gt;&lt;a href=&quot;javascript:void(0);&quot; class=&quot;link-success&quot;&gt;View More &lt;i class=&quot;ri-arrow-right-line align-middle&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;fw-semibold&quot;&gt;#VZ2109&lt;/a&gt;&lt;/th&gt;
            &lt;td&gt;Christopher Neal&lt;/td&gt;
            &lt;td&gt;October 7, 2021&lt;/td&gt;
            &lt;td&gt;$5,500&lt;/td&gt;
            &lt;td&gt;&lt;a href=&quot;javascript:void(0);&quot; class=&quot;link-success&quot;&gt;View More &lt;i class=&quot;ri-arrow-right-line align-middle&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;fw-semibold&quot;&gt;#VZ2108&lt;/a&gt;&lt;/th&gt;
            &lt;td&gt;Monkey Karry&lt;/td&gt;
            &lt;td&gt;October 5, 2021&lt;/td&gt;
            &lt;td&gt;$2,420&lt;/td&gt;
            &lt;td&gt;&lt;a href=&quot;javascript:void(0);&quot; class=&quot;link-success&quot;&gt;View More &lt;i class=&quot;ri-arrow-right-line align-middle&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;&lt;a href=&quot;#&quot; class=&quot;fw-semibold&quot;&gt;#VZ2107&lt;/a&gt;&lt;/th&gt;
            &lt;td&gt;James White&lt;/td&gt;
            &lt;td&gt;October 2, 2021&lt;/td&gt;
            &lt;td&gt;$7,452&lt;/td&gt;
            &lt;td&gt;&lt;a href=&quot;javascript:void(0);&quot; class=&quot;link-success&quot;&gt;View More &lt;i class=&quot;ri-arrow-right-line align-middle&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/td&gt;
        &lt;/tr&gt;
    &lt;/tbody&gt;
&lt;/table&gt;</code></pre>
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    {{ $categories->withQueryString()->links() }}
@stop
@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
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
