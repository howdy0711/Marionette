<?php

namespace App\Http\Controllers\Mario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Soundfile;
use App\Doll_info;

class DollController extends Controller
{
 
 public function dollcreateAction(){ 
    $doll = new Doll_info;
    $doll->weight = 10;
    $doll->madeCompany = "123";
    $doll->thread_of_doll = 3;
    $doll->height = 1;
    $doll->price = 100;
    $doll->img_path ="11";
    $doll->doll_name = "haha";
    $doll->save();
    return Redirect('/');
 }  
 
 public function dollproductView(){
    $content = Doll_info::where('thread_of_doll',3)->get();
    return view("doll.doll_product")->with('content',$content);
 }
 
}
