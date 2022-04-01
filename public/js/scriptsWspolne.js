// funkcja samowywołując
(function(){

})();



// Funkcja skrolowania do góry

// When the user scrolls down 20px from the top of the document, show the button --> https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

}

// jQuery
    $(document).ready(function () {



        // captcha
        $('#reload').click(function () {
           // console.log("Tag usunięty!");
            $.ajax({
                type: 'GET',
                url: 'refresh_captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });

        $(document).on('click', '#reload', function(){
           // console.log("Tag usunięty!");
        })


        //koniec $(document).ready


    })








