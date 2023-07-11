
    @csrf
    <div class="col-xxl-8 col-md-6 mb-4">
        <div>
            <label for="basiInput" class="form-label">Name Category</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="basiInput" name="name" value="{{ old('name',$category->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
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
            @if($category->image)
                <img src="{{ asset('storage/'.$category->image) }}" height="60px">
            @endif
        </div>
    </div>

    <div class="col-lg-6">
        <button type="submit" class="btn btn-success mt-3">{{ $button_lable ?? 'save' }}</button>
    </div>

