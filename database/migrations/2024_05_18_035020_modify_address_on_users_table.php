<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('address');

            $table->text('state')->nullable()->after('phone');
            $table->text('postcode')->nullable()->after('phone');
            $table->text('city')->nullable()->after('phone');
            $table->text('address_2')->nullable()->after('phone');
            $table->text('address_1')->nullable()->after('phone');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->text('address')->nullable()->after('phone');

            $table->dropColumn('state');
            $table->dropColumn('postcode');
            $table->dropColumn('city');
            $table->dropColumn('address_2');
            $table->dropColumn('address_1');

        });
    }
};
