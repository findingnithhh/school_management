@extends('admin.layouts')
@section('content')
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mt-4">Category List</h1>
                <a href="{{url('/category/create')}}" class="btn btn-success mt-5 mb-4">Create New</a>
            </div>
            <div>
                @if(Session::has('category_notfound'))
                    {{-- <p class="text-danger">{{session('category_notfound')}}</p> --}}
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{session('category_notfound')}}
                    </div>
                @endif
                @if(Session::has('category_deleted'))
                    {{-- <p class="text-danger">{{session('category_notfound')}}</p> --}}
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('category_deleted')}}
                    </div>
                @endif
            </div>
            @if(count($categories) > 0)
                <table class="table table-striped text-center table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category )
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td class="w-50">{{$category->description}}</td>
                            <td class="button"> 
                                <a href="{{url('/category/'.$category->id.'/edit')}}" class="btn btn-primary" onclick="return confirm('Are you sure you want to update this record?')">Update</a>
                                {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                {{Form::open(array('url' => 'category/'.$category->id, 'method' => 'DELETE'))}}
                                {{ csrf_field() }}
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger delete" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                                {{Form::close()}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$categories->links('pagination::bootstrap-5')}}
            @endif
        </div>  
    </main>
@endsection 