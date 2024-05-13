
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
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>

                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @if($clients->count() > 0)
                            @foreach($clients as $rs)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rs->name }}</td>
                                <td>{{ $rs->email }}</td>
                                <td>{{ $rs->role }}</td>
                                @if ($rs->is_active)
                                <td >
                              
                                    <span class="badge bg-primary " ><p style="color: aliceblue">Active</p></span>
                                
                               
                                </td>
        
                                <td >
                                    <a href="{{ route('users.block', $rs->id)}}" type="button"  class="btn btn-danger m-0">Block</a>
        
                                </td>
                                @else
                                <td >
                              
                                    <span class="badge bg-secondary" ><p style="color: aliceblue">Blocked</p></span>
                                
                               
                                </td>
        
                                <td >
                                    <a href="{{ route('users.unblock', $rs->id)}}" type="button"  class="btn btn-danger m-0">UnBlock</a>
        
                                </td>
                                @endif
                        
                            </tr>
                            @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="5">User not found</td>
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