@extends('admin.layouts')
@section('content')
    <main>
        <div class="container px-4">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="text-center">Create new class</h1>
                    </div>
                    <div class="p-5">
                        {{-- @if(Session::has('class_created'))
                            <p class="text-success">{{session('class_created')}}</p>
                        @endif --}}
                        @if(Session::has("class_created"))
                            <p class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>{{session("class_created")}}</p>
                        @endif
                        {{Form::open(['url' => 'class'])}}
                            {{Form::label('category_id', 'Choose Category : ')}}
                            {{Form::select('category_id', $categories, null, array('class' => 'form-select'))}}
                            <span class="text-danger">{{$errors->first('category_id')}}</span><br>

                            {{-- {{Form::label('category_id', 'Choose Category : ')}}
                            {{Form::text('category_id', null, array('class' => 'form-control'))}}
                            <span class="text-danger">{{$errors->first('category_id')}}</span><br> --}}


                            {{Form::label('name', 'Class name : ')}}
                            {{Form::text('name', null, array('class' => 'form-control'))}}
                            <span class="text-danger">{{$errors->first('name')}}</span><br>
                            

                            {{Form::label('status', 'Select Status : ', array('class' => 'mb-2'))}}
                            {{Form::select('status', ['Active' => 'Active', 'In Active' => 'In Active'], '', [
                                'class' => 'form-select',
                                'id' => 'size-select',
                                'placeholder' => 'Select Status',
                            ])}}
                            <span class="text-danger">{{$errors->first('status')}}</span><br>
                            

                            {{Form::submit('Create', array('class' => 'btn btn-primary mt-2'))}}
                            <a href="{{url('/class')}}" class="btn btn-warning mt-2">Back</a>

                        {{Form::close()}}
                    </div>
                </div>
            </div>
            {{-- </div>
        </div>  --}}
    </main>
@endsection