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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();

            $table->time('start')->nullable();
            $table->string('start_activity')->nullable();

            $table->time('middle')->nullable();
            $table->string('middle_activity')->nullable();

            $table->time('end')->nullable();

            $table->string('img_start')->nullable();
            $table->string('img_end')->nullable();

            $table->boolean('izin_status')->nullable()->default(false);
            $table->string('alasan_izin')->nullable();

            $table->foreignId('user_id')
                ->constrained('users', 'id')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
