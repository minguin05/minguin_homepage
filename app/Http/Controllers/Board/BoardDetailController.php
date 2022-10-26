<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BoardDetailController extends Controller
{
    public function getBoard($id)
    {

        if( DB::table('board')->where('id',$id)->doesntExist()){
            return null;
        }else{
            DB::table('board')->where('id',$id)->increment('board_hit');

            $board = DB::table('board')
                        ->leftJoin('users', 'users.id', '=', 'board.user_id')
                        ->where('board.board_flag', 'Y')
                        ->where('board.id',$id)->get();
    
            $file = DB::table('board')
                        ->leftJoin('boardfile', 'board.id', '=', 'boardfile.board_id')
                        ->where('board.board_flag', 'Y')
                        ->where('board.id',$id)
                        ->where('boardfile.file_type','file')
                        ->get();
    
            $link = DB::table('board')
                        ->leftJoin('boardfile', 'board.id', '=', 'boardfile.board_id')
                        ->where('board.board_flag', 'Y')
                        ->where('board.id',$id)
                        ->where('boardfile.file_type','link')
                        ->get();
    
            return array('board' => $board, 'file' => $file, 'link'=>$link);
        }
        
        
    }


    public function getBoardView($id)
    {
        $data = $this->getBoard($id);

        if($data === null){
            return back()->with('status', '야');
        }else{
            return view('boards/view', [
                'board' => $data['board'],
                'file' => $data['file'],
                'link' => $data['link'],
            ]);
        }
    } 

    public function getFileDownload($file_id)
    {
        try{
            $file_path = DB::table('boardfile')->where('id', $file_id)->value('file_path');
            $file_title = DB::table('boardfile')->where('id', $file_id)->value('file_title');
            return Storage::download($file_path, $file_title);
        }catch(\Exception $e){
            return redirect()->back()->with('error','존재하지 않는 파일입니다.');
        }
        
    }
}
