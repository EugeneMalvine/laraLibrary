<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('author')->unsigned();
            $table->text('note')->nullable();
            $table->decimal('rating')->default(0);
            $table->boolean('isPrivate')->default(false);
            $table->date('dateStart');
            $table->date('dateFinish')->nullable();
            $table->foreign('author')->references('id')->on('users');
        });

        if (!Schema::hasColumn('users', 'balance')) {
            Schema::table('users', function (Blueprint $table) {
                $table->decimal('balance')->default(0);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('cards');

        if (Schema::hasColumn('users', 'balance')) {
            Schema::dropColumns('users', ['balance']);
        }
    }
};
