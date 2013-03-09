

<!DOCTYPE html>
<html>
<head>
    <script src="jquery-1.9.1.js"></script>
    <script src="scripts/jquery_functions.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    {{ HTML::style('css/style.css') }}
</head>
<body>

<div id="login_outer_block">

    <div class="login_inner_block">
        <div class="login_inner_name">
            <h2>Project NP</h1>
        </div>
        <div class="login_inner_forms">
            {{ Form::open('login') }}
            <!-- check for login errors flash var -->
            @if (Session::has('login_errors'))
            <span class="error">Username or password incorrect.</span>
            @endif
            <!-- username field -->
            <p>{{ Form::label('username', 'Username') }}
            {{ Form::text('username') }}</p>
            <!-- password field -->
            <p>{{ Form::label('password', 'Password') }}
            {{ Form::password('password') }}</p>
            <!-- submit button -->
            <p>{{ Form::submit('Login', array('class' => 'login_button')) }}</p>
            {{ Form::close() }}

        </div>

    </div>

</div>

</body>
</html>