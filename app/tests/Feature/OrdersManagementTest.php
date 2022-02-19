<?php

namespace Tests\Feature;

use App\Models\Costumer;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Tests\TestCase;

class OrdersManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_create_a_new_order_belonging_to_a_costumer()
    {
        $costumer = Costumer::factory()->create();

        $this->assertDatabaseMissing('orders', [
            'costumer_id' => $costumer->id,
        ]);

        $this->actingAs($costumer->user)
            ->post('/orders', [
                'bought_at' => now()->toDateString(),
                'costumer_id' => $costumer->id,
            ]);

        $this->assertDatabaseHas('orders', [
            'costumer_id' => $costumer->id,
        ]);
    }

    public function test_a_user_can_manage_orders()
    {
        $order = Order::factory()->create();

        $this->actingAs($order->orderUser)
            ->patch('/orders/'.$order->id, [
                'bought_at' => now()->subDay()->toDateString(),
            ]);

        $this->assertDatabaseHas('orders', [
            'id' => $order->id,
            'bought_at' => now()->subDay()->toDateString(),
        ]);
    }
}
