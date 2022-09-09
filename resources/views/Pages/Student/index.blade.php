@extends('Layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="con-lg-12 text-center">
            <h1 class="page-title">
               Student Page
            </h1>
        </div>
    </div>
    <div class="col-lg-12">
     <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf
        <div class="row">
            {{-- <div class="con-lg-12 text-center">
                <h1 class="page-title">
                   Student Form
                </h1> --}}
            </div>
            <div class="from-group mt-5">
                <input class="form-control form-control-lg" type="text" name="name" placeholder="Enter Your Name" aria-label="default input example">
            </div>
            <div class="form-group mt-5">
                <input class="form-control form-control-lg" type="text" name="age" placeholder="Enter Your Age" aria-label="default input example">
            </div>
            <div class="form-group mt-5">
                <input class="form-control form-control-lg" type="file" name="images"   accept="image/jpg ,image/png , image/jpeg" aria-label="default input example">
            </div>
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
     </form>

    <div class="row mt-5">
        <h1 class="page-title text-center">
            Student Details
         </h1>
        <div class="col-lg-12 " >
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($students as $key=>$students)
                            <tr>
                                <th scope="row">{{ ++$key }}</th>
                                <td>{{ $students->name }}</td>
                                <td>{{ $students->age }}</td>
                                <td>
                                    <img src="{{ config('images.access_path') }}/{{ $students->images->name }}" alt="" width="100px">
                                </td>

                                <td>
                                    @if ($students->status == 0)
                                        <span class="badge bg-danger">Inactive</span>

                                    @else
                                        <span class="badge bg-success ">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('student.delete' , $students->id) }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                    <a href="{{ route('student.edit' , $students->id) }}"  class="btn btn-primary"><i class="fa-solid fa-pencil"  ></i></a>
                                    @if ($students->status == 0)
                                        <a href="{{ route('student.status' , $students->id) }}" class="btn btn-success">Active<i class="fa-solid fa-check"></i></a>
                                    @else
                                        <a href="{{ route('student.status' , $students->id) }}" class="btn btn-warning">Inacive<i class="fa-solid fa-check"></i></a>
                                    @endif


                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
        </div>
    </div>
    </div>
</div>

<div class="modal fade" id="taskEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="taskEdit">Todo update</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="taskEdiContent">
          @yield('content')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('css')
<style>
     .page-title{
        padding: 10vh;
        color: #686464;
        font-family: -webkit-body;
        font-size: 5rem;
    }
</style>

@endpush

@push('js')

<script>
    function taskEditModal(task_id){
        var data = {
            task_id: task_id,
        };
        $.ajax({
            url:"{{ route('student.edit') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            datatype: '',
            data: data,
            success: function (response){
                $('#taskEdit').modal('show');
                $('#taskEditContent').html(response);
            }
         });
    }
</script>
@endpush
