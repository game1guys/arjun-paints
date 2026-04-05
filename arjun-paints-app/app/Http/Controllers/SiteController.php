<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Support\StockImages;
use App\Models\ContactInquiry;
use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function home(): View
    {
        $partnerBrands = Brand::query()
            ->where('is_active', true)
            ->orderBy('name')
            ->limit(12)
            ->get();

        $serviceShowcase = $this->serviceShowcaseCards();

        $whyChoose = [
            ['title' => 'Proven expertise', 'body' => 'Twenty-five years on real Indian sites — from village homes to high-street retail — with brands that families already recognise.'],
            ['title' => 'Digital-first planning', 'body' => 'Clear estimates, shade shortlists, and timelines shared before we open a single tin — fewer surprises on site.'],
            ['title' => 'Flexible execution', 'body' => 'We adapt to your calendar: after-hours touch-ups for shops, phased rooms for residences, and fast turnarounds when you need them.'],
            ['title' => 'Local roots, wider vision', 'body' => 'Rooted in Suryapet with the same discipline we would bring to any growing market — craft first, noise never.'],
        ];

        $galleryImages = $this->galleryCatalog();

        $brandsForSections = $partnerBrands->isNotEmpty()
            ? $partnerBrands->take(3)
            : collect([
                (object) ['name' => 'Asian Paints', 'description' => null],
                (object) ['name' => 'Berger', 'description' => null],
                (object) ['name' => 'Shalimar', 'description' => null],
            ]);

        $testimonials = $this->testimonials();
        $highlights = $this->homeHighlights();

        return view('site.home', compact(
            'partnerBrands',
            'brandsForSections',
            'serviceShowcase',
            'whyChoose',
            'galleryImages',
            'testimonials',
            'highlights'
        ));
    }

    public function about(): View
    {
        return view('site.about', [
            'milestones' => $this->milestones(),
            'teamValues' => $this->teamValues(),
        ]);
    }

    public function services(): View
    {
        return view('site.services', [
            'detailServices' => $this->serviceDetailCards(),
            'processSteps' => $this->processSteps(),
        ]);
    }

    public function gallery(): View
    {
        return view('site.gallery', [
            'galleryImages' => $this->galleryCatalog(),
            'extraGallery' => $this->extraGalleryImages(),
        ]);
    }

    public function faq(): View
    {
        return view('site.faq', [
            'faqs' => $this->faqItems(),
        ]);
    }

    public function process(): View
    {
        return view('site.process', [
            'processSteps' => $this->processSteps(),
        ]);
    }

    public function catalog(): View
    {
        $brands = Brand::query()
            ->where('is_active', true)
            ->with(['products' => fn ($q) => $q->where('is_active', true)->orderBy('name')])
            ->orderBy('name')
            ->get();

        $offers = Offer::query()
            ->where('is_active', true)
            ->where('is_festival', false)
            ->where('starts_at', '<=', now())
            ->where('ends_at', '>=', now())
            ->orderBy('ends_at')
            ->get();

        $festivalOffers = Offer::query()
            ->where('is_active', true)
            ->where('is_festival', true)
            ->where('starts_at', '<=', now())
            ->where('ends_at', '>=', now())
            ->orderBy('ends_at')
            ->get();

        return view('site.catalog', compact('brands', 'offers', 'festivalOffers'));
    }

    public function contact(): View
    {
        return view('site.contact');
    }

    public function contactSubmit(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:32'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        ContactInquiry::query()->create($validated);

        return redirect()
            ->route('contact')
            ->with('status', 'Thank you — we will get back to you soon.');
    }

    /** @return array<int, array{title: string, excerpt: string, image: string}> */
    private function serviceShowcaseCards(): array
    {
        return [
            [
                'title' => 'Interior painting',
                'excerpt' => 'Even coats, liveable schedules, and finishes that handle everyday scuffs.',
                'image' => StockImages::url('interior_hero'),
            ],
            [
                'title' => 'Exterior painting',
                'excerpt' => 'Weather-smart systems that keep elevations sharp through heat and monsoon.',
                'image' => StockImages::url('exterior'),
            ],
            [
                'title' => 'Commercial painting',
                'excerpt' => 'Retail, offices, and warehouses — coordinated crews and durable corridors.',
                'image' => StockImages::url('commercial'),
            ],
            [
                'title' => 'Residential projects',
                'excerpt' => 'Independent homes to apartments — masking, putty, and colour harmony.',
                'image' => StockImages::url('residential'),
            ],
            [
                'title' => 'Wallpaper installation',
                'excerpt' => 'Pattern alignment and clean seams for statement walls.',
                'image' => StockImages::url('wallpaper'),
            ],
        ];
    }

    /** @return array<int, array{title: string, body: string, image: string}> */
    private function serviceDetailCards(): array
    {
        return [
            [
                'title' => 'Interior painting',
                'body' => 'Living rooms, bedrooms, kitchens, offices — masking, crack filling, primer, and washable topcoats. We help balance natural light, artificial light, and furniture so the shade you love on the card still feels right on the wall.',
                'image' => StockImages::url('interior_hero'),
            ],
            [
                'title' => 'Exterior painting',
                'body' => 'Weather-shield and elastomeric options where elevations face sun and rain. Proper scaffolding discussion, curing gaps, and texture finishes that hide minor undulations without looking heavy.',
                'image' => StockImages::url('exterior'),
            ],
            [
                'title' => 'Commercial painting',
                'body' => 'Retail, warehouses, clinics, and schools — coordinated shifts, durable corridors, and clear sign-off between phases so your operations stay predictable.',
                'image' => StockImages::url('commercial'),
            ],
            [
                'title' => 'Residential projects',
                'body' => 'Independent houses to apartments — single rooms to full buildings. Phased painting when you are living on site; clean handover with labelled leftover paint.',
                'image' => StockImages::url('residential'),
            ],
            [
                'title' => 'Wallpaper installation',
                'body' => 'Feature walls and full rooms with pattern alignment, clean seams, and compatible adhesives for your substrate — ideal when you want texture beyond solid paint.',
                'image' => StockImages::url('wallpaper'),
            ],
            [
                'title' => 'Brands & systems',
                'body' => 'Asian Paints, Berger, Shalimar — we recommend the right series (economy to premium) based on substrate, exposure, and budget, with no hidden “upgrade” pressure.',
                'image' => StockImages::url('abstract'),
            ],
        ];
    }

    /** @return array<int, array{src: string, alt: string}> */
    private function galleryCatalog(): array
    {
        return [
            ['src' => StockImages::url('gallery_1'), 'alt' => 'Bright interior living space'],
            ['src' => StockImages::url('gallery_2'), 'alt' => 'Modern room with natural light'],
            ['src' => StockImages::url('gallery_3'), 'alt' => 'Elegant exterior façade'],
            ['src' => StockImages::url('gallery_4'), 'alt' => 'Painter applying colour'],
            ['src' => StockImages::url('gallery_5'), 'alt' => 'Colourful interior detail'],
            ['src' => StockImages::url('gallery_6'), 'alt' => 'Office workspace'],
        ];
    }

    /** @return array<int, array{src: string, alt: string}> */
    private function extraGalleryImages(): array
    {
        return [
            ['src' => StockImages::url('extra_1'), 'alt' => 'Commercial space'],
            ['src' => StockImages::url('extra_2'), 'alt' => 'Residential interior'],
            ['src' => StockImages::url('extra_3'), 'alt' => 'Wallpaper feature wall'],
            ['src' => StockImages::url('extra_4'), 'alt' => 'Colourful modern room'],
            ['src' => StockImages::url('extra_5'), 'alt' => 'Professional painting'],
            ['src' => StockImages::url('extra_6'), 'alt' => 'Home exterior'],
        ];
    }

    /** @return array<int, array{quote: string, name: string, note: string}> */
    private function testimonials(): array
    {
        return [
            [
                'quote' => 'They explained primer options for our west-facing wall — two summers later, the shade still looks fresh.',
                'name' => 'Homeowner · Suryapet',
                'note' => 'Interior repaint',
            ],
            [
                'quote' => 'Our shop was painted after closing hours; opening on time next morning mattered — they delivered.',
                'name' => 'Retail owner · NH-65 corridor',
                'note' => 'Commercial',
            ],
            [
                'quote' => 'No surprise add-ons in the bill. What we agreed on paper is what we paid.',
                'name' => 'Independent house · nearby mandal',
                'note' => 'Full exterior',
            ],
        ];
    }

    /** @return array<int, array{title: string, body: string}> */
    private function homeHighlights(): array
    {
        return [
            ['title' => 'Site survey & moisture check', 'body' => 'We look at cracks, seepage history, and sun exposure before recommending a system — not just a shade card.'],
            ['title' => 'Authorised dealer network', 'body' => 'Asian Paints, Berger, Shalimar — genuine material, correct batch documentation where you need it for warranty.'],
            ['title' => 'Handover you can maintain', 'body' => 'Leftover paint labelled, touch-up tips shared, and a clear redo window if something slips through.'],
        ];
    }

    /** @return array<int, array{year: string, title: string, body: string}> */
    private function milestones(): array
    {
        return [
            ['year' => '1990s', 'title' => 'Roots in Suryapet', 'body' => 'Small teams, ladders, and word-of-mouth — learning how local weather treats lime, cement, and newer plasters.'],
            ['year' => '2000s', 'title' => 'Structured projects', 'body' => 'From single rooms to full elevations — masking, curing times, and brand-backed systems became part of every quote.'],
            ['year' => 'Today', 'title' => 'Digital + on-ground', 'body' => 'Shade PDFs, WhatsApp updates, and the same crew discipline — so you always know what happens next on site.'],
        ];
    }

    /** @return array<int, array{title: string, body: string}> */
    private function teamValues(): array
    {
        return [
            ['title' => 'No guesswork on quantities', 'body' => 'We measure, refer to product datasheets, and add sensible wastage — you see the math before purchase.'],
            ['title' => 'Respect for your space', 'body' => 'Floors covered, furniture masked, and dust managed — especially when kids or elders are at home.'],
            ['title' => 'Aftercare', 'body' => 'Seasonal checks suggested for exteriors; interiors get a touch-up schedule so small nicks do not become eyesores.'],
        ];
    }

    /** @return array<int, array{step: string, title: string, body: string}> */
    private function processSteps(): array
    {
        return [
            ['step' => '01', 'title' => 'Discuss & survey', 'body' => 'Share photos or invite us over — we note substrate, repairs, and your finish expectations.'],
            ['step' => '02', 'title' => 'Estimate & shades', 'body' => 'Line-item quote with product series, coats, and timeline. Shortlisted shades for natural and artificial light.'],
            ['step' => '03', 'title' => 'Prep & primer', 'body' => 'Cleaning, crack filling, sanding where needed — primer chosen for adhesion and alkalinity.'],
            ['step' => '04', 'title' => 'Topcoats & detail', 'body' => 'Even rollers and brushes, cut-ins sharp, drying gaps respected for durability.'],
            ['step' => '05', 'title' => 'Walkthrough', 'body' => 'Joint inspection, snag list closed same visit, handover notes and care tips shared.'],
        ];
    }

    /** @return array<int, array{q: string, a: string}> */
    private function faqItems(): array
    {
        return [
            [
                'q' => 'How long does a typical home interior take?',
                'a' => 'A 2–3 BHK often needs 4–10 working days after prep, depending on repairs, humidity, and number of coats. We share a day-wise plan before starting.',
            ],
            [
                'q' => 'Do you supply material or only labour?',
                'a' => 'We can do labour-only with your material, or supply authorised packs from our dealer network — whatever keeps your warranty and budget clear.',
            ],
            [
                'q' => 'Which brands do you recommend for exteriors in Telangana heat?',
                'a' => 'We typically shortlist weather-shield and elastomeric systems from Asian Paints, Berger, or Shalimar based on elevation, exposure, and budget — never a one-size-fits-all.',
            ],
            [
                'q' => 'Can you match an old shade?',
                'a' => 'Yes — bring a chip or we can scan and trial patches on site before full application.',
            ],
            [
                'q' => 'What payment modes do you accept?',
                'a' => 'Cash, UPI, and common cards at the store. Project milestones are agreed in writing before work begins.',
            ],
            [
                'q' => 'Do you work outside Suryapet?',
                'a' => 'Yes for larger projects within a reasonable radius — travel and stay are discussed upfront in the estimate.',
            ],
        ];
    }
}
