<div class="golobal-navbar bg-white">

    <div class="container">
        <div class="row">
            <div class="col-md-3 d-none d-md-inline d-sm-none">
                <img src="{{ asset('assets/images/logo.png') }}" class="w-100" alt="logo">
            </div>
            <div class="col-md-9  my-auto">
                <div class="border text-center p-2">
                    <h5>Advertise Here</h5>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
        <div class="container">

            <a href="/" class="navbar-brand d-inline d-sm-inline d-md-none">
                <img src="{{ asset('assets/images/logo.png') }}" style="width:140px" alt="logo">

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="{{ url('/') }}">Home</a>
                    </li>
                    @php
                        $categories = App\Models\Category::where('status', 0)
                            ->where('navbar_status', 0)
                            ->get();

                    @endphp
                    @foreach ($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ url('tutorial/' . $category->slug) }} ">{{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                    @auth
                        <li>
                            <a class="nav-link btn-primary"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit()"
                                href="{{ route('logout') }}">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                @csrf
                            </form>

                        </li>
                    @endauth
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('login') }}">Login </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('register') }}">Register </a>
                    </li>
                    @endguest
                </ul>

            </div>
        </div>
    </nav>
</div>
