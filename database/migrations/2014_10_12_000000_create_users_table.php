<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->decimal('balance');
            $table->decimal('profit');
            $table->decimal('bonus');
            $table->boolean('account_status')->default(true);
            $table->boolean('kyc_verified')->default(false);
            $table->text('kyc_file_path');
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('address')->nullable();
            $table->json('withdrawal_data')->default(json_encode([
                'bank_name'         =>  null,
                'account_name'      =>  null,
                'account_number'    =>  null,
                'bitcoin_address'   =>  null,
                'litecoin_address'  =>  null,
                'ethereum_address'  =>  null,
            ]));
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
