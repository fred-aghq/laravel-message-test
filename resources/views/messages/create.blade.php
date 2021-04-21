@error('subject')
@enderror
@error('body')
@enderror
@include('header')
<div class="container mx-auto">
    <div class="mx-auto max-w-lg">
        <h1 class="text-4xl pt-4 pb-4">Create Message</h1>
        <h2><a href="/messages" class="underline text-blue-400">Back to inbox</a></h2>
        <div class="p-5 border-gray-200 border-2">
            <form method="POST" action="/messages">
                @csrf
                <div class="p-3">
                    <h1 class="inline">Subject:</h1>
                    <input name="subject" class="border-gray-200 border-2" size="32" maxlength="20" type="text"/>
                </div>
                <div class="p-3">
                    <h1>Message:</h1>
                    <textarea name="body" cols="50" rows="10"></textarea>
                </div>
                <div class="p-3">
                    <button type="submit">GO</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('footer')
