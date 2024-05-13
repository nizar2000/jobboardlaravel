
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
      
        <form action="{{ route('categorie.update', $categorie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
 
                    <label class="form-label">name</label>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{ $categorie->name }}" >
                </div>
                
            </div>
          
                    <button class="btn btn-warning">Update</button>
               
            
            
        </form>
                </div>
    </div>
</div>

    </div>
        @include('layouts.footer')
    </body>
    </html>