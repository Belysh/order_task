<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;
use App\Models\Product;

class ServiceController extends Controller
{

    public function index()
    {
        return Service::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'product_id' => 'required',
            'user_id' => 'required'
        ]);

        Service::create([
            'name' => $request->name,
            'product_id' => $request->product_id,
            'user_id' => $request->user_id,
        ]);
    }

    public function show($id)
    {
        return Service::find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Service::where('id', $id)->update([
            'name' => $request->name
        ]);
    }

    public function destroy($id)
    {
        Service::find($id)->delete();

        return 'Success';
    }

    public function upgrade(Request $request)
    {
        Service::where('id', $request->id)->update([
            'product_id' => $request->product_id
        ]);
    }

    public function downgrade(Request $request)
    {
        if (Product::find($request->product_id)->disk_size == Product::find(Service::find($request->id)->product_id)->disk_size) {
            Service::where('id', $request->id)->update([
                'product_id' => $request->product_id
            ]);
        } else {
            return 'Contact support to downgrade this service';
        }
    }
}
