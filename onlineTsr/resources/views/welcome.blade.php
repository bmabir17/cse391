<html>
<head>

</head>
<body>

<div>
    <h2> Hello {{ $name }}</h2>
    <h3>Your age is {{$age}}</h3>
    <label>Your hobies are:</label>
    <ul>
        @foreach($hobbies as $hobby)
            <li>{{$hobby->title}}</li>
        @endforeach

    </ul>
</div>

</body>
</html>