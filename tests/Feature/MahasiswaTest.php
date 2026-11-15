<?php

namespace Tests\Feature;

use Tests\TestCase;

class MahasiswaTest extends TestCase
{
    public function test_daftar_mahasiswa_page_can_be_rendered(): void
    {
        $response = $this->get(route('mahasiswa.daftar'));

        $response->assertStatus(200);
        $response->assertViewIs('mahasiswa.daftar');
        $response->assertViewHas('mahasiswa');
        $response->assertSee('Anton');
        $response->assertSee('Budi');
        $response->assertSee('Ani');
        $response->assertSee('Sinta');
        $response->assertSee('Surabaya');
        $response->assertSee('Kediri');
        $response->assertSee('Malang');
    }
}
