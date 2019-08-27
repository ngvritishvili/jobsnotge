@component('mail::message')
# Introduction

Applicant {{ $user->name }} sent mail for job {{ $job_title }} <br>
Please Click On Button To View {{ $user->name }} CV.

@component('mail::button', ['url' => 'localhost:8000/user-cv/' . $file])
View CV
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
