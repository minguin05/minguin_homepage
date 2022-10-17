<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boardfile', function (Blueprint $table) {
            $table->id()->comment('board file 고유 번호');
            $table->string('board_id')->comment('board id'); 
            $table->string('file_type')->comment('첨부파일 타입');
            $table->string('file_path')->comment('파일 업로드 위치');
            $table->string('file_title')->comment('파일 제목');
            $table->char('file_flag', 2)->comment('첨부파일 노출 여부 Y=>사용, N=>삭제, S=>사용중지')->default('Y');
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
        Schema::dropIfExists('boardfile');
    }
}
