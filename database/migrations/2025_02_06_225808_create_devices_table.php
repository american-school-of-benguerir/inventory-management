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
            $table->unsignedBigInteger('type_id')->nullable();
            $table->string('os')->default('N/A');
            $table->string('device_name')->nullable();
            $table->string('model_name')->default('N/A');
            $table->string('model_number')->nullable();
            $table->string('os_version')->default('N/A');
            $table->string('serial_number')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('ram')->default('N/A');
            $table->string('processor')->default('N/A');
            $table->string('disk_spaces')->default('N/A');
            $table->string('make')->default('N/A');
            $table->unsignedBigInteger('assignee_id')->nullable();
            $table->string('switch')->default('N/A');
            $table->string('port')->default('N/A');
            $table->unsignedBigInteger('last_updated_by')->nullable();
            // is the device defective
            $table->boolean('is_defective')->default(false);
            $table->softDeletes();
            $table->timestamps();

            // Add foreign key constraints after all columns are defined
            $table->foreign('type_id')
                ->references('id')
                ->on('types')
                ->onDelete('set null');

            $table->foreign('assignee_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            $table->foreign('last_updated_by')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
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
