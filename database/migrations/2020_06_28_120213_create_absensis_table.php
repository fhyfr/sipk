<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            //kolom untuk foreign Key nya
            $table->unsignedBigInteger('karyawan_id')->nullable();
            $table->string('name');
            $table->string('nik');
            $table->string('bulan');
            $table->string('tahun');
            $table->string('jabatan');
            $table->integer('jml_hadir');
            $table->integer('jml_alfa');
            $table->integer('jml_izin');
            $table->integer('jml_sakit');
            $table->integer('jml_lembur');

            $table->timestamps();
        });

        //Buat FK tanda dari mana asal kolom karyawan_id
        Schema::table('absensis', function (Blueprint $kolom) {
            $kolom->foreign('karyawan_id')
                ->references('id')
                ->on('karyawans')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
}
