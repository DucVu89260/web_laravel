@extends('layout.master')

@section('content')
    <h3>Update student's information</h3>
    <a href="{{ route('students.index')}}">Back to courses list</a>
    <form action="{{route('students.update',$each)}}" method="post">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" value="{{$each->name}}">

                    @if($errors->has('name'))
                        <ul>
                            @foreach ($errors->get('name') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                </td>
            </tr>
            <tr>
                <td colspan="2"><button>Update</button></td>
            </tr>
        </table>
    </form>
@endsection