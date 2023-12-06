<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Projects; 
use App\Imports\ProjectsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;// Adjust the class namespace

class ProjectController extends Controller
{
    public function list(Request $request)
{
    $user = Auth::user();
    
    if ($user) {
        $projects = Projects::all();

        // Filter projects based on authenticated user's ID
        $filteredProjects = $projects->filter(function ($project) use ($user) {
            return $project->user_id == $user->id;
        });

        return view('projects', ['projects' => $filteredProjects]);
    }

    // Handle the case when there is no authenticated user
    // For example, you might redirect to a login page
    return redirect()->route('login');
}

    public function import_user(Request $request){
        $request->validate([
            'excel_file'=>'required|mimes:xlsx'
        ]);

        Excel::import(new ProjectsImport, $request->file('excel_file'));
        return redirect()->back()-with('success', 'Users Succesfully imported');
    }
}
