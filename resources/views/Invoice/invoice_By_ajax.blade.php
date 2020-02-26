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
                                    <p class=""><span>Company ID : </span> {{$data->from_company_code}}</p>
                                    <p class=""><span>Company name : </span> {{$data->from_company}}</p>
                                    <p class=""><span>Owner name : </span> {{$data->from_company_owner}}</p>
                                    <p class=""><span>Address : </span> {{$data->from_company_address}}</p>
                                    <p class=""><span>Email : </span> {{$data->from_company_email}}</p>
                                    <p class=""><span>Contact number : </span> {{$data->from_company_number}}</p>
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
                                    <p class=""><span>Company ID : </span> {{$data->from_company_code}}</p>
                                    <p class=""><span>Company name : </span> {{$data->to_company}}</p>
                                    <p class=""><span>Owner name : </span> {{$data->to_company_owner}}</p>
                                    <p class=""><span>Address : </span> {{$data->to_company_address}}</p>
                                    <p class=""><span>Email : </span> {{$data->to_company_email}}</p>
                                    <p class=""><span>Contact number : </span> {{$data->to_company_number}}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 py-2  m-auto">
                    <div class="row">
                        <div class="col-md-4"><hr></div>
                        <i class="la la-pagelines"></i>
                        <div class="col-md-4"><hr></div>
                    </div>
                </div>
                <form action="{{url('/check')}}" method="get">
                    <div class="">
                        <hr>
                        <table  class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th width="3%" scope="col"><input type="checkbox" name="" id=""></th>
                                    <th width="15%" scope="col">Item no</th>
                                    <th width="30%" scope="col">Item name</th>
                                    <th width="15%" scope="col">Quantity</th>
                                    <th width="10%"scope="col">Price</th>
                                    <th width="10%"scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody id="dynamic_field">
                                <tr id="row">
                                    <th scope="row">
                                        <input type="checkbox"
                                               name="check" id=""
                                        ></th>
                                    <td>
                                        <input type="text"
                                               class="form-control"
                                               name="item_no"
                                        >
                                    </td>
                                    <td>
                                        <input type="text"
                                               class="form-control"
                                               name="item_name"
                                        >
                                    </td>
                                    <td>
                                        <input type="text"
                                               class="form-control"
                                               name="quantity"
                                               id="quantity"
                                        >
                                    </td>
                                    <td>
                                        <input type="text"
                                               class="form-control"
                                               name="price"
                                               id="price"
                                        >
                                    </td>
                                    <td>
                                        <input type="text"
                                               class="form-control total"
                                               name="total[]"
                                               id="total"
                                               value=""
                                               autocomplete="off"
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button type="button"  class="btn btn-success add-row"  >Add More</button>
                    <button type="button"  class="btn btn-danger delete-row"  >Remove</button>

                    {{--        next section--}}

                    <div class="col-md-12 my-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Notice</h3>
                                <div class="m-3">
                                    <textarea placeholder="Your notice" rows="7" name="notice" class="form-control" id=""></textarea>
                                </div>
                            </div>
                            <div class="col-md-5 m-auto">
                                <div class="row">
                                    <label for="" class="col-md-4">Subtotal:</label>
                                    <div class="col-md-8 customer_info">
                                        <input type="text"
                                               class="form-control subtotal"
                                               name="subtotal"
                                               id="subtotal"
                                               autocomplete="off"
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
                                        >
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success">Save invoice</button>
            </form>
        </div>
    </div>
</div>



<script>

    // function handlebutton(e){
    //     e.preventDefault();
    // }
    //
    //  $(document).ready(function() {
    //      $(".add-row").click(function () {
    //
    //          var markup = "";
    //          $("table tbody ").append(markup);
    //      });
    //
    //      // Remove field
    //
    //      $(".delete-row").click(function(){
    //          $("table tbody ").find('input[name="check"]').each(function(){
    //              if($(this).is(":checked")){
    //                  $(this).parents("tr").remove();
    //              }
    //          });
    //      });
    //
    //  });
    //
    //  $(document).ready(function () {
    //
    //      $(".total").click(function () {
    //          var quantity = $("#quantity").val();
    //          var price = $("#price").val();
    //          var total_amount = quantity * price;
    //          $("#total").val(total_amount);
    //      });
    //  });

    $(document).ready(function () {
        var i = 1;
        $(".add-row").click(function () {
            i++;

            var field = "<tr id=\"row\">\n" +
                "                                    <th scope=\"row\">\n" +
                "                                        <input type=\"checkbox\"\n" +
                "                                               name=\"check\" id=\"\"\n" +
                "                                        ></th>\n" +
                "                                    <td>\n" +
                "                                        <input type=\"text\"\n" +
                "                                               class=\"form-control\"\n" +
                "                                               name=\"item_no\"\n" +
                "                                        >\n" +
                "                                    </td>\n" +
                "                                    <td>\n" +
                "                                        <input type=\"text\"\n" +
                "                                               class=\"form-control\"\n" +
                "                                               name=\"item_name\"\n" +
                "                                        >\n" +
                "                                    </td>\n" +
                "                                    <td>\n" +
                "                                        <input type=\"text\"\n" +
                "                                               class=\"form-control\"\n" +
                "                                               name=\"quantity[]\"\n" +
                "                                               id=\"quantity'+i+'\"\n" +
                "                                        >\n" +
                "                                    </td>\n" +
                "                                    <td>\n" +
                "                                        <input type=\"text\"\n" +
                "                                               class=\"form-control\"\n" +
                "                                               name=\"price[]\"\n" +
                "                                               id=\"price'+i+'\"\n" +
                "                                        >\n" +
                "                                    </td>\n" +
                "                                    <td>\n" +
                "                                        <input type=\"text\"\n" +
                "                                               class=\"form-control total\"\n" +
                "                                               name=\"total[]\"\n" +
                "                                               id=\"total'+i+'\"\n" +
                "                                               value=\"\"\n" +"                                               " +
                "                                               autocomplete=\"off\"\n" +
                "                                        >\n" +
                "                                    </td>\n" +
                "                                </tr>";
            $('#dynamic_field').append(field);


        });
                $("#total").click(function () {
                    var quantity = $("#quantity").val();
                    var price = $("#price").val();
                    var total_amount = quantity * price;
                    $("#total").val(total_amount);
                });

        // Remove field

             $(".delete-row").click(function(){
                 $("table tbody ").find('input[name="check"]').each(function(){
                     if($(this).is(":checked")){
                         $(this).parents("tr").remove();
                     }
                 });
             });

    });

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

     // var email = $("#email").val();
     // var markup = "<tr><td><input type='checkbox' name='record'></td><td>" + name + "</td><td>" + email + "</td></tr>";
     // var name = $("#name").val();

</script>

@include('pages.header')

