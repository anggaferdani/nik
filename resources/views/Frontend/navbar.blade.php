<link rel="stylesheet" href="{{asset('../Css/Frontend/navbar.css')}}">                                                            

<nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#" >
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
          @if (Auth::user())
              
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('orderhistory') ? 'active' : '' }}" href="/order-history">Order History</a>
          </li>
          @endif
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
          {{-- <a href="">
            <h2 class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22q-2.05 0-3.875-.788t-3.187-2.15t-2.15-3.187T2 12q0-2.075.788-3.887t2.15-3.175t3.187-2.15T12 2q2.075 0 3.888.788t3.174 2.15t2.15 3.175T22 12q0 2.05-.788 3.875t-2.15 3.188t-3.175 2.15T12 22m0-2.05q.65-.9 1.125-1.875T13.9 16h-3.8q.3 1.1.775 2.075T12 19.95m-2.6-.4q-.45-.825-.787-1.713T8.05 16H5.1q.725 1.25 1.813 2.175T9.4 19.55m5.2 0q1.4-.45 2.488-1.375T18.9 16h-2.95q-.225.95-.562 1.838T14.6 19.55M4.25 14h3.4q-.075-.5-.112-.987T7.5 12t.038-1.012T7.65 10h-3.4q-.125.5-.187.988T4 12t.063 1.013t.187.987m5.4 0h4.7q.075-.5.113-.987T14.5 12t-.038-1.012T14.35 10h-4.7q-.075.5-.112.988T9.5 12t.038 1.013t.112.987m6.7 0h3.4q.125-.5.188-.987T20 12t-.062-1.012T19.75 10h-3.4q.075.5.113.988T16.5 12t-.038 1.013t-.112.987m-.4-6h2.95q-.725-1.25-1.812-2.175T14.6 4.45q.45.825.788 1.713T15.95 8M10.1 8h3.8q-.3-1.1-.775-2.075T12 4.05q-.65.9-1.125 1.875T10.1 8m-5 0h2.95q.225-.95.563-1.838T9.4 4.45Q8 4.9 6.912 5.825T5.1 8"/></svg>
            </h2>
          </a> --}}
        </div>
      </div>
    </div>
</nav>
