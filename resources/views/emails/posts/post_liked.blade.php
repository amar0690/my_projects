@component('mail::message')
# Congratz!! Your Post is getting likes.

{{ $user['name'] }} liked one of your posts.

@component('mail::button', ['url' => route( 'posts.show', $post ) ])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
