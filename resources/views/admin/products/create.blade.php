@extends('layouts.admin')
@section('title', 'All Products')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active"><a href="{{ route('admin.products.index') }}">products</a></li>
    <li class="breadcrumb-item active">create</li>
@stop
@section('content')
    <div class="col-lg-12">
        <div class="card">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Create Products</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <a href="{{ route('admin.products.index') }}"
                                    class="
                        btn btn-success">All products</a>
                            </div>
                        </div>
                    </div><!-- end card header -->


                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-12">

                                <form action="{{ route('admin.products.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @include('admin.products._form', [
                                        'button_lable' => 'create',
                                    ])
                                </form>
                            </div>
                            <!--end row-->
                        </div>
                        <div class="d-none code-view">
                            <pre class="language-markup" style="height: 450px;"><code>&lt;!-- Basic Input --&gt;
&lt;div&gt;
    &lt;label for=&quot;basiInput&quot; class=&quot;form-label&quot;&gt;Basic Input&lt;/label&gt;
    &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;basiInput&quot;&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Input with Label --&gt;
&lt;div&gt;
    &lt;label for=&quot;labelInput&quot; class=&quot;form-label&quot;&gt;Input with Label&lt;/label&gt;
    &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;labelInput&quot;&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Input with Placeholder --&gt;
&lt;div&gt;
    &lt;label for=&quot;placeholderInput&quot; class=&quot;form-label&quot;&gt;Input with Placeholder&lt;/label&gt;
    &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;placeholderInput&quot; placeholder=&quot;Placeholder&quot;&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Input with Value --&gt;
&lt;div&gt;
    &lt;label for=&quot;valueInput&quot; class=&quot;form-label&quot;&gt;Input with Value&lt;/label&gt;
    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;valueInput&quot; value=&quot;Input value&quot;&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Readonly Plain Text Input --&gt;
&lt;div&gt;
    &lt;label for=&quot;readonlyPlaintext&quot; class=&quot;form-label&quot;&gt;Readonly Plain Text Input&lt;/label&gt;
    &lt;input type=&quot;text&quot; class=&quot;form-control-plaintext&quot; id=&quot;readonlyPlaintext&quot; value=&quot;Readonly input&quot; readonly&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Readonly Input --&gt;
&lt;div&gt;
    &lt;label for=&quot;readonlyInput&quot; class=&quot;form-label&quot;&gt;Readonly Input&lt;/label&gt;
    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;readonlyInput&quot; value=&quot;Readonly input&quot; readonly&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Disabled Input --&gt;
&lt;div&gt;
    &lt;label for=&quot;disabledInput&quot; class=&quot;form-label&quot;&gt;Disabled Input&lt;/label&gt;
    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;disabledInput&quot; value=&quot;Disabled input&quot; disabled&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Input with Icon --&gt;
&lt;div&gt;
    &lt;label for=&quot;iconInput&quot; class=&quot;form-label&quot;&gt;Input with Icon&lt;/label&gt;
    &lt;div class=&quot;form-icon&quot;&gt;
        &lt;input type=&quot;email&quot; class=&quot;form-control form-control-icon&quot; id=&quot;iconInput&quot; placeholder=&quot;example@gmail.com&quot;&gt;
        &lt;i class=&quot;ri-mail-unread-line&quot;&gt;&lt;/i&gt;
    &lt;/div&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Input with Icon Right --&gt;
&lt;div&gt;
    &lt;label for=&quot;iconrightInput&quot; class=&quot;form-label&quot;&gt;Input with Icon Right&lt;/label&gt;
    &lt;div class=&quot;form-icon right&quot;&gt;
        &lt;input type=&quot;email&quot; class=&quot;form-control form-control-icon&quot; id=&quot;iconrightInput&quot; placeholder=&quot;example@gmail.com&quot;&gt;
        &lt;i class=&quot;ri-mail-unread-line&quot;&gt;&lt;/i&gt;
    &lt;/div&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Input Date --&gt;
&lt;div&gt;
    &lt;label for=&quot;exampleInputdate&quot; class=&quot;form-label&quot;&gt;Input Date&lt;/label&gt;
    &lt;input type=&quot;date&quot; class=&quot;form-control&quot; id=&quot;exampleInputdate&quot;&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Input Time --&gt;
