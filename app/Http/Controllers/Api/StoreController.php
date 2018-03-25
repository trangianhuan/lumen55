<?php

namespace App\Http\Controllers\Api;
use App\Models\Store;

class StoreController extends Controller
{
    const MODEL = 'App\Models\Review';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function all()
    {
        $stores = Store::All();
        $rs = [];
        foreach ($stores as $key => $store) {
            array_push($rs, [
                    'map' => $store->map,
                    'name' => $store->name,
                    'comments' => $store->reviews->toArray()
                ]
            );
        }
        return $rs;
    }
}
