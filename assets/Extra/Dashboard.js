
    
    /**
 * Theme: Adminto Admin Template
 * Author: Coderthemes
 * VectorMap
 */

 $('#station_list').change(function(){
     if($(this).val() != null)
        $(location).attr('href',$(this).val());
})

function getPoints(){
    $.ajax({
                    type: "GET",
                    url: "DashBoard/getDataCentersAll",
                    cache: false,
                    success:  function(data){
                        alert(data);
                        obj = JSON.parse(data);
                        
                        for(var i=0;i<obj.length;i++){
                            var id=obj[i]["stationID"];
                            var coo = obj[i]["coordintes"];
                            
                        }

                    },
                    error: function (error) {
                        alert("ERROR");
                    }
     });
}

! function($) {
	"use strict";
    var markers = [
    {latLng: [6.796877360197794, 79.90176200866699], name: "Katubadda", weburl : ""}
    ];
	var VectorMap = function() {
	};
	VectorMap.prototype.init = function() {
		//various examples
		$('#world-map-markers').vectorMap({
			map : 'world_mill_en',
			scaleColors : ['#ea6c9c', '#ea6c9c'],
			normalizeFunction : 'polynomial',
			hoverOpacity : 0.7,
			hoverColor : false,
			regionStyle : {
				initial : {
					fill : '#71b6f9'
				}
			},
            markers:markers,
			 markerStyle: {
                initial: {
                    r: 9,
                    'fill': '#a288d5',
                    'fill-opacity': 0.9,
                    'stroke': '#fff',
                    'stroke-width' : 7,
                    'stroke-opacity': 0.4
                },

                hover: {
                    'stroke': '#fff',
                    'fill-opacity': 1,
                    'stroke-width': 1.5
                }
            },
			backgroundColor : 'transparent',
            
		});
       
	},
	//init
	$.VectorMap = new VectorMap, $.VectorMap.Constructor =
	VectorMap
}(window.jQuery),

//initializing
function($) {
	"use strict";
	$.VectorMap.init();
    $.VectorMap.addMarker(1, {coords: [100, 100]});
}(window.jQuery);