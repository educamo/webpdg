jQuery(document).ready(function($) {

    'use strict';


    $(".Modern-Slider").slick({
        autoplay: true,
        speed: 1000,
        slidesToShow: 1,
        slidesToScroll: 1,
        pauseOnHover: false,
        dots: true,
        fade: true,
        pauseOnDotsHover: true,
        cssEase: 'linear',
        // fade:true,
        draggable: false,
        prevArrow: '<button class="PrevArrow"></button>',
        nextArrow: '<button class="NextArrow"></button>',
    });

    $('#nav-toggle').on('click', function(event) {
        event.preventDefault();
        $('#main-nav').toggleClass("open");
    });


    $('.tabgroup > div').hide();
    $('.tabgroup > div:first-of-type').show();
    $('.tabs a').click(function(e) {
        e.preventDefault();
        var $this = $(this),
            tabgroup = '#' + $this.parents('.tabs').data('tabgroup'),
            others = $this.closest('li').siblings().children('a'),
            target = $this.attr('href');
        others.removeClass('active');
        $this.addClass('active');
        $(tabgroup).children('div').hide();
        $(target).show();

    })



    $(".box-video").click(function() {
        $('iframe', this)[0].src += "&amp;autoplay=1";
        $(this).addClass('open');
    });

    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 30,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: true,
                loop: false
            }
        }
    })



    var contentSection = $('.content-section, .main-banner');
    var navigation = $('nav');

    //when a nav link is clicked, smooth scroll to the section
    navigation.on('click', 'a', function(event) {
        event.preventDefault(); //prevents previous event
        smoothScroll($(this.hash));
    });

    //update navigation on scroll...
    $(window).on('scroll', function() {
            updateNavigation();
        })
        //...and when the page starts
    updateNavigation();

    /////FUNCTIONS
    function updateNavigation() {
        contentSection.each(function() {
            var sectionName = $(this).attr('id');
            var navigationMatch = $('nav a[href="#' + sectionName + '"]');
            if (($(this).offset().top - $(window).height() / 2 < $(window).scrollTop()) &&
                ($(this).offset().top + $(this).height() - $(window).height() / 2 > $(window).scrollTop())) {
                navigationMatch.addClass('active-section');
            } else {
                navigationMatch.removeClass('active-section');
            }
        });
    }

    function smoothScroll(target) {
        $('body,html').animate({
            scrollTop: target.offset().top
        }, 800);
    }


    $('.button a[href*=#]').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top - 0 }, 500, 'linear');
    });

    // filtrando servicios ============================

    $('.categoryItemactivo').click(function(e) {
        e.preventDefault();
        var category = $(this).attr('data-category');

        //se remueve la clase active de todos los item y se agrega la clase al elemento seleccionado
        $('.categoryItemactivo').removeClass('active');
        $(this).addClass('active');

        // ocultar servicios ============================
        $('.card').css('transform', 'scale(0)');

        function hideServices() {
            $('.card').hide();
            $('.card').parent().hide();
        }
        setTimeout(hideServices, 400);

        //mostrar servicios por categoria segun la que selecciono =====================================
        function showServices() {
            $('.card[data-category="' + category + '"]').show();
            $('.card[data-category="' + category + '"]').parent().show();

            $('.card').css('transform', 'scale(1)');
        }
        setTimeout(showServices, 400);


    });

    // mostrar todos los servicios ================================

    $('.categoryItemactivo[data-category="all"]').click(function(e) {

        e.preventDefault();

        function showAll() {
            $('.card').show();
            $('.card').parent().show();
            $('.card').css('transform', 'scale(1)');
        }
        setTimeout(showAll, 400);
    })

});

const openModal = document.querySelector('.open-modalUs');
const modalUs = document.querySelector('.modalUs');
const modalClose = document.querySelector('.modalUs-close');

openModal.addEventListener('click', (e) => {
    e.preventDefault();
    modalUs.classList.add('modalUs--show');
});

modalClose.addEventListener('click', (e) => {
    e.preventDefault();
    modalUs.classList.remove('modalUs--show');
});