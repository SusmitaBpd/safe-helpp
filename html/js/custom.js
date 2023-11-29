$(document).ready(function () {

    $(window).scroll(function () {
        var scrollfixed = $(this).scrollTop()
        if (scrollfixed > 0) {
            $(".main_header").addClass("fixed")
        } else {
            $(".main_header").removeClass("fixed")
        }
    });

    $(".click_to_open").click(function () {
        $(this).fadeOut(100)
        $(".form_box").fadeIn(200)
        $(".form_box input").addClass("active")
    })


    $(".banner_text").slick({
        slidesToShow: 1,
        infinite: true,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: false,
        // asNavFor: '.banner_text'
    });

    $(".main_banner_img").slick({
        slidesToShow: 1,
        infinite: true,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: false,
        // asNavFor: '.main_banner_img'
    });

    $(".prev-btn").click(function () {
        $(".banner_text , .main_banner_img").slick("slickPrev");
    });

    $(".next-btn").click(function () {
        $(".banner_text , .main_banner_img").slick("slickNext");
    });
    $(".prev-btn").addClass("slick-disabled");
    $(".banner_text , .main_banner_img").on("afterChange", function () {
        if ($(".slick-prev").hasClass("slick-disabled")) {
            $(".prev-btn").addClass("slick-disabled");
        } else {
            $(".prev-btn").removeClass("slick-disabled");
        }
        if ($(".slick-next").hasClass("slick-disabled")) {
            $(".next-btn").addClass("slick-disabled");
        } else {
            $(".next-btn").removeClass("slick-disabled");
        }
    });

    $(".service_img_slider").slick({
        slidesToShow: 4,
        infinite: true,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        dots: false
    });

    $(".Cases_img_slider").slick({
        slidesToShow: 3,
        infinite: true,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        dots: false
    });

    $(".testi_slider").slick({
        slidesToShow: 1,
        infinite: true,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        dots: false
    });

    // FAQ
    $(".accordion-titel").bind('click', function () {
        if ($(this).parent(".accordion-item").hasClass("active")) {
            $(this).parent(".accordion-item").find(".accordion-contant").slideUp();
            $(this).parent(".accordion-item").removeClass("active");
        }
        else {

            $(this).parent(".accordion-item").find(".accordion-contant").slideDown();
            $(this).parent(".accordion-item").addClass("active");
            $(this).parent(".accordion-item").prevAll(".accordion-item").find(".accordion-contant").slideUp();
            $(this).parent(".accordion-item").nextAll(".accordion-item").find(".accordion-contant").slideUp();
            $(this).parent(".accordion-item").nextAll(".accordion-item").removeClass("active");
            $(this).parent(".accordion-item").prevAll(".accordion-item").removeClass("active");
        }
    });

    Fancybox.bind("[data-fancybox", {
        dragToClose: false
    })

    $("input[name='gender']").bind("click", function () {
        var get_val = $(this).val()
        if (get_val == "other") {
            $("#gender_other").show(0)
        } else {
            $("#gender_other").hide(0)
        }
    })


    $('input[name="checkbox"]').on('click', function () {
        if ($(this).prop('checked')) {
            $('#checkbox_other_v2').fadeIn();
        }
        else {
            $('#checkbox_other_v2').hide();
        }
    });

});


