$(document).ready(function () {
    // Function to set active class based on the URL
    function setActiveLink() {
        var hash = window.location.hash; // Get the hash from the URL
        if (hash) {
            $(".nav-link").removeClass("active"); // Remove active class from all links
            $(".nav-link[href='" + hash + "']").addClass("active"); // Add active class to the link with the matching href
        }
    }

    // Set the active link on page load
    setActiveLink();

    // Set the active link on click
    $(".nav-link").click(function () {
        $(".nav-link").removeClass("active");
        $(this).addClass("active");
    });

    // Optional: Update the active link when the hash in the URL changes
    $(window).on("hashchange", function () {
        setActiveLink();
    });
});
