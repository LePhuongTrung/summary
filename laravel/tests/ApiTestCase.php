<?php

namespace Tests;

abstract class ApiTestCase extends TestCase
{
    protected $apiUrl;

    public function setUp(): void
    {
        parent::setUp();
        $this->apiUrl = '/api/v1';
    }
}
