<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAreaToOffers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Offers', function (Blueprint $table) {
            $table->double('bedrooms')->after('price');
            $table->double('bathrooms')->after('price');
            $table->double('area')->after('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Offers', function (Blueprint $table) {
          $table->dropColumn('area');
          $table->dropColumn('bathrooms');
          $table->dropColumn('bedrooms');
         

        });
    }
}
