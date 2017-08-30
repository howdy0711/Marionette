<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Content;
use App\Usermario;
use App\Soundfile;


class AdminController extends Controller{
  
public function adminmain(Request $request){ ///admin 메인페이지

    $contentReviewed = Content::where('cont_check',1)->get();
    $contentUnReviewed = Content::where('cont_check',0)->get();
    $cont_R_count = Content::where('cont_check',1)->count();
    $cont_UR_count = Content::where('cont_check',0)->count();
    
    return view("admin.adminmain")->with('contentReviewed',$contentReviewed)
    ->with('contentUnReviewed',$contentUnReviewed)
    ->with('cont_R_count',$cont_R_count)
    ->with('cont_UR_count',$cont_UR_count);

}

public function myPageAdmin(Request $request){ ///admin 마이페이지
    $num = $request->input('num');   ////num = 1 이면 등록된 컨텐츠, num 2이면 미등록 켄텐츠 띄움
    if($num == 1)
    $content = Content::where('cont_check',$num)->get();
    if($num == 0)
    $content = Content::where('cont_check',$num)->get();
    $content = Content::where('cont_check',1)->get();
    return view('admin.myPageAdmin')->with('content',$content);
}



public function ContSales(){
    $TotalSales = Content::all()->sum('cont_sell');
    $Fairytale_sale = Content::where('cont_category','fairytale')->sum('cont_sell');
    $childrenSong_sale = Content::where('cont_category','childrenSong')->sum('cont_sell');
    $English_sale = Content::where('cont_category','English')->sum('cont_sell');
      
    return view('admin.ContSales')->with('TotalSales',$TotalSales)->with('fairytale_sale',
    $Fairytale_sale)->with('childrenSong_sale',$childrenSong_sale)
    ->with('English_sale',$English_sale);
}


public function Reviewed(Request $request){ //검토된 컨텐츠
    $cont_name = $request->input('name');
    $content = Content::where('cont_name',$cont_name)->where('cont_check',1)->get();
    return view('admin.Reviewed')->with('content',$content[0]);
}

public function approval(Request $request){ //관리자 컨텐츠 승인
    $cont_name = $request->input('name');
    Content::where('cont_name',$cont_name)->update(['cont_check'=>1]);
    return Redirect('/adminmain');
}

public function Unreviewed(Request $request){ //미검토 컨텐츠
    $cont_name = $request->input('name');
    $content = Content::where('cont_name',$cont_name)->where('cont_check',0)->get();
    return view('admin.Unreviewed')->with('content',$content[0]);
}

public function adminPreview(Request $request){ ///어드민 미리보기
    $cont_name = $request->input('name');
    $content = Content::where('cont_name',$cont_name)->get();
    return view('admin.adminPreview')->with('content',$content);
}


public function productDel(Request $request){ ////상품삭제 
    $cont_name = $request->input('name');
    Content::where('cont_name',$cont_name)->delete();
    return Redirect('/adminmain');
}

public function createMarioAdmin(){
    return view('admin.createMarioAdmin');
}

// public function createAction(Request $request){
      
//     if($request->hasFile('cont_image')){ /// 이미지  파일 있는지 검사
//         $img_file = $request->file('cont_image');
//         $img_name = $img_file->getClientOriginalName();
//         $img_file->move(public_path('img'), $img_name); /// 지정된 경로로 이미파일 이동
//         $cont_image_path = public_path('img').$img_name;
//         }
//     if($request->hasFile('cont_video')){  /// 비디오파일 있는지 검사
//         $video_file = $request->file('cont_video');
//         $video_name = $video_file->getClientOriginalName();
//         $video_file->move(public_path('video'), $video_name); ///지정된 경로로 비디오 파일 이동
//         $cont_image_path = public_path('video').$video_name;
//     }
    
//     $cont_category = $request->input('cont_category');
//     $cont_name = $request->input('cont_name');
//     $cont_effect_sound = $request->input('cont_effect_sound');
//     $cont_background_sound = $request->input('cont_background_sound');
//     $cont_voice = $request->input("cont_voice");
//     $cont_moving = $request->input("cont_moving");
//     $cont_video = "/video".'/'.$video_name;
//     $cont_image = "/img".'/'.$img_name;a
//     $cont_detail = $request->input("cont_detail");
//     $cont_price = $request->input("cont_price");
//     $content = new Content;
//     $content->cont_price = $cont_price;
//     $content->cont_category = $cont_category;
//     $content->cont_name = $cont_name;
//     $content->cont_video = $cont_video;
//     $content->cont_image = $cont_image;
//     $content->cont_detail = $cont_detail;
//     $content->cont_check = 1;
//     $content->save();
//     return Redirect('/adminmain');
// }

public function UploadSound(Request $request){
    echo var_dump($request->input());
    $effect_name = $request->input('effectKoreanName');
    $back_name = $request->input('backKoreanName');
    if($request->hasFile('effect_file')){ 
        $effect_file = $request->file('effect_file');
        $effect_file_name =  'BE_'.$effect_file->getClientOriginalName();
        $effect_file->move(public_path('sounds/effect_sound'),$effect_file_name); 
        $effect_file_path = public_path('sounds/effect_sound/').$effect_file_name;
        $file_of_kind = 'effect_file';
        $files = new Soundfile;
        $files->file_of_kind = $file_of_kind;
        $files->file_name = $effect_file_name;
        $files->file_path = $effect_file_path;
        $files->koreanName = $effect_name;
        $files->save();
       }

    if($request->hasFile('back_file')){ 
        $back_file = $request->file('back_file');
        $back_file_name = 'BB_'.$back_file->getClientOriginalName();
        $back_file->move(public_path('sounds/back_sound'), $back_file_name); 
        $back_file_path = public_path('sounds/back_sound/').$back_file_name;
        $file_of_kind = 'back_file';
        $files = new Soundfile;
        $files->file_of_kind = $file_of_kind;
        $files->file_name = $back_file_name;
        $files->file_path = $back_file_path;
        $files->koreanName = $back_name;
        $files->save();
      }
    return Redirect('/adminmain');
}

} ///////////////////////////////////////끝 괄호
