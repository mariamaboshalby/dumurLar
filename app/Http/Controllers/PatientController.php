<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $filter = $request->get('filter', 'active');
        
        $query = Patient::query();
        
        switch ($filter) {
            case 'ending_soon':
                $query->where('finish_date', '<=', Carbon::now()->addDays(7))
                      ->where('finish_date', '>=', Carbon::now());
                break;
            case 'active':
                $query->where('finish_date', '>', Carbon::now())
                      ->where('status', 'active');
                break;
            case 'all':
                // عرض جميع المرضى النشطين والذين لم تنته مدتهم
                $query->where('finish_date', '>=', Carbon::now());
                break;
        }
        
        $patients = $query->orderBy('finish_date', 'asc')->get();
        
        return view('patients.index', compact('patients', 'filter'));
    }
}