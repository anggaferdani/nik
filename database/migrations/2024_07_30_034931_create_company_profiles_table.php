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
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->string('subsubtitle');
            $table->text('description');
            $table->string('title_layanan');
            $table->text('description_layanan');
            $table->text('visi');
            $table->text('misi1');
            $table->text('misi2');
            $table->text('misi3');
            $table->text('misi4');
            $table->text('misi5');
            $table->text('address');
            $table->string('wa');
            $table->string('email');
            $table->string('email2');
            $table->text('instagram')->nullable();
            $table->text('facebook')->nullable();
            $table->text('tokopedia')->nullable();
            $table->text('linkedin')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
