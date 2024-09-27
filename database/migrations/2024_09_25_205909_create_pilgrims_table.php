<?php

use App\Enums\IdentityType;
use App\Models\User;
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
        Schema::create('pilgrims', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('identity_number')->unsigned();
            $table->enum('identity_type', [
                IdentityType::NATIONAL_ID->value,
                IdentityType::PASSPORT->value
            ]);

            $table->bigInteger('phone')->unsigned()->unique();
            $table->string('health_status', 50);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilgrims');
    }
};
