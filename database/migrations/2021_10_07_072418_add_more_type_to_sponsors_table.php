<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddMoreTypeToSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("ALTER TABLE `sponsors` CHANGE `type` `type` ENUM('platinum','silver','bronze', 'gold') NOT NULL DEFAULT 'bronze';");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("ALTER TABLE `sponsors` CHANGE `type` `type` ENUM('platinum','silver','bronze') NOT NULL DEFAULT 'bronze';");
    }
}
