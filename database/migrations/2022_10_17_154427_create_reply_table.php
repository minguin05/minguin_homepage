<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply', function (Blueprint $table) {
            $table->id()->comment('reply 고유 번호');
            $table->string('board_id')->comment('board id'); 
            $table->string('user_id')->comment('작성자 id');
            $table->string('reply_depth')->comment('댓글 깊이, 댓글 =>1, 대댓글=>2');
            $table->text('reply_content')->comment('댓글 내용');
            $table->char('reply_flag', 2)->comment('댓글 노출 여부 Y=>사용, N=>삭제, S=>사용중지')->default('Y');
            $table->text('reply_comment')->comment('댓글 노출 변경 여부');
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
        Schema::dropIfExists('reply');
    }
}
