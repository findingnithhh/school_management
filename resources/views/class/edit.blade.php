@extends('admin.layouts')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Class ({{$classes->name}})</h1>
            <div class="p-5">
                @if(Session::has('class_updated'))
                    <p class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>{{session("class_updated")}}</p>
                @endif
                {{Form::model($classes, array('route' => array('class.update', $classes->id), 'method' => 'PUT'))}}
                            {{Form::label('category_id', 'Choose Category : ')}}
                            {{Form::select('category_id', $categories, null, array('class' => 'form-select'))}}
                            <span class="text-danger">{{$errors->first('category_id')}}</span><br>

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

                    {{Form::submit('Update', array('class' => 'btn btn-primary mt-5'))}}
                    <a href="{{url('/class')}}" class="btn btn-warning mt-5">Back</a>
                {{Form::close()}}
            </div>
        </div>
    </main>
@endsection