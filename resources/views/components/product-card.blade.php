
    <!-- Start Single Product -->
    <div class="single-product">
        <div class="product-image">
            <img style="width: 350px; height: 250px; object-fit: cover;" src="{{ $product->image_url }}" alt="{{ $product->title }}">
            <div class="button">
                <a href="{{ route('product.show',$product->slug) }}" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
            </div>
        </div>
        <div class="product-info">
            <span class="category">{{ $product->category->name }}</span>
            <h4 class="title">
                <a href="{{ route('product.show',$product->slug) }}">{{ $product->name }}</a>
            </h4>
            <div class="price">
                <span>{{ Currency::format($product->price) }}</span>
                @if ($product->compar_price)
                <span class="discount-price">{{ Currency::format($product->compar_price) }}</span>
                @endif
            </div>
        </div>
    </div>
    <!-- End Single Product -->
