<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
    [
        'title' => 'Clean Code',
        'author' => 'Robert C. Martin',
        'year' => 2008,
        'description' => 'Software engineering best practice'
    ],
    [
        'title' => 'The Pragmatic Programmer',
        'author' => 'Andrew Hunt',
        'year' => 1999,
        'description' => 'Programming principles'
    ]
]);
    }
}
