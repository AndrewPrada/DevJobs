<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function index(Vacancy $vacancy)
    {
        //
        return view('applicants.index', [
            'vacancy' => $vacancy
        ]);
    }
}
