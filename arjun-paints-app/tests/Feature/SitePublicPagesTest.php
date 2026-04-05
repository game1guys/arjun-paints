<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SitePublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_site_pages_return_ok(): void
    {
        $paths = [
            '/',
            '/about',
            '/services',
            '/gallery',
            '/faq',
            '/how-we-work',
            '/catalog',
            '/contact',
        ];

        foreach ($paths as $path) {
            $this->get($path)->assertStatus(200);
        }
    }
}
