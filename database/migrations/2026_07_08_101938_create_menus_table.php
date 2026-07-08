<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->string('url')->default('#');
            $table->string('icon')->nullable()->default('ti ti-link'); 
            $table->integer('order')->default(0); 
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

       
        DB::table('menus')->insert([
            ['title' => 'Dashboard', 'url' => '/home', 'icon' => 'ti ti-home', 'order' => 1, 'created_at' => now()],
            ['title' => 'Menu Manager', 'url' => '/admin/menu-manager', 'icon' => 'ti ti-settings', 'order' => 2, 'created_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};