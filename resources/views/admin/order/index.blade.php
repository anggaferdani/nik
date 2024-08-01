@extends('admin.layout')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="w-100">Order</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped w-100" id="kategori">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($orders as $order)
                            <tr>
                              <td>{{ ($orders->currentPage() - 1) * $orders->perPage() + $loop->iteration }}</td>
                              <td>
                                @if($order->status == 'pending')
                                  <div class="btn btn-primary">Pending</div>
                                @else
                                  <div class="btn btn-success">Success</div>
                                @endif
                              </td>
                              <td>{{ $order->created_at }}</td>
                              <td>{{ $order->nama }}</td>
                              <td>{{ $order->email }}</td>
                              <td>
                                <button type="button" class="btn btn-icon btn-primary" data-toggle="modal" data-target="#editModal{{ $order->id }}"><i class="fa-solid fa-eye"></i></button>
                                @if($order->status == 'pending')
                                  <a href="{{ route('admin.order.verify', $order->id) }}" class="btn btn-danger verify">Verify</a>
                                @endif
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                      {{ $orders->appends(request()->query())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($orders as $order)
<div class="modal fade" id="editModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
@endforeach
@endsection
