@props(['products'])

<div class="container">
    <div class="row">
        @forelse ($products as $product)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card">
                <div class="ratio ratio-16x9">
                    <img src="{{ Storage::url($product->image) }}" class="card-img-top " alt="Product Image">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}
                    <span>Average Rating: {{ number_format($product->comments->avg('rate_number') ?? 0, 1) }}</span>
                    </h5>
                    <p class="card-text">Category: 
                        @if ($product->category)
                            <span class="badge bg-primary">{{ $product->category->name }}</span>
                        @else
                            <span class="badge bg-warning text-dark">No Category Assigned</span>
                        @endif
                    </p>
                    <p></p>
                    <p class="card-text">Price: ${{ $product->price }}</p>
                    <p class="card-text">Created at: {{ $product->created_at }}</p>
                    <div class="btn-group">
                        <a href="{{ route('commentes.show', $product->id) }}" class="btn btn-outline-dark" data-toggle="modal" data-target="#productDetailsModal" data-product-id="{{ $product->id }}">
                            <i class="fas fa-eye"></i> 
                        </a>&nbsp;&nbsp;
                        <form action="{{ route('command') }}" method="post" class="d-inline">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @if (App\Models\commends::where('products_id', $product->id)->exists())
                                <button type="button" class="btn btn-outline-dark" disabled>
                                    <i class="far fa-check-circle"></i> this pets is already sold 
                                </button>
                            @else
                                <button type="submit" class="btn btn-outline-dark">
                                    <i class="fas fa-shopping-basket"></i> 
                                </button>
                            @endif
                        </form>
                    </div>
                    <form action="{{ route('like.product') }}" method="post" class="d-inline">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-outline-dark">
                            <i class="fas fa-thumbs-up"></i> {{ $product->likes }}
                        </button>
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
