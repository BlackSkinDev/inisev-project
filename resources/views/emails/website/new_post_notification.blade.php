@component('mail::message')
# Hello

A website you are subscribed to <b>{{$website->name}}</b> just received a new post, find the details below:

<li>Tile: {{$title}}</li>
<li>Description: {{$description}}</li>


@component('mail::button', ['url' => ''])
     Login here
@endcomponent

Thanks,<br>
  {{ config('app.name') }}
@endcomponent
