<?php

namespace App\Http\Controllers;

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
        DB::enableQueryLog();

        $return = array();
        $invoices = Invoice::select('*')->get();

        foreach($invoices as $k => $v){
            $cust_id = $v->cust_id;

            $customers = Customer::select('*')->where('cust_id', '=', $cust_id)->first();
            array_push($return, $customers);
            // $query = DB::getQueryLog();
            // print_r($query);

            $pId = $v->product_id;
            $productId = explode(',', $pId);

            foreach($productId as $pk => $pval){
                // print_r($productId[$pk]);
                $products = Product::select('*')->where('product_id', '=', $pval)->first();
                array_push($return, $products);
            }
            // exit();
        }

        return $return;
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
        //
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
