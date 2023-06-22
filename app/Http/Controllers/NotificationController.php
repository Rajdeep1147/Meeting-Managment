<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\OfferNotification;


class NotificationController extends Controller
{
    public function sendNotification()
    {
        $user = User::first();

        $offerData = [
            'name'=>'Rajdeep',
            'body'=>'You Reveice an Offer',
            'thanks'=>'Thank You',
            'offerUrl'=> url('/'),
            'offer_id'=> rand(1111,99999),

        ];
        $user->notify(new OfferNotification($offerData));
        // Notification::send($user,new OfferNotification($offerData));
        dd('notification send');
        
    }
}
