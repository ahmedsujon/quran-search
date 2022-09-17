<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAyatWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayat_words', function (Blueprint $table) {
            $table->id();
            $table->string('unique_key')->nullable();
            $table->string('surah_number')->nullable();
            $table->string('ayat_number')->nullable();
            $table->longText('arabic_root_word')->nullable();
            $table->longText('arabic_root_word_harkat')->nullable();
            $table->longText('normalized_arabic_word')->nullable();
            $table->longText('normalized_arabic_word_harkat')->nullable();
            $table->longText('translitaration_word')->nullable();
            $table->longText('english_word_subject_category')->nullable();
            $table->longText('english_word_sub_subject_category')->nullable();
            $table->longText('word_sub_category_description')->nullable();
            $table->longText('inference_flag')->nullable();
            $table->longText('hadith_reference')->nullable();
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
        Schema::dropIfExists('ayat_words');
    }
}
