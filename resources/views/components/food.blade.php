@props(['Food'])
<div class="container">
    <div class="row">
        @forelse ($Food as $item)
        <div class="col-lg-4 col-md-6">
            <div class="card mb-4">
                <div class="ratio ratio-16x9">
                    <img src="{{ asset('storage/' . $item->image) }} class="card-img-top" alt="Product Image">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">Price: ${{ $item->price }}</p>
                    <p class="card-text">Created at: {{ $item->created_at }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="" class="btn btn-outline-dark">
                            <i class="fas fa-eye"></i> Show More
                        </a>
                        <form action="{{ route('order.food') }}" method="post">
                            @csrf
                            <input type="hidden" name="food_id" value="{{ $item->id }}">
                            @if ($item->quantity == 0)
                            <div class="alert d-flex justify-content-center alert-warning">
                                <button type="button" class="btn btn-outline-dark" disabled>
                                    <i class="fas fa-shopping-basket"></i> Out of Stock
                                </button>
                            </div>
                            @else
                            <button type="submit" class="btn btn-outline-dark">
                                <i class="fas fa-shopping-basket"></i> Add to Cart
                            </button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- Aucun produit -->
        <div class="container">
            <div class="alert alert-warning">
                No Foods exist
            </div>
        </div>
        @endforelse
    </div>
</div>
