<div class="content-page">
                <!-- Start content -->
        <div class="content">
        <div class="container">

                <!-- first Row -->
                <div class="row">

                        <div class="col-lg-3 col-md-6">
                                <div class="card-box">
                                

                                        <h4 class="header-title m-t-0 m-b-30">External Temperature</h4>

                                        <div class="widget-chart-1">
                                                <div class="widget-chart-box-1">
                                                        <input class='temp_view' type='text' data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                                                        data-bgColor="#F9B9B9" value="27"
                                                        data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                        data-thickness=".15"/>
                                                </div>

                                                <div class="widget-detail-1">
                                                        <h2 class="p-t-10 m-b-0" id="txtexttemp"> 27 </h2>
                                                        <p class="text-muted">&#8451;</p>
                                                </div>
                                        </div>
                                </div>
                        </div><!-- end col -->

                        <div class="col-lg-3 col-md-6">
                                <div class="card-box">
                                
                                        <h4 class="header-title m-t-0 m-b-30">Humidity</h4>

                                        <div class="widget-chart-1">
                                                        <div class="widget-chart-box-1">
                                                                <input class='humidity_view' type='text' data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                                                                data-bgColor="#FFE6BA" value="80"
                                                                data-skin="tron" data-angleOffset="180" data-readOnly=true
                                                                data-thickness=".15"/>
                                                        </div>
                                                        <div class="widget-detail-1">
                                                                <h2 class="p-t-10 m-b-0" id="txtextHumidity"></h2>
                                                                <p class="text-muted">%</p>
                                                        </div>
                                        </div>
                                </div>
                        </div><!-- end col -->

                        <div class="col-lg-3 col-md-6">
                                <div class="card-box">
                                

                                <h4 class="header-title m-t-0 m-b-30">Heat Factor</h4>

                                        <div class="widget-box-2">
                                                <div class="widget-detail-2">
                                                        <span class="badge badge-success pull-left m-t-20" id="txthfIncreese">0<i class="zmdi zmdi-trending-up"></i> </span>
                                                        <h2 class="m-b-0" id="txtHeatFactor"> 38 </h2>
                                                        <p class="text-muted m-b-25">&#8451;</p>
                                                </div>
                                                <div class="progress progress-bar-success-alt progress-sm m-b-0">
                                                        <div class="progress-bar progress-bar-success" role="progressbar" id="heat_view"
                                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                                        style="width: 38%;">
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div><!-- end col -->

                        

                        <div class="col-lg-3 col-md-6">
                                <div class="card-box">
                                
                                <h4 class="header-title m-t-0 m-b-30">Soil_Moisture</h4>

                                <div class="widget-box-2">
                                <div class="widget-detail-2">
                                        <h2 class="m-b-0" id="txtSM"> 0 </h2>
                                        <p class="text-muted m-b-25">%</p>
                                </div>
                                <div class="progress progress-bar-pink-alt progress-sm m-b-0">
                                        <div class="progress-bar progress-bar-pink" role="progressbar"
                                        aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 77%;"id="SM_view">
                                        </div>
                                </div>
                                </div>
                                </div>
                        </div><!-- end col -->

                </div>
                <!-- end first row -->

                <!-- second row -->
                <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 class="text-custom"  data-plugin="counterup" id="txtPressure"></h2>
                                        <h5>Pressure </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <h2 class="text-pink" data-plugin="counterup" id="txtIntensity"></h2>
                                        <h5>Light Intensity </h5>
                                    </div>
                                </div>
                            </div>

                            
                </div>
                 <!-- end 2nd row -->

                 <!-- Third row -->
                 <div class="row">
                        <div class="col-lg-4 col-md-6">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <input class="view_ws" data-plugin="knob" data-width="150" data-height="150"
                                                       data-displayPrevious=true data-fgColor="#ff5b5b" data-bgColor="#435966" data-skin="tron"
                                                       data-cursor=true value="1.5" data-thickness=".2" data-angleOffset=-125
                                                       data-angleArc=250 data-readOnly=true />
                                        <h5 class="font-600 text-muted">Wind Speed (mps)</h5>
                                    </div>
                                </div>
                        </div> 

                        <div class="col-lg-4 col-md-6">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                         <input class="view_wd" type="text" data-plugin="knob" data-width="150" data-height="150" data-cursor=true
                                                data-fgColor="#10c469" data-bgColor="#435966" data-readOnly=true value="0" data-min="0" data-max="359"/>
                                        <h5 class="font-600 text-muted">Wind Direction</h5>
                                    </div>
                                </div>
                        </div>
                        
                        <div class="col-lg-4 col-md-6">
                                <div class="card-box widget-user">
                                    <div class="text-center">
                                        <div id="sparkline" class="text-center"></div>
                                        <h5 class="font-600 text-muted">Rain guage</h5>
                                    </div>
                                </div>
                        </div> 
                                       
                </div>
                <!-- end third row -->

                <!-- fourth row -->
                <div class="row">
                        <div class="col-lg-12 ">
                                <div class="card-box widget-user">
                                    <div class="text-center">

                                        <h4 class="header-title m-t-0 m-b-30"> Raw Data</h4>
                                        <div class="table-responsive">
                                        <table id='tblRowdata' class="table m-0">
                                            <thead>
                                                <tr>
                                                    <th>Time</th>
                                                    <th>Temperature</th>
                                                    <th>Humidity</th>
                                                    <th>Pressure</th>
                                                    <th>Light Intensity</th>
                                                    <th>Wind Speed </th>
                                                    <th>Wind Direction</th>
                                                    <th>Rain Guage</th>
                                                    <th>Soil Moisture</th>
                                                    <th>Heat</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($station_data as $data){?>
                                                    <tr>
                                                        <td><?php echo $data->Record_time;?></td>
                                                        <td><?php echo $data->Ext_temp;?></td>
                                                        <td><?php echo $data->Humidity;?></td>
                                                        <td><?php echo $data->Pressure;?></td>
                                                        <td><?php echo $data->Intensity;?></td>
                                                        <td><?php echo $data->Win_speed;?></td>
                                                        <td><?php echo $data->Win_dir;?></td>
                                                        <td><?php echo $data->Rain_gauge;?></td>
                                                        <td><?php echo $data->Soil_Moisture;?></td>
                                                        <td><?php echo $data->Int_temp;?></td>
                                                        
                                                    </tr>    
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                        </div> 
        
                </div>   

                <!-- end of fourth row -->
        </div>
       
        </div> <!-- content -->
</div>

<script>
        var apiUrl = '<?php echo base_url().'api/getInformationOnUpdate/'.$stationID;?>';
        var rainUrl = '<?php echo base_url().'api/getRainInformationOnUpdate/'.$stationID;?>';
</script>
