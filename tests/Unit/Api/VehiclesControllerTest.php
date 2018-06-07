<?php

namespace Tests\Unit\Api;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Stop;
use App\Route;

class VehiclesControllerTest extends TestCase
{
    public function testGetAll() {

        $response = json_decode($this->json('GET', '/api/v1/vehicles')->getContent());

        try {
            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals(3, count($response->data->vehicles));

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }
    }

    public function testGetById() {

        $response = json_decode($this->json('GET', '/api/v1/vehicles/1')->getContent());

        try {
            $this->assertEquals(200, $response->code);
            $this->assertEquals(true, $response->status);
            $this->assertEquals(1, $response->data->vehicle->id);

        } catch (\Exception $exception) {

            echo $exception->getMessage();

            $this->assertTrue(false);
        }
    }
}
