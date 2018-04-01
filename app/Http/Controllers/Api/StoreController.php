<?php

namespace App\Http\Controllers\Api;
use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    const MODEL = 'App\Models\Store';

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
                    'id' => $store->id,
                    'map' => $store->map,
                    'name' => $store->name,
                    'comments' => $store->reviews->toArray()
                ]
            );
        }
        return $rs;
    }

    public function add(Request $request)
    {
        $m = self::MODEL;
        $rules =[
            'map' => 'required',
        ];
        $data = $request->all();
        $this->validate($request, $rules);
        $data['dateCreate'] = date('Y-m-d');
        $data['map'] = $data['map']['lat'] . ',' . $data['map']['lng'];
        return $this->respond('created', $m::create($data));
    }
}
