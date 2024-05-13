<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // Import the Request class from the correct namespace
use App\Models\Categories;
use App\Models\Jobs;
use App\Models\Applications;
use App\Models\User;
use App\Mail\JobNotificationEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    
        public function index()
        {
            $company = User::where('role','=','employer')->paginate(12);

            $categorie = Categories::all();
            $jobs = Jobs::all();
    
            return view('guest.home',compact('jobs','categorie','company'));
        }  
        public function show(string $id)

        {
            $jobs = Jobs::findOrFail($id);
            $relatedJobs = Jobs::where('id', '!=', $jobs->id)->take(4)->get();
         
          
            return view('guest.show', compact('jobs','relatedJobs'));
        }
        public function shop()
        {
            
            $categorie = Categories::all();
            $jobs = Jobs::all();
            return view('guest.shop',compact('jobs','categorie' ));
        }
    
        public function jobsByCategory($categoryId)
        {
       $category= Categories::findOrFail($categoryId);
       $jobs = $category->jobs; // Access products using the plural relationship
       $categorie = Categories::all();
   
       return view('guest.shop', compact('jobs', 'category', 'categorie'));
       }


       public function search(Request $request)
       {
     
     //dd($request);
     $jobs= Jobs::where('title','LIKE','%'. $request->keywords.'%')->where('category_id', $request->categorie)->get();
     $categorie = Categories::all();


        return view('guest.shop', compact('jobs',  'categorie'));

    }
  
    
    public function apply(Request $request)
    {
        // Validate the request data
        $request->validate([
            'resume' => 'required', // Adjust max file size as needed
            'cover_letter' => 'required|string|max:5000',
             // Adjust max cover letter length as needed
        ]);

        // Retrieve job details
        $jobId= $request->id;
        $job = Jobs::find($jobId);

        // Check if job exists
        if (!$job) {
            return redirect()->back()->with('error', 'Job does not exist.');
        }

        // Check if user is trying to apply to own job
       /* if ($job->company_id == Auth::id()) {
            return redirect()->back()->with('error', 'You cannot apply to your own job.');
        }*/

        // Check if user has already applied to this job
        $existingApplication = Applications::where('job_id', $jobId)
            ->where('applicant_id', Auth::id())
            ->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied to this job.');
        }

        // Store resume file
        $resume = time().'.'.$request->resume->extension();  


        $request->resume->move(public_path('resume/'), $resume);


        // Create application record
        $application = new Applications();
        $application->job_id = $jobId;
        $application->applicant_id = Auth::id();
        $application->company_id = $job->company_id;
        $application->cover_letter = $request->cover_letter;
        $application->resume = $resume;
        $application->submitted_at = now();
        $application->save();

        // Send notification email to employer
       

        // Redirect back with success message
        return redirect()->back()->with('success', 'You have successfully applied.');
    }
    public function profile()
    {
        return view('employee.profile');
    }
    public function updateProfile(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::id(),
            'password' => 'required',
        ]);

        // Retrieve the currently authenticated user
        $user = Auth::user();

        // Update the user's profile with the validated data
        $user->update($validatedData);

        // Redirect the user back to their profile page with a success message
        return redirect()->route('employee.index')->with('success', 'Profile updated successfully.');
    }
}
