<form action="{{ route('store') }}" method="POST">
    {{-- @csrf is a directive that generates a CSRF token field --}}
    {{-- This is important for security to prevent CSRF attacks --}}
    @csrf
    First name:
    <input type="text" name="first_name">
    <br>
    Last name:
    <input type="text" name="last_name">
    <br>
    Gender:
    <input type="radio" name="gender" value="1">Male
    <input type="radio" name="gender" value="0">Female
    <br>
    Birth date:
    <input type="date" name="birthdate">
    <br>
    <button>Add</button>
</form>