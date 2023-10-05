<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
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

        .invoice-box table tr.item td {
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

        /* Style the table rows with a bottom border */
        .total {
            position: relative;
            padding-bottom: 5px; /* Adjust the spacing between text and underline as needed */
            text-align: right;
            /* Align the text to the right */
        }

        /* Apply the underline style to all rows except the last one */
        .total:not(:last-child)::after {
            content: "";
            position: absolute;
            bottom: 0;
            right: 0; /* Align the underline to the right */
            width: 30%; /* Adjust the width of the underline as needed */
            height: 2px; /* Adjust the thickness of the underline as needed */
            background-color: rgba(204, 204, 204, 0.7); /* Lighter color */
        }



        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>


<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="4">
                <table>
                    <tr>
                        <td class="title">
                            <img src="{{asset('/')}}uploads/logo.svg" style="width: 100%; max-width: 300px" />
                        </td>

                        <td>
                            Invoice #: 00{{$order->id}}<br />
                            Order Date: {{$order->order_date}}<br />
                            Invoice Date: {{date('Y-m-d')}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="4">
                <table>
                    <tr>
                        <td>
                            <h4><u>Delivery Address</u></h4>
                            {{$order->customer->name}}<br />
                            {{$order->customer->mobile}}<br />
                            {{$order->delivery_address}}
                        </td>
                        <td>
                            <h4><u>Company Address</u></h4>
                            Shopgrids Inc.<br />
                            Dhaka,Bangladesh<br />
                            shop.grids@yahoo.com
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td colspan="3">Payment Method</td>
            <td>Check #</td>
        </tr>
        <tr class="details">
            <td colspan="3">{{$order->payment_type}}</td>
            <td>{{$order->order_total}}</td>
        </tr>

        <tr class="heading">
            <td>Item</td>
            <td style="text-align: center;">Quantity</td>
            <td style="text-align: center;">Unit Price</td>
            <td align="right">Total</td>
        </tr>
        @php($sum=0)
        @foreach($order->orderDetails as $orderDetail)
            <tr class="item">
                <td>{{$orderDetail->product_name}}</td>
                <td style="text-align: center;">{{$orderDetail->product_quantity}}</td>
                <td style="text-align: center;">{{$orderDetail->product_price}}</td>
                <td align="right">{{$orderDetail->product_price * $orderDetail->product_quantity}}</td>
            </tr>
            @php($sum = $sum + ($orderDetail->product_price * $orderDetail->product_quantity))
        @endforeach
        <tbody align="right">
        <tr class="total">
            <td colspan="4">Order Total: {{$sum}}</td>
        </tr>
        <tr class="total">
            <td colspan="4">Tax Total (15%): {{$order->tax_total}}</td>
        </tr>
        <tr class="total">
            <td colspan="4">Shipping Total: {{$order->shipping_total}}</td>
        </tr>
        <tr class="total">
            <td colspan="4">Total Payable: {{$order->order_total}}</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
