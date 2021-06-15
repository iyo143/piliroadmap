@component('mail::message')
# Feedback

Hi, {{$department}}

Subject:
{{$subject}}

Feedback:
{{$feedback}}

From
- <b>Email:</b>  {{ $email }} {{-- TODO Change username to email in mail message  --}}
- <b>name:</b> {{$user_name}}

<i>Note! Please do not Share your password with anyone</i>

@component('mail::button',['url'=>'https://inventory.dayawtech.com.ph/login'])
Login
@endcomponent

@endcomponent
