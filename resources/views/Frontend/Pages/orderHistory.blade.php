@extends('Frontend.main')
@section('title', 'Order History')
<link rel="stylesheet" href="{{asset('../Css/Frontend/orderhistory.css')}}">
<link rel="stylesheet" href="{{asset('../Css/Frontend/global.css')}}">

@section('content')
    <div class="container my-5">
        <h4 class="text-white daftar-order">Daftar Order</h4>
        @forelse ($orders as $order)
        <div class="border border-3 p-3 mb-1">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-white mb-1">Order tanggal : {{ $order->created_at }}</div>
                <div>
                    @if($order->status == 'pending')
                        <div class="btn btn-primary">Status : Pending</div>
                    @else
                        <div class="btn btn-success">Status : Success</div>
                    @endif
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal{{ $order->id }}">Detail</button>
                </div>
            </div>
        </div>
        @empty
            <div class="xy-center" style="height: 25rem">
                <div class="text-white" style="display: flex; flex-direction: column; justify-content: center; align-items: center; gap: 1rem;">Histori order anda kosong</div>
            </div>
        @endforelse
    </div>

    @foreach ($orders as $order)
    <div class="modal fade" id="detailModal{{ $order->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('submit-order') }}" method="POST" enctype="multipart/form-data" class="mb-0">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Data Pemesanan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td style="width: 50%;">Nama</td>
                                <td>{{ $order->nama }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Email</td>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">No. Telp</td>
                                <td>{{ $order->no_telp }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Alamat</td>
                                <td>{{ $order->alamat }}</td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Bukti Bayar</td>
                                <td><a href="/bukti-bayar/{{ $order->bukti_bayar }}" target="_blank">{{ $order->bukti_bayar }}</a></td>
                            </tr>
                            @php
                                $totalAmount = 0;
                            @endphp
                            <tr>
                              <td style="width: 50%;">Produk</td>
                              <td>
                                @foreach ($order->order_item as $orderItem)
                                @php
                                  $totalAmount += $orderItem->produk->harga * $orderItem->qty;
                                @endphp
                                    <div class="d-flex">
                                      <div><img src="/produk/file/{{ $orderItem->produk->file }}" class="img-fluid" width="100" alt=""></div>
                                      <div>
                                        <div>Produk : {{ $orderItem->produk->nama }}</div>
                                        <div>Qty : {{ $orderItem->qty }}</div>
                                        <div>Total : Rp. {{ number_format($orderItem->produk->harga * $orderItem->qty, 0, ',', '.') }}</div>
                                      </div>
                                    </div>
                                @endforeach
                              </td>
                            </tr>
                            <tr>
                                <td style="width: 50%;">Total</td>
                                <td>Rp. {{ number_format($totalAmount, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    @endforeach
@endsection
