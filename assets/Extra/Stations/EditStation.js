            var mylist = new Array();

            $(document).ready(function(){
                
            });

            

            function UpdateData(){
                var succ=1;
                $.ajax({
                    type: "POST",
                    url: "updateStation",
                    data: $("#frmStation").serialize(),
                    cache: false,
                    success:  function(data){
                        alert("Data Updated "+data+" success");
                        window.location="viewStation";
                    },
                    error: function (error) {
                    }
                });

            }

            function DelData(){

                $.ajax({
                    type: "POST",
                    url: "deleteStation",
                    data: $("#frmStation").serialize(),
                    cache: false,
                    success:  function(data){
                        alert("Data Updated " + data + " success");
                        window.location="viewStation";
                    },
                    error: function (error) {
                        alert("Data ERROR ");
                    }
                });
            }

            // // gmap
            // var marker_k;
            // var uluru = {lat: +7.290, lng: 80.633};
            // function initMap() {
            //     var map = new google.maps.Map(document.getElementById('map'), {
            //     zoom: 7,
            //     center: uluru
            //     });

            //     google.maps.event.addListener(map,'click',function(event) {
            //     if(marker_k != null)
            //         marker_k.setMap(null);
            //     var lat =event.latLng.lat();
            //     var lng =event.latLng.lng();
            //     $("#txtCoordinates").val("{\"lat\": \"" + lat + "\", \"lng\": \"" + lng + "\"}");
                
            //     var marker = new google.maps.Marker({
            //         position: event.latLng,
            //         map: map,
            //         title: ''
            //     });
            //     marker_k=marker;
            //     });
            //     var lt= {lat: <?php echo(json_decode($station[0]->coordinates)->lat);?>, lng: <?php echo (json_decode($station[0]->coordinates)->lng)?>};
            //     var marker = new google.maps.Marker({
            //         position: lt,
            //         title: "ad"
            //     });
            //     marker.setMap(map);
            // }

            // function setOnMap(){
            //         var cod = $("#txtCoordinates").val();
            //         uluru =cod;
            // }

            function fillParameterList(){
                $.ajax({
                    type: "POST",
                    url: "getPrmeterList",
                    cache: false,
                    success:  function(data){
                         /*var json = $.parseJSON(data);
                         for (var i=0;i<json.length;++i)
                         {
                             $('#mulpParameterlst').multiSelect('addOption', { value: json[i].ID , text: json[i].Name, index: i }); // search http://loudev.com/
                         }*/

                         $("#lstParametreList").html(data);
                    },
                    error: function (error) {
                    }
                });
            }