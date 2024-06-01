@extends('admin.layouts')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Category ({{$category->name}})</h1>
            <div class="p-5">
                @if(Session::has('category_updated'))
                    {{-- <p class="text-success">{{session('category_updated')}}</p> --}}
                    {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('category_updated')}}
                    </div> --}}
                    <p class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>{{session("category_updated")}}</p>
                @endif
                {{Form::model($category, array('route' => array('category.update', $category->id), 'method' => 'PUT'))}}
                {{-- @method('PUT')  --}}
                    {{-- {{Form::label('name', 'Category Name : ')}}
                    {{Form::text('name', '', array('class' => 'form-control mt-2'))}} --}}
                    {{Form::label('name', 'Category Name : ', array('class' => 'mb-2'))}}
                    {{Form::select('name', ['Class' => 'Class', 'Student' => 'Student', 'Attendace' => 'Attendace'], null, [
                        'class' => 'form-select',
                        'id' => 'size-select',
                        'placeholder' => 'Select Category',
                    ])}}
                    <span class="text-danger">{{$errors->first('name')}}</span><br>

                    {{Form::label('description', 'Description : ', array('class' => 'mt-2'))}}
                    {{Form::textarea('description', null, [
                        'placeholder' => 'Type your message here',
                        'class' => 'form-control mt-2',
                    ])}}
                    <span class="text-danger">{{$errors->first('description')}}</span><br>

                    {{Form::submit('Update', array('class' => 'btn btn-primary mt-5'))}}
                    <a href="{{url('/category')}}" class="btn btn-warning mt-5">Back</a>
                {{Form::close()}}
            </div>
        </div>
    </main>
@endsection