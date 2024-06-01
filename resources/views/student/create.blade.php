@extends('admin.layouts')
@section('content')
    <main>
        <div class="container px-4">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="text-center">Create New Student</h1>
                    </div>
                    <div class="p-5">
                        @if(Session::has("student_created"))
                            <p class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>{{session("student_created")}}</p>
                        @endif
                        {{Form::open(['url' => 'student'])}}

                        {{Form::label('name', "Enter student's name : ")}}
                        {{Form::text('name', null, ['class' => 'form-control'])}}
                        <span class="text-danger">{{$errors->first('name')}}</span><br>

                        {{Form::label('gender', 'Select Gender : ')}}
                        {{Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, [
                            'class' => 'form-select',
                            'id' => 'size-select',
                            'placeholder' => 'Select Gender',
                        ])}}
                        <span class="text-danger">{{$errors->first('gender')}}</span><br>

                        {{Form::label('class', "Enter class : ")}}
                        {{Form::text('class', null, ['class' => 'form-control'])}}
                        <span class="text-danger">{{$errors->first('class')}}</span><br>
                
                        {{Form::submit('Create', array(' class' => 'btn btn-primary mt-2'))}}
                        <a href="{{url('/student')}}" class="btn btn-warning mt-2">Back</a>

                        <br>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
    </main>
@endsection