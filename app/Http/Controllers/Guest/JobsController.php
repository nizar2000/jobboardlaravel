<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jobs;
use App\Models\User;
use App\Models\Categories;
use App\Models\Applications;
use DB;



use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    public function myJobs() {    
        $jobs = Jobs::where('company_id',Auth::user()->id)

                    ->orderBy('created_at','DESC')->paginate(10);        
                    return view('employee.index', compact('jobs'));

    }  
    public function create()
    {
        $categorie = Categories::all();

        return view('employee.create', compact('categorie'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    // Assuming your Job model is in the 'App\Models' namespace

    public function store(Request $request)
    {
        // Validate the form inputs, including the uploaded file
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'salary' => 'required|numeric', // Change 'number' to 'numeric'
            'requirements' => 'required|string',
            'location' => 'required|string',
        ]);
        
        // Save the job with the provided data
        Jobs::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'salary' => $request->input('salary'),
            'requirements' => $request->input('requirements'),
            'location' => $request->input('location'),
            'company_id' => $request->input('company'), // Assuming you have 'company' field in your form
            'category_id' => $request->input('categorie'), // Assuming you have 'categorie' field in your form
        ]);
        $user = User::find(auth()->user()->id);
        $user->role = 'employer';
        $user->save();
        
        return redirect()->route('employee.index')->with('success', 'Job added successfully');
    }
    
    public function edit(string $id)
    {
        $jobs = Jobs::findOrFail($id);
        $categorie = Categories::all();

        return view('employee.edit', compact('jobs' ,'categorie'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jobs =Jobs::find($id);
      
        // Update the product attributes
        $jobs->title = $request->title;
        $jobs->location = $request->location;
   
        $jobs->category_id = $request->categorie;








    // Save the updated product
    $jobs->save();
  
        return redirect()->route('employee.index')->with('success', 'job updated successfully');
    }
    public function destroy(string $id)
    {

        $jobs = Jobs::find($id);
    

    
  
        $jobs->delete();
  
        return redirect()->route('employee.index')->with('success', 'job deleted successfully');
    }

    public function myApps() {    
        $app = Applications::where('company_id',Auth::user()->id)

                    ->orderBy('submitted_at','DESC')->paginate(10);        
                    return view('employee.app', compact('app'));

    }  
    
    public function download($id) {
        $resume = DB::table('applications')->where('id',$id)->first();
        $pathToFile = public_path("resume/{$resume->$resume}");
        return \Response::download($pathToFile);
    }
    public function inter($idApp)
    {
        $app = Applications::find($idApp);
        $app->status = "interviewed" ;
        $app->update();
        return redirect()->back()->with('success','interviewed');

    }
    public function reject($idApp)
    {
        $app = Applications::find($idApp);
        $app->status = "rejected" ;
        $app->update();
        return redirect()->back()->with('success','Rejected!');

    }

}
