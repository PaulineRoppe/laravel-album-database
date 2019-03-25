<?php

namespace Tests\Feature;

use App\Album;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AlbumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_will_show_all_albums()
    {
        $albums = factory(Album::class, 10)->create();

        $response = $this->get(route('albums.all'));

        $response->assertStatus(200);

        $response->assertJson($albums->toArray());
    }

    /** @test */
    public function it_will_create_albums()
    {
        $response = $this->post(route('albums.store'), [
            'albumCover' => 'This is an album cover',
            'artistName' => 'This is a artist name',
            'albumName' => 'This is a album name',
            'genre' => 'This is a genre',
            'productionYear' => 1975,
            'label' => 'This is a label',
            'songsList' => 'This is a songlist',
            'note' => 0
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('albums', [
            'albumCover' => 'This is an album cover'
        ]);

        $response->assertJsonStructure([
            'message',
            'album' => [
                'albumCover',
                'artistName',
                'albumName',
                'genre',
                'productionYear',
                'label',
                'songList',
                'note',
                'updated_at',
                'created_at',
                'id'
            ]
        ]);
    }

    /** @test */
    public function it_will_show_a_album()
    {
        $this->post(route('albums.store'), [
            'albumCover' => 'This is an album cover',
            'artistName' => 'This is a artist name',
            'albumName' => 'This is a album name',
            'genre' => 'This is a genre',
            'productionYear' => 1975,
            'label' => 'This is a label',
            'songsList' => 'This is a songlist',
            'note' => 0
        ]);

        $album = Album::all()->first();

        $response = $this->get(route('albums.show', $album->id));

        $response->assertStatus(200);

        $response->assertJson($album->toArray());
    }

    /** @test */
    public function it_will_update_a_album()
    {
        $this->post(route('CreateAlbumsTables.store'), [
            'albumCover' => 'This is an album cover',
            'artistName' => 'This is a artist name',
            'albumName' => 'This is a album name',
            'genre' => 'This is a genre',
            'productionYear' => 1975,
            'label' => 'This is a label',
            'songsList' => 'This is a songlist',
            'note' => 0
        ]);

        $album = Album::all()->first();

        $response = $this->put(route('albums.update', $album->id), [
            'albumCover' => 'This is the updated album cover'
        ]);

        $response->assertStatus(200);

        $album = $album->fresh();

        $this->assertEquals($album->title, 'This is the updated title');

        $response->assertJsonStructure([
           'message',
           'album' => [
               'albumCover',
               'artistName',
               'albumName',
               'genre',
               'productionYear',
               'label',
               'songList',
               'note',
               'updated_at',
               'created_at',
               'id'
           ]
       ]);
    }

    /** @test */
    public function it_will_delete_a_album()
    {
        $this->post(route('albums.store'), [
            'albumCover' => 'This is an album cover',
            'artistName' => 'This is a artist name',
            'albumName' => 'This is a album name',
            'genre' => 'This is a genre',
            'productionYear' => 1975,
            'label' => 'This is a label',
            'songsList' => 'This is a songlist',
            'note' => 0
        ]);

        $album = Album::all()->first();

        $response = $this->delete(route('albums.destroy', $album->id));

        $album = $album->fresh();

        $this->assertNull($album);

        $response->assertJsonStructure([
            'message'
        ]);
    }
}
