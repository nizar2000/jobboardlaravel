<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Support\Facades\Auth;




class AdminController extends Controller
{
    public function index()
    {
   
  
        return view('admin.dashboard');
    }
    public function user()
    {
        $clients = User::where('role', 'job_seeker')
               ->orWhere('role', 'employer')
               ->get();

  
        return view('admin.users', compact('clients'));
    }
    public function categorie()
    {
        $categorie = categories::orderBy('created_at', 'DESC')->get();
  
        return view('admin.categorie.index', compact('categorie'));
    }

    public function createcat()
    {
        return view('admin.categorie.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function storecat(Request $request)
    {
        // Validate the form inputs, including the uploaded file
        $request->validate([
            'name' => 'required|string',
            

          
        ]);
       // Generate a unique name for the image
       
        // Save the product with the generated image path
        categories::create([
            'name' => $request->input('name'),
        

         
        ]);
    
        return redirect()->route('categorie.index')->with('success', 'categorie added successfully');
    }
    
  
    /**
     * Display the specified resource.
     */

  
    /**
     * Show the form for editing the specified resource.
     */
    public function editcat(string $id)
    {
        $categorie = categories::findOrFail($id);
  
        return view('admin.categorie.edit', compact('categorie'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function updatecat(Request $request, string $id)
    {
        $categorie = categories::find($id);
      
        // Update the product attributes
        $categorie->name = $request->name;





  
    $request->validate([
        'name' => 'required|string',
   

      
    ]);
    // Save the updated product
    $categorie->save();
  
        return redirect()->route('categorie.index')->with('success', 'categorie updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroycat(string $id)
    {

        $categorie = categories::find($id);
    

    
  
        $categorie->delete();
  
        return redirect()->route('categorie.index')->with('success', 'categorie deleted successfully');
    }
    public function Block($idUser)
    {
        $client = User::find($idUser);
        $client->is_active = false ;
        $client->update();
        return redirect()->back()->with('success','User blocked');

    }
    public function UnBlock($idUser)
    {
        $client = User::find($idUser);
        $client->is_active = true ;
        $client->save();
        return redirect()->back()->with('success','User Unblocked');
    }
    public function profile()
    {
        return view('admin.profile');
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
        return redirect()->route('admin.profile')->with('success', 'Profile updated successfully.');
    }
}
