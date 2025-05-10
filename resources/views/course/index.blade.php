<h1>Courses List</h1>
<a href="{{ route('courses.create')}}">Add more course</a>
<table border="1" width="40%">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Created At</th>
        <th>Delete</th>
        <th>Edit</th>
    </tr>
    @foreach ($data as $each)
    <tr>
        <td>{{ $each ->id}}</td>
        <td>{{ $each ->name}}</td>
        <td>{{ $each -> getYearCreatedAtAttribute()}}</td>
        <td>
            <a href="{{route('courses.edit',$each)}}">
                <button>Edit</button>
            </a>
        </td>
        <td>
            <form action="{{route('courses.destroy',$each)}}" method="post">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </td>
        
    </tr>
    @endforeach
</table>