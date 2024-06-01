@extends('admin.layouts')
@section('content')
<main>
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="mt-4">Attendance Lists</h1>
            <a href="{{url('/attendance/create')}}" class="btn btn-success mt-5 mb-4">Create New</a>
        </div>
        <div>
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="GET" action="{{url('/attendance/search')}}">
                <div class="input-group">
                    <input class="form-control mb-4" type="text" name="search_name" placeholder="Search by attendance..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary mb-4" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </form>
            @if(Session::has("attendance_deleted"))
                <p class="alert alert-danger alert-dismissible fade show mb-4" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>{{session("attendance_deleted")}}</p>
            @endif
            @if(count($attendances) > 0)
            <table class="table table-striped text-center table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Attendance</th>
                        <th scope="col">Attendance Date</th>
                        <th scope="col" class="w-25">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendances as $attendance)
                        <tr>
                            <td>{{$attendance->id}}</td>
                            <td>{{$attendance->name}}</td>
                            <td>{{$attendance->attendance}}</td>
                            <td>{{$attendance->attdendance_date}}</td>
                            <td class="button"> 
                            <a href="{{url('attendance/'.$attendance->id.'/edit')}}" class="btn btn-primary" onclick="return confirm('Are you sure you want to update this record?')">Update</a>
                            {{Form::open(array('url' => 'attendance/'.$attendance->id, 'method' => 'DELETE'))}}
                            {{ csrf_field() }}
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger delete" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                            {{Form::close()}}
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$attendances->links('pagination::bootstrap-5')}}
        @endif
        </div>
    </div> 
</main>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
@endsection