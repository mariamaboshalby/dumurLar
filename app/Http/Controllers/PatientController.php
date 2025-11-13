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
                $query->where('end_date', '<=', Carbon::now()->addDays(7))
                      ->where('end_date', '>=', Carbon::now());
                break;
            case 'active':
                $query->where('end_date', '>', Carbon::now());
                break;
            case 'all':
                // عرض جميع المرضى النشطين والذين لم تنته مدتهم
                $query->where('end_date', '>=', Carbon::now());
                break;
        }
        
        $patients = $query->orderBy('end_date', 'asc')->get();
        
        return view('patients.index', compact('patients', 'filter'));
    }
}