&lt;div&gt;
    &lt;label for=&quot;exampleInputtime&quot; class=&quot;form-label&quot;&gt;Input Time&lt;/label&gt;
    &lt;input type=&quot;time&quot; class=&quot;form-control&quot; id=&quot;exampleInputtime&quot; value=&quot;08:56 AM&quot;&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Input Password --&gt;
&lt;div&gt;
    &lt;label for=&quot;exampleInputpassword&quot; class=&quot;form-label&quot;&gt;Input Password&lt;/label&gt;
    &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;exampleInputpassword&quot; value=&quot;44512465&quot;&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Example Textarea --&gt;
&lt;div&gt;
    &lt;label for=&quot;exampleFormControlTextarea5&quot; class=&quot;form-label&quot;&gt;Example Textarea&lt;/label&gt;
    &lt;textarea class=&quot;form-control&quot; id=&quot;exampleFormControlTextarea5&quot; rows=&quot;3&quot;&gt;&lt;/textarea&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Form Text --&gt;
&lt;div&gt;
    &lt;label for=&quot;formtextInput&quot; class=&quot;form-label&quot;&gt;Form Text&lt;/label&gt;
    &lt;input type=&quot;password&quot; class=&quot;form-control&quot; id=&quot;formtextInput&quot;&gt;
    &lt;div id=&quot;passwordHelpBlock&quot; class=&quot;form-text&quot;&gt;
        Must be 8-20 characters long.
    &lt;/div&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Color Picker --&gt;
&lt;div&gt;
    &lt;label for=&quot;colorPicker&quot; class=&quot;form-label&quot;&gt;Color Picker&lt;/label&gt;
    &lt;input type=&quot;color&quot; class=&quot;form-control form-control-color w-100&quot; id=&quot;colorPicker&quot; value=&quot;#364574&quot;&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Input Border Style --&gt;
&lt;div&gt;
    &lt;label for=&quot;borderInput&quot; class=&quot;form-label&quot;&gt;Input Border Style&lt;/label&gt;
    &lt;input type=&quot;text&quot; class=&quot;form-control border-dashed&quot; id=&quot;borderInput&quot; placeholder=&quot;Enter your name&quot;&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Datalist example --&gt;
&lt;label for=&quot;exampleDataList&quot; class=&quot;form-label&quot;&gt;Datalist example&lt;/label&gt;
&lt;input class=&quot;form-control&quot; list=&quot;datalistOptions&quot; id=&quot;exampleDataList&quot; placeholder=&quot;Search your country...&quot;&gt;
&lt;datalist id=&quot;datalistOptions&quot;&gt;
    &lt;option value=&quot;Switzerland&quot;&gt;
    &lt;option value=&quot;New York&quot;&gt;
    &lt;option value=&quot;France&quot;&gt;
    &lt;option value=&quot;Spain&quot;&gt;
    &lt;option value=&quot;Chicago&quot;&gt;
    &lt;option value=&quot;Bulgaria&quot;&gt;
    &lt;option value=&quot;Hong Kong&quot;&gt;
&lt;/datalist&gt;</code>

<code>&lt;!-- Rounded Input --&gt;
&lt;div&gt;
    &lt;label for=&quot;exampleInputrounded&quot; class=&quot;form-label&quot;&gt;Rounded Input&lt;/label&gt;
    &lt;input type=&quot;text&quot; class=&quot;form-control rounded-pill&quot; id=&quot;exampleInputrounded&quot; placeholder=&quot;Enter your name&quot;&gt;
&lt;/div&gt;</code>

<code>&lt;!-- Floating Input --&gt;
&lt;div class=&quot;form-floating&quot;&gt;
    &lt;input type=&quot;text&quot; class=&quot;form-control&quot; id=&quot;firstnamefloatingInput&quot; placeholder=&quot;Enter your firstname&quot;&gt;
    &lt;label for=&quot;firstnamefloatingInput&quot;&gt;Floating Input&lt;/label&gt;
&lt;/div&gt;</code></pre>
                        </div>
                    </div>
                </div>
            </div>

        @stop
