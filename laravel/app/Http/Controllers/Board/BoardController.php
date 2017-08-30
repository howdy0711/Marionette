<?php

namespace App\Http\Controllers\Board;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Board;
use App\Board_list;

class BoardController extends Controller
{
    // 1. 리스트 출력하기
    public function listBoard($board_no){
        
        // 객체 생성
        $boards = new Board(); // 게시판들
        $board = $boards->where('board_no', $board_no)->get()[0];
        
        $boardlists = new Board_list(); // 리스트들
        
        // sql문, $board_no는 그 게시판의 번호, 많은 게시판들 중에 하나
        $boardlist = $boardlists->where('list_boardno', $board_no)->orderBy('list_no', "desc")->paginate(5);
        
        // paginate의 값은 $list_size, 각 페이지마다 나타나는 리스트의 수
        
        // $boardlists->list_boardno = 1;
        // $boardlists->list_title = '0';
        // $boardlists->list_name = '0';
        // $boardlists->list_content = '0';
        // $boardlists->list_category = '0';
        // $boardlists->list_view = '0';
        // $boardlists->list_file = '0';
        // if($boardlists->save()
        
        // 값을 뷰로 전달
        return view('board.listBoard',[
            'board_no'=>$board_no,
            'board'=>$board->board_name,
            'boardlist'=>$boardlist,
        ]);
    }
    
    // 2. 컨텐츠 열람하기
    public function listRead(Request $request, $list_no){
        
        $boardlists = new Board_list();
        $boardlist = $boardlists->where('list_no', $list_no)->get()[0];
        
        $user_id = $request->session()->get("user_id");
        
        return view('board.listRead',[
            'boardlist'=>$boardlist,
            'list_no'=>$list_no,
            'user_id'=>$user_id
            ]);
    }
    
    // 3. 게시판 글 등록하기
    public function listWrite(Request $request){
        if(!$request->session()->has('user_id')){
            return redirect()->secure("/login");
        }
        
        
        return view('board.listWrite',[
            
            ]);
    }
    
    // 4. 게시판 글 등록 액션
    public function listInsert(Request $request){
        
        $list_boardno = $request->list_boardno;
        // dd($request->list_boardno);
        
        $boardlists = new Board_list();
        
        //dd($request->c_file->store("files"));
        $boardlists->list_title      = $request->list_title;
        $boardlists->list_content    = $request->list_content;
        $boardlists->list_category   = $request->list_category;
        $boardlists->list_file    = "A";
        $boardlists->list_name     = $request->session()->get("user_id");
        $boardlists->list_view     = 0;
        $boardlists->list_boardno   = $request->list_boardno;
        $boardlists->save();
        
        
        return redirect()->secure('/board/listBoard/'.$list_boardno);
    }
    
    
    // 5. 게시판 글 수정하기
    public function listEdit(Request $request, $list_no){
        
        if(!$request->session()->has('user_id')){
            return redirect()->secure("/login");
        }
        
        $board_no = $request->board_no;
        
        $boardlists = new Board_list();
        $boardlist = $boardlists->where('list_no', $list_no)->get()[0];

        return view('board.listEdit',[
            'boardlist'=>$boardlist,
            'list_no'=>$list_no
            ]);
    }
    
    // 6. 게시판 글 수정 액션
    public function listUpdate(Request $request){
        
        $list_no = $request->list_no;
        $list_boardno = $request->list_boardno;
        
        $boardlists = new Board_list();
        
        $boardlist = $boardlists->where('list_no', $list_no)->update(array('list_title' => $request->list_title));
        $boardlist = $boardlists->where('list_no', $list_no)->update(array('list_content' => $request->list_content));
        
        // DB::table('users') -------------------- $boardlist = $boardlists
        //     ->where('id', 1) ------------------ ->where('list_no', $list_no)
        //     ->update(array('votes' => 1)); ---- ->update(array('list_title' => $request->list_title));
        
        return redirect()->secure('/board/listRead/'.$list_no);

    }
    
    // 7. 게시판 글 삭제 액션
    public function listDelete(Request $request){
        
        $list_no = $request->list_no;
        // $list_boardno = $request->list_boardno;
        // dd($request->list_boardno);
        
        $boardlists = new Board_list();
        
        $boardlist = $boardlists->where('list_no', $list_no)->delete();
        // dd($request->list_no);
        
        // DB::table('users')->where('votes', '<', 100)->delete();
        
        return redirect()->secure('/board/listBoard/1');
    }
    
    // 8. 댓글 등록하기
    public function commentBoard(){
        
        
    }
    
    // 9. 댓글 등록 액선
    public function commentInsert(){
        
    }
    
    // 10. 댓글 수정하기
    public function commentEdit(){
        
    }
    
    // 11. 댓글 수정 액션
    public function commentUpdate(){
        
    }
    
    // 12. 댓글 삭제하기
    public function commentDelete(){
        
    }
    
    
}
