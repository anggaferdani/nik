<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <img src="{{ asset('sat.png') }}" class="img-fluid" width="130" style="" alt="">
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <img src="{{ asset('sat.png') }}" class="img-fluid" width="" style="" alt="">
      </div>
      <ul class="sidebar-menu">
          {{-- <li class="{{ request()->routeIs('promosi') ? 'active' : '' }}"><a href="{{route('promosi')}}"><i class="fas fa-tags"></i><span>Promo Produk</span></a></li> --}} 
          <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><a href="/admin/dashboard"><i class="fas fa-th-large"></i><span>Dashboard</span></a></li>
          <li class="{{ Route::is('company-profile.*') ? 'active' : '' }}"><a href="{{ route('company-profile.index') }}"><i class="fas fa-th-large"></i><span>Company Profile</span></a></li>
          <li class="{{ Route::is('admin.layanan.*') ? 'active' : '' }}"><a href="{{ route('admin.layanan.index') }}"><i class="fas fa-th-large"></i><span>Layanan</span></a></li>
          <li class="{{ Route::is('admin.partner.*') ? 'active' : '' }}"><a href="{{ route('admin.partner.index') }}"><i class="fas fa-th-large"></i><span>Partner</span></a></li>
          <li class="{{ request()->routeIs('kategori-produk') ? 'active' : '' }}"><a href="/admin/kategori-produk"><i class="fas fa-th-large"></i><span>Kategori Produk</span></a></li>
          <li class="{{ Route::is('admin.produk.*') ? 'active' : '' }}"><a href="{{ route('admin.produk.index') }}"><i class="fas fa-th-large"></i><span>Produk</span></a></li>
          {{-- <li class="{{ request()->routeIs('produk') ? 'active' : '' }}"><a href="/admin/produk"><i class="fas fa-th-large"></i><span>Produk</span></a></li> --}}
          <li class="{{ Route::is('admin.order.*') ? 'active' : '' }}"><a href="{{ route('admin.order.index') }}"><i class="fas fa-th-large"></i><span>Order</span></a></li>
      </ul>
      
    </aside>
  </div>