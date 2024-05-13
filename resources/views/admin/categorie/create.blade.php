
@include('layouts.header')

<body>

    @include('layouts.sidebar')
    <div class="content" id="content">
        @include('layouts.navbar')
        <div class="container-fluid pt-4 px-4">

            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Edit Categorie</h6>
        <form action="{{ route('categorie.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
           
                    <input type="text" name="name" class="form-control" placeholder="name">
     
             
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