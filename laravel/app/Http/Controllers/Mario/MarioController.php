<?php


namespace App\Http\Controllers\Mario;

use App\Http\Controllers;
use App\Http\Controllers\getID3;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Content;
use App\Usermario;
use App\Admin;
use App\Account;
use App\Usermedia;
use App\Soundfile;
use App\Short_moving;
use Illuminate\Support\Facades\Redirect;
use App\User;
use App\Movement;
use Input;
use DB;
use ZipArchive;
use PharData;
use File;
use Mail;
use App\Message;


include(public_path().'/lib/getid3/getid3.php');



class MarioController extends Controller{
public function index(){ ////메인 페이지 화면

    
   $noticeMessage =  Message::where('addressee',Session::get('user_id'))->where('check_it',1)->get();
   if($noticeMessage){
     $count = 0;
     foreach($noticeMessage as $value){
       $count++;
     }
     $content = Content::where('cont_check',1)->get(); /// 등록된 컨텐츠 모두뛰움
      return view('marionett.index')->with('content',$content)
      ->with('noticeMessage',$noticeMessage)->with('count',$count);
}
    $content = Content::where('cont_check',1)->get(); /// 등록된 컨텐츠 모두뛰움
    return view('marionett.index')->with('content',$content)->with('count',0);
}

public function short_moving(Request $request){
    $category = $request->input('category');
    $short_moving = Short_moving::where('cont_category',$category)->get();
    return view("marionett.shortProduct")->with('content',$short_moving);
}


public function product(Request $request){ ///상품리스트 뛰움 
        if($request->has('category')){
        $category = $request->input('category','fairytale');
        $content = Content::where('cont_category',$category)->where('cont_check',1)->get();
        ////카테고리별, 등록된리스트 모두뛰움
        return view("marionett.product")->with('content',$content);
    }

        if($request->has('price')){
            $price = $request->input('price');
            if($price == 'high')
            $content = Content::where('cont_check',1)->orderBy('cont_price','desc')->get();
            if($price == 'low')
            $content = Content::where('cont_check',1)->orderBy('cont_price')->get();
            return view("marionett.product")->with('content',$content);
        }
    
        if($request->has('sell')){
        $sell = $request->input('sell');
            if($sell == 'now')
            $content = Content::where('cont_check',1)->orderBy('cont_sell','desc')->get();
            if($sell == 'forYear'){
            $content = DB::table('contents')
            ->where('cont_check',1)
            ->whereRaw(DB::raw('created_at BETWEEN DATE_SUB(NOW(), INTERVAL 1 YEAR) AND NOW()'))
            ->orderBy('cont_sell','desc')->get();
            }
            if($sell == 'forMonth'){
            $content = DB::table('contents')
            ->where('cont_check',1)
            ->whereRaw(DB::raw('created_at BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()'))
            ->orderBy('cont_sell','desc')->get();
            }
            if($sell == 'forWeek'){
            $content = DB::table('contents')
            ->where('cont_check',1)
            ->whereRaw(DB::raw('created_at BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()'))
            ->orderBy('cont_sell','desc')->get();
            }
        return view("marionett.product")->with('content',$content);
    }
    
        if($request->has('age')){
            $age = $request->input('age');
            if($age == 'a0_2'){
                $content = DB::table('contents')
                ->where('cont_check',1)
                ->whereRaw(DB::raw('age BETWEEN 0 AND 2'))
                ->get();
            }
            if($age == 'a3_5'){
                $content = DB::table('contents')
                ->where('cont_check',1)
                ->whereRaw(DB::raw('age BETWEEN 3 AND 5'))
                ->get();
                
            }
            if($age == 'a6_8'){
                $content = DB::table('contents')
                ->where('cont_check',1)
                ->whereRaw(DB::raw('age BETWEEN 6 AND 8'))
                ->get();
                
            }
            if($age == 'all'){
                $content = Content::where('cont_check',1)->get();
            }
            return view("marionett.product")->with('content',$content);
        }
        if($request->has('date')){
            $date = $request->input('date');
            if($date == 'new'){
                $content = DB::table('contents')
                ->where('cont_check',1)
                ->orderBy('created_at','desc')->get();
            }
            if($date == 'old'){
                $content = DB::table('contents')
                ->where('cont_check',1)
                ->orderBy('created_at')->get();
            }
            return view("marionett.product")->with('content',$content);
        }
        if($request->has('user')){
            $user = $request->input('user');
            if($user == 'admin'){
            $content = DB::table('contents')
            ->where('cont_check',1)
            ->where('user_id',$user)->get();
            return view("marionett.product")->with('content',$content);
            }
        }
}

// 

public function productDetail(Request $request){ //// 상품 상세 페이지
    $name = $request->input('name');
    Message::where('cont_name',$name)->update(['check_it'=>0]); 
    $name = $request->input('name','puppy');
    $content = Content::where('cont_name',$name)->get();
    return view("marionett.productDetail")->with('content',$content[0]);
}

public function shortProductDetail(Request $request){
    $name = $request->input('name');
    $short_moving = Short_moving::where('cont_name',$name)->get();
    return view("marionett.shortProductDetail")->with('content',$short_moving[0]);
}



public function preview(Request $request){ ////상품 미리보기 (영상)
    $name = $request->input('name');
    $content = Content::Where('cont_name',$name)->get();
    return view('marionett.preview')->with('content',$content);
}

public function createMario(){ //// 마리오네트 동작등록 페이지
    return view("marionett.createMario");
}


public function createMarioAction(Request $request){ ////// 마리오네트 컨텐츠 등록
    
    if($request->hasFile('cont_image')){ /// 이미지  파일 있는지 검사
        $img_file = $request->file('cont_image');
        $img_name = $img_file->getClientOriginalName();
        $img_file->move(public_path('img'), $img_name);
        $cont_image_path = public_path('img').$img_name;
    }
    
    if($request->hasFile('cont_video')){  /// 비디오파일 있는지 검사
        $video_file = $request->file('cont_video');
        $video_name = $video_file->getClientOriginalName();
        $video_file->move(public_path('video'), $video_name);
        $cont_image_path = public_path('video').$video_name;
    }
    $cont_category = $request->input('cont_category');
    $cont_name = $request->input('cont_name');
    $cont_effect_sound = $request->input('cont_effect_sound');
    $cont_background_sound = $request->input('cont_background_sound');
    $cont_voice = $request->input("cont_voice");
    $cont_moving = $request->input("cont_moving");
    $cont_video = "/video".'/'.$video_name;
    $cont_image = "/img".'/'.$img_name;
    $cont_detail = $request->input("cont_detail");
    $content = new Usermario;
    $content->cont_category = $cont_category;
    $content->user_id = Session::get('user_id');
    $content->cont_name = $cont_name;
    $content->cont_effect_sound = $cont_effect_sound;
    $content->cont_background_sound = $cont_background_sound;
    $content->cont_voice = $cont_voice;
    $content->cont_moving = $cont_moving;
    $content->cont_video = $cont_video;
    $content->cont_image = $cont_image;
    $content->cont_detail = $cont_detail;
    $content->cont_info = 'mycreate';
    $content->save();
    return Redirect('/myMarionetteStory?info=mycreate');
}

public function purchase(Request $request){   /// 상품 구매

    $name = $request->input('name','puppy');  //상품이름 조회
    $content = Content::Where('cont_name',$name)->get();
    foreach ($content as $value) {
        $cont_name = $value->cont_name;
        $cont_category = $value->cont_category;
        $cont_price = $value->cont_price;
        $cont_detail = $value->cont_detail;
        $cont_image = $value->cont_image;
        $cont_check = $value->cont_check;
        $cont_sell = $value->cont_sell;
        $cont_video = $value->cont_video;
        $moving = $value->moving;
        $sound = $value->sound;
        $backsound = $value->backsound;
        $tarpath  = $value->tarpath;
        $block_array = $value->block_array;
   }
    $user_id = Session::get('user_id'); 
    $user = Usermario::where('user_id',$user_id)->get();
    foreach($user as $value){
        if($value->cont_name == $cont_name)
        return Redirect('/');
    }

    Content::where('cont_name',$name)->update(['cont_sell'=>$cont_sell+1]); /// 판매량 1증가
    $usermario = new Usermario;
    $usermario->user_id = $user_id;
    $usermario->cont_category = $cont_category;
    $usermario->cont_name = $name;
    $usermario->cont_detail =$cont_detail;
    $usermario->cont_price = $cont_price;
    $usermario->cont_image = $cont_image;
    $usermario->cont_info = 'purchase';
    $usermario->cont_video = $cont_video;
    $usermario->moving = $moving;
    $usermario->sound = $sound;
    $usermario->backsound = $backsound;
    $usermario->tarpath = $tarpath;
    $usermario->block_array = $block_array;
    $usermario->save();
    /////////////usemarios 로 구매한 상품 이동
    return Redirect('/myMarionetteStory?info=purchase'); //// 구매한 페이지로 이동
}
  
  
public function shortMovingPurchase(Request $request){   /// 상품 구매

    $name = $request->input('name');  //상품이름 조회
    $content = Short_moving::Where('cont_name',$name)->get();
    foreach ($content as $value) {
        $cont_name = $value->cont_name;
        $cont_category = $value->cont_category;
        $cont_price = $value->cont_price;
        $cont_image = $value->cont_image;
        $cont_sell = $value->cont_cell;
   }
    $user_id = Session::get('user_id'); 
    $user = Usermario::where('user_id',$user_id)->get();
    foreach($user as $value){
        if($value->cont_name == $cont_name)
        return Redirect('/');
    }

    Short_moving::where('cont_name',$name)->update(['cont_sell'=>$cont_sell+1]); /// 판매량 1증가
    $usermario = new Usermario;
    $usermario->user_id = $user_id;
    $usermario->cont_category = $cont_category;
    $usermario->cont_name = $name;
    $usermario->cont_detail ='abcd';
    $usermario->cont_image = $cont_image;
    $usermario->cont_info = 'shortMoving';
    $usermario->tarpath = public_path().'/user/'.$user_id.'/madeContents/test.tar';
    $usermario->save();
    /////////////usemarios 로 구매한 상품 이동
    return Redirect('/myMarionetteStory?info=shortMoving'); //// 구매한 페이지로 이동
}  
  
  
  
public function Messagetest(){

  $user = array( 
      'email'=>'howdygom@gmail.com',
      'name'=>'Ha, Seung-Min'
      );
      
      
  $data = array(
      'detail'=>'새로운 상품이 등록되었습니다123123123',
      'name' => 'https://marionette-cloned-marionette.c9users.io'
      );
      
    Mail::send('marionett.mailtest', $data, function ($message) use ($user) {
    $message->to($user['email'],$user['name'])->subject('Welcome!');
});

}  
  
public function intro(){
    return view("marionett.intro");
}
    ///////////////////////////////////////////////////////////////////////////////////동작정의 
public function define(){
  return view('marionett.define');
}

public function moveDataTransfer_update(Request $request){
    
    
     $user_id = Session::get('user_id');
    var_dump($request->input('data'));
    $json_data = json_decode($request->input('data'));
    $moving1 = json_encode($json_data->move);
    $sound = json_encode($json_data->sound);
    $CompressionPath = public_path().'/beforeCompression/';
    $CompressionPath_explanation = public_path().'/explanation/';
    File::makeDirectory($CompressionPath,$mode=0775, $recursive = true, $force =false);
    File::makeDirectory($CompressionPath_explanation,$mode=0775, $recursive = true, $force =false);
    $snd= $json_data->sound;
    $bgm = $json_data->bgm;
    
    
    foreach($bgm as $value1){
        
        $rest = substr($value1,0,3);
        $bgm_file = substr($value1,3,100);
        
        $header_check1 = substr($bgm_file,0,2);
        if($header_check1 == 'BB')
            {
            File::copy( public_path().'/sounds/back_sound/'.$bgm_file, public_path().'/beforeCompression/'.$bgm_file);
            echo "기본 배경음 :".$bgm_file .'</br>';
            }
        if($header_check1 == 'UB')
            {
            File::copy( public_path().'/user/'.$user_id.'/backSound/'.$bgm_file, public_path().'/beforeCompression/'.$bgm_file);  
            echo "유저 배경음 :".$bgm_file .'</br>';
            }
    }
    foreach($snd as $value){
        
        $rest1 = substr($value,0,3);
        $sound_file = substr($value,3,100);
        
        $header_check= $value;
        $header_check = substr($sound_file,0,2);
        if($header_check == 'BE')
           {
            File::copy( public_path().'/sounds/effect_sound/'.$sound_file, public_path().'/beforeCompression/'.$sound_file);  
            echo "기본 효과음 :".$sound_file .'</br>';
        }
        if($header_check == 'UE')
           {
            File::copy( public_path().'/user/'.$user_id.'/effectFile/'.$sound_file, public_path().'/beforeCompression/'.$sound_file);  
            echo "유저 효과음 :".$sound_file .'</br>';
           }
        if($header_check == 'UV')
           {
            File::copy( public_path().'/user/'.$user_id.'/voiceRecode/'.$sound_file, public_path().'/beforeCompression/'.$sound_file);  
            echo "유저 녹음 :".$sound_file .'</br>';
           }
    }
        
        $cont_name = $request->input('name');
        
        $cont_data = Usermario::where('cont_name',$cont_name)->get();
        $cont_category = $cont_data[0]->cont_category;        
        $cont_name = $cont_data[0]->cont_name;
        $cont_detail = $cont_data[0]->cont_detail;
        $cont_image  = $cont_data[0]->cont_image;
        $cont_video  = $cont_data[0]->cont_video;
        
    
    
    
    $content = $request->input(); //view단에서 받은 JSON데이터
    
    $basePath = public_path().'/user/'.$user_id.'/madeContents/';
    $block_array = $request->input('block_array');
    Usermario::where('cont_name',$cont_name)->update(['moving'=>$moving1]);
    Usermario::where('cont_name',$cont_name)->update(['sound'=>$sound]);
    Usermario::where('cont_name',$cont_name)->update(['backsound'=>$bgm_file]);
    Usermario::where('cont_name',$cont_name)->update(['block_array'=>$block_array]);
    Usermario::where('cont_name',$cont_name)->update(['tarpath'=>$basePath.$cont_name.'.explanation']);

    $moving = DB::select('select * from usermarios where cont_name =?',[$cont_name]);  // DB조회

    foreach ($moving as $value) {
        $cont_name = $value->cont_name;
        $moving = $value->moving;
        $sound = $value->sound;
        $backsound = $value->backsound;
        $tarpath = $value->tarpath;
    }
    try {
        $baseDir = public_path().'/beforeCompression/';
        $file = fopen($baseDir.$cont_name.'_s.txt',"w");
        fwrite($file,$cont_name."\n");
        fwrite($file,$moving."\n");
        fwrite($file,$sound."\n");
        fwrite($file,"000".$backsound."\n");
        fwrite($file,'scenario2');
        fclose($file);
        echo "txt파일 성공!<br />";
    }
    catch(Exception $e) 
    {  
       echo "에러"; 
    }
    try {
           if (File::exists($tarpath)) {
                File::delete($tarpath); ///기존 tar파일 지움
            }
        $basePath = public_path().'/user/'.$user_id.'/madeContents/'; //user개인 폴더로 이동
        $p = new PharData($basePath.$cont_name.'.scenario'); /////파일 tar로 묶음
        $p->buildFromDirectory(public_path().'/beforeCompression/'); //폴더에 있는것 파일로 다묶음
        echo "tar파일 성공!";
        File::deleteDirectory(public_path().'/beforeCompression/'); //폴더 지워서 비움 
    }catch(Exception $e) {echo "에러";}
    
    
    
    $copypath = public_path('user/'.$user_id.'/madeContents/'.$cont_name.'.scenario');
    File::copy($copypath, public_path().'/explanation/'.$cont_name.'.scenario'); 

    try {
        $baseDir = public_path().'/explanation/';
        $file = fopen($baseDir.$cont_name.'.txt',"w");
        fwrite($file,$cont_name."\n");
        fwrite($file,$cont_detail."\n");
        fwrite($file,$user_id."\n");
        fwrite($file,$cont_image);
        fclose($file);
        echo "txt설명 파일 성공!<br />";
    }catch(Exception $e) {echo"설명파일 에러";}
    
    try{
        $basePath = public_path().'/user/'.$user_id.'/madeContents/'; //user개인 폴더로 이동
        $p = new PharData($basePath.$cont_name.'.explanation'); /////파일 tar로 묶음
        $p->buildFromDirectory(public_path().'/explanation/'); //폴더에 있는것 파일로 다묶음
        File::deleteDirectory(public_path().'/explanation/'); //폴더 지워서 비움
        File::delete($basePath.$cont_name.'.scenario'); ///기존 tar파일 지움
        echo "최종압축 성공";
        Session::forget('cont_name');
    }
    catch(Exception $e){echo"최종압축 에러";}
    
}


    
/////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////동작 저장 
public function moveDataTransfer(Request $request){ //동작데이터 DB에 정의 
    
    
    $user_id = Session::get('user_id');
    var_dump($request->input('data'));
    $json_data = json_decode($request->input('data'));
    $moving1 = json_encode($json_data->move);
    $sound = json_encode($json_data->sound);
    $CompressionPath = public_path().'/beforeCompression/';
    $CompressionPath_explanation = public_path().'/explanation/';
    File::makeDirectory($CompressionPath,$mode=0775, $recursive = true, $force =false);
    File::makeDirectory($CompressionPath_explanation,$mode=0775, $recursive = true, $force =false);
    $snd= $json_data->sound;
    $bgm = $json_data->bgm;
    
    
    foreach($bgm as $value1){
        
        $rest = substr($value1,0,3);
        $bgm_file = substr($value1,3,100);
        
        $header_check1 = substr($bgm_file,0,2);
        if($header_check1 == 'BB')
            {
            File::copy( public_path().'/sounds/back_sound/'.$bgm_file, public_path().'/beforeCompression/'.$bgm_file);
            echo "기본 배경음 :".$bgm_file .'</br>';
            }
        if($header_check1 == 'UB')
            {
            File::copy( public_path().'/user/'.$user_id.'/backSound/'.$bgm_file, public_path().'/beforeCompression/'.$bgm_file);  
            echo "유저 배경음 :".$bgm_file .'</br>';
            }
    }
    foreach($snd as $value){
        
        $rest1 = substr($value,0,3);
        $sound_file = substr($value,3,100);
        
        $header_check= $value;
        $header_check = substr($sound_file,0,2);
        if($header_check == 'BE')
           {
            File::copy( public_path().'/sounds/effect_sound/'.$sound_file, public_path().'/beforeCompression/'.$sound_file);  
            echo "기본 효과음 :".$sound_file .'</br>';
        }
        if($header_check == 'UE')
           {
            File::copy( public_path().'/user/'.$user_id.'/effectFile/'.$sound_file, public_path().'/beforeCompression/'.$sound_file);  
            echo "유저 효과음 :".$sound_file .'</br>';
           }
        if($header_check == 'UV')
           {
            File::copy( public_path().'/user/'.$user_id.'/voiceRecode/'.$sound_file, public_path().'/beforeCompression/'.$sound_file);  
            echo "유저 녹음 :".$sound_file .'</br>';
           }
    }
    
    $cont_category = Session::get('cont_category'); 
    $cont_name = Session::get('cont_name');
    $cont_detail = Session::get('cont_detail');
    $cont_image = Session::get('cont_image');
    $cont_video = Session::get('cont_video');
  
    
    $content = $request->input(); //view단에서 받은 JSON데이터
        
        
      $users = User::where('category_info',$cont_category)->get();
         foreach($users as $value){
        $user_id = $value->user_id;
     }
        $message = new Message();
        $message->addressee = $user_id;
        $message->content = "새로운 상품이 등록 되었습니다";
        $message->cont_name = $cont_name;
        $message->check_it = 1;
        $message->save();
     
    $user_info = User::where('category_info',$cont_category)->get();
    foreach($user_info as $value){
              $user = array( 
                  'email'=>$value->mail_address,
                  'name'=>$value->user_name
                  );
              $data = array(
                  'detail'=>'새로운 관심상품이 등록되었습니다',
                  'name' => 'https://marionette-cloned-marionette.c9users.io/productDetail?name='.$cont_name
                  );
                Mail::send('marionett.mailtest', $data, function ($message) use ($user) {
                $message->from('howdy0711@naver.com', 'DANCING MARIONETTE');
                $message->to($user['email'],$user['name'])->subject('관심상품이 등록 되었습니다.');
            });
    }







    
    $block_array = $request->input('block_array');
    // dd($block_array);
    
    
    if(Session::get('user_id') == 'admin'){
    $contdata = new Content();
    $contdata->cont_price = 10000;
    $contdata->cont_category = $cont_category;
    $contdata->cont_name = $cont_name;
    $contdata->cont_video = $cont_video;
    $contdata->cont_image = $cont_image;
    $contdata->cont_detail = $cont_detail;
    $contdata->cont_check = 1;
    $contdata->user_id = Session::get('user_id');
    $contdata->moving =$moving1;
    $contdata->sound = $sound;
    $contdata->backsound = $bgm_file;
    $basePath = public_path().'/user/'.$user_id.'/madeContents/';
    $contdata->tarpath =$basePath.$cont_name.'.explanation';
    $contdata->block_array = $block_array;
    $contdata->save();
    $moving = DB::select('select * from contents where cont_name =?',[$cont_name]);  // DB조회
    echo "admin"."<br>";
    }
    
    
    
    else{
    $contdata = new Usermario();
    $contdata->cont_price = 10000;
    $contdata->cont_category = $cont_category;
    $contdata->cont_name = $cont_name;
    $contdata->cont_video = $cont_video;
    $contdata->cont_image = $cont_image;
    $contdata->cont_detail = $cont_detail;
    $contdata->user_id = Session::get('user_id');
    $contdata->moving =$moving1;
    $contdata->sound = $sound;
    $contdata->backsound = $bgm_file;
    $basePath = public_path().'/user/'.$user_id.'/madeContents/';
    $contdata->tarpath =$basePath.$cont_name.'.explanation';
    $contdata->cont_info = 'mycreate';
    $contdata->block_array = $block_array;
    $contdata->save();
    $moving = DB::select('select * from usermarios where cont_name =?',[$cont_name]);  // DB조회
    echo "user"."<br>";
    }
    
    
    foreach ($moving as $value) {
        $cont_name = $value->cont_name;
        $moving = $value->moving;
        $sound = $value->sound;
        $backsound = $value->backsound;
    }
    try {
        $baseDir = public_path().'/beforeCompression/';
        $file = fopen($baseDir.$cont_name.'_s.txt',"w" );
        
        fwrite($file,$cont_name."\n");
        fwrite($file,$moving."\n");
        fwrite($file,$sound."\n");
        fwrite($file,"000".$backsound."\n");
        fwrite($file,'scenario2');
        fclose($file);
        echo "txt파일 성공!<br />";
    }catch(Exception $e){echo "에러"; }
    
    try {
        $basePath = public_path().'/user/'.$user_id.'/madeContents/'; //user개인 폴더로 이동
        $p = new PharData($basePath.$cont_name.'.scenario'); /////파일 tar로 묶음
        $p->buildFromDirectory(public_path().'/beforeCompression/'); //폴더에 있는것 파일로 다묶음
        echo "tar파일 성공!";
        File::deleteDirectory(public_path().'/beforeCompression/'); //폴더 지워서 비움 
    }catch(Exception $e) {echo "에러";}
    
    
    $copypath = public_path('user/'.$user_id.'/madeContents/'.$cont_name.'.scenario');
    File::copy($copypath, public_path().'/explanation/'.$cont_name.'.scenario'); 

    try {
        $baseDir = public_path().'/explanation/';
        $file = fopen($baseDir.$cont_name.'.txt',"w");
        fwrite($file,$cont_name."\n");
        fwrite($file,$cont_detail."\n");
        fwrite($file,$user_id."\n");
        fwrite($file,$cont_image);
        fclose($file);
        echo "txt설명 파일 성공!<br />";
    }catch(Exception $e) {echo"설명파일 에러";}
    
    try{
        $basePath = public_path().'/user/'.$user_id.'/madeContents/'; //user개인 폴더로 이동
        $p = new PharData($basePath.$cont_name.'.explanation'); /////파일 tar로 묶음
        $p->buildFromDirectory(public_path().'/explanation/'); //폴더에 있는것 파일로 다묶음
        File::deleteDirectory(public_path().'/explanation/'); //폴더 지워서 비움
        File::delete($basePath.$cont_name.'.scenario'); ///기존 tar파일 지움
        echo "최종압축 성공";
        Session::forget('cont_name');
    }
    catch(Exception $e){echo"최종압축 에러";}
    
}





////////////////////////////////////////////////////////////////////////////////////////녹음
    public function saveRecoding(Request $request){
      
      $user_id = Session::get('user_id');
      $file = $request->all();
      $filename = $file['name'];
      $korean_name = $file['koreanName'];
      $file['data']->move(public_path().'/user/'.$user_id.'/voiceRecode/',$filename.".webm");
      $filepath = public_path().'/user/'.$user_id.'/voiceRecode/'.$filename.'.wav';
      
      chdir("user/".$user_id."/voiceRecode");
      echo system("ffmpeg -i ".$filename.".webm". " -acodec pcm_s16le -ac 2 " .$filename.".wav");
      
      $getID3 =  new \getID3;
      $ThisFileInfo = $getID3->analyze($filepath); 
      $voice_time_of_sound =  round($ThisFileInfo['playtime_seconds']); //사운드 시간정보
      $usermedia = new Usermedia;
      $usermedia->user_id = $user_id;
      $usermedia->file_of_kind = 'voice_file';
      $usermedia->file_name = $filename.'.wav';
      $usermedia->file_path = $filepath;
      $usermedia->time_of_soundfile = $voice_time_of_sound;
      $usermedia->koreanName = $korean_name;
      $usermedia->save();
      
      }

////////////////////////////////////////////////////////////////////////////////////////동작등록  
  public function makingTool(){
    $user_id = Session::get('user_id');
    
  //////////////////////////////////사용자 사운드이름   
  $UB_sound = Usermedia::Where('user_id',$user_id)->where('file_of_kind','back_file')->get();
  $UE_sound = Usermedia::Where('user_id',$user_id)->where('file_of_kind','effect_file')->get();
  $UV_sound = Usermedia::Where('user_id',$user_id)->where('file_of_kind','voice_file')->get();
  /////////////////////////////////기본사운드 이름 
  $BE_sonud = Soundfile::Where('file_of_kind','effect_file')->get();
  $BB_sound = Soundfile::Where('file_of_kind','back_file')->get();
  
//   return view('marionett.makingTool_test')->with('UB_sound',$UB_sound)->with('UE_sound',$UE_sound)
//   ->with('UV_sound',$UV_sound)->with('BE_sound',$BE_sonud)->with('BB_sound',$BB_sound);
  
  return view('makingTool.hontounomain')->with('UB_sound',$UB_sound)->with('UE_sound',$UE_sound)
  ->with('UV_sound',$UV_sound)->with('BE_sound',$BE_sonud)->with('BB_sound',$BB_sound);
  }
  
  
  public function UploadBackSound (Request $request){
    $user_id = Session::get('user_id');
    $back_file = $request->file;
    $cont_name = $request->input('name');
    $Bopen_or_close = $request->input('Bopen_or_close');
    $back_file_name = $request->input('fileName');
    $back_file->move(public_path('user/'.$user_id.'/backSound/'),$back_file_name); 
    $back_file_path = public_path('user/'.$user_id.'/backSound/').$back_file_name;
    $getID3 =  new \getID3;
    $ThisFileInfo = $getID3->analyze($back_file_path); 
    $back_time_of_sound =  round($ThisFileInfo['playtime_seconds']); //사운드 시간정보
    $file_of_kind = 'back_file';
    $files = new Usermedia;
    $files->user_id = $user_id;
    $files->koreanName = $cont_name;
    $files->shareState = $Bopen_or_close;
    $files->file_of_kind = $file_of_kind;
    $files->file_name = $back_file_name;
    $files->file_path = $back_file_path;
    $files->time_of_soundfile = $back_time_of_sound;
    $files->save();
    return $back_time_of_sound;
  }
  

