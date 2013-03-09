<!DOCTYPE html>
<html>
<head>
    <script src="jquery-1.9.1.js"></script>
    <script src="scripts/jquery_functions.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    {{ HTML::style('css/style.css') }}
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/dashboard.js') }}
    {{ HTML::script('js/jquery.cookie.js') }}
</head>
<body>

<div id="dashboard_outer_block">

    <div class="dashboard_inner_block">
        <div class="login_inner_name">
            <h2>Welcome back, {{Auth::user()->username}}</h2>
        </div>

        <div id="dashboard_container">
            <div class="dashboard_nav">
                <ul class="menu">
                    <li><a href="/" id="profile">Profile</a></li>
                    <li><a href="/features/" id="callfeatures">Call Features</a></li>
                    <li><a href="#">Utilities</a></li>
                    <li><a href="#">My Call</a></li>
                    <li> {{ HTML::link('logout', 'Logout') }}</li>
                </ul>
            </div>
            <div class="dashboard_content">
                <label for="always">Always</label><input type="text" name="always" id="always"> <div class="indicator"></div>
                <label for="busy">Busy</label><input type="text" name="busy" id="busy"> <div class="indicator"></div>
                <label for="never">Never</label><input type="text" name="never" id="never"> <div class="indicator"></div>
            </div>
            <div style="clear:both;"></div>
        </div>

    </div>

</div>

</body>
</html>