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






<div class="section-top-border">
    <div class="row">
        <div class="col-lg-8 col-md-8">
            <h3 class="mb-30">Add a job</h3>
            <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mt-10">
                    <input type="text" name="title" placeholder="title"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required
                        class="single-input">
                </div>
                <div class="mt-10">
                    <textarea class="single-textarea" name="description"  placeholder="description" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Message'" required></textarea>
                </div>
                <div class="mt-10">
                    <input type="text" name="salary" placeholder="salary"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required
                        class="single-input">
                </div>
                <div class="mt-10">
                    <input type="text" name="location" placeholder="location"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required
                        class="single-input">
                </div>
            
                <div class="mt-10">
                    <input type="text" name="requirements" placeholder="requirements"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required
                        class="single-input">
                </div>
           
            
            
                <div>
                
                    <div class="single-element-widget mt-30">
                        <h3 class="mb-30" for="categorie">Category:</h3>
                        <div class="default-select" id="default-select">
                                    <select name="categorie" id="categorie">
                                        @foreach($categorie as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                  
                </div>
                <input type="hidden" name="company" value="{{ auth()->user()->id }}">

           <button type="submit" class="btn btn-primary mt-15">Submit</button>
           
            </form>
        </div>
    </div>
</div>






@include('rac.footer')