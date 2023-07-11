
    @csrf
    <div class="col-xxl-8 col-md-6 mb-4">
        <div>
            <label for="basiInput" class="form-label">Name Product</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="basiInput" name="name" value="{{ old('name',$product->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-xxl-8 col-md-6 mb-4">
        <div>
            <label for="basiInput" class="form-label">Category</label>
            <select name="category_id" class="form-control">
                <option value="" selected  disabled>choose one</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"  @selected(old('category_id',$product->category_id) == $category->id)>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-xxl-8 col-md-6 mb-4">
        <div>
            <label for="basiInput" class="form-label">description</label>
            <input type="text" class="form-control" id="basiInput" name="description" value="{{ old('description',$product->description) }}">
        </div>
    </div>

    <div class="col-xxl-8 col-md-6 mb-4">
        <div>
            <label for="basiInput" class="form-label">price</label>
            <input type="text" class="form-control" id="basiInput" name="price" value="{{ old('price',$product->price) }}">
        </div>
    </div>

    <div class="col-xxl-8 col-md-6 mb-4">
        <div>
            <label for="basiInput" class="form-label">compar_price</label>
            <input type="text" class="form-control" id="basiInput" name="compar_price" value="{{ old('compar_price',$product->compar_price) }}">
        </div>
    </div>


    <div class="col-lg-8">
        <div>
            <label for="formSizeDefault" class="form-label">Upload image</label>
            <input class="form-control @error('image') is-invalid @enderror" id="formSizeDefault" type="file" name="image">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" height="60px">
            @endif
        </div>
    </div>

    <div class="col-lg-6">
        <button type="submit" class="btn btn-success mt-3">{{ $button_lable ?? 'save' }}</button>
    </div>

