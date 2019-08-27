@component('mail::message')
# Introduction

{{ $contactUs['name'] }} sent mail:
<br>
name: {{ $contactUs['name'] }},
<br>
email: {{ $contactUs['email'] }},
<br>
Company: {{ $contactUs['companyName'] }},
<br>
Message: {{ $contactUs['message'] }}



<br>
{{ config('app.name') }}
@endcomponent
