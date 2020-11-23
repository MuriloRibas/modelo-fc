$(document).ready(function() {
    $("button.nav-container__button--sandwich").click(function() {
        $("nav.nav-container").toggle();
    })
    function checkWidth() {
        if (w.matches) {
            $("nav.nav-container").show();
        }
    }
    const w = window.matchMedia("(min-width: 750px)");
    w.addListener(checkWidth);

});