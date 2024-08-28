<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Email Template</title>
</head>
<body style="background-color: #f7f5fa; margin: 0; padding: 0; width: 100%;">

  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td bgcolor="#426899" align="center" style="padding: 40px 10px;">
        <img src="{{ $message->embed('Images/logonik-hd.png') }}" alt="Logo" style="display: block; border: 0; outline: none; text-decoration: none; height: auto; line-height: 100%; max-width: 100%;">
      </td>
    </tr>

    <tr>
      <td bgcolor="#f4f4f4" align="center" style="padding: 10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="480" style="width: 100%; max-width: 480px;">
          <tr>
            <td bgcolor="#ffffff" align="left" style="padding: 20px; font-family: Arial, sans-serif; font-size: 14px; line-height: 20px; color: #333333;">
              <p style="margin: 0 0 10px 0;"><strong>ID:</strong> {{ $id }}</p>
              <p style="margin: 0 0 10px 0;"><strong>Nama:</strong> {{ $nama }}</p>
              <p style="margin: 0 0 10px 0;"><strong>Email:</strong> {{ $email }}</p>
              <p style="margin: 0 0 10px 0;"><strong>No. Telp:</strong> {{ $no_telp }}</p>
              <p style="margin: 0 0 10px 0;"><strong>Alamat:</strong> {{ $alamat }}</p>

              <table width="100%" border="1" cellspacing="0" cellpadding="10" style="border-collapse: collapse; border: 1px solid #dddddd;">
                <tr>
                  <th align="left" style="font-family: Arial, sans-serif; font-size: 13px; font-weight: normal; border: 1px solid #dddddd;">Nama Barang</th>
                  <th align="left" style="font-family: Arial, sans-serif; font-size: 13px; font-weight: normal; border: 1px solid #dddddd;">Jumlah</th>
                  <th align="left" style="font-family: Arial, sans-serif; font-size: 13px; font-weight: normal; border: 1px solid #dddddd;">Total Harga</th>
                </tr>
                @php $grandTotal = 0; @endphp
                @foreach($orderItems as $item)
                @php
                  $totalPrice = $item->qty * $item->produk->harga;
                  $grandTotal += $totalPrice;
                @endphp
                <tr>
                  <td style="font-family: Arial, sans-serif; font-size: 13px; border: 1px solid #dddddd;">{{ $item->produk->nama }}</td>
                  <td style="font-family: Arial, sans-serif; font-size: 13px; border: 1px solid #dddddd;">{{ $item->qty }}</td>
                  <td style="font-family: Arial, sans-serif; font-size: 13px; border: 1px solid #dddddd;">Rp. {{ number_format($totalPrice, 2) }}</td>
                </tr>
                @endforeach
                <tr>
                  <td colspan="2" style="text-align: right; font-family: Arial, sans-serif; font-size: 13px; border: 1px solid #dddddd;"><strong>Total Harga:</strong></td>
                  <td style="font-family: Arial, sans-serif; font-size: 13px; border: 1px solid #dddddd;">Rp. {{ number_format($grandTotal, 2) }}</td>
                </tr>
              </table>

              <p style="margin: 20px 0 0 0;"><strong>Bukti Bayar:</strong></p>
              <img src="{{ $message->embed($buktiBayar) }}" alt="Bukti Bayar" style="display: block; border: 0; outline: none; text-decoration: none; height: auto; line-height: 100%; max-width: 100%; margin-top: 10px;">
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>
