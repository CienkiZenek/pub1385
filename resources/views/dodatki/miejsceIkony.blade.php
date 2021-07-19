@switch($rodzaj)

    @case('Forum')
    <i class="bi bi-bar-chart-steps" style="font-size: x-large; color:dodgerblue;"></i>
    @break

    @case('Wiadomość')
    <i class="bi bi-chat-square-text-fill" style="font-size: x-large; color:dodgerblue;"></i>
    @break

    @case('Inne')
    <i class="bi bi-chat-left-fill" style="font-size: x-large; color:dodgerblue;"></i>
    @break

    @case('InnySocial')
    <i class="bi bi-people-fill" style="font-size: x-large; color:dodgerblue;"></i>
    @break

    @default
    <i class="bi bi-chat-left-fill" style="font-size: x-large; color:dodgerblue;"></i>

@endswitch

{{--
* rodzaj' =>$this->faker->randomElement(['Forum', 'Wiadomość',
'Inne', 'Facebook', 'Twitter', 'InnySocial', 'Instagram', 'Linkedin']),
* */
--}}