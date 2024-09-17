@php
    use App\Models\Catagory;
    $categories = Catagory::get();
@endphp


<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">MarketSphare</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('shop') ? 'active' : '' }}" href="{{ url('/shop') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('oction') ? 'active' : '' }}" href="{{ url('/oction') }}">Auction</a>
                </li>
                <li class="nav-item dropdown">
    @php
        $categoryActive = request()->is('catagorydetail/*') ? 'active' : '';
    @endphp
    <a class="nav-link dropdown-toggle {{ $categoryActive }}" href="#" id="navbarDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        Categories
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach ($categories as $catagory)
            <li>
                <a class="dropdown-item {{ request()->is('catagorydetail/'.$catagory->id) ? 'active' : '' }}"
                    href="{{ url('catagorydetail/' . $catagory->id) }}">{{ $catagory->name }}</a>
            </li>
        @endforeach
    </ul>
</li>


            </ul>
            @if (session('userid'))
                <ul>
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                            data-bs-toggle="dropdown">
                            {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
                            <span class="d-none d-md-block dropdown-toggle ps-2">My Account</span>
                        </a><!-- End Profile Image Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>{{ session('username') }}
                                </h6>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ url('user/cart') }}">
                                    <span>Cart</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ url('user/order') }}">
                                    <span>My Orders</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center navbarbutton" href="{{ url('usersignout') }}">
                                    <i class="bi bi-box-arrow-right"></i>
                                    <span>Sign Out</span>
                                </a>
                            </li>
                        </ul><!-- End Profile Dropdown Items -->
                    </li>
                </ul>
            @else
                <ul>
                    <a class=" btn btn-primary btn-sm"  data-bs-toggle="modal" data-bs-target="#UserSignupModal">SignUp</a>
                    <a class=" btn btn-primary btn-sm"  data-bs-toggle="modal"
                        data-bs-target="#UserSignInModal">SignIn</a>
                </ul>
            @endif
        </div>
    </div>
</nav>

{{-- User Signup form --}}

<div class="modal fade" id="UserSignupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">SignUp as a buyer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('usersignup') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Name:</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password:</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Country:</label>
                                <input type="text" name="country" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Email:</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Phone Number:</label>
                                <input type="number" name="phonenumber" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Address:</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">SignUP</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- User Signin form --}}

<div class="modal fade" id="UserSignInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">SignIn as a buyer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('usersignin') }}" method="post">
                <div class="modal-body">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password" name="password"class="form-control" required>
                    </div>






                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">SignIn</button>
                </div>
            </form>
        </div>
    </div>
</div>







