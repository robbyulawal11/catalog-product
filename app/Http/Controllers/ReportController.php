<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Exports\SchoolsExport;
use App\Imports\SchoolImport;

class ReportController extends Controller
{
    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function exportSchools()
    {
        return Excel::download(new SchoolsExport, 'schools.xlsx');
    }
    public function importForm()
    {
        return view('import');
    }
    public function importSchools(Request $request)
    {
        // dd($request->file())
        $file_excel = $request->file('file_excel');

        Excel::import(new SchoolImport, $file_excel);
        return redirect('/import');
    }

}
