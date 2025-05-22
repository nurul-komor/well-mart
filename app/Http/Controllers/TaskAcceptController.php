<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\DeliveryMenTask;

class TaskAcceptController extends Controller
{
    public function edit($orderId)
    {
        return view('delivery_men.add-task', [
            'order_id' => $orderId
        ]);
    }
    public function update_task($orderId, Request $request)
    {
        $data = DeliveryMenTask::where('order_id', $orderId)->first();
        if ($data == null) {
            DeliveryMenTask::create([
                "order_id" => $orderId,
                "delivery_men_id" => auth()->guard('delivery_men')->user()->id,
                'status' => 1
            ]);
            $order = Order::find($orderId);
            $order->status = "Sending";
            $order->save();
            session()->flash('message', 'Task Accepted');
            return redirect()->back();
        } else {
            session()->flash('message', 'Task Already Accepted');
            return redirect()->back();
        }
    }
    public function my_task()
    {
        $person = auth()->guard('delivery_men')->user();
        $tasks = DeliveryMenTask::where('delivery_men_id', $person->id)->with('order')->latest()->get();
        return view('delivery_men.my_task.index', [
            'tasks' => $tasks
        ]);
    }
    public function edit_my_task($id)
    {
        $task = DeliveryMenTask::find($id);
        $person = auth()->guard('delivery_men')->user();
        if ($task->delivery_men_id != $person->id) {
            abort(401);
        }
        return view('delivery_men.my_task.edit', [
            'task' => $task
        ]);
    }

    public function update_my_task($id, Request $request)
    {
        $task = DeliveryMenTask::find($id);
        $person = auth()->guard('delivery_men')->user();
        if ($task->delivery_men_id != $person->id) {
            abort(401);
        }
        validator($request->all(), [
            'status' => 'required',
        ])->validate();

        $order = Order::find($task->order_id);
        // return $request->status;
        if ($request->status == 'Delivered') {
            $order->status = 'Delivered';
            $order->save();

        } else {
            $task->status = $request->status;
            $task->save();

        }
        $task->status = 2;
        $task->save();
        session()->flash('message', "Status Updated Successfully");
        return back();
    }
}