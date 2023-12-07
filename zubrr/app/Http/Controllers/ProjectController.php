<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App\Models\Projects; 
use App\Models\Projects2; 
use App\Imports\ProjectsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;// Adjust the class namespace

class ProjectController extends Controller
{
    public function list(Request $request)
{
    $user = Auth::user();

    if ($user) {
        if ($user->is_admin) {
            $projects1 = Projects::all();
           
            return view('adminprojects', ['projects1' => $projects1]);
        } else {
            $projects1 = Projects::where('user_id', $user->id)->get();
            return view('projects', ['projects1' => $projects1]);
        }
    }

    // Handle case when user is not authenticated
    return redirect()->route('login');
}




    public function import_user(Request $request){
        $request->validate([
            'excel_file'=>'required|mimes:xlsx'
        ]);

        Excel::import(new ProjectsImport, $request->file('excel_file'));
        return redirect()->back()-with('success', 'Users Succesfully imported');
    }
    public function export_user_pdf(){
        $pdf = PDF::loadView('pdf.projects');
        return $pdf->download('projects.pdf');
    }
}
