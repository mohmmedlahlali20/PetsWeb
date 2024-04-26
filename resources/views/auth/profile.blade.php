@extends('Layouts.Auth')
@section('title', 'Profile')
@section('content')

<section class="py-5">
  <div class="container">
      <div class="row">
          <div class="col-lg-12">
              @if(session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">  </button>
              </div>
              @endif

              @if(session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
          </div>
      </div>
  </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">     
                <div class="card">
                    <div class="card-body text-center">
                     
                      @if(Auth::user()->image)
                      <img src="{{ Storage::url(Auth::user()->image) }}" class="rounded-circle img-fluid profile-img" style="width: 150px;">
                  @else
                      <img src="{{ asset('assets/images/avatar.png') }}" class="rounded-circle img-fluid profile-img" style="width: 150px;">
                  @endif
                  

                        <form action="{{ route('update.image') }}" class="mt-3" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="hidden" name="image" value="{{ Auth::user()->image }}">
                                <input type="file" name="image" class="form-control-file" accept="image/*" id="imageInput">
                            </div>
                            <button type="submit" class="btn btn-outline-success btn-sm">Upload</button>
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </form>
                        <div id="starRating">
                            <h5 class="my-3">
                                {{ Auth::user()->name }}  
                            </h5>
                            @if($allcommands->count() > 2)
                            <span class="star filled" data-value="1">
                                <i style="color: yellow" class="fa fa-star"></i>
                                <i style="color: yellow" class="fa fa-star"></i>
                            </span>
                            @endif
                            @if($allcommands->count() > 5)
                            <span class="star filled" data-value="1">
                                <i style="color: yellow" class="fa fa-star"></i>
                                <i style="color: yellow" class="fa fa-star"></i>
                                <i style="color: yellow" class="fa fa-star"></i>
                            </span>
                            @endif
                            @if($allcommands->count() > 6)
                            <span class="star filled" data-value="1">
                               <h5>clients fidel</h5>
                            </span>
                            @endif
                        </div>
                        
                        
                        <p class="text-muted mb-1">{{ Auth::user()->email }}</p>
                        <p class="text-muted mb-0">{{ Auth::user()->provider_id }}</p>
                        <div class="d-flex justify-content-center mt-3">
                            <a href="/chatify" class="btn btn-outline-primary me-1">Chat</a>
                            &nbsp;&nbsp;
                            <a href="{{ route('Home.index') }}" class="btn btn-info">Home</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <p class="mb-0 fw-bold">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <p class="mb-0 fw-bold">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <p class="mb-0 fw-bold">Role</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ Auth::user()->role }}</p>
                            </div>
                        </div>
                      
                        @if(Auth::check() && Auth::user()->provider_id)
                        <hr>
                        <div class="row mb-3">
                          <div class="col-sm-3">
                              <p class="mb-0 fw-bold">Provider</p>
                          </div>
                          <div class="col-sm-9">
                              <p class="text-muted mb-0">{{ Auth::user()->provider}}</p>
                              <p class="text-muted mb-0">{{ Auth::user()->provider_id}}</p>
                          </div>
                      </div>
                      @endif
                        <hr>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')" type="submit" class="btn btn-outline-danger">
                                        <i class="fas fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </div>
                            <div class="col-sm-9">
                              @if (!Auth::user()->provider_id)
                                <button type="button" class="btn btn-outline-dark me-2" data-toggle="modal" data-target="#updatePasswordModal">
                                    <i class="fas fa-key me-1"></i> Change Password
                                </button>
                                @endif
                                                              
                                <button type="button" class="btn btn-outline-dark" onclick="showUpdateNameForm()">
                                  <i class="far fa-edit me-1"></i> Update Name
                              </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">PetsWeb</span> Commands</p>
                                @forelse($userCommands as $command)
                                <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                                    <p class="mb-1" style="font-size: .77rem;">{{ $command->product->name }}</p>
                                </div>
                          
                                @empty
                                <p>No commands found.</p>
                                @endforelse
                                <div>
                                    <p class="mb-0" style="font-size: 0.77rem;">Number of commands: {{ $allcommands->count() ?? 0 }} passed by <b> {{ $user->name }} </b></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">PetsWeb</span> Payments</p>
                                @if($user->totalPrice)
                                <p class="mb-1" style="font-size: .77rem;">{{ $user->totalPrice }}</p>
                                <div class="progress rounded" style="height: 5px;">
                                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                @else
                                <p>No payment information available.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="updateNameModal" tabindex="-1" role="dialog" aria-labelledby="updateNameModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateNameModalLabel">Update Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateNameForm" action="{{ route('update.profile') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="newName">Update your name</label>
                        <input type="text" class="form-control" id="newName" name="name" placeholder="Enter new name" required>
                    </div>
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button type="submit" class="btn btn-primary"><i class="far fa-edit me-1"></i> Update Name</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updatePasswordModal" tabindex="-1" role="dialog" aria-labelledby="updatePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updatePasswordModalLabel">Update Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updatePasswordForm" method="post" action="{{ route('update.password') }}">
                    @csrf
                    <div class="form-group">
                        <label for="currentPassword">Current Password</label>
                        <input type="password" class="form-control" id="currentPassword" name="old_password" required>
                        @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" class="form-control" id="newPassword" name="new_password" required>
                        @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword">Confirm New Password</label>
                        <input type="password" class="form-control" id="confirmPassword" name="confirm_new_password" required>
                        @error('confirm_new_password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-key me-1"></i> Update Password</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function showUpdateNameForm() {
        $('#updateNameModal').modal('show');
    }

</script>
@endsection
