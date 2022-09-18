<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuraAyatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sura_ayats', function (Blueprint $table) {
            $table->id();
            $table->string('surah_number')->nullable();
            $table->string('ayat_number')->nullable();
            $table->longText('sura_ayat_english_description')->nullable();
            $table->longText('sura_ayat_arabic_description')->nullable();
            $table->longText('sura_ayat_arabic_description_harkat')->nullable();
            $table->longText('relavant_ayat')->nullable();
            $table->string('surah_name')->nullable();
            $table->longText('arabic_root_word')->nullable();
            $table->longText('normalized_arabic_word')->nullable();
            $table->longText('translitaration_word')->nullable();
            $table->longText('english_word_subject_subject_category')->nullable();
            $table->longText('english_word_sub_subject_sub_subject_category')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sura_ayats');
    }
}
