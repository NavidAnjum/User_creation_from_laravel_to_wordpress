<?php

namespace App\Http\Controllers;

use App\Models\customers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use MongoDB\Driver\Session;
use Tests\Unit\UserTest;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $customer_list=customers::find($id);
        return view('single_customer')->with(['user'=>$customer_list ]);

    }

    public function wordpress_users(Request $request){
       $user_id= $request->userid;
       $customers=customers::find($user_id);
        $id=$customers->id;
        $username=$customers->name;
        $email=$customers->email;
        $pass="123456";

         $queryString = "?userid=" . $id ;
        $queryString .= "&username=" . $username;
        $queryString .= "&email=" . $email ;

        $queryString .= "&pass=" . $pass ;

       // $url = "http://localhost/custom-wordpress/user_save_create.php".$queryString;
       // $url = "http://localhost/custom-wordpress/wp-content/plugins/Create_User/index.php".$queryString;

        $url = "http://localhost/custom-wordpress/".$queryString;

        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $html = curl_exec($ch);
        curl_close($ch);
        return $html;


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
        $customer=new customers();
        $customer->name=$request->name;
        $customer->phone=$request->phone;
        $customer->email=$request->email;
        $find_customer=customers::all()
            ->where('email',$customer->email);
        if($find_customer->count()<1){
           $test= New UserTest();
            $customer->budget=$request->desired_budget;
            $customer->message=$request->message;
            $customer->save();

            $status = 'Successfully Saved';
            return back()->with(['status' => $status]);

        }
        else
        {
            $status = 'Previously Saved';

            return back()->with(['status' => $status]);

        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(customers $customers)
    {
        $customer_list=customers::simplePaginate(10);
        return view('dashboard')->with('customer_list',$customer_list);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(customers $customers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customers $customers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(customers $customers)
    {
        //
    }
}
