@props(['products'])

<div class="container">
    <div class="row">
        @forelse ($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="ratio ratio-16x9">
                    <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="Product Image">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">Category: 
                        @if ($product->category)
                            <span class="badge bg-primary">{{ $product->category->name }}</span>
                        @else
                            <span class="badge bg-warning text-dark">No Category Assigned</span>
                        @endif
                    </p>
                    <p class="card-text">Price: ${{ $product->price }}</p>
                    <p class="card-text">Created at: {{ $product->created_at }}</p>
                    <a href="{{ route('commentes.show' , $product->id) }}" class="btn btn-outline-dark" data-toggle="modal" data-target="#productDetailsModal" data-product-id="{{ $product->id }}">
                        <i class="fas fa-eye"></i> Show More
                    </a>
                    <form action="{{ route('command') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        @if (App\Models\commends::where('products_id', $product->id)->exists())
                            <button type="button" class="btn btn-outline-dark btn-block mt-2" disabled>
                                <i class="far fa-check-circle"></i> This product has been sold, you can view the comments
                            </button>
                        @else
                            <button type="submit" class="btn btn-outline-dark btn-block mt-2">
                                <i class="fas fa-shopping-basket"></i> Add to Cart
                            </button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        @empty
        <!-- Aucun produit -->
        <div class="container">
            <div class="alert alert-warning">
                No Products exist
            </div>
        </div>
        @endforelse
    </div>
</div>
