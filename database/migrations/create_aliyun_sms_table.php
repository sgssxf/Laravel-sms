<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateAliyunSmsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('aliyun_sms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('to')->default('')->comment('短信接收手机号码');
            $table->string('temp_id')->default('')->comment('短信模板ID');
            $table->json('data')->nullable()->comment('短信模板数据');
            $table->string('content')->default('')->comment('短信的内容');
            $table->mediumInteger('failed_counts')->default(0)->comment('短信发送失败次数');
            $table->unsignedInteger('failed_time')->default(0)->comment('最后一次短信发送失败时间');
            $table->unsignedInteger('success_time')->default(0)->comment('短信发送成功的时间');
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';
        });
        DB::statement("ALTER TABLE `sms` COMMENT '短信记录表'");
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('aliyun_sms');
    }
}
