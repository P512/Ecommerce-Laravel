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
        Schema::table('carts', function (Blueprint $table) {
            // Create the attribute_id column
            $table->unsignedBigInteger('attribute_id')->nullable();

            // Add foreign key constraint
            $table->foreign('attribute_id')->references('id')->on('attributes_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            // Drop foreign key constraint
            $table->dropForeign(['attribute_id']);

            // Drop the attribute_id column
            $table->dropColumn('attribute_id');
        });
    }
};

