$(document).ready(function(){

/** Mobile Menu Make it active */
$("#menu-button").click(function(){

    // Toogle Main Menu
    $("#mobile-main-menu").toggle("slow");

});

/** Wordpress Calendar Widget */
$("#wp-calendar").attr("class", "table");

/** Display Hidden Menu */
$("#boot-nav-wp").click(function(){

    // Toogle Main Menu
    $(".bootstrap-wp-nav > .navbar-content").toggle("slow");

});

});