            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                    
                    <div class="row">
                        <div class="card-box col-lg-4">
                                <select class="form-control select2" id="station_list">
                                        <option value=<?php echo base_url() . 'Dashboard'; ?>>Select</option>
                                        <?php
                                        foreach ($stations as $station) {
                                            echo '<option value="' . base_url() . 'api/Station/' . $station->stationid . '">' . $station->name . '</option>';
                                        }
                                        ?>            
                                </select>
                        </div>
                    </div>
                        

                    <div class="row">
							<div class="card-box">
                        		<h4 class="header-title m-t-0 m-b-30">Station Map</h4>
                                <div id="googleMap" style="height:600px"></div>
							</div>
                    </div>
                    
                </div> <!-- content -->

            </div>


