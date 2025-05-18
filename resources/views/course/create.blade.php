@extends('layout.master')


@section('content')
    <h3>Add new course</h3>
    <a href="{{ route('courses.index')}}">Back to courses list</a>
    <form action="{{route('courses.store')}}" method="post">
        @csrf
        <table>
            <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="name" value="{{ old('name') }}">
                    
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
                <td colspan="2"><button>Add</button></td>
            </tr>
        </table>
    </form>
@endsection