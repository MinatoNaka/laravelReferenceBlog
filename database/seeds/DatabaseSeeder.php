<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 外部キーを追加します
        Schema::table('comments', function ($table) {
            $table->foreign('entry_id')->references('id')
                ->on('entries')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('entries', function ($table) {
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }
}
