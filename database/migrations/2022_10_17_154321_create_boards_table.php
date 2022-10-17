<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('board', function (Blueprint $table) {
            $table->id()->comment('board 고유 번호');
            $table->string('board_id')->comment('board id'); 
            $table->string('user_id')->comment('게시글 작성자 id'); 
            $table->string('board_title')->comment('제목');
            $table->longText('board_content')->comment('게시글 내용');
            $table->bigInteger('board_hit')->comment('게시글 조회수');
            $table->char('board_flag', 2)->comment('게시글 노출 여부 Y=>사용, N=>삭제, S=>사용중지')->default('Y');
            $table->text('board_comment')->nullable()->comment('사용 여부 변경 이유');
            $table->dateTime('created_at')->useCurrent()->comment('생성 날짜');
            $table->dateTime('updated_at')->useCurrent()->comment('수정 날짜');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
