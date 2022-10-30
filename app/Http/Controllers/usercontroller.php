<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_list;

class usercontroller extends Controller
{
    //

    function user_fun(){  

       //$prod_list = product_list::paginate(5);
        $user_data =  user_list::paginate(3);
        return view('dashboard',["keyuser"=>$user_data]);

      }


   function user_save(Request $req){
       
    $var = $req->validate([
        "name" => "required",
        "email" => "required",
        "password" => "required",
        "mobile" => "required",

       
    		]);  //rough

      $show_list = new user_list;
      $show_list->name = $req->name;
      $show_list->email = $req->email;
      $show_list->password = $req->password;
      $show_list->mobile = $req->mobile;
      
      if($req->hasfile('productImages'))
       {
           $file = $req->file('productImages');
           $extension = $file->getClientOriginalExtension();
           $filename = time(). '.' .$extension;
           $file->move('uploads/adminuser/',  $filename);
           $show_list->images = $filename;
    
        } 
       
        $show_list->save();
        return redirect()->back()->with('status','Congratulations !!User listed successfully . .');

        // return redirect()->back()->with('status','user listed successfully');


   }


}
