@extends('layout.master')


@section('content')
    <h3>Add more student</h3>
    <a href="{{ route('students.index')}}">Back to students list</a>
    <br>
    @if (session()->has('success'))
        <div class="alert alert-success">
            <ul>
                {{ session()->get('success') }}
            </ul>
        </div>
    @endif
    <div class="form-group">
        <form action="{{route('students.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <table class="table table-hover">   
                <tr>
                    <td><label>Name</label></td>
                    <td>
                        <input type="text" name="name" value="{{ old('name') }}">
                    </td>
                </tr>
                <tr>
                    <td><label>Gender</label></td>
                    <td>
                        <input type="radio" name="gender" value="1" checked>Male
                        <input type="radio" name="gender" value="0">Female
                    </td>
                </tr>
                <tr>
                    <td><label>Birth date</label></td>
                    <td><input type="date" name=birth_date></td>
                </tr>
                <tr>
                    <td><label>Status</label></td>
                    @foreach($arrStudentStatus as $option => $value)
                    <td>
                        <input type="radio" name="status" value="{{ $value }}" class="checkbox"
                        @if($loop -> first)
                            checked
                        @endif
                        >{{ $option }}
                    </td>
                    @endforeach
                </tr>
                <tr>
                    <td><label>Avatar</label></td>
                    <td><input type="file" name="avatar"></td>
                </tr>
                <tr>
                    <td><label>Course belonged</label></td>
                    <td>
                        <select name="course_id" id="" class="form-control">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button>Add</button></td>
                </tr>
            </table>
        </form>
    </div>
@endsection