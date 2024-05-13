<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Jobs;


class JobsController extends Controller
{
    public function index()
    {
        $jobs = Jobs::orderBy('created_at', 'DESC')->get();
         
        $categorie = categories::orderBy('created_at', 'DESC')->get();
  
        return view('admin.jobs.index', compact('jobs','categorie'));
    }

    public function edit(string $id)
    {
        $jobs = Jobs::findOrFail($id);
  
        return view('admin.jobs.edit', compact('jobs'));
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
   
        $jobs->company_id = $request->company;
        $jobs->category_id = $request->categorie;








    // Save the updated product
    $jobs->save();
  
        return redirect()->route('jobs.index')->with('success', 'job updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $jobs = Jobs::find($id);
    

    
  
        $jobs->delete();
  
        return redirect()->route('jobs.index')->with('success', 'job deleted successfully');
    }

  
}
