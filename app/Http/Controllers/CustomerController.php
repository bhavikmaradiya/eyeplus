<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::select('*')->get();
        $result_customers = isset($customers) && $customers ? $customers : NULL;
        return $result_customers;
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
        $customer = new Customer;
        $customer->cust_name = isset($request->cname) && $request->cname ? $request->cname : null;
        $customer->cust_phone = isset($request->cphone) && $request->cphone ? $request->cphone : null;
        $customer->cust_phone2 = isset($request->cphone2) && $request->cphone2 ? $request->cphone2 : null;
        $customer->cust_email = isset($request->cemail) && $request->cemail ? $request->cemail : null;
        $customer->cust_age = isset($request->cage) && $request->cage ? $request->cage : null;
        $customer->cust_gender = isset($request->cgender) && $request->cgender ? $request->cgender : null;
        $customer->cust_address = isset($request->caddress) && $request->caddress ? $request->caddress : null;
        $customer->cust_remarks = isset($request->cremarks) && $request->cremarks ? $request->cremarks : null;
        $customer->cust_right_IPD = isset($request->right_IPD) && $request->right_IPD ? $request->right_IPD : null;
        $customer->cust_left_IPD = isset($request->left_IPD) && $request->left_IPD ? $request->left_IPD : null;
        $customer->prescriber_id = isset($request->prescriber_id) && $request->prescriber_id ? $request->prescriber_id : null;
        $customer->save();

        if($customer){
            return 'success';
        }else{
            return 'error';
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
        $customers = Customer::select('*')->where('cust_id' , '=', $id)->get();
        $result_customers = isset($customers) && $customers ? $customers : NULL;
        return $result_customers;
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

        $customer = Customer::select('*')->where('cust_id', '=', $id)->first();
        $customer->cust_name = isset($request->cname) && $request->cname ? $request->cname : null;
        $customer->cust_phone = isset($request->cphone) && $request->cphone ? $request->cphone : null;
        $customer->cust_phone2 = isset($request->cphone2) && $request->cphone2 ? $request->cphone2 : null;
        $customer->cust_email = isset($request->cemail) && $request->cemail ? $request->cemail : null;
        $customer->cust_age = isset($request->cage) && $request->cage ? $request->cage : null;
        $customer->cust_gender = isset($request->cgender) && $request->cgender ? $request->cgender : null;
        $customer->cust_address = isset($request->caddress) && $request->caddress ? $request->caddress : null;
        $customer->cust_remarks = isset($request->cremarks) && $request->cremarks ? $request->cremarks : null;
        $customer->cust_right_IPD = isset($request->right_IPD) && $request->right_IPD ? $request->right_IPD : null;
        $customer->cust_left_IPD = isset($request->left_IPD) && $request->left_IPD ? $request->left_IPD : null;
        $customer->prescriber_id = isset($request->prescriber_id) && $request->prescriber_id ? $request->prescriber_id : null;
        $customer->save();

        if($customer->save()){
            return 'success';
        }else{
            return 'error';
        }
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
