<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->boolean('highlight')->after('status')->default(false);
        });

        Schema::table('sponsors', function (Blueprint $table) {
            $table->enum('type', ['platinum', 'silver', 'bronze'])->after('name')->default('bronze');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn(['highlight']);
        });

        Schema::table('sponsors', function (Blueprint $table) {
            $table->dropColumn(['type']);
        });
    }
}
