@switch($rodzaj)

    @case('Film')
        <i class="bi bi-person-video2" style="font-size: xxx-large; color:dodgerblue;"></i>
        @break

    @case('Forum')
    <i class="bi bi-bar-chart-steps" style="font-size: xxx-large; color:dodgerblue;"></i>
    @break

    @case('Wiadomość')
    <i class="bi bi-chat-square-text-fill" style="font-size: xxx-large; color:dodgerblue;"></i>
    @break

    @case('Inne')
    <i class="bi bi-chat-left-fill" style="font-size: xxx-large; color:dodgerblue;"></i>
    @break

    @case('SocialMedia')
    <i class="bi bi-people-fill" style="font-size: xxx-large; color:dodgerblue;"></i>
    @break


    @default
    <i class="bi bi-chat-left-fill" style="font-size: xxx-large; color:dodgerblue;"></i>

@endswitch

{{--
* rodzaj' =>$this->faker->randomElement(['Forum', 'Wiadomość',
'Inne', 'Facebook', 'Twitter', 'InnySocial', 'Instagram', 'Linkedin']),
* */
--}}
