/**
 * Created by NenaH77 on 2/6/15.
 */
$(function() {
    //make menus drop automatically
    $('ul.nav li.dropdown').hover(function() {
        $('.dropdown-menu', this).fadeIn();
    }, function(){
        $('.dropdown-menu', this).fadeOut('fast');
    });

}); //jQuery is loaded

var map;

var myLatlng = new google.maps.LatLng(43.59951, -83.90242);

function initialize(location) {
    //console.log(location);

    var mapOptions = {
        center: myLatlng,
        zoom: 13
    };

    map = new google.maps.Map(document.getElementById("map-canvas"),
        mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: "Come Join Us!"
    });
}


$(document).ready(function(){
    navigator.geolocation.getCurrentPosition(initialize);

});