@extends('Layout.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="con-lg-12 text-center">
            <h1 class="page-title">
               Student Edit Page
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
                <input class="form-control form-control-lg" type="text" name="name" value="{{ $students->name }}" placeholder="Enter Your Name" aria-label="default input example">
            </div>
            <div class="form-group mt-5">
                <input class="form-control form-control-lg" type="text" name="age" value="{{ $students->age }}" placeholder="Enter Your Age" aria-label="default input example">
            </div>
            {{-- <div class="form-group mt-5">
                <input class="form-control form-control-lg" type="file" name="images"  value="<img src="{{ config('images.access_path') }}/{{ $students->images->name }}" alt="" width="100px">" accept="image/jpg ,image/png , image/jpeg" aria-label="default input example">
            </div> --}}
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
     </form>
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
