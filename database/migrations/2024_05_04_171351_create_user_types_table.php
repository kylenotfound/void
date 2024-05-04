<?php

use App\Models\UserType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void {
        Schema::create('user_types', function (Blueprint $table) {
            $table->id();
            $table->string('id_name');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('users', function(Blueprint $table) {
            $table->foreignIdFor(UserType::class)->default(UserType::BASIC)->after('is_socialite_user');
        });
    }

    public function down(): void {
        Schema::dropIfExists('user_types');
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('user_type_id');
        });
    }
};
