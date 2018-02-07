<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;

class SurveyController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(Survey::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(Survey::getFillableAttributes());
    }

    public function create()
    {
        $survey = Survey::create(request()->intersectKeys(Survey::getFillableAttributes()));

        return response()->json($survey);
    }
}
