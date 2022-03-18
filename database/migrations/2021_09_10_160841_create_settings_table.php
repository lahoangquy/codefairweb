<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->longText('meta_key');
        });

        \App\Settings::create([
            'meta_key' => [
                'social_fb' => 'https://www.facebook.com/CDUENGIT/',
                'social_instagram' => 'https://www.instagram.com/itcodefair_cdu/',
                'social_youtube' => 'https://www.youtube.com/channel/UCEWii6myqFdcL8eb5PfcLow/playlists?view_as=subscriber',
                'support_email' => 'icodefair@cdu.edu.au',
                'phone_number' => '',
                'address' => '',
                'page_title' => 'IT Code Fair – Innovate, create, have fun',
                'page_description' => 'IT Code Fair – Innovate, create, have fun'
            ]
        ]);
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
