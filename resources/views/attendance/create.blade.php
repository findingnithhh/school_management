@extends('admin.layouts')
@section('content')
    <main>
        <div class="container px-4">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="text-center">Add attendance</h1>
                    </div>
                    <div class="p-5">
                        {{-- @if(Session::has('class_created'))
                            <p class="text-success">{{session('class_created')}}</p>
                        @endif --}}
                        @if(Session::has("attendance_created"))
                            <p class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>{{session("attendance_created")}}</p>
                        @endif
                        {{Form::open(['url' => 'attendance'])}}
                            {{Form::label('name', "Enter studen's name : ")}}
                            {{Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter name'))}}
                            <span class="text-danger">{{$errors->first('name')}}</span>
                            <br>

                            {{Form::label('attendance', 'Attendance : ')}}
                            {{Form::select('attendance', ['Yes' => 'Yes', 'No' => 'No'], null, [
                                'class' => 'form-select',
                                'id' => 'size-select',
                                'placeholder' => 'Select Attendance',
                            ])}}
                            <span class="text-danger">{{$errors->first('attendance')}}</span>
                            <br>

                            {{Form::label('attdendance_date', 'Attendance Date : ')}}
                            {{Form::date('attdendance_date', null, ['class' => 'form-control'])}}
                            <span class="text-danger">{{$errors->first('attdendance_date')}}</span>
                            <br>

                            {{Form::submit('Add Now', array('class' => 'btn btn-primary mt-2'))}}
                            <a href="{{url('/attendance')}}" class="btn btn-warning mt-2">Back</a>

                        {{Form::close()}}
                    </div>
                </div>
            </div>
            {{-- </div>
        </div>  --}}
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    </main>
@endsection