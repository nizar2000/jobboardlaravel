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
            <h3 class="mb-30">Form Element</h3>
            <form action="{{ route('employee.update', $jobs->id) }}" method="POST">
                @csrf
                @method('PUT')                
                <div class="mt-10">
                    <input type="text" name="title" placeholder="First Name"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required
                        class="single-input" value="{{ $jobs->title}}">
                </div>
                <div class="mt-10">
                    <input type="text" name="location" placeholder="Last Name"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required
                        class="single-input" value="{{ $jobs->location }}">
                </div>
                <div class="mt-10">
                    <input type="number" name="salary" placeholder="Last Name"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required
                        class="single-input" value="{{ $jobs->salary }}">
                </div>
                <div class="mt-10">
                    <input type="text" name="requirements" placeholder="Email address"
                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required
                        class="single-input" value="{{ $jobs->requirements }}">
                </div>
           
              
                <div class="mt-10">
                    <textarea class="single-textarea" name="description"  placeholder="Message" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Message'" required value="{{ $jobs->description }}"></textarea>
                </div>
                <div>
                    <label for="categorie">Category:</label>
                    <select name="categorie" id="categorie">
                        @foreach($categorie as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
           
            </form>
        </div>
    </div>
</div>






@include('rac.footer')