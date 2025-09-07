<?php

require_once __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

use App\Http\Controllers\HomeController;
use App\Models\PortfolioCard;

echo "=== Homepage Debug ===\n";

// Test what the HomeController returns
$controller = new HomeController();

echo "\n1. Testing PortfolioCard query directly:\n";
$portfolioCards = PortfolioCard::active()->ordered()->get();
echo "Found {$portfolioCards->count()} active portfolio cards:\n";
foreach ($portfolioCards as $card) {
    echo "- ID: {$card->id}, Title: {$card->title}, Position: {$card->position}\n";
}

echo "\n2. Testing if cards have count > 0:\n";
echo "portfolioCards->count() > 0: " . ($portfolioCards->count() > 0 ? 'true' : 'false') . "\n";
echo "portfolioCards && portfolioCards->count() > 0: " . ($portfolioCards && $portfolioCards->count() > 0 ? 'true' : 'false') . "\n";

echo "\n3. Testing carousel logic:\n";
$cardsPerSlide = 5;
$totalSlides = ceil($portfolioCards->count() / $cardsPerSlide);
echo "Cards per slide: {$cardsPerSlide}\n";
echo "Total slides: {$totalSlides}\n";

echo "\n4. Testing card access:\n";
for ($slide = 0; $slide < $totalSlides; $slide++) {
    echo "Slide {$slide}:\n";
    for ($i = 0; $i < $cardsPerSlide; $i++) {
        $cardIndex = ($slide * $cardsPerSlide + $i) % $portfolioCards->count();
        $card = $portfolioCards[$cardIndex];
        echo "  Position {$i}: Card {$card->id} - {$card->title}\n";
    }
}

echo "\n=== Debug Complete ===\n";