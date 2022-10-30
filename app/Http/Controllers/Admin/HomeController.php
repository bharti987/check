<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
    	return view('admin.dashboard');
    }


 function reg_fun(){

   // $prod_list = product_list::paginate(5);
        return view('admin.dashboard');

   }



function page1(){
	return view('page1');
}

function page2(){
	return view('page2');
}



}
