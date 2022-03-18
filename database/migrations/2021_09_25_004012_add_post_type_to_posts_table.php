<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddPostTypeToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (env('DB_CONNECTION') === 'mysql') {
            DB::statement("ALTER TABLE `posts` MODIFY COLUMN `post_type` ENUM('event','challenge','competition','industry','for-school') NOT NULL");
        } else {
            DB::statement("
                ALTER TYPE my_post_type RENAME TO my_post_type_old;
            ");
            DB::statement("
                CREATE TYPE post_type_enum AS ENUM('event', 'challenge', 'competition', 'industry', 'for-school');
            ");

            DB::statement("ALTER TABLE posts ALTER COLUMN post_type TYPE post_type_enum USING post_type::text::post_type_enum;");

            DB::statement("
                DROP TYPE my_post_type_old;
            ");
        }

        // -- Schema::table('posts', function (Blueprint $table) {
        // --     $table->enum('post_type', ['event','challenge','competition','industry','for-school'])->change();
        // -- });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (env('DB_CONNECTION') === 'mysql') {
            //DB::statement("ALTER TABLE `posts` MODIFY COLUMN `post_type` ENUM('event','challenge','competition') NOT NULL");
        } else {
            //DB::statement("ALTER TABLE posts ALERT TYPE post_type ADD VALUE 'industry'");
            //DB::statement("ALTER TABLE posts ALERT TYPE post_type ADD VALUE 'for-school'");
        }
    }
}
