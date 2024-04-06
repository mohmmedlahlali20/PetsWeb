
    <!-- The best way to take care of the future is to take care of the present moment. - Thich Nhat Hanh -->

    @props(['products'])

        <div class="container">
        
              <div class="latest_product_inner">
                <div class="row">
                
                  @forelse ($products as $product)
                  <div class="col-lg-4 col-md-6">
                    <div class="single-product">
                      <!-- Image du produit -->
                      <div class="product-img">
                        <img class="card-img " src="{{ Storage::url($product->image) }}" alt="" />
                        <!-- Icône de vue -->
                        <div class="p_icon">
                          <a href="{{ route('commentes.show' , $product->id) }}" class="product-details-link" data-toggle="modal" data-target="#productDetailsModal" data-product-id="{{ $product->id }}">
                            <i class="fas fa-eye"></i> 
                          </a>                        
                        </div>
                      </div>
                      <!-- Détails du produit -->
                      <div class="product-btm">
                        <a href="#" class="d-block">
                          <h4>{{ $product->name }}</h4>
                       
                          <!-- Catégorie du produit -->
                          <h6 class="mr-4 badge bg-primary">
                            Category: @if ($product->category)
                            {{ $product->category->name }}
                            @else
                            No Category Assigned
                            @endif
                          </h6>
                        </a>
                        <!-- Autres infos du produit -->
                        <div class="mt-3">
                          <span class="mr-4 badge bg-primary">${{$product->price }}</span>
                          <span class="badge {{ $product->quantity <= 5 ? 'bg-danger' : 'bg-success' }}">Stock: {{ $product->quantity }}</span>
                          <hr>
                          <span class="mr-4">created at:{{ $product->created_at }}</span>
                          
                          <form action="{{ route('command') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @if ($product->quantity == 0)
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
