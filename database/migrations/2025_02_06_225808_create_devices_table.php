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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('type_id')->constrained('types')->onDelete('set null')->nullable();
            $table->string('os')->default('N/A');
            $table->string('os_version')->default('N/A');
            $table->string('serial_number')->unique();
            $table->string('mac_address')->unique();
            $table->string('ram')->default('N/A');
            $table->string('processor')->default('N/A');
            $table->string('disk_spaces')->default('N/A');
            $table->string('model')->default('N/A');
            $table->string('make')->default('N/A');
            $table->foreignId('assignee_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('switch')->default('N/A');
            $table->string('port')->default('N/A');
            $table->text('notes')->nullable();
            $table->foreignId('last_updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
