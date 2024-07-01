@extends('Frontend.main')
@section('title', 'Order History')
<link rel="stylesheet" href="{{asset('../Css/Frontend/orderhistory.css')}}"> 
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}"> 
    
@section('content')
    
    
    <div class="container my-5">
        <h4 class="text-white daftar-order">Daftar Order</h4>
            @foreach ($order as $item)
                
        <div class="foreach-daftar-order d-flex align-items-center justify-content-between my-2">
            <div class="left-for d-flex align-items-center gap-3">
                
                <div class="text-white">
                    <h1>{{$item->nama}}</h1>
                    <p>{{$item->total_item}} Item</p>
                    <div class="d-flex align-items-center gap-2 mb-2">
                        @foreach ($item->order_item as $i)
                            
                        <div class="bg-light px-2 py-1 br-5">
                            <p class="text-black">
                                {{$i->nama_produk}}
                            </p>
                        </div>
                        @endforeach
                       
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
        
    </div>
    @if (session('success'))
        <script>
            alert('{{session('success')}}')
        </script>
    @endif
        
@endsection