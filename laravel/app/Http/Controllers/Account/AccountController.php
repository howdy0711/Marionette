<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Admin;
use App\Usermario;
use App\Content;
use App\Message;
use DB;
use File;
class AccountController extends Controller
{

public function loginAction(Request $request){ ////////////////////로그인
  $user_id = $request->input('user_id');  ///post 값 id 값 저장
  $user_password = $request->input('user_password'); ///post 비밀번호 값 저장
  $user = User::where('user_id',$user_id)->get();  /// user_id로 User 테이블조회


if($user =="[]")  ////아이디가 존재하지 않은 경우예외처리 에러번호 0 
      return view("account.exception")->with('num',0);
  
foreach ($user as $userINFO) {   ///세션에 아이디와 유저이름 저장
  if( Hash::check($user_password,$userINFO->user_password)){ ///복호화 해서 비밀번호 체크  
    Session::put('user_id',$userINFO->user_id);   
    Session::put('user_name',$userINFO->user_name);
    
   $noticeMessage =  Message::where('addressee',$user_id)->where('check_it',1)->get();
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
      return view('marionett.index')->with('content',$content)
      ->with('count',0);
  }

  
  else{
      return view("account.exception")->with('num',1);  ////비밀번호 틀린경우 예외처리 에러번호 1
  }
}

}

public function exception(){
  return view("account.exception");
}


public function login(){
  return view('account.login');
}

////////////////////////로그아웃
public function logout(){
  Session::flush();
  return Redirect('/');
}

  /////////////////////////회원가입
  public function registerView(){
    return view("account.registerView");
  }


///////////////////////////////회원가입 동작
public function register(Request $request){ 
  $user_id = $request->input('user_id');
  $password = $request->input('user_password');
  $user_name = $request->input('user_name');

  $effectPath = public_path().'/user/'.$user_id.'/effectFile/';
  $backSoundPath = public_path().'/user/'.$user_id.'/backSound/';
  $voiceRecodePath = public_path().'/user/'.$user_id.'/voiceRecode/';
  $picturePath = public_path().'/user/'.$user_id.'/picture/';
  $purchasedContentsPath = public_path().'/user/'.$user_id.'/purchasedContents/';
  $madeContentsPath = public_path().'/user/'.$user_id.'/madeContents/';
  /////////////////////////////회원가입시 유저 폴더 생성
  File::makeDirectory($effectPath,$mode=0775, $recursive = true, $force =false);
  File::makeDirectory($backSoundPath,$mode=0775, $recursive = true, $force =false);
  File::makeDirectory($voiceRecodePath,$mode=0775, $recursive = true, $force =false);
  File::makeDirectory($picturePath,$mode=0775, $recursive = true, $force =false);
  File::makeDirectory($purchasedContentsPath,$mode=0775, $recursive = true, $force =false);
  File::makeDirectory($madeContentsPath,$mode=0775, $recursive = true, $force =false);
  
  $user_password = Hash::make($password); ///마리오네트 비밀번호 암호화 

  $user = new User;
  $user->user_id = $user_id;
  $user->user_password = $user_password;
  $user->user_name = $user_name;
  $user->save();
  return Redirect('/');
}

public function myPage(){  ///마이페이지 이동
  return view("account.myPage");
}

public function myInfo(){ ///내 정보 이동
  $user_id = Session::get('user_id');
  $user = User::where('user_id',$user_id)->get();
  return view("account.myInfo")->with('user',$user);
}

public function mySell(){ ///나의 판매정보 이동
  return view("account.mySell");
}

public function myMarionetteStory(Request $request){ ///내 마리오컨텐츠 페이지로 이동
  $info = $request->input('info','mycreate');
  $id = Session::get('user_id');
  $content = Usermario::Where('user_id',$id)->Where('cont_info',$info)->get();
  if($info == 'mycreate' || $info == 'purchase')
  return view("account.myMarionetteStory")->with('content',$content);
  else 
  return view("account.myMarionetteStorySM")->with('content',$content);
}


public function myMarioDetail(Request $request){   /// 내 컨텐츠 디테일 내용
  $name = $request->input('name');
  $id = Session::get('user_id');
  $content = Usermario::Where('cont_name',$name)->Where('user_id',$id)->get();
 return view("account.myMarioDetail")->with('content',$content[0]);
}


public function myMarioShortMovingDetail(Request $request){   /// 내 컨텐츠 디테일 내용
  $name = $request->input('name');
  $id = Session::get('user_id');
  $content = Usermario::Where('cont_name',$name)->Where('user_id',$id)->get();
 return view("account.myMarioShortMovingDetail")->with('content',$content[0]);
}


public function download(Request $request){ /// 파일 다운로드 
  $name = $request->input('name');
  $content = Usermario::Where('cont_name',$name)->get();
  foreach ($content as $value) {
    $tarpath = $value->tarpath;
  }
  return response()->download($tarpath);
}

public function makeMoving(){  /// 마리오네트 동작등록 페이지
  return view("account.makeMoving");
}

public function sellApply(Request $request){ /// 마리오네트 컨텐츠 승인요청
  $name = $request->input('name');
  $content = Usermario::Where('cont_name',$name)->get();

  foreach ($content as $value) {
    $cont_category = $value->cont_category;
    $cont_price = $value->cont_price;
    $cont_detail = $value->cont_detail;
    $user_id = $value->user_id;
    $cont_image = $value->cont_image;
    $cont_video = $value->cont_video;
    $moving = $value->moving;
    $sound = $value->sound;
    $backsound = $value->backsound;
    $tarpath  = $value->tarpath;
  }

  $cont = new Content; ///상품컨텐츠로 내 컨텐츠 이동
  $cont->cont_category = $cont_category;
  $cont->cont_name = $name;
  $cont->cont_price = '12000';
  $cont->user_id = $user_id;
  $cont->cont_detail =$cont_detail;
  $cont->cont_image = $cont_image;
  $cont->cont_check = 0; /// 미검토 컨텐츠는 0
  $cont->cont_video = $cont_video;
  $cont->moving = $moving;
  $cont->sound = $sound;
  $cont->backsound =$backsound;
  $cont->tarpath = $tarpath;
  $cont->save();
  
  return Redirect('/myMarionetteStory');
}


public function createDel(Request $request){ ////만들어진 마리오컨텐츠 삭제
  $name = $request->input('name');
  $content = Usermario::Where('cont_name',$name)->get();
  Usermario::where('cont_name',$name)->delete();

    foreach ($content as $value) {
      echo $value->cont_info;
      if($value->cont_info=="mycreate")
        return Redirect('/myMarionetteStory?info=mycreate');
      else
        return Redirect('/myMarionetteStory?info=purchase');
  }
  
}

public function createMarioModal(){
  return view('account.createMarioModal');
}

public function insertMarioModal(Request $request){
  $user = new Usermario();
  $user->user_id = Session::get('user_id');
  $user->cont_name = $request->cont_name;
  $user->cont_category = $request->cont_category;
  $user->cont_detail = "aaaa";
  $user->cont_image = "/img/BasicImage.png";
  $user->cont_info = "mycreate";
  /* 기본 값 입력 */
  $user->save(); 
}

}