
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
        <div class="container-fluid pt-4 px-4">

            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Edit Profile</h6>
        <form action="{{ route('admin.updateProfile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">username</label>
                    <input type="text" name="username" value="{{ auth()->user()->username }}"  class="form-control" placeholder="name" required>
     
             
            </div>
            <div class="mb-3">
                <label class="form-label">email</label>
                    <input type="email" name="email" value="{{ auth()->user()->email }}"  class="form-control" placeholder="name" required>
     
             
            </div>
            <div class="mb-3">
                <label class="form-label">password</label>
                    <input type="password" name="password" class="form-control" placeholder="name" required>
     
             
            </div>

            </div>
      >
                    <button type="submit" class="btn btn-primary">Submit</button>
             
        </form>
    </div>

</div>
</div>



    </div>




        @include('layouts.footer')
    </body>
    </html>