<h1>Logging in</h1>
<form action="{{ route('process_login') }}" method="post">
   @csrf
   Email
   <input type="email" name="email">
   <br>
   Password
   <input type="password" name="password">
   <br>
   <button>Log in</button>
   <br>
   <a href="{{ route('register') }}">Register"></a>
</form>