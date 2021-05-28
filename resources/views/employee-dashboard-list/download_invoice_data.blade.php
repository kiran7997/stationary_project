
    <div class="card invoice-preview-card">
        <div class="card-body invoice-padding pb-0">
            <!-- Header starts -->
            <table style="width: 100%;border-collapse:none;">
                <tr style="width: 100%">
                    <td>
                        <img src="http://msb.shubhamhospitality.in/logo/msb.png" height="55" >
                    </td>
                    <td></td>
                    <td>
                        Invoice <span class="invoice-number">#3492</span>
                    </td>
                </tr>
                <tr style="width: 100%">
                    <td>Office 149, 450 South Brand Brooklyn</td>
                    <td></td>
                    <td>Date Issued: {{$order_list->order_date}}</td>
                </tr>
                <tr style="width: 100%">
                    <td>San Diego County, CA 91905, USA</td>
                    <td></td>
                    <td>Due Date:{{$order_list->arrival_date}}</td>
                </tr>
                <tr style="width: 100%">
                    <td>+1 (123) 456 7891, +44 (876) 543 2198</td>
                </tr>
            </table>
        <hr class="invoice-spacing" />

        <table style="width: 100%;border-collapse:none;">
            <tr style="width: 100%">
                <td>Invoice To:</td>
                <td></td>
                <td>Payment Details:</td>
            </tr>  
            <tr style="width: 100%">
                <td>Thomas shelby</td>
                <td></td>
                <td>Total Due: $12,110.55</td>
            </tr>
            <tr style="width: 100%">
                <td>Shelby Company Limited</td>
                <td></td>
                <td>Bank name: American Bank</td>
            </tr>
            <tr style="width: 100%">
                <td>Small Heath, B10 0HF, UK</td>
                <td></td>
                <td>Country: United States</td>
            </tr>
            <tr style="width: 100%">
                <td>718-986-6062</td>
                <td></td>
                <td>IBAN: ETD95476213874685</td>
            </tr>
            <tr style="width: 100%">
                <td>peakyFBlinders@gmail.com</td>
                <td></td>
                <td>SWIFT code: BR91905</td>
            </tr>
        </table>

        <hr class="invoice-spacing" />
        <div class="table-responsive">
            <table style="width: 100%;border-collapse:none;">
                <tr style="width: 100%">
                    <td><b>Item</b></td>
                    <td><b>Qty</b></td>
                    <td><b>Total</b></td>
                </tr>
                <?php if(count($order_item_data)>0){ ?>
                @foreach($order_item_data as $item)
                <tr style="width: 100%">
                    <td>{{$item->product_name}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>Rs.{{$item->amount}}</td>
                </tr>
                @endforeach
                <?php } ?>
            </table>
        </div>
        <hr class="invoice-spacing" />
        <table style="width: 100%;border-collapse:none;">
            <tr style="width: 100%">
                <td>Salesperson : {{$order_list->name}}</td>
                <td>Subtotal : $1800</td>
            </tr>
            <tr style="width: 100%">
                <td></td>
                <td>Discount : $28</td>
            </tr>
            <tr style="width: 100%">
                <td></td>
                <td>Tax : 21%</td>
            </tr>
            <tr style="width: 100%">
                <td></td>
                <td>Total : $1690</td>
            </tr>
        </table>

        <!-- Invoice Description ends -->


        <!-- Invoice Note ends -->
    </div>
</div>