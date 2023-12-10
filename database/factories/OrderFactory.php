<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected function orderID()
    {
        do {
            $orderid = random_int(100000, 999999);
        } while (Order::where("order_id", "=", $orderid)->first());

        return $orderid;
    }

    protected function gstin($length)
    {
        $chars = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($chars), 0, $length);
    }

    public function definition(): array
    {
        $orderId = $this->orderID();
        return [
            'order_id' => $orderId,
            'u_id' => $orderId,
            'cname' => fake()->name(),
            'cadd' => 'Boisar',
            'cgstin' => $this->gstin(15),
            'cstyle_ref' => Str::random(6),
            'email' => fake()->unique()->safeEmail(),
            'phone' => random_int(1000000000, 9999999999),
        ];
    }
}
