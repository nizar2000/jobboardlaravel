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


<a href="{{ route('employee.create') }}" class="btn btn-primary">Add job</a>
<a href="{{ route('employee.app') }}" class="btn btn-primary">show applications</a>

   
<div class="section-top-border">
    <h3 class="mb-30">Table</h3>
    <div class="progress-table-wrap">
        <div class="progress-table">
            <div class="table-head">
                <div class="serial">#</div>
                <div class="country">title</div>
                <div class="visit">date</div>
                <div class="visit">description</div>
                <div class="visit">location</div>
                <div class="visit">requirements</div>
                <div class="visit">salary</div>
                <div class="visit">category</div>
                <div class="visit">action</div>

            </div>
            @if($jobs->count() > 0)
            @foreach($jobs as $rs)
            <div class="table-row">
                <div class="serial">{{ $loop->iteration }}</div>
                <div class="visit">{{ $rs->title }}</div>

                <div class="visit"> {{ $rs->created_at }}</div> 

                <div class="visit">{{ $rs->description }}</div>
                <div class="visit">{{ $rs->location }}</div>
                <div class="visit">{{ $rs->requirements }}</div>
                <div class="visit">{{ $rs->salary }}</div>
                <div class="visit">{{ $rs->category->name }}</div>

                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('employee.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>

                    <form action="{{ route('employee.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                   @csrf
                   @method('DELETE')
                   <button class="btn btn-danger m-0">Delete</button>
                  </form>
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