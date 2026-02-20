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
        Schema::table('users', function (Blueprint $table) {
            // Adding the role after the email column for a clean database view
            $table->enum('role',['admin', 'advocate', 'lawyer', 'associate'])->default('advocate')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // You MUST tell Laravel how to undo this change
            $table->dropColumn('role');
        });
    }
};
