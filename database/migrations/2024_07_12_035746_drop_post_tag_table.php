<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class DropPostTagTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('post_tag');
    }

    public function down()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            // Tambahkan kembali struktur tabel jika diperlukan
        });
    }
}
