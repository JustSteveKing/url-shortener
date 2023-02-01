<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entries', static function (Blueprint $table) {
            $table->id();

            $table->string('hash')->unique();
            $table->text('url')->unique();

            $table->boolean('include_utm')->default(false);
            $table->boolean('forward_params')->default(true);

            $table->unsignedBigInteger('view_count')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
