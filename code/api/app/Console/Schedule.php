<?php

namespace App\Console;

use App\Payment;
use Carbon\Carbon;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;

class Schedule
{
    use DispatchesJobs;

    static public function removeExpiredPayment()
    {
        return function() {
            $payments = Payment::where('created_at', '<=', Carbon::now()->subHour()->toDateTimeString())
                ->where('status', 1)
                ->get();

            foreach($payments as $payment) {
                $payment->delete();
            }
        };
    }
}
