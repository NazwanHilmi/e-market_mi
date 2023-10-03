<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice #{{ $pembelian->invoice }}</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }
        
        .invoice-box table {
            width: 100%;
            line-height: normal; /* inherit */
            text-align: left;
        }
        
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        
        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }
        
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        
        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }
        
        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        
        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }
        
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        
        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }
            
            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
        
        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }
        
        .rtl table {
            text-align: right;
        }
        
        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
        </style>
</head>
<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://daengweb.id/front/dw-theme/images/logo-head.png" width="150px">
                            </td>
                            
                            <td>
                                Invoice : <strong>#{{ $pembelian->invoice }}</strong><br>
                                {{ $pembelian->created_at }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <strong>PENERIMA</strong><br>
                                {{ $pembelian->customer_name }}<br>
                                {{ $pembelian->customer_phone }}<br>
                                {{ $pembelian->customer_address }}<br>
                                {{ $pembelian->district->name }}, {{ $pembelian->district->city->name }} {{ $pembelian->postal_code }}<br>
                                {{ $pembelian->district->city->province->name }}
                            </td>
                            
                            <td>
                                <strong>PENGIRIM</strong><br>
                                Daengweb<br>
                                085343966997<br>
                                Jl Sultan Hasanuddin<br>
                                Somba Opu, Kab Gowa<br>
                                Sulawesi Selatan
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>Produk</td>
                <td>Subtotal</td>
            </tr>
            
            @foreach ($pembelian->details as $row)
            <tr class="item">
                <td>
                    {{ $row->product->name }}<br>
                    <strong>Harga</strong>: Rp {{ number_format($row->price) }} x {{ $row->qty }}
                </td>
                <td>Rp {{ number_format($row->price * $row->qty) }}</td>
            </tr>
            @endforeach
            
            <tr class="total">
                <td></td>
                <td>
                Subtotal: Rp {{ number_format($order->subtotal) }}
                </td>
            </tr>
            
            @if ($order->payment)
            <tr class="total">
                <td></td>
                <td>
                Pembayaran: Rp -{{ number_format($order->payment->amount) }}
                </td>
            </tr>
            <tr>
                <td><strong>Detail Pembayaran</strong></td>
                <td></td>
            </tr>
            <tr>
                <td>Pengirim: {{ $order->payment->name }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Transfer ke: {{ $order->payment->transfer_to }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Tanggal: {{ $order->payment->transfer_date  }}</td>
                <td></td>
            </tr>
            @endif
        </table>
    </div>
</body>
</html>