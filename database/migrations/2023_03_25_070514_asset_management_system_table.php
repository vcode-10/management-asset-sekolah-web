<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {


        Schema::create('tipe_aset', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('keterangan');
            $table->timestamps();
        });

        Schema::create('lokasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('keterangan');
            $table->timestamps();
        });

        Schema::create('kondisi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('keterangan');
            $table->timestamps();
        });

        Schema::create('aset', function (Blueprint $table) {
            $table->id()->unique()->nullable();
            $table->string('nama');
            $table->unsignedBigInteger('tipe_aset_id');
            $table->unsignedBigInteger('lokasi_id');
            $table->unsignedBigInteger('kondisi_id');
            $table->text('keterangan');
            $table->string('status');
            $table->timestamps();

            $table->foreign('tipe_aset_id')->references('id')->on('tipe_aset')->onDelete('cascade');
            $table->foreign('lokasi_id')->references('id')->on('lokasi')->onDelete('cascade');
            $table->foreign('kondisi_id')->references('id')->on('kondisi')->onDelete('cascade');
        });

        Schema::create('permintaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipe_aset_id');
            $table->string('diminta_oleh');
            $table->date('tanggal_diminta');
            $table->text('keterangan');
            $table->integer('jumlah');
            $table->string('status');
            $table->timestamps();

            $table->foreign('tipe_aset_id')->references('id')->on('tipe_aset')->onDelete('cascade');
        });

        Schema::create('pemeliharaan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aset_id');
            $table->date('tanggal_minta');
            $table->date('tanggal_selesai')->nullable();
            $table->float('biaya', 10, 2)->nullable();
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('aset_id')->references('id')->on('aset')->onDelete('cascade');
        });

        Schema::create('disposisi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aset_id');
            $table->date('tanggal_disposisi');
            $table->string('disposisi_oleh');
            $table->string('alasan_disposisi');
            $table->float('biaya', 10, 2);
            $table->timestamps();

            $table->foreign('aset_id')->references('id')->on('aset')->onDelete('cascade');
        });

        Schema::create('peminjam', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('telepon');
            $table->timestamps();
        });

        Schema::create('item_pinjam', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aset_id');
            $table->unsignedBigInteger('peminjam_id');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_jatuh_tempo');
            $table->date('tanggal_kembali')->nullable();
            $table->timestamps();

            $table->foreign('aset_id')->references('id')->on('aset')->onDelete('cascade');
            $table->foreign('peminjam_id')->references('id')->on('peminjam')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset');
        Schema::dropIfExists('tipe_aset');
        Schema::dropIfExists('disposisi');
        Schema::dropIfExists('pemeliharaan');
        Schema::dropIfExists('kondisi');
        Schema::dropIfExists('lokasi');
        Schema::dropIfExists('item_pinjam');
        Schema::dropIfExists('peminjam');
    }
};
