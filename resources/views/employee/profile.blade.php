@include('rac.header')






<div class="bradcam_area bradcam_bg_1">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text">
                    <h3></h3>
                </div>
            </div>
        </div>
    </div>
</div>







<div class="content" id="content">
  
    <div class="container-fluid pt-4 px-4">

        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Profile</h6>
    <form action="{{ route('employee.updateProfile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">name</label>
                <input type="text" name="name" value="{{ auth()->user()->name }}"  class="form-control" placeholder="name" required>
 
         
        </div>
        <div class="mb-3">
            <label class="form-label">email</label>
                <input type="email" name="email" value="{{ auth()->user()->email }}"  class="form-control" placeholder="name" required>
 
         
        </div>
        <div class="mb-3">
            <label class="form-label">password</label>
                <input type="password" name="password" class="form-control" placeholder="name" required>
 
         
        </div>

        
  
                <button type="submit" class="btn btn-primary">Submit</button>
         
    </form>
</div>

</div>
</div>



</div>










 




@include('rac.footer')