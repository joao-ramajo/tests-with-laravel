<?php

use App\Services\BusinessService;
use Carbon\Carbon;

beforeEach(function() {
    $this->BusinessService = new BusinessService();
});

test('Fechado as 04:00', function () {
    Carbon::setTestNow(Carbon::create(2025, 5, 5, 4, 0, 0));
    expect($this->BusinessService->isOpen())->toBeFalse();
});

test('Aberto exatamente às 09:00', function () {
    Carbon::setTestNow(Carbon::create(2025, 5, 5, 9, 0, 0));
    expect($this->BusinessService->isOpen())->toBeTrue();
});

test('Aberto exatamente às 18:00', function () {
    Carbon::setTestNow(Carbon::create(2025, 5, 5, 18, 0, 0));
    expect($this->BusinessService->isOpen())->toBeTrue();
});

test('Fechado as 18:01', function() {
    Carbon::setTestNow(Carbon::create(2025, 5, 5, 18, 1, 0));
    expect($this->BusinessService->isOpen())->toBeFalse();
});
