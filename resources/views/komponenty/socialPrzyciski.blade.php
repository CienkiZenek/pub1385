<div class="d-flex p-1 align-baseline">

    <div class="ms-2">
        {{-- Twitter share button--}}
        <a class="twitter-share-button"
           href="https://twitter.com/intent/tweet"
           data-size="large"
           data-lang="pl"
           data-text="Poradnik Dyskutanta pomaga w znalezieniu argumantów podczas internetowej dyskusji!"
           data-url="{{Request::url()}}"
        >
            Tweet
        </a></div>
    <div class="me-2 ms-2">
        <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: pl_PL</script>
        <script type="IN/Share" data-url="{{Request::url()}}"></script>
    </div>

    {{-- Facebook share button--}}
    <div class="fb-share-button ms-2"
         data-href="{{Request::url()}}"
         data-layout="button"
         size="large">
    </div>

    {{-- Facebook like button--}}
    <div class="fb-like ms-2" data-href="{{Request::url()}}"
         data-width="" data-layout="standard" data-action="like"
         data-size="large" data-share="false"></div>



</div>
