<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Service;
use App\Models\Product;
use App\Models\User;

class ServiceApiTest extends TestCase
{

    public function test_api_index() {
        $response = $this->get('/api/services');
        
        $response->assertOk();
    }
    public function test_api_show() {
        $response = $this->get('/api/services/' . strval(random_int(1, 100)));
        
        $response->assertOk();
    }
    public function test_api_destroy() {
        $response = $this->get('/api/services/delete/' . strval(random_int(1, 100)));
        
        $response->assertOk();
    }

    
    public function test_api_store() {
        $response = $this->post('/api/services/add', [
            'name' => 'test',
            'product_id' => random_int(Product::all()->first()->id, Product::all()->last()->id),
            'user_id' => random_int(User::all()->first()->id, User::all()->last()->id),
            'created_at' => now(),
        ]);
        
        $response->assertOk(201);
    }

    public function test_api_update() {
        $response = $this->post('/api/services/edit/' . strval(random_int(1, 100)), [
            'name' => 'test1'
        ]);
        
        $response->assertOk();
    }

    /**** Тестирование upgrade/downgrade будет работать только при условии заполнения БД тестовыми данными из сидера ****/

    public function test_api_upgrade() {
        $rand = Service::where('product_id', '1')->first()->id;
        $response = $this->post('/api/services/downgrade/' . $rand . '/' . '3' , [
            'product_id' => '3'
        ]);
        
        $response->assertOk();
    }

    public function test_api_downgrade() {
        $rand = Service::where('product_id', '4')->first()->id;
        $response = $this->post('/api/services/downgrade/' . $rand . '/' . '1' , [
            'product_id' => '1'
        ]);
        
        $response->assertOk();
    }
}
