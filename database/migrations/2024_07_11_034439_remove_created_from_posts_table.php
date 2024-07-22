<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveCreatedFromPostsTable extends Migration
{
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('created');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->timestamp('created')->nullable();
        });
    }
}
