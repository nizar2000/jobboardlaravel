
@include('rac.header')

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="single_slider  d-flex align-items-center slider_bg_1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-6">
                        <div class="slider_text">
                            <h5 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".2s">{{ $jobs->count() }} Jobs listed</h5>
                            <h3 class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".3s">Find your Dream Job</h3>
                            <p class="wow fadeInLeft" data-wow-duration="1s" data-wow-delay=".4s">We provide online instant cash loans with quick approval that suit your term length</p>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ilstration_img wow fadeInRight d-none d-lg-block text-right" data-wow-duration="1s" data-wow-delay=".2s">
            <img src="img/banner/illustration.png" alt="">
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- catagory_area -->
    <div class="catagory_area">
        <div class="container">
            <div class="row cat_search">
                <div class="col-lg-3 col-md-4">
                    <form method="POST" action="{{ route('guest.search') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="single_input">
                        <input type="text" name="keywords" placeholder="Search keyword" required>
                    </div>
                </div>
           
                <div class="col-lg-3 col-md-4">
                    <div class="single_input">
                        <select class="wide" name="categorie" required>
                            <option value="">Category</option>
                            @foreach($categorie as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="job_btn">
                       
                            <button type="submit" class="boxed-btn3">Find Job</button>
                        </form>
                        </div>
                </div>
            </div>
            
       
        </div>
    </div>
    <!--/ catagory_area -->

    <!-- popular_catagory_area_start  -->
    <div class="popular_catagory_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section_title mb-40">
                        <h3>Popolar Categories</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($categorie->count() > 0)

               
                @foreach($categorie as $rs)

                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_catagory">
                        <a href="jobs.html"><h4>{{ $rs->name }}
                        </h4></a>
                        <p> <span>50</span> Available position</p>
                    </div>
              
       
            </div>

            @endforeach
            @else
            <h4>Categorie not found
            </h4>
            @endif
        </div>
    </div>
    <!-- popular_catagory_area_end  -->

    <!-- job_listing_area_start  -->
    <div class="job_listing_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>Job Listing</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="brouse_job text-right">
                        <a href="jobs.html" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="job_lists">
                <div class="row">
                    @if($jobs->count() > 0)
                    @foreach($jobs as $rs)

                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                              
                                <div class="jobs_conetent">
                                    <a href="{{ route('guest.show', $rs->id) }}" ><h4>{{ $rs->title }}</h4></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p> <i class="fa fa-map-marker"></i> {{ $rs->location }}</p>
                                        </div>
                                        <div class="location">
                                            <p> <i class="fa fa-clock-o"></i>{{ $rs->requirements }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                                    <a href="{{ route('guest.show', $rs->id) }}" class="boxed-btn3">Apply Now</a>
                                </div>
                                <div class="date">
                                    <p>{{ $rs->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
          @endforeach
          @else
          <div class="alert alert-warning">No job found!</div>
          @endif
                </div>
            </div>
        </div>
    </div>
    <!-- job_listing_area_end  -->

    <!-- featured_candidates_area_start  -->
  
    <!-- featured_candidates_area_end  -->

    <div class="top_companies_area">
        <div class="container">
            <div class="row align-items-center mb-40">
                <div class="col-lg-6 col-md-6">
                    <div class="section_title">
                        <h3>Top Companies</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="brouse_job text-right">
                        <a  href="{{ route('guest.shop') }}"  class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
            <div class="row">
           
                @if($company->count() > 0)
                @foreach($company as $rs)
                <div class="col-lg-4 col-xl-3 col-md-6">
                    <div class="single_company">
                       
                        <a href="jobs.html"><h3>{{ $rs->company }}</h3></a>
                        <p> <span>50</span> Available position</p>
                    </div>
                </div>
                @endforeach
                @else
            <div  class="text-center" style="height:200px;">
                No Company Found!
            </div>
            @endif
            </div>
        </div>
    </div>

    <!-- job_searcing_wrap  -->
    <div class="job_searcing_wrap overlay">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Job?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="{{ route('guest.shop') }}" class="boxed-btn3">Browse Job</a>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-6">
                    <div class="searching_text">
                        <h3>Looking for a Expert?</h3>
                        <p>We provide online instant cash loans with quick approval </p>
                        <a href="{{ route('employee.create') }}" class="boxed-btn3">Post a Job</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- job_searcing_wrap end  -->

    <!-- testimonial_area  -->
  
    <!-- /testimonial_area  -->

@include('rac.footer')
