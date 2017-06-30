<?php
/**
 * Created by PhpStorm.
 * User: bmabi
 * Date: 6/24/2017
 * Time: 2:48 PM
 */
?>
<html>
<head>

</head>
<body>

<div>

    <ul>
@foreach($tasks as $task)
            <li>
                <a href="/tasks/{{$task->id}}">{{$task->body}}</a>
            </li>
@endforeach

    </ul>
</div>

</body>
</html>