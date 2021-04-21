<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>
<div class="container mx-auto">
    <div id="nav-links">
        <ul class="text-2xl p-10">
            <li>
                <a href="/messages">Inbox</a>
            </li>
            <li class="text-green-400">
                <a href="/messages/create">Create a new message</a>
            </li>
            <li class="text-red-500">
                <a href="/messages?unread=1">Unread messages</a>
            </li>
            <li class="text-yellow-400">
                <a href="/messages?all=1">View all messages (archived/read)</a>
            </li>
        </ul>
    </div>
</div>
