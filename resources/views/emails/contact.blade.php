<x-mail::message>
# Visitor message

{{-- The body of your message. Testing Message For Sameh's Blog. --}}
{{-- <br>
<br> --}}
<br>
Firstname :{{$firstname}}<br>
Lastname :{{$lastname}}<br>
Email :{{$email}}<br>
Subject :{{$subject}}<br>
Message : <br>
{{$message}} <br><br><br>

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
