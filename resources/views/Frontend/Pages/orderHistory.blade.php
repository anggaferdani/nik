@extends('Frontend.main')
@section('title', 'Order History')
<link rel="stylesheet" href="{{asset('../Css/Frontend/orderhistory.css')}}">
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}">

@section('content')
    <div class="container my-5">
        <h4 class="text-white daftar-order">Daftar Order</h4>
        @forelse ($order as $item)
            @foreach ($item->order_item as $i)
                <div class="foreach-daftar-order d-flex align-items-center justify-content-between my-2">
                    <div class="left-for d-flex align-items-center gap-3">
                        <img src="{{ asset('storage/image/'.$item->gambar) }}" alt="">
                        <div class="text-white">
                            <div class="d-flex align-items-center gap-2 mb-2">
                                <div class="bg-light px-2 py-1 br-5">
                                    <p class="text-black">
                                        {{$i->nama_produk}}
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-cyan px-2 py-1 br-5">
                                    <p class="text-black">
                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d F Y') }}
                                    </p>
                                </div>
                                @if ($item->status == 'pending')
                                <div class="bg-red px-2 py-1 br-5">
                                    <p>PENDING</p>
                                </div>
                                @else
                                <div class="bg-success px-2 py-1 br-5">
                                    <p>SUCCESS</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="right-for d-flex align-items-center text-white">
                        <div>
                            <p>Total Harga</p>
                            <h3>Rp {{number_format($item->total_bayar,0,',','.')}} </h3>
                        </div>
                    </div>
                </div>
            @endforeach
        @empty
            <div class="xy-center" style="height: 25rem">
                <div class="text-white" style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 1rem;">
                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-message-report"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 4a3 3 0 0 1 3 3v8a3 3 0 0 1 -3 3h-5l-5 3v-3h-2a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12z" /><path d="M12 8v3" /><path d="M12 14v.01" /></svg>
                    Histori order anda kosong..
                </div>
            </div>
        @endforelse
    </div>
    @if (session('success'))
        <script>
            alert('{{session('success')}}')
        </script>
    @endif

@endsection
