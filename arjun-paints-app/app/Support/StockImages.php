<?php

namespace App\Support;

/**
 * Local stock photos under public/images/stock — works offline and avoids hotlink failures.
 */
final class StockImages
{
    /** @var array<string, string> */
    private const FILES = [
        'interior_hero' => 'interior-hero.jpg',
        'exterior' => 'exterior.jpg',
        'commercial' => 'commercial.jpg',
        'residential' => 'residential.jpg',
        'wallpaper' => 'wallpaper.jpg',
        'abstract' => 'abstract.jpg',
        'team' => 'team.jpg',
        'painter' => 'painter.jpg',
        'gallery_1' => 'gallery-1.jpg',
        'gallery_2' => 'gallery-2.jpg',
        'gallery_3' => 'gallery-3.jpg',
        'gallery_4' => 'gallery-4.jpg',
        'gallery_5' => 'gallery-5.jpg',
        'gallery_6' => 'gallery-6.jpg',
        'extra_1' => 'commercial.jpg',
        'extra_2' => 'residential.jpg',
        'extra_3' => 'wallpaper.jpg',
        'extra_4' => 'interior-hero.jpg',
        'extra_5' => 'team.jpg',
        'extra_6' => 'home-cta.jpg',
        'home_cta' => 'home-cta.jpg',
        'hero_texture' => 'hero-texture.jpg',
    ];

    public static function url(string $key): string
    {
        $file = self::FILES[$key] ?? self::FILES['interior_hero'];

        return asset('images/stock/'.$file);
    }
}
