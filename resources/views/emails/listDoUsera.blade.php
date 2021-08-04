@component('mail::message')
    {{--{{ config('app.name') }}--}}
    PoradnikDyskutanta.pl - wiadomość do innego użytkownika.<br>
    List od: {{$wysylajacy->name}}<br><br>
    {{$tresc}}<br><br><br>






@endcomponent