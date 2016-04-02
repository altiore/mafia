<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColomnCreaterToTableGamers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('gamers', 'creator_id')) {
            Schema::table('gamers', function (Blueprint $table) {
                $table->addColumn('integer', 'creator_id');
            });

            Schema::table('gamers', function (Blueprint $table) {
                $table->foreign('creator_id')
                    ->references('id')->on('users')
                    ->onDelete('no action')
                    ->onUpdate('cascade');

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('gamers', 'creator_id')) {
            Schema::table('gamers', function (Blueprint $table) {
                $table->dropColumn('creator_id');
            });
        }
    }
}
