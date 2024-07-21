<div style="margin-top: 40px">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #invoiceToPrint,
            #invoiceToPrint * {
                visibility: visible;
            }

            #invoiceToPrint {
                position: absolute;
                left: 0;
                top: 0;
            }

            .no-print {
                display: none;
            }
        }
    </style>
    <div class="container mt-5" id="invoiceToPrint" style="direction: rtl; text-align: right;">
        <div class="invoice-header row" style="background-color: #f8f9fa; padding: 10px;">
            <div class="col-md-6 text-right">
                <h4>فاتورة</h4>
                <p>رقم الفاتورة: {{ $bill->id }}</p>
                <p>التاريخ والوقت: {{ $bill->created_at }}</p>
            </div>
            <div class="col-md-6 text-left">
                <img src="{{ asset('client/img/logo.png') }}" alt="شعار الشركة"
                    style="max-width: 100px; width: 80px; height: 80px;">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h5>معلومات الفاتورة</h5>
                <p>اسم العميل: {{ $bill->client_order->name}} {{ $bill->client_order->last_name}}</p>
                <p>رقم الهاتف: {{ $bill->client_order->mobile}}</p>
                <p>العنوان: {{$bill->order_address->description}}،{{$bill->order_address->city}} </p>
            </div>
            <div class="col-md-6">
                <br><br>
                <p>الايميل: {{ $bill->client_order->email}}</p>
                <p>اسم الموصل: {{ $bill->order_delivery->name}}</p>
            </div>
        </div>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>اسم المنتج</th>
                    <th>الوحدة</th>
                    <th>الكمية</th>
                    <th>سعر الوحدة</th>
                    <th>الإجمالي</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->order_product_item->name }}</td>
                    <td>{{ $item->order_measurement_unit->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->unit_price }}</td>
                    <td>{{ $item->total_product_price }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-12 text-right">
                <h5>الإجمالي: <span id="total-amount">{{ $bill->total_price }}</span></h5>
            </div>
        </div>

        <div class="invoice-footer mt-4" style="background-color: #f8f9fa; padding: 10px;">
            <p>ملاحظة: {{ $bill->note }}.</p>
        </div>

    </div>

    <button class="btn btn-primary no-print" onclick="printInvoice()">طباعة الفاتورة</button>

    <script>
        function printInvoice() {
            window.print();
        }
    </script>

</div>