  public function UploadEffect(Request $request){
    $user_id = Session::get('user_id');
    $cont_name = $request->input('name');
    $effect_file = $request->file;
    $effect_file_name = $request->input('fileName');
    $effect_file->move(public_path('user/'.$user_id.'/effectFile/'), $effect_file_name); 
    $effect_file_path = public_path('user/'.$user_id.'/effectFile/').$effect_file_name;
    $getID3 =  new \getID3;
    $ThisFileInfo = $getID3->analyze($effect_file_path); 
    $effect_time_of_sound =  round($ThisFileInfo['playtime_seconds']); //사운드 시간정보
    
    $file_of_kind = 'effect_file';
    $files = new Usermedia;
    $files->user_id = $user_id;
    $files->koreanName = $cont_name;
    $files->file_of_kind = $file_of_kind;
    $files->file_name = $effect_file_name;
    $files->file_path = $effect_file_path;
    $files->time_of_soundfile = $effect_time_of_sound;
    $files->save();
  }
  
  public function soundfileTest(){
    $pathName = "/home/ubuntu/workspace/laravel/public/user/admin/voiceRecode/UV_sound28.wav";
    $getID3 =  new \getID3;
    $ThisFileInfo = $getID3->analyze($pathName);
    dd($ThisFileInfo);
    echo $ThisFileInfo['playtime_string'];
  }
  
  
  public function searchProduct(Request $request){
      $data = $request->input('query');
      $content = Content::where('cont_name','like','%' .$data. '%')
      ->where('cont_check',1)
      ->orWhere('cont_detail','like','%' .$data. '%')
      ->where('cont_check',1)
      ->get();
    return view('marionett.index')->with('content',$content);
  }
  
   
  public function searchPerPrice(Request $request){
      $startPrice = $request->input('startPrice');
      $endPrice = $request->input('endPrice');
        $content = DB::table('contents')
        ->where('cont_check',1)
        ->whereBetween('cont_price',[$startPrice,$endPrice])->get();

    return view('marionett.index')->with('content',$content);
  }
  
