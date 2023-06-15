<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMan;
use Illuminate\Http\Request;

class DeliveryMenStatusController extends Controller
{
    public function index()
    {
        $id = auth()->guard('delivery_men')->user()->id;
        $status = auth()->guard('delivery_men')->user()->status;
        return view('delivery_men.status', [
            'id' => $id,
            'status' => $status
        ]);
    }
    public function update(Request $request, $id)
    {

        $man = DeliveryMan::find($id);
        $man->status = $request->status;
        $man->save();
        return redirect()->route('delivery_men.status.index');
    }
}