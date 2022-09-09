

     <form action="{{ route('student.update' , $students->id) }}" method="POST" enctype="multipart/form-data" >
            @csrf
        <div class="row">

            </div>
            <div class="from-group mt-5">
                <input class="form-control form-control-lg" type="text" name="name" value="{{ $students->name }}" placeholder="Enter Your Name" aria-label="default input example" required>
            </div>
            <div class="form-group mt-5">
                <input class="form-control form-control-lg" type="text" name="age" value="{{ $students->age }}" placeholder="Enter Your Age" aria-label="default input example">
            </div>
            <div class="form-group mt-5">
                <input class="form-control form-control-lg" type="file" name="images"  aria-label="default input example">
                <img src="{{ config('images.access_path') }}/{{ $students->images->name }}" alt="" width="100px">
            </div>
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>
     </form>





