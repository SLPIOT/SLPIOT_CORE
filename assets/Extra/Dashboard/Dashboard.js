

$('#station_list').change(function(){
     if($(this).val() != null)
        $(location).attr('href',$(this).val());
})

$(document).ready(function(){
    getPoints();
});

function getPoints(){
    $.getJSON("DashBoard/getStationLocations", function (json) {
        var mapProp= {
            center:new google.maps.LatLng(7.8731,80.7718),
            zoom:7,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        $.each( json, function( key, val ) {
            var t = JSON.parse(val.coordinates);
            var center = new google.maps.LatLng(t.lat, t.lng);
            var marker = new google.maps.Marker({
                position: center,
                map: map,
                title: val.name
            });
        });
        
      
    });
}


    // $.ajax({
    //         type: "POST",
    //         url: "DashBoard/getStationLocations",
    //         cache: false,
    //         success:  function(data){
    //             obj = JSON.parse(data);
    //             alert(data);
    //         },
    //         error: function (error) {
    //             alert("ERROR");
    //         }
    //  });
// ! function($) {
// 	"use strict";
//     var markers = [
//     {latLng: [6.796877360197794, 79.90176200866699], name: "Katubadda", weburl : ""}
//     ];
// 	var VectorMap = function() {
// 	};
// 	VectorMap.prototype.init = function() {
// 		//various examples
// 		$('#world-map-markers').vectorMap({
// 			map : 'world_mill_en',
// 			scaleColors : ['#ea6c9c', '#ea6c9c'],
// 			normalizeFunction : 'polynomial',
// 			hoverOpacity : 0.7,
// 			hoverColor : false,
// 			regionStyle : {
// 				initial : {
// 					fill : '#71b6f9'
// 				}
// 			},
//             markers:markers,
// 			 markerStyle: {
//                 initial: {
//                     r: 9,
//                     'fill': '#a288d5',
//                     'fill-opacity': 0.9,
//                     'stroke': '#fff',
//                     'stroke-width' : 7,
//                     'stroke-opacity': 0.4
//                 },

//                 hover: {
//                     'stroke': '#fff',
//                     'fill-opacity': 1,
//                     'stroke-width': 1.5
//                 }
//             },
// 			backgroundColor : 'transparent',
            
// 		});
       
// 	},
// 	//init
// 	$.VectorMap = new VectorMap, $.VectorMap.Constructor =
// 	VectorMap
// }(window.jQuery),

// //initializing
// function($) {
// 	"use strict";
// 	$.VectorMap.init();
//     $.VectorMap.addMarker(1, {coords: [100, 100]});
// }(window.jQuery);