<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Auth;
use App\User;


class BoardWriteController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        return view('boards/write');
    }

    /**
     * Save board form data
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function saveBoard(Request $request)
    {
        
        try{
            $user_idx = $request->session()->get('current_user')->id; // 현재 로그인한 사용자 index값 
            $dt = \Carbon\Carbon::now()->format('Ymd'); // 현재 날짜로 폴더 생성


            $board_id = DB::table('board')->insertGetId(
                [
                    'user_id' => $user_idx,
                    'board_title' => $request->boardTitle,
                    'board_content' => $request->boardContnet
                ]
            );

            
            if($request->has('file')) {
                $path = Storage::put($dt, new file($request->file));
                
                DB::table('boardfile')->insert(
                    [
                        'board_id' => $board_id,
                        'file_type' => 'file',
                        'file_path' => $path,
                        'file_title' => $request->file->getClientOriginalName()
                    ]
                );
            }

            if($request->has('boardLink')) {
                DB::table('boardfile')->insert(
                    [
                        'board_id' => $board_id,
                        'file_type' => 'link',
                        'file_path' => $request->boardLink,
                        'file_title' => $request->boardLink
                    ]
                );
            }
            return redirect('board-form')->with('status', '게시글이 등록되었습니다.');
            
        }catch(\Exception $e){
            return redirect()->back()->with('error','Something goes wrong while uploading file!');
        }
        

        exit;
    }


    
}
