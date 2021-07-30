<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Service;
use App\Models\Product;
use App\Models\User;

class ServiceTest extends TestCase
{

    public function test_index() {
        $response = $this->get('/services');
        
        $response->assertStatus(302);
    }
    public function test_add() {
        $response = $this->get('/services/add');
        
        $response->assertStatus(302);
    }
    public function test_edit() {
        $response = $this->get('/services/edit/' . strval(random_int(1, 100)));
        
        $response->assertStatus(302);
    }
    public function test_delete() {
        $response = $this->get('services/delete/' . strval(random_int(1, 100)));
        
        $response->assertStatus(302);
    }
    public function test_show_upgrade() {
        $response = $this->get('services/upgrade/' . strval(random_int(1, 100)));
        
        $response->assertStatus(302);
    }
    public function test_show_downgrade() {
        $response = $this->get('services/downgrade/' . strval(random_int(1, 100)));
        
        $response->assertStatus(302);
    }

    public function test_store() {
        $response = $this->post('services/store/', [
            'name' => 'test',
            'product_id' => random_int(Product::all()->first()->id, Product::all()->last()->id),
            'user_id' => random_int(User::all()->first()->id, User::all()->last()->id),
            'created_at' => now(),
        ]);
        
        $response->assertStatus(302);
    }

    public function test_update() {
        $response = $this->post('/api/services/edit/' . strval(random_int(1, 100)), [
            'name' => 'test1'
        ]);
        
        $response->assertOk(302);
    }

    public function test_upgrade() {
        $rand = Service::where('product_id', '1')->first()->id;
        $response = $this->post('/api/services/downgrade/' . $rand . '/' . '3' , [
            'product_id' => '3'
        ]);
        
        $response->assertOk(302);
    }

    public function test_downgrade() {
        $rand = Service::where('product_id', '4')->first()->id;
        $response = $this->post('/api/services/downgrade/' . $rand . '/' . '1' , [
            'product_id' => '1'
        ]);
        
        $response->assertOk(302);
    }
    
}
