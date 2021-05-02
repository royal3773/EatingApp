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
            $table->bigIncrements('id');
            $table->string('password', 255);
            $table->string('name', 50);
            $table->string('email', 50)->unique(); //値が重複しないように
            $table->timestamp('email_verified_at')->nullable(); //値がnullでも可能
            $table->date('birthday');
            $table->string('sex', 5);
            $table->string('tel', 20);
            $table->string('address', 100);
            $table->string('image', 100)->nullable();
            $table->rememberToken(); //ログイン時とログアウト時にトークンを生成
            $table->timestamps();
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
