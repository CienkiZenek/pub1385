<div class="fs-5 mt-4">Stopień ukończenia {{$tresc}}: {{$procent}}%</div>
<div class="progress mt-2 mb-3">
    <div class="progress-bar  progress-bar-striped
@switch($procent)
    @case($procent<21)
            bg-danger
@break
    @case($procent>20 && $procent<41)
            bg-warning
@break
    @case($procent>40 && $procent<61)
            bg-info
@break
    @case($procent>60 && $procent<81)

    @break
    @case($procent>80)
            bg-success
@break

    @default
            bg-info
@endswitch



            "
         role="progressbar" style="width: {{$procent}}%" aria-valuenow="{{$procent}}" aria-valuemin=0
         aria-valuemax="100"></div>
</div>