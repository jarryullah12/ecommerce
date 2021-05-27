@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent
<h1>use laravel offical site templete here</h1>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
