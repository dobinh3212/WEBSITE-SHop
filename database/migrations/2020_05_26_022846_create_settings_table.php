<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company',255)->collation('utf8mb4_unicode_ci');
            $table->string('address',255)->collation('utf8mb4_unicode_ci');
            $table->string('address2',255)->collation('utf8mb4_unicode_ci');
            $table->string('phone',255)->collation('utf8mb4_unicode_ci');
            $table->string('hotline',255)->collation('utf8mb4_unicode_ci');
            $table->string('tax',255)->collation('utf8mb4_unicode_ci');
            $table->string('facebook',255)->collation('utf8mb4_unicode_ci');
            $table->string('email',255)->collation('utf8mb4_unicode_ci');
            $table->string('introduce',255)->collation('utf8mb4_unicode_ci');
           
            $table->string('image',255)->collation('utf8mb4_unicode_ci')->nullable(); // anh
           
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
        Schema::dropIfExists('settings');
    }
}
