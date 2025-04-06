<?php

namespace App\Http\Controllers\API;

use Midtrans\Config;
use Midtrans\Notification;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MidtransController extends Controller
{
    public function callback()
    {
        // Set Konfiguration midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');
        
        // Buat instance midtrans notification
        $notification = new Notification();

        // Assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;

        // Get transaction id
        $order = explode('-', $order_id);

        // Cari notification status midtrans
        $transaction = Transaction::findOrFail($order[1]);

        // Handle notification status midtrans
        if($status == 'capture'){
            if($type == 'credit_card'){
                if($fraud == 'challenge'){
                    $transaction->status = 'PENDING';
                }
                else{
                    $transaction->status = 'SUCCESS';
                }
            }
        }

        else if($status == 'settlement'){
            $transaction->status = 'SUCCESS';
        }
        else if($status == 'deny'){
            $transaction->status = 'PENIDING';
        }
        else if($status == 'deny'){
            $transaction->status = 'PENIDING';
        }
        else if($status == 'expired'){
            $transaction->status = 'CANCELLED';
        }
        else if($status == 'cancel'){
            $transaction->status = 'CANSELLED';
        }

        // Simpan trasnsaksi
        $transaction->save();

        // Retuen respon untuk midtrans
        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'Midtrans Notification Success'
            ]
        ]);
    }
}
