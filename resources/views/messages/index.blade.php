@include('header')
<div class="container mx-auto md:max-w-2xl">
    @foreach ($messages as $message)
        <div class="p-6 mb-4 border-2 border-gray-200">
            <h1 class="{{$message['read'] ? '' : 'text-red-500'}} text-2xl">{{$message['subject'] ?? '< no subject >'}}</h1>
            <h2 class="text-sm text-gray-400">Sent: {{$message['sent']}}</h2>
            @if($message['archived'])
                <h2 class="text-sm text-gray-400">Archived: {{$message['archived']}}</h2>
            @endif
            @if($message['read'])
                <h2 class="text-sm text-gray-400"></h2>
            @endif
            <form action="/messages/{{$message['id']}}" method="POST">
                @csrf
                @method('PATCH')
                <input name="archive" type="hidden" value="{{ (int) !$message['archived'] }}" />
                <button class="py-1 text-sm px-4 border-blue border-2 bg-blue-200" type="submit">{{ $message['archived'] ? 'Unarchive' : 'Archive' }}</button>
            </form>
            <form action="/messages/{{$message['id']}}" method="POST">
                @csrf
                @method('PATCH')
                <input name="read" type="hidden" value={{ (int) !$message['read'] }} />
                <button class="y-1 text-sm px-4 border-blue border-2 bg-blue-200" type="submit">{{ $message['read'] ? 'Mark as unread' : 'Mark as read' }}</button>
            </form>
            <p class="text-md">{{$message['body']}}</p>
        </div>
    @endforeach
</div>
@include('footer')
