<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('links', static function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('url');
            $table->string('shortened_url')->unique();
            $table->integer('counter')->default(0);
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->string('temporary_user_id')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
