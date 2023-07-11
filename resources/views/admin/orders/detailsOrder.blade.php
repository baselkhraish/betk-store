@extends('layouts.admin')
@section('title','All Orders')
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">Orders</li>
@stop
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="live-preview">
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">product name</th>
                                <th scope="col">product quantity</th>
                                <th scope="col">product price</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count=1;
                                @endphp
                            @forelse($order as $ord)
                                <tr>
                                    <td scope="row">{{$count++}}</td>
                                    <td>{{ $ord->product_name }}</td>
                                    <td>{{ $ord->quantity }}</td>
                                    <td>{{ $ord->price }}</td>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="10" class="text-center text-danger">No Data</td>
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
    {{-- {{ $products->withQueryString()->links() }} --}}
@stop
