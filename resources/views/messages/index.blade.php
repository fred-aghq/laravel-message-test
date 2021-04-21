<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<h1 class="text-green-200">Tailwind worked</h1>
</body>
<div class="container mx-auto md:max-w-2xl">
    <div id="nav-links">
        <ul>
            <li>Create a new message</li>
            <li>View all messages (archived/read)</li>
            <li></li>
        </ul>
    </div>
    @foreach ($messages as $message)
        <div class="p-10">
            <h1 class="text-2xl">{{$message['subject']}}</h1>
            <h2 class=" text-sm text-gray-400">Sent: {{$message['sent']}}</h2>
            @if($message['archived'])
                <h2>Archived: {{$message['archived']}}</h2>
            @endif
            <p>{{$message['body']}}</p>
        </div>
    @endforeach
</div>
