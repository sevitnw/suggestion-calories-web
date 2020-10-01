<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Welcome to {{ env('APP_NAME') }}!</h4>
    <p>
        You are logged in {{ Auth::user()->name }}
    </p>
    <hr>
    <p>Stay safe & stay productive!</p>
    @if (Auth::user()->hasRole('user'))
        <p>Your today calories is {{$userCalories}} </p>
    @endif
</div>