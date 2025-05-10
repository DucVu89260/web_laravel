<h1>Update course's information</h1>
<form action="{{route('courses.update',$each)}}" method="post">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" value="{{$each->name}}"></td>
        </tr>
        <tr>
            <td colspan="2"><button>Update</button></td>
        </tr>
    </table>
</form>