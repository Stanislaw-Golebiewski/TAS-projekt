@if (Auth::guard('web')->check())
 <p class="text-success">
 	You are logged in as a user!
 </p>
@else
 <p class="text-danger">
 	You are logged out as a user!
 </p>
@endif

@if (Auth::guard('admin')->check())
 <p class="text-success">
 	You are logged in as a admin!
 </p>
@else
 <p class="text-danger">
 	You are logged out as a admin!
 </p>
@endif