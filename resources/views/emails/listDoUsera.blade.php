@component('mail::message')
    {{ config('app.name') }}<br>
    List od: {{$wysylajacy->name}}<br>
    <br>
    {{$tresc}}<br><br><br>






@endcomponent