<link rel="stylesheet" href="{{asset('../Css/Frontend/navbar.css')}}">

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ Route('beranda') }}" >
            <img class="" src="{{asset('logo.png')}}" alt="" width="140">
        </a>
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16"><path fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.75 12.25h10.5m-10.5-4h10.5m-10.5-4h10.5"/></svg>
        {{-- <span class="navbar-toggler-icon text-white"></span> --}}
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}" aria-current="page" href="{{ route('beranda') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('layanan') ? 'active' : '' }}" href="{{ route('layanan-kami') }}">Layanan Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('produk-kami', 'detail.produk') ? 'active' : '' }}" href="{{ route('produk-kami') }}">Produk</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('orderhistory') ? 'active' : '' }}" href="{{ Route('orderhistory') }}">Order History</a>
                    </li>
                @endauth
            </ul>

            <div class="d-flex align-items-center gap-3" role="search">
                @if (Auth::user())
                    <a href="{{ route('keranjang') }}" class="text-decoration-none">
                        <i class="fa-solid fa-bag-shopping fs-2 text-white"></i>
                        @if (Auth::user()->Keranjang->where('aktif', 1)->count())
                            <span class="badge bg-danger rounded-circle text-white">{{ Auth::user()->Keranjang->where('aktif', 1)->count() }}</span>
                        @endif
                    </a>
                    <div class="dropdown">
                        <div class="text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </div>
                        <ul class="dropdown-menu" style="">
                            <form method="POST" action="/user-logout" class="mb-0">
                            @csrf
                                <li class="dropdown-item">
                                    <button type="submit" class="btn btn-danger w-100">Logout</button>
                                </li>
                            </form>
                        </ul>
                    </div>
                @else
                    <a href="/login"><button class="btn-login rgb-red text-white" type="submit">Login</button></a>
                @endif
            </div>
        </div>
    </div>
</nav>
