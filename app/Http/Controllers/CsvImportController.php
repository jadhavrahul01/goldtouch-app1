<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Empdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CsvImportController extends Controller
{
    public function import(Request $request)
    {
        request()->validate([
            'excel' => 'required|mimes:xlx,xls,xlsx,csv|max:2048',
            'cusid' => 'required',
        ]);

        $customerId = $request->cusid;

        // ? import excel file to database
        Excel::import(new EmployeeImport($customerId), $request->file('excel'));
        return back()->with('massage', 'User Imported Successfully');
    }
}
