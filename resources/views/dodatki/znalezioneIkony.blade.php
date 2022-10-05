{{--
bi bi-chat-square-text-fill
--}}

@switch($rodzaj)

    @case('Przeczytaj koniecznie')
    <i class="bi bi-chat-square-text-fill" style="font-size: xxx-large; color:red;"></i>
    @break

    @case('Warto wiedzieć')
    <i class="bi bi-chat-square-text-fill" style="font-size: xxx-large; color:blue; font-weight: bold;"></i>
    @break

    @case('Można odnotować')

    <i class="bi bi-chat-square-text-fill" style="font-size: xxx-large; color:orange;"></i>
    @break

    @case('Ciekawostka')
    <i class="bi bi-chat-square-text-fill" style="font-size: xxx-large; color:green; "></i>
    @break

    @case('Tak myślą wrogowie')
    <i class="bi bi-chat-square-text-fill" style="font-size: xxx-large; color:purple;"></i>
    @break

    @case('Skandal i zgroza')
    <i class="bi bi-chat-square-text-fill" style="font-size: xxx-large; color:purple;"></i>
    @break

    @default
    <i class="bi bi-chat-square-text-fill" style="font-size: xxx-large; color:red;"></i>

@endswitch

{{--
bi bi-chat-square-text-fill
--}}

{{--
{{$rodzaj}}--}}

{{--
Przeczytaj koniecznie', 'Warto wiedzieć',
            'Można odnotować', 'Ciekawostka', 'Tak myślą wrogowie'

--}}
