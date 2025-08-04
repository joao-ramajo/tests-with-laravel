<?php

namespace App\Services;

class OrderService
{
    public function calculateDiscount(float $total, ?string $coupon = null): float
    {
        if ($coupon === 'DESCONTO10') {
            return $total * 0.90; // 10% de desconto
        }

        return $total;
    }
}
