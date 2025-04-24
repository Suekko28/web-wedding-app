$(document).ready(function () {
    let ticking = false;

    // Function to set active class based on scroll position
    function setActiveOnScroll() {
        var scrollPos = $(document).scrollTop();

        $('.nav-link[href^="#"]').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));

            if (refElement.length) {
                var offsetTop = refElement.offset().top - 80; // Offset agar tidak tertutup navbar

                if (scrollPos >= offsetTop && scrollPos < offsetTop + refElement.outerHeight()) {
                    if (!currLink.hasClass("active")) {
                        $('.nav-link').removeClass("active");
                        currLink.addClass("active");
                    }
                }
            }
        });

        ticking = false;
    }

    // Gunakan requestAnimationFrame untuk throttle scroll
    $(window).on("scroll", function () {
        if (!ticking) {
            window.requestAnimationFrame(setActiveOnScroll);
            ticking = true;
        }
    });

    // On page load with hash
    function setActiveLinkOnLoad() {
        var hash = window.location.hash;
        if (hash) {
            $(".nav-link").removeClass("active");
            $(".nav-link[href='" + hash + "']").addClass("active");
        }
    }

    // Smooth scroll saat klik link
    $(".nav-link[href^='#']").on("click", function (e) {
        e.preventDefault();
        var target = this.hash;
        var $target = $(target);

        if ($target.length) {
            $("html, body").stop().animate({
                scrollTop: $target.offset().top - 70
            }, 600, 'swing', function () {
                window.location.hash = target;
                setActiveOnScroll(); // pastikan update setelah scroll
            });
        }

        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });

    // Init saat halaman dimuat
    setActiveLinkOnLoad();
    setActiveOnScroll(); // tambahkan ini untuk aktif langsung saat reload
});
