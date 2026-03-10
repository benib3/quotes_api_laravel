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
            //add column total_cost
            $table->float('total_cost')->default(0)->after('password');
            // add total_months_paid column
            $table->integer('total_months_paid')->default(0)->after('total_cost');
            //add column rank
            $table->integer('rank')->default(1)->after('total_months_paid');

            $table->index('rank');
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
            $table->dropColumn('total_cost');
            $table->dropColumn('total_months_paid');
            $table->dropColumn('rank');
        });
    }
};
