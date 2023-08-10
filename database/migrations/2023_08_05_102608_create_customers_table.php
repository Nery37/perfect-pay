<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Class CreateCustomersTable.
return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 200);
            $table->string('cpf_cnpj', 14);
            $table->string('email', 200);
            $table->string('mobile_phone', 14)->nullable();
            $table->string('zip_code', 20);
            $table->smallInteger('address_number')->nullable();
            $table->string('customer_gateway_id', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('customers');
    }
};
