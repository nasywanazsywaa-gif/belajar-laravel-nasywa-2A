<?php

namespace Tests\Feature;

use Tests\TestCase;

class KalkulatorTest extends TestCase
{
    public function test_kalkulator_segitiga_page_can_be_rendered(): void
    {
        $response = $this->get(route('kalkulator.segitiga'));

        $response->assertStatus(200);
        $response->assertViewIs('kalkulator.segitiga');
        $response->assertSee('Perhitungan Luas Segitiga');
    }

    public function test_kalkulator_can_calculate_triangle_area(): void
    {
        $response = $this->post(route('kalkulator.segitiga'), [
            'alas' => 10,
            'tinggi' => 6,
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('kalkulator.segitiga');
        $response->assertViewHas('luas', 30.0);
        $response->assertSee('30 cm²');
    }
}
