<?php
/**
 * Created by PhpStorm.
 * User: bmabi
 * Date: 6/26/2017
 * Time: 2:06 PM
 */
?>

<html>
@include('layout.header')
    <body>
        @include('layout.top_nav')
        <div class="container">

            @yield('content')
        </div>

        <div>
            @yield('footer')
        </div>

    </body>
</html>
