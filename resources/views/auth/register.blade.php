<h1>Register</h1>
<form action="{{ route('process_register') }}" method="post">
   @csrf
   Name
   <input type="name" name="name">
   <br>
   Email
   <input type="email" name="email">
   <br>
   Password
   <input type="password" name="password">
   <br>
   <button class="btn btn-primary">Register</button>
</form>