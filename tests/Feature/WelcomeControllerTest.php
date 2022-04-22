<?php

namespace Tests\Feature;

use App\Models\Component;
use App\Models\Turbine;
use Tests\TestCase;

class WelcomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_page_has_view()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewIs('welcome');
    }

    public function test_page_has_turbine_type()
    {
        $turbine = Turbine::factory()->create();
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee($turbine->type);
    }

    public function test_page_has_turbine_uuid()
    {
        $turbine = Turbine::factory()->create();
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee($turbine->uuid);
    }

    public function test_page_has_turbine_grade()
    {
        $turbine = Turbine::factory()->create();
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee($turbine->grade);
    }

    public function test_page_has_turbine_latitude()
    {
        $turbine = Turbine::factory()->create();
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee($turbine->latitude);
    }

    public function test_page_has_turbine_longitude()
    {
        $turbine = Turbine::factory()->create();
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee($turbine->longitude);
    }

    public function test_page_has_turbine_components()
    {
        $turbine = Turbine::factory()->create();
        $component = Component::factory()->create();
        $turbine->components()->attach($component);
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee($turbine->components()->first()->name);
    }
}
