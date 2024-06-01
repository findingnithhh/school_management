@extends('admin.layouts')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Student' information ({{$student->name}})</h1>
            <div class="p-5">
                @if(Session::has('student_updated'))
                    <p class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>{{session("student_updated")}}</p>
                @endif
                {{Form::model($student, array('route' => array('student.update', $student->id), 'method' => 'PUT'))}}

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

                {{Form::submit('Update', array('class' => 'btn btn-primary mt-2'))}}
                <a href="{{url('/student')}}" class="btn btn-warning mt-2">Back</a>
                {{Form::close()}}
            </div>
        </div>
    </main>
@endsection