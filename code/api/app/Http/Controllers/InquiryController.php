<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inquiry;

class InquiryController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(Inquiry::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(Inquiry::getFillableAttributes());
    }

    public function create()
    {
        $inquiry = Inquiry::create(request()->intersectKeys(Inquiry::getFillableAttributes()));

        return response()->json($inquiry);
    }
}
