<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Report;
use App\City;
use App\Event;

class ReportController extends Controller
{

    public function getAllAttributes()
    {
        return response()->json(Report::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(Report::getFillableAttributes());
    }

    public function create()
    {
        if(Auth::user()->role_type != 2) {
            abort(403);
        }

        $report = Report::create(request()->intersectKeys(Report::getFillableAttributes()));

        return response()->json(Report::find($report->id));
    }

    public function getAll()
    {
        $user = Auth::user();

        if(! in_array($user->role_type, [4])) {
            abort(403);
        }

        if($user->role_type == 4){
            return response()->json(Report::latest()->paginate(10));
        }

        abort(500);
    }

    public function getReportForOneCity($id)
    {
        $user = Auth::user();

        if(! in_array($user->role_type, [2, 4])) {
            abort(403);
        }

        return response()->json(City::findOrFail($id)->reports);
    }
}
