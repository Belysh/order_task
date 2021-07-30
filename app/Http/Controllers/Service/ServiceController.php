<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;
use App\Models\Product;

class ServiceController extends Controller
{

    private function renderSerives() {
        $products = Product::all();
        $productsArray = [];
        
        for ($i = 0; $i < count($products); $i++) {
            $arr = Array(
                'Cores number: ' => $products[$i]->cores_number,
                'Memory size: ' => $products[$i]->memory_size,
                'Disk size: ' => $products[$i]->disk_size,
                'id' => $products[$i]->id
            );
            $productsArray[$products[$i]->name] = $arr;
        }

        return $productsArray;
        
    }

    public function index()
    {
        $user = auth()->user();
        $services = User::find($user->id)->service;
        $products = array_flip(array_map(function($element) {
            return $element['id'];
        }, $this->renderSerives()));

        return view('services.show', [
            'services' => $services,
            'ProductNames' => $products
        ]);
    }

    public function create()
    {
        $productsArray = $this->renderSerives();

        return view('services.create', [
            'productsArray' => $productsArray
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'product_choice' => "required"
        ]);

        Service::create([
            'name' => $request->input('name'),
            'product_id' => $request->input('product_choice'),
            'user_id' => auth()->user()->id,
        ]);
        
        return redirect('/services');
    }

    public function destroy(Request $request)
    {
        Service::find($request->id)->delete();
        return redirect('/services');
    }

    public function edit(Request $request)
    {
        $service = Service::find($request->id);
        $product_name = Product::find(Service::find($request->id)->product_id)->name;

        
        return view('services.edit', [
            'service' => $service,
            'product_name' => $product_name
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Service::where('id', $request->id)->update([
            'name' => $request->input('name')
        ]);
        
        return redirect('/services');
    }

    public function showUpgrade(Request $request)
    {    
        $productsArray = array_filter($this->renderSerives(), function($element) use ($request) {
            if($element['Memory size: '] > Product::find(Service::find($request->id)->product_id)->memory_size) {
                return $element;
            };
        });

        return view('services.upgrade', [
            'productsArray' => $productsArray,
            'id' => $request->id,
            'product_id' => Service::find($request->id)->product_id

        ]);
    }

    public function upgrade(Request $request)
    {
        Service::where('id', $request->id)->update([
            'product_id' => $request->product_id
        ]);
        
        return redirect('/services');
    }

    public function showDowngrade(Request $request)
    {
        $productsArray = array_filter($this->renderSerives(), function($element) use ($request) {
            if($element['Memory size: '] < Product::find(Service::find($request->id)->product_id)->memory_size) {
                return $element;
            };
        });

        
        return view('services.downgrade', [
            'productsArray' => $productsArray,
            'id' => $request->id,
            'product_id' => Service::find($request->id)->product_id

        ]);
    }

    public function downgrade(Request $request)
    {
        if (Product::find($request->product_id)->disk_size == Product::find(Service::find($request->id)->product_id)->disk_size) {
            Service::where('id', $request->id)->update([
                'product_id' => $request->product_id
            ]);
        } else {
            return view('services.downgrade-error');
        }
        return redirect('/services');
    }

}