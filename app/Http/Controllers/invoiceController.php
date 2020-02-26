<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use DB;
class invoiceController extends Controller
{

    public  function  invoice_ui()
    {
        return view('Invoice.create_invoice');
    }

    public  function  invoice_details(Request $request)
    {
        $invoice_no = rand(1111111,9999999);
        $data = [
          'invoice_serial' => $invoice_no,
          'from_company' => $request->from_company_name,
          'from_company_owner' => $request->from_owner_name,
          'from_company_address' => $request->from_address,

          'to_company' => $request->to_company_name,
          'to_company_owner' => $request->to_owner_name,
          'to_company_address' => $request->to_address,

        ];



        $insert_data = DB::table('from_and_to')->insert($data);

        if ($insert_data){
            Session::put('invoice_serial_no',$invoice_no);
            return redirect('invoice-manage');
        }
    }

    public  function  invoice_manage()
    {
        return view('Invoice.invoice');
    }

    public  function add_item(Request $request)
    {
        $item_no = $request->item_no;
        $item_name = $request->item_name;
        $quantity = $request->quantity;
        $price = $request->price;

        if(!empty($item_no) && !empty($item_name) && !empty($quantity) && !empty($price)){
            $total = $quantity*$price;
            $data = [
                'item_no' =>$item_no,
                'item_name' =>$item_name,
                'quantity' =>$quantity,
                'price' =>$price,
                'total' => $total
            ];

            $insert_data = DB::table('add_item')->insert($data);
            return back();
        }else{
            return back()->with('item_no','Item no is required!')
                 ->with('item_name','Item name is required!')
                 ->with('quantity','Quantity is required!')
                 ->with('price','price is required!');
        }
    }

    public   function  delete_item($id)
    {
        DB::table('add_item')->where('id',$id)->delete();
        return back();
    }


    public  function save_invoice(Request $request)
    {


        $invoice_no = Session::get('invoice_serial_no');

        if ($invoice_no){
                $invoice_data = [
                    'invoice_no' => $invoice_no,
                    'item_no' => $request->item_no,
                    'item_name' => $request->item_name,
                    'quantity' => $request->quantity,
                    'price' => $request->price,
                    'total' => $request->total,
                    'notice' => $request->notice,
                    'subtotal' => $request->subtotal,
                    'tax_rate' => $request->tax_rate,
                    'tax_amount' => $request->tax_amount,
                    'total_amount' => $request->total_amount,
                    'paid_amount' => $request->paid_amount,
                    'due_amount' => $request->due_amount,
                ];
           }

            $insert_invoice = DB::table('invoice_data')->insert($invoice_data);

            if ($insert_invoice){
                return redirect('/invoice-list');
//            }

        }


    }


    public  function  invoice_list()
    {
        return view('Invoice.invoice_list');
    }










}
