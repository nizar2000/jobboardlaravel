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

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<a href="{{ route('employee.index') }}" class="btn btn-primary">return</a>


   
<div class="section-top-border">
    <h3 class="mb-30">Table</h3>
    <div class="progress-table-wrap">
        <div class="progress-table">
            <div class="table-head">
                <div class="serial">#</div>
                <div class="country">job title </div>
                <div class="visit">user email</div>
                <div class="visit">resume</div>

                <div class="visit">cover letter </div>
                <div class="visit">submitted_at</div>
                <div class="visit">action</div>
            

            </div>
            @if($app->count() > 0)
            @foreach($app as $rs)
            <div class="table-row">
                <div class="serial">{{ $loop->iteration }}</div>
                <div class="visit">{{ $rs->job->title }}</div>

                <div class="visit">{{ $rs->applicant->email }}</div>
                <td><a href="{{ url('cv/download/'.$rs->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-download"></i> Download</a></td>

             
                <div class="visit">{{ $rs->cover_letter }}</div>
           
              
               
                <div class="visit">{{ $rs->submitted_at }}</div>

      
             

                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('app.inter', $rs->id)}}" type="button" class="btn btn-warning" onsubmit="return confirm('interview?')">interview</a>

                  <a href="{{ route('app.reject', $rs->id)}}" type="button" class="btn btn-warning" onsubmit="return confirm('interview?')"> reject</a>
                
            
                  </div>
            </div>
        @endforeach
        @else
        <div class="table-row">
         not found
        </div>
    @endif
        </div>
    </div>
</div>



@include('rac.footer')