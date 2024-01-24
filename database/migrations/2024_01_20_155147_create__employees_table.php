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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("darrebni_id")->nullable;
            $table->string("first_name")->nullable;
            $table->string("middle_name")->nullable;
            $table->string("last_name")->nullable;
            $table->date("birth_date")->nullable;
            $table->string("email")->nullable;
            $table->string("phone")->nullable;
            $table->string("address")->nullable;
            $table->string("image")->nullable;
            $table->string("salary")->nullable;
            $table->foreignId("brunch_id")->nullable()->constrained('brunches', 'id')->nullOnDelete();
            $table->foreignId("specializetion_id")->nullable()->constrained('specializetions', 'id')->nullOnDelete();
            $table->string("note")->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_employees');
    }
};
