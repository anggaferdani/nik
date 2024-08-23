<style>
  body,
  table,
  td,
  a {
    -webkit-text-size-adjust: 100%;
    -ms-text-size-adjust: 100%;
  }
  table,
  td {
    mso-table-lspace: 0pt;
    mso-table-rspace: 0pt;
  }
  img {
    -ms-interpolation-mode: bicubic;
  }
  img {
    border: 0;
    height: auto;
    line-height: 100%;
    outline: none;
    text-decoration: none;
  }
  table {
    border-collapse: collapse !important;
  }
  body {
    height: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
    width: 100% !important;
  }
  a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
  }
  div[style*="margin: 16px 0;"] {
    margin: 0 !important;
  }
</style>
<body style="background-color: #f7f5fa; margin: 0 !important; padding: 0 !important;">
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
      <td bgcolor="#426899" align="center">
        <table border="0" cellpadding="0" cellspacing="0" width="480">
          <tr>
            <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
              <img src="{{ asset('Images/logonik-hd.png') }}" alt="">
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="480">
          <tr>
            <td bgcolor="#ffffff" align="left">
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th align="left" valign="top"
                    style="padding-left:15px; padding-right:15px;padding-bottom:0px; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px;">
                    Nama</th>
                  <td align="left" valign="top"
                    style="padding-left:15px;padding-right:30px; padding-bottom:0px;font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px;">
                    {{ $nama }}</td>
                </tr>
                <tr>
                  <th align="left" valign="top"
                    style="padding-left:15px; padding-right:15px;padding-bottom:0px; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px;">
                    Email</th>
                  <td align="left" valign="top"
                    style="padding-left:15px;padding-right:30px; padding-bottom:0px;font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px;">
                    {{ $email }}</td>
                </tr>
                <tr>
                  <th align="left" valign="top"
                    style="padding-left:15px; padding-right:15px;padding-bottom:0px; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px;">
                    No. Telp</th>
                  <td align="left" valign="top"
                    style="padding-left:15px;padding-right:30px; padding-bottom:0px;font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px;">
                    {{ $no_telp }}</td>
                </tr>
                <tr>
                  <th align="left" valign="top"
                    style="padding-left:15px; padding-right:15px;padding-bottom:0px; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px;">
                    Alamat</th>
                  <td align="left" valign="top"
                    style="padding-left:15px;padding-right:30px; padding-bottom:0px;font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px;">
                    {{ $alamat }}</td>
                </tr>
                <tr>
                  <th align="left" valign="top"
                    style="padding-left:15px; padding-right:15px;padding-bottom:30px; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px;">
                    Order Item</th>
                  <td align="left" valign="top"
                    style="padding-left:15px;padding-right:30px; padding-bottom:30px;font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px;">
                    <table width="100%" border="1" cellspacing="0" cellpadding="10"
                      style="border-collapse: collapse; border: 1px solid #dddddd;">
                      <tr>
                        <th align="left"
                          style="padding-bottom:10px; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px; border: 1px solid #dddddd;">
                          Nama Barang
                        </th>
                        <th align="left"
                          style="padding-bottom:10px; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px; border: 1px solid #dddddd;">
                          Jumlah
                        </th>
                        <th align="left"
                          style="padding-bottom:10px; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px; border: 1px solid #dddddd;">
                          Total Harga
                        </th>
                      </tr>
                      @php
                        $grandTotal = 0;
                      @endphp
                      @foreach($orderItems as $item)
                      @php
                        $totalPrice = $item->qty * $item->produk->harga;
                        $grandTotal += $totalPrice;
                      @endphp
                      <tr>
                        <td align="left"
                          style="padding-bottom:10px; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px; border: 1px solid #dddddd;">
                          {{ $item->produk->nama }}
                        </td>
                        <td align="left"
                          style="padding-bottom:10px; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px; border: 1px solid #dddddd;">
                          {{ $item->qty }}
                        </td>
                        <td align="left"
                          style="padding-bottom:10px; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px; border: 1px solid #dddddd;">
                          Rp. {{ number_format($totalPrice, 2) }}
                        </td>
                      </tr>
                      @endforeach
                      <tr>
                        <td colspan="2"
                          style="padding-top:10px; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px; text-align: right; border: 1px solid #dddddd;">
                          <strong>Total Harga:</strong>
                        </td>
                        <td align="left"
                          style="padding-top:10px; font-family: Helvetica, Arial, sans-serif; font-size: 13px; font-weight: 400; line-height: 25px; border: 1px solid #dddddd;">
                          Rp. {{ number_format($grandTotal, 2) }}
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>