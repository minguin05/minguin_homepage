<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardListController extends Controller
{
    /**
     * Show the board list
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {   
        $pageNum = isset($request->all()->pagenum) ? $request->all()->pagenum : 5;
        $data = $this->getBoardList($pageNum);

        return view('boards/list', [
            'boards' => $data['boards'],
            'paginate' => $data['limit_pageNum']
        ]);

    }

    /**
     * Get the list of boards content
     *
     * @return array 
     */

    public function getBoardList($limit_pageNum){
        $query = DB::table('board')
                    ->leftJoin('users', 'users.id', '=', 'board.user_id')
                    ->where('board.board_flag', 'Y')
                    ->orderBy('created_at','desc');

        $boards = $query->addSelect('users.user_nickname as user_nickname','board.id as id', 'board.board_title as board_title', 'board.created_at as created_at', 'board.board_hit as board_hit')->paginate($limit_pageNum);
        return array('limit_pageNum'=> $limit_pageNum, 'boards' => $boards);
    }


    
    
}
