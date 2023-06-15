<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Notification\Notification;

class MarkNotificationAsRead extends Controller
{
    public function markAsRead($id, $url)
    {

        $notification = DB::table('notifications')->where('id', $id)->update([
            'read_at' => Carbon::now()
        ]);
        return redirect()->route($url);
    }
}