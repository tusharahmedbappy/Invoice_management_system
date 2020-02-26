@include('pages.header')
<div class="container my-5">
    <div class="row">
        <div class="col-md-10 border p-3 m-auto shadow-sm">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="">From <hr></h3>
                            <div class="invoice_header">
                                <?php
                                   $session_data = Session::get('invoice_serial_no');
                                    if ($session_data){
                                        $from_and_to_data = DB::table('from_and_to')->where('invoice_serial',$session_data)->get();
                                    }

                                ?>
                                @foreach ($from_and_to_data as $data)
                                    <p class=""><span>Company name : </span> {{$data->from_company}}</p>
                                    <p class=""><span>Owner name : </span> {{$data->from_company_owner}}</p>
                                    <p class=""><span>Address : </span> {{$data->from_company_address}}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-3 text-center ">
                            <p class="bg-info text-white border"><span>Invoice no : </span> {{$data->invoice_serial}}</p>
                        </div>
                        <div class="col-md-5">
                            <h3 class="">To <hr></h3>
                            <div class="invoice_header">
                                @foreach ($from_and_to_data as $data)
                                    <p class=""><span>Company name : </span> {{$data->to_company}}</p>
                                    <p class=""><span>Owner name : </span> {{$data->to_company_owner}}</p>
                                    <p class=""><span>Address : </span> {{$data->to_company_address}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 py-2  m-auto">
                    <div class="row">
                        <div class="col-md-4"><hr></div>
                        <div class="middle">
                            <i class="la la-pagelines"></i>
                        </div>
                        <div class="col-md-4"><hr></div>
                    </div>
                </div>
            <div class="col-md-12 my-5">
                <form action="{{url('/add-item')}}" method="post">
                    @csrf
                    <table  class="table ">
                        <tbody>
                            <tr id="row">
                                <td>
                                    <small class="text-danger">
                                        @if (session('item_no'))
                                            {{session('item_no')}}
                                        @endif
                                    </small>
                                    <input type="text"
                                           class="form-control"
                                           name="item_no"
                                           placeholder="Item no"
                                    >
                                </td>
                                <td>
                                    <small class="text-danger">
                                        @if (session('item_name'))
                                            {{session('item_name')}}
                                        @endif
                                    </small>
                                    <input type="text"
                                           class="form-control"
                                           name="item_name"
                                           placeholder="Item name"
                                    >
                                </td>
                                <td>
                                    <small class="text-danger">
                                        @if (session('quantity'))
                                            {{session('quantity')}}
                                        @endif
                                    </small>
                                    <input type="text"
                                           class="form-control"
                                           name="quantity"
                                           id="quantity"
                                           placeholder="Quantity"
                                    >
                                </td>
                                <td>
                                    <small class="text-danger">
                                        @if (session('price'))
                                            {{session('price')}}
                                        @endif
                                    </small>
                                    <input type="text"
                                           class="form-control"
                                           name="price"
                                           id="price"
                                           placeholder="Price"
                                    >
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success">Add</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            <form action="{{url('/save-invoice')}}" method="post">
                @csrf
                    <div class="">
                        <?php
                        $get_item = DB::table('add_item')->get();
                        $row = DB::table('add_item')->count();

                        ?>
                        <table  class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th width="3%" scope="col"><span class="badge badge-success">{{$row}}</span></th>
                                    <th width="15%" scope="col">Item no</th>
                                    <th width="30%" scope="col">Item name</th>
                                    <th width="15%" scope="col">Quantity</th>
                                    <th width="10%"scope="col">Price</th>
                                    <th width="10%"scope="col">Total</th>
                                </tr>
                            </thead>

                            @foreach($get_item as $item)
                            <tbody id="dynamic_field">
                                <tr id="row">
                                    <th scope="row">
                                        <a href="{{url('/delete',[$item->id])}}" class="text-danger delete">
                                            <i class="la la-trash"></i>
                                        </a>
                                    </th>
                                    <td>
                                        <input type="text"
                                               class="form-control"
                                               name="item_no"
                                               value="{{$item->item_no}}"
                                        >
                                    </td>
                                    <td>
                                        <input type="text"
                                               class="form-control"
                                               name="item_name"
                                               value="{{$item->item_name}}"
                                        >
                                    </td>
                                    <td>
                                        <input type="text"
                                               class="form-control"
                                               name="quantity"
                                               id="quantity"
                                               value="{{$item->quantity}}"
                                        >
                                    </td>
                                    <td>
                                        <input type="text"
                                               class="form-control"
                                               name="price"
                                               id="price"
                                               value="{{$item->price}}"
                                        >
                                    </td>
                                    <td>
                                        <input type="text"
                                               class="form-control total"
                                               name="total"
                                               id="total"
                                               value="{{$item->total}}"
                                               autocomplete="off"
                                        >
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>

                    {{--        next section--}}

                    <div class="col-md-12 my-5">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="text-success">Notice</h3>
                                <div class="m-3">
                                    <textarea placeholder="Your notice" rows="7" name="notice" class="form-control" id=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-5 m-auto">
                                <div class="row">
                                    <?php
                                        $get_item = DB::table('add_item')->get();

                                            $subtotal = 0;

                                            foreach ($get_item as $sub){
                                                $total_amount = $sub->total;
                                                $subtotal = $total_amount + $subtotal;

                                            }

                                    ?>
                                    <label for="" class="col-md-4">Subtotal:</label>
                                    <div class="col-md-8 customer_info">
                                        <input type="text"
                                               class="form-control subtotal"
                                               name="subtotal"
                                               id="subtotal"
                                               autocomplete="off"
                                               required
                                               value="{{$subtotal}}"

                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="" class="col-md-4">Tax Rate:</label>
                                    <div class="col-md-8 customer_info">
                                        <input type="text"
                                               class="form-control tax_rate"
                                               name="tax_rate"
                                               placeholder="%"
                                               id="tax_rate"
                                               autocomplete="off"
                                               required
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="" class="col-md-4">Tax amount:</label>
                                    <div class="col-md-8 customer_info">
                                        <input type="text"
                                               class="form-control tax_amount"
                                               name="tax_amount"
                                               id="tax_amount"
                                               autocomplete="off"
                                               required
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="" class="col-md-4">Total amount:</label>
                                    <div class="col-md-8 customer_info">
                                        <input type="text"
                                               class="form-control total_amount"
                                               name="total_amount"
                                               id="total_amount"
                                               autocomplete="off"
                                               required
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="" class="col-md-4">Paid amount:</label>
                                    <div class="col-md-8 customer_info">
                                        <input type="text"
                                               class="form-control paid_amount"
                                               name="paid_amount"
                                               autocomplete="off"
                                               id="paid_amount"
                                               required
                                        >
                                    </div>
                                </div>
                                <div class="row">
                                    <label for="" class="col-md-4">Due amount:</label>
                                    <div class="col-md-8 customer_info">
                                        <input type="text"
                                               class="form-control due_amount"
                                               name="due_amount"
                                               id="due_amount"
                                               autocomplete="off"
                                               required
                                        >
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Save invoice</button>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.total_amount').click(function () {
            var subtotal = $("#subtotal").val();
            var tax_amount = $("#tax_amount").val();
            var total_amount = ((+subtotal)+(+tax_amount));
            $("#total_amount").val(total_amount);
        });

        $(".tax_amount").click(function () {
            var subtotal = $("#subtotal").val();
            var tax_rate = $("#tax_rate").val();
            var tax_amount = (subtotal / 100)*tax_rate;
            $("#tax_amount").val(tax_amount);
        });



        $('.due_amount').click(function () {
            var total_amount = $("#total_amount").val();
            var paid_amount = $("#paid_amount").val();
            var due_amount = (total_amount-paid_amount);
            $("#due_amount").val(due_amount);
        });
    });
</script>
@include('pages.header')

