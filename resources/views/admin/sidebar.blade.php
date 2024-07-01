<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">NIK</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        {{-- <a href="#">W</a> --}}
        <img src="/assets/img/LogoWin-Shop.png" style="width: 40px; height: 40px;" alt="">
      </div>
      <ul class="sidebar-menu">
          {{-- <li class="{{ request()->routeIs('promosi') ? 'active' : '' }}"><a href="{{route('promosi')}}"><i class="fas fa-tags"></i><span>Promo Produk</span></a></li> --}} 
          <li><a href="/admin/dashboard"><i class="fas fa-th-large"></i><span>Dashboard</span></a></li>
          <li><a href="/admin/kategori-produk"><i class="fas fa-th-large"></i><span>Kategori Produk</span></a></li>
          <li><a href="/admin/produk"><i class="fas fa-th-large"></i><span>Produk</span></a></li>
          <li><a href="/admin/order"><i class="fas fa-th-large"></i><span>Order</span></a></li>
      </ul>
      
    </aside>
  </div>