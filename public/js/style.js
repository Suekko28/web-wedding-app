$(document).ready(function () {
    // Function to set active class based on scroll position
    function setActiveOnScroll() {
        var scrollPos = $(document).scrollTop();
        $('.nav-link[href^="#"]').each(function () {
            var currLink = $(this);
            var refElement = $(currLink.attr("href"));
            if (refElement.length) {
                var offsetTop = refElement.offset().top - 80; // Offset untuk menghindari tertutup navbar
                if (scrollPos >= offsetTop && scrollPos < offsetTop + refElement.height()) {
                    $('.nav-link').removeClass("active");
                    currLink.addClass("active");
                }
            }
        });
    }

    // On scroll
    $(document).on("scroll", setActiveOnScroll);

    // On page load with hash
    function setActiveLinkOnLoad() {
        var hash = window.location.hash;
        if (hash) {
            $(".nav-link").removeClass("active");
            $(".nav-link[href='" + hash + "']").addClass("active");
        }
    }

    // On click
    $(".nav-link[href^='#']").on("click", function (e) {
        e.preventDefault();
        var target = this.hash;
        var $target = $(target);

        if ($target.length) {
            $("html, body").animate({
                scrollTop: $target.offset().top - 70 // Smooth scroll with offset
            }, 600, function () {
                window.location.hash = target;
            });
        }

        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });

    // Init on page load
    setActiveLinkOnLoad();
});
