<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ShapeControllerTest extends WebTestCase
{
    public function test_circle_route(): void
    {
        // make a client
        $client = static::createClient();

        // Request a specific page
        $client->request('GET', '/circle/5');

        // Validate a successful response and some content
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), 'HTTP code is not 200');
        $this->assertSame('application/json', $client->getResponse()->headers->get('Content-Type'));

    }


    public function test_circle_route_response_count(): void
    {
        // make a client
        $client = static::createClient();

        // Request a specific page
        $client->request('GET', '/circle/5');

        // Validate a successful response and some content
        $values = json_decode(json_decode($client->getResponse()->getContent(), true), true);

        // check for the count
        $this->assertCount(4, $values);

    }


    public function test_circle_route_response_contains_good_values(): void
    {
        // make a client
        $client = static::createClient();

        // Request a specific page
        $client->request('GET', '/circle/5');

        // Validate a successful response and some content
        $values = json_decode(json_decode($client->getResponse()->getContent(), true), true);

        // check for the count
        $this->assertCount(4, $values);

        // check if all values exists
        $this->assertArrayHasKey("type", $values);
        $this->assertArrayHasKey("radius", $values);
        $this->assertArrayHasKey("surface", $values);
        $this->assertArrayHasKey("circumference", $values);


    }


    public function test_circle_route_response_contains_correct_values(): void
    {
        // make a client
        $client = static::createClient();

        // Request a specific page
        $client->request('GET', '/circle/2');

        // Validate a successful response and some content
        $values = json_decode(json_decode($client->getResponse()->getContent(), true), true);

        // check if all values exists
        $this->assertEquals(2, $values["radius"]);
        $this->assertEquals(12.56637, $values["surface"]);
        $this->assertEquals(12.56637, $values["circumference"]);
    }


    public function test_triangle_route(): void
    {
        // make a client
        $client = static::createClient();

        // Request a specific page
        $client->request('GET', '/triangle/3/4/5');

        // Validate a successful response and some content
        $this->assertEquals(200, $client->getResponse()->getStatusCode(), 'HTTP code is not 200');
        $this->assertSame('application/json', $client->getResponse()->headers->get('Content-Type'));

    }


    public function test_triangle_route_response_count(): void
    {
        // make a client
        $client = static::createClient();

        // Request a specific page
        $client->request('GET', '/triangle/3/4/5');

        // Validate a successful response and some content
        $values = json_decode(json_decode($client->getResponse()->getContent(), true), true);

        // check for the count
        $this->assertCount(6, $values);

    }


    public function test_triangle_route_response_contains_good_values(): void
    {
        // make a client
        $client = static::createClient();

        // Request a specific page
        $client->request('GET', '/triangle/3/4/5');

        // Validate a successful response and some content
        $values = json_decode(json_decode($client->getResponse()->getContent(), true), true);


        // check if all values exists
        $this->assertTrue(isset($values["a"]));
        $this->assertTrue(isset($values["b"]));
        $this->assertTrue(isset($values["c"]));
        $this->assertTrue(isset($values["type"]));
        $this->assertTrue(isset($values["surface"]));
        $this->assertTrue(isset($values["circumference"]));

    }


    public function test_triangle_route_response_contains_correct_values(): void
    {
        // make a client
        $client = static::createClient();

        // Request a specific page
        $client->request('GET', '/triangle/3/4/5');

        // Validate a successful response and some content
        $values = json_decode(json_decode($client->getResponse()->getContent(), true), true);

        // check if all values exists
        $this->assertEquals(3, $values["a"]);
        $this->assertEquals(4, $values["b"]);
        $this->assertEquals(5, $values["c"]);
        $this->assertEquals(6, $values["surface"]);
        $this->assertEquals(12, $values["circumference"]);
    }


    public function test_circle_for_error_message(): void
    {
        // make a client
        $client = static::createClient();

        // Request a specific page
        $client->request('GET', '/circle/0');

        // check if all values exists
        $this->assertStringContainsString("the radius value should be greater than", $client->getResponse()->getContent());

    }


    public function test_triangle_for_error_message(): void
    {
        // make a client
        $client = static::createClient();

        // Request a specific page
        $client->request('GET', '/triangle/0/2/3');

        // check if all values exists
        $this->assertStringContainsString("value should be greater", $client->getResponse()->getContent());

    }


}