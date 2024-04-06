


@props(['Food'])
<div class="container">
        
    <div class="latest_product_inner">
      <div class="row">
      
        @forelse ($Food as $itam)
        <div class="col-lg-4 col-md-6">
          <div class="single-product">
            <!-- Image du produit -->
            <div class="product-img">
              <img class="card-img " src="{{ asset('assets/images/image copy 2.png') }}" alt="" />
              <!-- Icône de vue -->
              <div class="p_icon">
                <a href="" class="product-details-link" data-toggle="modal" data-target="#productDetailsModal" data-product-id="">
                  <i class="fas fa-eye"></i> 
                </a>                        
              </div>
            </div>
            <!-- Détails du produit -->
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4>{{ $itam->name }}</h4>
             
                <!-- Catégorie du produit -->
                <h6 class="mr-4 badge bg-primary">
                  Category: @if ($itam->category)
                  {{ $itam->category->name }}
                  @else
                  No Category Assigned
                  @endif
                </h6>
              </a>
              <!-- Autres infos du produit -->
              <div class="mt-3">
                <span class="mr-4 badge bg-primary">${{$itam->price }}</span>
                <span class="badge {{ $itam->quantity <= 5 ? 'bg-danger' : 'bg-success' }}">Stock: {{ $itam->quantity }}</span>
                <hr>
                <span class="mr-4">created at:{{ $itam->created_at }}</span>
                
                <form action="{{ route('command') }}" method="post">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $itam->id }}">
                  @if ($itam->quantity == 0)
                    <div class="alert d-flex justify-content-center alert-warning">
                      <button type="button" class="btn btn-outline-dark btn-product btn-cart" disabled>
                        <i class="fas fa-shopping-basket"></i> Out of Stock
                    </button>
                   
                    </div>
                  @else
                      <button type="submit" class="btn btn-outline-dark btn-product btn-cart">
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
            No Products exist
          </div>
        </div>
        @endforelse
      </div>
    </div> 


   
  </div>