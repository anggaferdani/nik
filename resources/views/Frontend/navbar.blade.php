<link rel="stylesheet" href="{{asset('../Css/Frontend/navbar.css')}}">

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ Route('beranda') }}" >
            <img class="nik-logo" src="{{asset('../Images/logonik.png')}}" alt="">
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
                    <a class="nav-link {{ request()->routeIs('layanan') ? 'active' : '' }}" href="{{ route('layanan') }}">Layanan Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('produk') ? 'active' : '' }}" href="{{ route('produk') }}">Produk</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('keranjang') ? 'active' : '' }}" href="{{ Route('keranjang') }}" style="position: relative;">
                            Keranjang Anda
                            @if (Auth::user()->Keranjang->where('aktif', 1)->count())
                                <span style="position: absolute; display: flex; justify-content: center; align-items: center; background: hsla(358, 86%, 45%, 1); border-radius: 100rem; width: 1.5rem; height: 1.5rem; font-size: .9rem; top: -.1rem; right: -.1rem; color: white">
                                    {{ Auth::user()->Keranjang->where('aktif', 1)->count() }}
                                </span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('orderhistory') ? 'active' : '' }}" href="{{ Route('orderhistory') }}">Order History</a>
                    </li>
                @endauth
            </ul>

            <div class="d-flex align-items-center gap-3" role="search">
                @if (Auth::user())
                    <div class="dropdown">
                        <div class="text-white dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Auth::user()->name}}
                        </div>
                        <ul class="dropdown-menu " style="background: none !important; border: none !important;">
                            <form method="POST" action="/user-logout">
                            @csrf
                                <li class="dropdown-item">
                                    <button type="submit" class="btn btn-danger"
                                    >
                                    Logout
                                </button>
                                </li>
                            </form>
                        </ul>
                    </div>
                @else
                    <a href="/login"><button class="btn-login rgb-red text-white" type="submit">Login</button></a>
                @endif
                <a href="/keranjang">
                    <h2 class="text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256"><path fill="currentColor" d="M216 64h-40a48 48 0 0 0-96 0H40a16 16 0 0 0-16 16v120a16 16 0 0 0 16 16h176a16 16 0 0 0 16-16V80a16 16 0 0 0-16-16m-88-32a32 32 0 0 1 32 32H96a32 32 0 0 1 32-32m88 168H40V80h40v16a8 8 0 0 0 16 0V80h64v16a8 8 0 0 0 16 0V80h40Z"/></svg>
                    </h2>
                </a>
            </div>
        </div>
    </div>
</nav>
