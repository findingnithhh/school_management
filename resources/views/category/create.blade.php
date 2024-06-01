@extends('admin.layouts')
@section('content')
    <main>
        <div class="container px-4">
            <div class="card mt-5">
                <div class="card-header">
                    <h1 class="text-center">Create new category</h1>
                    </div>
                    <div class="p-5">
                        @if(Session::has('category_created'))
                            {{-- <p class="text-success">{{session('category_created')}}</p> --}}
                            <p class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>{{session("category_created")}}</p>
                        @endif
                        {{Form::open(['url' => 'category'])}}
                            {{-- {{Form::label('name', 'Category Name : ')}}
                            {{Form::text('name', '', array('class' => 'form-control mt-2'))}} --}}
                            {{Form::label('name', 'Category Name : ', array('class' => 'mb-2'))}}
                            {{Form::select('name', ['Class' => 'Class', 'Student' => 'Student', 'Attendace' => 'Attendace'], '', [
                                'class' => 'form-select',
                                'id' => 'size-select',
                                'placeholder' => 'Select Category',
                            ])}}
                            <span class="text-danger">{{$errors->first('name')}}</span><br>

                            {{Form::label('description', 'Description : ', array('class' => 'mt-2'))}}
                            {{Form::textarea('description', '', [
                                'placeholder' => 'Type your message here',
                                'class' => 'form-control mt-2',
                            ])}}
                            <span class="text-danger">{{$errors->first('description')}}</span><br>

                            {{Form::submit('Create', array('class' => 'btn btn-primary mt-5'))}}
                            <a href="{{url('/category')}}" class="btn btn-warning mt-5">Back</a>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            {{-- </div>
        </div>   --}}
    </main>
@endsection