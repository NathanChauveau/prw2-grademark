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
        Schema::create('school_class', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('study_plan_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('school_class_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('school_class', function (Blueprint $table) {
            $table->dropForeign('study_plan_id');
        });

        Schema::dropIfExists('school_class');

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('school_class_id');
            $table->dropColumn('school_class_id');
        });
    }
};
