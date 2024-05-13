@include('rac.header')


<!-- Rest of your Blade view content -->

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
<!--/ bradcam_area  -->

<div class="job_details_area">
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<!-- Your Blade view content -->

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="job_details_header">
                    <div class="single_jobs white-bg d-flex justify-content-between">
                        <div class="jobs_left d-flex align-items-center">
                            
                            <div class="jobs_conetent">
                                <a href="#"><h4>{{ $jobs->title }}</h4></a>
                                <div class="links_locat d-flex align-items-center">
                                    <div class="location">
                                        <p> <i class="fa fa-map-marker"></i> {{ $jobs->location }}</p>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="jobs_right">
                            <div class="apply_now">
                                <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="descript_wrap white-bg">
                    <div class="single_wrap">
                        <h4>Job description</h4>
                        <p>{{ $jobs->description }}</p>
                    </div>
               
                    <div class="single_wrap">
                        <h4>Requirements</h4>
                        <ul>
                        <li>
                            {{ $jobs->requirements }} 
                        </ul>
                    </div>
                  
                </div>

<div class="apply_job_form white-bg">
    <h4>Apply for the job</h4>
    <form action="{{ route('job.apply') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $jobs->id }}">

        <div class="row">
         
            <div class="col-md-6">
             
            
            <div class="col-md-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                      <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
                      </button>
                    </div>
                    <div class="custom-file">
                      <input type="file" name="resume" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                      <label class="custom-file-label" for="inputGroupFile03">Upload CV</label>
                    </div>
                  </div>
            </div>
            <div class="col-md-12">
                <div class="input_field">
                    <textarea name="cover_letter" id="" cols="30" rows="10" placeholder="Cover letter"></textarea>
                </div>
            </div>
            <div class="col-md-12">
               
            
            
            
                        <div class="col-md-12">
            
                         <button type="submit" class="boxed-btn3"   > Apply now</button>       
                     
            
            
                
            
                        </div>
            
                    </div>
            
            
            </div>
        </div>
    </form>
</div>


            </div>
            <div class="col-lg-4">
                <div class="job_sumary">
                    <div class="summery_header">
                        <h3>Job Summery</h3>
                    </div>
                    <div class="job_content">
                        <ul>
                            <li>Published on: <span> {{ $jobs->created_at }}</span></li>
                            <li>Salary: <span> {{ $jobs->salary }}</span></li>
                            <li>Location: <span> {{ $jobs->location }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="share_wrap d-flex">
                    <span>Share at:</span>
                    <ul>
                        <li><a href="#"> <i class="fa fa-facebook"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-google-plus"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-twitter"></i></a> </li>
                        <li><a href="#"> <i class="fa fa-envelope"></i></a> </li>
                    </ul>
                </div>
               
                </div>
            </div>
        </div>
    </div>
</div>
@include('rac.footer')