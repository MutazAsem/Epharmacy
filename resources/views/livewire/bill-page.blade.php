<div style="margin-top: 40px">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            #invoiceToPrint, #invoiceToPrint * {
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
                <p>رقم الفاتورة: 12345</p>
                <p>التاريخ والوقت: 2024-07-05 14:30</p>
            </div>
            <div class="col-md-6 text-left">
                <img src="{{ asset('client/img/logo.png') }}" alt="شعار الشركة"
                    style="max-width: 100px; width: 80px; height: 80px;">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h5>معلومات الفاتورة</h5>
                <p>اسم العميل: محمد علي</p>
                <p>رقم الهاتف: 777000213</p>
                <p>العنوان: شارع 123، مدينة </p>
            </div>
            <div class="col-md-6">
                <br><br>
                <p>الايميل: ali@gmail.com</p>
                <p>اسم الموصل: علي أحمد</p>
            </div>
        </div>

        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>السلعة</th>
                    <th>الوحدة</th>
                    <th>الكمية</th>
                    <th>سعر الوحدة</th>
                    <th>الإجمالي</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>سلعة 1</td>
                    <td>قطعة</td>
                    <td>2</td>
                    <td>50</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>سلعة 2</td>
                    <td>علبة</td>
                    <td>1</td>
                    <td>30</td>
                    <td>30</td>
                </tr>
            </tbody>
        </table>

        <div class="row">
            <div class="col-md-12 text-right">
                <h5>الإجمالي: <span id="total-amount">130</span></h5>
            </div>
        </div>

        <div class="invoice-footer mt-4" style="background-color: #f8f9fa; padding: 10px;">
            <p>ملاحظة: هذه الفاتورة تشمل الضرائب.</p>
        </div>

    </div>

    <button class="btn btn-primary no-print" onclick="printInvoice()">طباعة الفاتورة</button>

    <script>
        function printInvoice() {
            window.print();
        }
    </script>

</div>
