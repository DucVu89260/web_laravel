<h1>Add more course</h1>
<form action="{{route('courses.store')}}" method="post">
    @csrf
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td colspan="2"><button>Add</button></td>
        </tr>
    </table>
</form>