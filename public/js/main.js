/* setInterval animate */

$(function() {
    setInterval(function() {
        $('.arrow').animate({ x: '-3px' }, 500);
        $('.arrow').animate({ x: '2px' }, 500);
    });
});

/* select */

$(function() {
    $('select').change(function() {
        $(this).css({ "color": "#333333" }, 0);
    });
});

/* scroll */

$(function() {
    $("a.scroll").click(function() {
        $("html, body").stop().animate({
            scrollTop: $($(this).attr("href")).offset().top - 0
        }, {
            duration: 700
        });
        return false;
    });
});

/* pop-up */

$(function() {
    $('.info-ico').click(function() {
        $(this).children().fadeToggle(300);
    });
});

$(function() {
    $('.button-1, .button-3').click(function() {
        $('#zb1').fadeIn(300);
        $('.wrapper').fadeIn(300);
    });
});

$(function() {
    $('.wrapper, .close').click(function() {
        $('.wrapper, .z-box, .thnx').fadeOut(300);
    });
});

/* form validate */

// $(function() {
//     $('#form1').validate(
//         {
//             rules: {
//                 "city": {
//                     required: true,
//                     maxlength: 40
//                 },
//                 "name": {
//                     required: true,
//                     maxlength: 40
//                 },
//                 "numb":{
//                     required:true
//                 },
//                 "email": {
//                     required: true,
//                     email: true,
//                     maxlength: 100
//                 },
//                 "date": {
//                     required: true
//                 }
//             },
//             messages: {
//                 "city": {
//                     required: ""
//                 },
//                 "name": {
//                     required: ""
//                 },
//                 "numb":{
//                     required:""
//                 },
//                 "email": {
//                     required: "",
//                     email: ""
//                 },
//                 "date": {
//                     required: ""
//                 }
//             }
//         });
// });

/* thnx */

// $(function() {
//     $('#form1').ajaxForm(function() {
//         $('.wrapper, .thnx').fadeIn(300);
//         $('.z-box').fadeOut(300);
//         $('#form1')[0].reset();
//     });
// });

/* form attach */

$(function() {
    function click(el) {
        var evt = document.createEvent('Event');
        evt.initEvent('click', true, true);
        el.dispatchEvent(evt);
    }

    $('#filesel').on('click', function(e) {
        var fileInput = document.querySelector('.fileElem');
        //click(fileInput); // Simulate the click with a custom event.
        fileInput.click(); // Or, use the native click() of the file input.

    });

    var selDiv = "";

    document.querySelector('.fileElem').addEventListener('change', handleFileSelect, false);
    selDiv = document.querySelector("#MultiFile-wrap");

    function handleFileSelect(e) {

        if (!e.target.files) return;

        selDiv.innerHTML = "";

        var files = e.target.files;
        for (var i = 0; i < files.length; i++) {
            var f = files[i];

            selDiv.innerHTML += f.name + "<br/>";

        }

    }
});

/* animation */

$('.ani-1').waypoint(function() {
    $(this).addClass('fadeInUp').addClass('animated');
}, {
    offset: '90%'
});

$('.ani-2').waypoint(function() {
    $(this).addClass('fadeInDown').addClass('animated');
}, {
    offset: '90%'
});

$('.ani-3').waypoint(function() {
    $(this).addClass('fadeInLeft').addClass('animated');
}, {
    offset: '90%'
});

$('.ani-4').waypoint(function() {
    $(this).addClass('fadeInRight').addClass('animated');
}, {
    offset: '90%'
});

/* end */