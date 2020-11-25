<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Invoice;
use App\Customer;
use App\Product;
use DB;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();
        $invoices = Invoice::select('*')->get();
        $data = $invoices;

        $counter = 0;
        foreach($invoices as $k => $v){
            $custId = json_encode($v->cust_id);

            $customer = Customer::select('*')->where('cust_id', '=', $v->cust_id)->first();
            $data[$counter]->cust_id = $customer;

            $pid = explode(',', $v->product_id);
            $prods = array();
            foreach($pid as $k => $pv){
                $products = Product::select('*')->where('product_id', '=',$pv)->first();
                array_push($prods, $products);
            }
            $data[$counter]->product_id = $prods;

            $iPdf = isset($custId) ? "https://eyeplus.xtechsoftsolution.com/invoice_pdf_api.php?cust_id=".$custId."&last_id=".$v->invoice_id : '';
            $data[$counter]->invoiceUrl = $iPdf;

            $counter++;
        }
        return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invoice = new Invoice;
        $invoice->cust_id = isset($request->cust_id) && $request->cust_id ? $request->cust_id : null;
        $invoice->user_id = isset($request->user_id) && $request->user_id ? $request->user_id : null;
        $invoice->product_id = isset($request->product_id) && $request->product_id ? $request->product_id : null;
        $invoice->quantity = isset($request->quantity) && $request->quantity ? $request->quantity : null;
        $invoice->discount_percentage = isset($request->discount_percentage) && $request->discount_percentage ? $request->discount_percentage : null;
        $invoice->tax_percentage = isset($request->tax_percentage) && $request->tax_percentage ? $request->tax_percentage : null;
        $invoice->remarks = isset($request->remarks) && $request->remarks ? $request->remarks : null;
        $invoice->time = isset($request->time) && $request->time ? $request->time : null;
        $invoice->place = isset($request->place) && $request->place ? $request->place : null;
        $invoice->status = isset($request->status) && $request->status ? $request->status : null;
        $invoice->save();

        if($invoice){
            echo 'success';
        }else{
            echo 'error';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
