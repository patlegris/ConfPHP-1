<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('comments')->truncate();

        DB::table('comments')->insert([
            [
                'email'   => 'lea@mail.com',
                'message' => 'Genial !',
                'post_id' => 1
            ],
            [
                'email'   => 'eve@mail.com',
                'message' => 'Mais trop !',
                'post_id' => 1
            ],
            [
                'email'   => 'tom@mail.com',
                'message' => 'Awesome !',
                'post_id' => 2
            ],
            [
                'email'   => 'paul@mail.com',
                'message' => 'Mouai pas terrible',
                'post_id' => 3
            ],
            [
                'email'   => 'sam@mail.com',
                'message' => 'J\'y suis allé c\'était ouf !',
                'post_id' => 3
            ],
            [
                'email'   => 'neo@mail.com',
                'message' => 'Remboursééé !',
                'post_id' => 3
            ],
            [
                'email'   => 'mat@mail.com',
                'message' => 'A voir',
                'post_id' => 4
            ],
        ]);
    }
}
