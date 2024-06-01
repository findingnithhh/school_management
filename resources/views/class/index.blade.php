@extends('admin.layouts')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mt-4">Class Lists</h1>
            <a href="{{url('/class/create')}}" class="btn btn-success mt-5 mb-4">Create New</a>
        </div>
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="GET" action="{{url('/class/search')}}">
            <div class="input-group">
                <input class="form-control mb-4" type="text" name="search_name" placeholder="Search by class name..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary mb-4" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <div>
            {{-- @if(Session::has('category_notfound'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('category_notfound')}}
                </div>
            @endif --}}
            @if(Session::has('class_deleted'))
                @if(Session::has("class_deleted"))
                        <p class="alert alert-danger alert-dismissible fade show mb-4" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>{{session("class_deleted")}}</p>
                    @endif
            @endif
        </div>
        @if(count($classes) > 0)
            <table class="table table-striped text-center table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                        <tr>
                            <td>{{$class->id}}</td>
                            <td>{{$class->name}}</td>
                            <td>{{$class->status}}</td>
                            <td>{{$class->created_at}}</td>
                            {{-- <td>{{$class->category->name}}</td> --}}
                            <td class="button"> 
                            <a href="{{url('class/'.$class->id.'/edit')}}" class="btn btn-primary" onclick="return confirm('Are you sure you want to update this record?')">Update</a>
                            {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                            {{Form::open(array('url' => 'class/'.$class->id, 'method' => 'DELETE'))}}
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger delete" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                            {{Form::close()}}
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$classes->links('pagination::bootstrap-5')}}
        @endif
    </div>  
    {{-- <a href="{{url('/category')}}" class="btn btn-warning mx-4">Back to view category</a> --}}
</main>
@endsection