  public function searchPerAge(Request $request){
            $startAge = $request->input('startAge');
            $endAge = $request->input('endAge');
            $content = DB::table('contents')
                         ->where('cont_check',1)
                         ->whereBetween('age',[$startAge,$endAge])->get();
             return view('marionett.index')->with('content',$content);        
            
  }
  
  
    public function searchDetail(Request $request){
        
    
            $startAge = 0;
            $endAge = 100;
            $startPrice = 0;
            $endPrice = 1000000;
            
        
            if($request->has('category'))
            $category = $request->input('category');
            if($request->has('startAge'))
            $startAge = $request->input('startAge');
            if($request->has('endAge'))
            $endAge = $request->input('endAge');
            if($request->has('startPrice'))
            $startPrice = $request->input('startPrice');
            if($request->has('endPrice'))
            $endPrice = $request->input('endPrice');
            if($request->has('keyword'))
            $keyword = $request->input('keyword');
            
            
            if($request->has('category') && ($request->has('keyword'))){
            $content = DB::table('contents')
                         ->where('cont_check',1)
                         ->where('cont_category',$category)
                         ->whereBetween('cont_price',[$startPrice,$endPrice])
                         ->whereBetween('age',[$startAge,$endAge])
                         ->where('cont_detail','like','%' .$keyword. '%')
                         ->get();
            return view('marionett.index')->with('content',$content);        
            }
            
            if($request->has('category')){
            $content = DB::table('contents')
                         ->where('cont_check',1)
                         ->where('cont_category',$category)
                         ->whereBetween('cont_price',[$startPrice,$endPrice])
                         ->whereBetween('age',[$startAge,$endAge])
                         ->get();
            return view('marionett.index')->with('content',$content);        
            }
            
            if($request->has('keyword')){
            $content = DB::table('contents')                       
                         ->where('cont_check',1)
                         ->whereBetween('cont_price',[$startPrice,$endPrice])
                         ->whereBetween('age',[$startAge,$endAge])
                         ->where('cont_detail','like','%' .$keyword. '%')
                         ->get();
            return view('marionett.index')->with('content',$content);        

            }
            
            
            $content = DB::table('contents')
                         ->where('cont_check',1)
                         ->whereBetween('cont_price',[$startPrice,$endPrice])
                         ->whereBetween('age',[$startAge,$endAge])
                         ->get();
             return view('marionett.index')->with('content',$content);        
            
  }
  
  
  
  
  public function searchEffectDetail(Request $request){
      
     $category = $request->input('category');
     $minTime = $request->input('minTime');
     $maxTime = $request->input('maxTime');
     $keyword = $request->input('keyword');
     
     echo  $category . "<br>".
            $minTime ."<br>".
            $maxTime ."<br>".
            $keyword ;
            
            
          $usermedia = DB::table('usermedia')
                         ->where('shareState',1)
                         ->where('category',$category)
                         ->whereBetween('time_of_soundfile',[$minTime,$maxTime])
                         ->where('koreanName','like','%' .$keyword. '%')
                         ->get();
    
    
     
  }
  
  
  public function save_temporary(Request $request){
      $cont_name = $request->input('contentTitle');
      $cont_detail = $request->input('contentExplain');
      $cont_category = $request->input('contentCategory');

    if($request->hasFile('i_file')){ /// 이미지  파일 있는지 검사
        $img_file = $request->file('i_file');
        $img_name = $img_file->getClientOriginalName();
        $img_file->move(public_path('img'), $img_name);
        $cont_image_path = public_path('img').$img_name;
    }
    
    if($request->hasFile('v_file')){  /// 비디오파일 있는지 검사
        $video_file = $request->file('v_file');
        $video_name = $video_file->getClientOriginalName();
        $video_file->move(public_path('video'), $video_name);
        $cont_image_path = public_path('video').$video_name;
    }
    
    $cont_image = "/img".'/'.$img_name;
    $cont_video = "/video".'/'.$video_name;
    Session::put('cont_name',$cont_name);   
    Session::put('cont_detail',$cont_detail);
    Session::put('cont_category',$cont_category);
    Session::put('cont_image',$cont_image);
    Session::put('cont_video',$cont_video);
    return redirect()->secure('/makingTool');
  }
  
    public function convertType(Request $request)
    {
        $a = "abcde";
        $b = substr($a,1,10);
    dd($b);
    }
    
    public function saveBlockData(Request $request){
        $data = Content::where('cont_name','흥부놀부')->get();
        
        dd($data[0]->cont_name);
    }
    
    public function loadBlockData(Request $request){
        
    }
    public function loadBlocks(Request $request){
        $name = $request->cont_name;
        $usermario = Usermario::where('cont_name',$name)->get();
        return ($usermario[0]->block_array);
    }
}
  
  
