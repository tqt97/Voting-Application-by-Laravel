@component('mail::message')
# Idea Status Updated

The idea: {{ $idea->title }}

The body of your message.
{{ $idea->status->name }}

@component('mail::button', ['url' => route('ideas.show', $idea)])
View post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
