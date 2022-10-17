<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment('user 고유 번호');
            $table->string('user_id')->comment('user id'); 
            $table->char('user_type', 2)->comment('1=> 일반 사용자, 99 => 관리자')->default('1');
            $table->string('user_name')->comment('사용자 이름');
            $table->string('user_pw')->comment('사용자 비밀번호');
            $table->string('user_nickname')->comment('사용자 별명');
            $table->char('user_flag', 2)->comment('계정 사용 여부 Y=>사용, N=>탈퇴, S=>사용중지')->default('Y');
            $table->text('user_comment')->nullable()->comment('사용 여부 변경 이유');
            $table->dateTime('created_at')->useCurrent()->comment('생성 날짜');
            $table->dateTime('updated_at')->useCurrent()->comment('수정 날짜');
            $table->dateTime('last_login')->useCurrent()->comment('최종 로그인 날짜');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
