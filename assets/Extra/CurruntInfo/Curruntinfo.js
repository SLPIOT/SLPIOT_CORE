

$(document).ready(function(){
    $(".temp_view").knob();
    $(".humidity_view").knob();
    $(".ws_view").knob();
    $(".wd_view").knob();
    $(".view_ws").knob();
    $(".view_wd").knob();
    
    updateSystem();
    setInterval(updateSystem,3000);

    var lastTime;
    //timers 

    function updateSystem(){
        $.getJSON(apiUrl,function(json){
            //console.log(json[0]);
            var obj = jQuery.parseJSON(JSON.stringify(json[0]));
            // for external temp
            $('#txtexttemp').text(obj.Ext_temp);
            $('.temp_view').val(obj.Ext_temp).trigger('change');

            // humidity
            $('#txtextHumidity').text(obj.Humidity);
            $('.humidity_view').val(obj.Humidity).trigger('change');

            // heat factor
            setHeatFactor(obj.Int_temp);

            // soil moisture
            setSoilmoisture(obj.Soil_Moisture);

            // set pressure and intensity
            
            $('#txtPressure').text(obj.Pressure + " pa");
            $('#txtIntensity').text(obj.Intensity + " lux");

            $('.view_ws').val(obj.Win_speed);

            $('.view_wd').val(obj.Win_dir);

            getRainFacts();

            // update table
            updateTable(obj);
        });
     }

     function setHeatFactor(val){
        var hf = Number(((val-30)/(100-30))*100).toFixed(1);
        $('#txthfIncreese').text(hf);
        $('#txtHeatFactor').text(val);
        $('#heat_view').css("width",val+"%");
     }

     function setSoilmoisture(val){
        $('#txtSM').text(val);
        $('#SM_view').css("width",val+"%");
     }


    function getRainFacts(){
        var items = new Array();
        $.getJSON(rainUrl,function(json){
            $.each(json,function(key,val){
                var obj = jQuery.parseJSON(JSON.stringify(val));
                items.push(obj.RG);
            });

            $('#sparkline').sparkline(items, {
                type: 'bar',
                height: '165',
                barWidth: '10',
                barSpacing: '3',
                barColor: '#71b6f9'
            });
        } );
    }

    function updateTable(obj){
        if(lastTime == null || obj.Record_time!=lastTime){
        $('#tblRowdata > tbody > tr:first-child').remove();
        var row ='<tr>'+
                 '<td>'+obj.Record_time+'</td>'+   
                 '<td>'+obj.Ext_temp+'</td>'+ 
                 '<td>'+obj.Humidity+'</td>'+ 
                 '<td>'+obj.Pressure+'</td>'+ 
                 '<td>'+obj.Intensity+'</td>'+ 
                 '<td>'+obj.Win_speed+'</td>'+ 
                 '<td>'+obj.Win_dir+'</td>'+ 
                 '<td>'+obj.Rain_gauge+'</td>'+ 
                 '<td>'+obj.Soil_Moisture+'</td>'+ 
                 '<td>'+obj.Int_temp+'</td>'+ 
                 '</tr>';
        $('#tblRowdata ').append(row);
        lastTime= obj.Record_time;
        }
    }
});

