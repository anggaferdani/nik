@extends('admin.layout')
@section('content')
<div class="section-body">
    <div class="invoice">
        <div class="invoice-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-title">
                        <h2>Detail Order</h2>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <address>
                                <strong>Info Pemesan:</strong><br>
                                Nama : {{$order->nama}}<br>
                                No Telp : 0{{$order->no_telp}}<br>
                                Alamat : {{$order->alamat}}<br>
                            </address>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <address>
                                <strong>Bukti Pembayaran:</strong>
                                <br>
                                <a href="/storage/image/{{$order->bukti_bayar}}" target="_blank"><img src="/storage/image/{{$order->bukti_bayar}}" style="width: 100px; height: 100px; box-shadow: rgba(0, 0, 0, 0.16) 0px 2px 2px; margin: 5px; padding: 0.25rem; border: 1px solid #dee2e6;"></a>
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 ">
                            <address>
                                <strong>Order Date:</strong><br>
                                {{ date('d M Y', strtotime($order->created_at)) }}<br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="section-title">Produk Order</div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItems as $item)
                                <tr>
                                    <td>{{$item->nama_produk}}</td>
                                    <td class="text-center">Rp {{number_format($item->harga,0,',','.')}}</td>
                                    <td class="text-center">{{$item->qty}}</td>
                                    <?php
                                        $qty_x_harga = $item->harga * $item->qty
                                    ?>
                                    <td class="text-right">Rp {{number_format($qty_x_harga,0,',','.')}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-8">
                        </div>
                        <div class="col-lg-4 text-right">
                            <hr class="mt-2 mb-2">
                            <div class="invoice-detail-item">
                                <div class="invoice-detail-name">SubTotal</div>
                                <div class="invoice-detail-value invoice-detail-value-lg">Rp
                                    {{number_format($subtotal,0,',','.')}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
@endsection
