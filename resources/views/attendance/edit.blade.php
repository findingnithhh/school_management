@extends('admin.layouts')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Attendance ({{$attendance->name}})</h1>
            <div class="p-5">
                @if(Session::has('attendance_updated'))
                    <p class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>{{session("attendance_updated")}}</p>
                @endif
                {{Form::model($attendance, array('route' => array('attendance.update', $attendance->id), 'method' => 'PUT'))}}
                    {{Form::label('name', 'Enter student name : ')}}
                    {{Form::text('name', null, ['class' => 'form-control'])}}
                    <span class="text-danger">{{$errors->first('name')}}</span>
                    <br>

                    {{Form::label('attendance', 'Attendance : ')}}
                    {{Form::select('attendance', ['Yes' => 'Yes', 'No' => 'No'], null, [
                        'class' => 'form-select',
                        'id' => 'size-select',
                        'placeholder' => 'Select attendance',
                    ])}}
                    <span class="text-danger">{{$errors->first('attendance')}}</span>
                    <br>

                    {{Form::label('attdendance_date', 'Attendance Date : ')}}
                    {{Form::date('attdendance_date', null, ['class' => 'form-control'])}}
                    <span class="text-danger">{{$errors->first('attdendance_date')}}</span>
                    <br>

                    {{Form::submit('Update', ['class' => 'btn btn-primary mt-2'])}}
                    <a href="{{url('/attendance')}}" class="btn btn-warning mt-2">Back</a>
                {{Form::close()}}
            </div>
        </div>
    </main>
@endsection