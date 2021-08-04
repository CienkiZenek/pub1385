@component('mail::message')
    {{--{{ config('app.name') }}--}}
    PoradnikDyskutanta.pl<br>
    List od: {{$wysylajacy->name}}<br><br>
    <br>
    {{$tresc}}<br><br><br>






@endcomponent