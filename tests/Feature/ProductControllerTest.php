<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Product;
use App\Models\Manufacturer;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_lists_products(): void
    {
        $m = Manufacturer::create(['name' => 'Samsung']);
        Product::create(['name' => 'Smartphone', 'price' => 999.99, 'manufacturer_id' => $m->id]);

        $this->get('/products')
            ->assertStatus(200)
            ->assertSee('Products')
            ->assertSee('Smartphone')
            ->assertSee('Samsung');
    }

    public function test_show_displays_product_detail(): void
    {
        $m = Manufacturer::create(['name' => 'Apple']);
        $p = Product::create(['name' => 'TV', 'price' => 499.99, 'manufacturer_id' => $m->id]);

        $this->get("/products/{$p->id}")
            ->assertStatus(200)
            ->assertSee('TV')
            ->assertSee('Apple');
    }

    public function test_product_show_page_for_non_existent_product_returns_404(): void
    {
        // Your controller uses findOrFail(), so 404 is expected
        $this->get('/products/999999')->assertStatus(404);
    }
}
