
@include('layouts.header')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<body>

    @include('layouts.sidebar')
    <div class="content" id="content">
        @include('layouts.navbar')
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light text-center rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0">List Users</h6>
           
                </div>
             
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">Created By</th>
                                <th scope="col">date</th>
                                <th scope="col">action</th>
                             
                            
                            </tr>
                        </thead>
                        <tbody>
                            @if($jobs->count() > 0)
                            @foreach($jobs as $rs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rs->title }}</td>
                                <td>{{ $rs->company->username }}</td>
                                <td>{{ $rs->created_at }}</td>
                                

                                <td>
                                   <div class="btn-group" role="group" aria-label="Basic example">
                                     <a href="{{ route('jobs.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                     <form action="{{ route('jobs.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                   </form>
                                   </div>
                                </td>
                                
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="5">job not found</td>
                                </tr>
                            @endif
                         
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@include('layouts.footer')
<body>
    </html>