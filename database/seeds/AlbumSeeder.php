<?php

use App\Album;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    public function run()
    {
        factory(Album::class, 10)->create();
    }
}
