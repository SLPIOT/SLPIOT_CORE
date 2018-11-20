
        <div>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <form class="form-horizontal" role="form" id="frmStation" name="frmStation">
                <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <div class="row">
                        	<div class="col-sm-12">
                        		<div class="card-box">

                                    <!-- Action bar on the right  -->
                                    <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="<?php base_url();?>newStation">New</a></li>
                                            <li><a onClick='DelData()'>Delete</a></li>
                                        </ul>
                                    </div>
                                    <!-- end of Action bar-->

                                    <!--  header - genaral delaits-->
                        			<h4 class="header-title m-t-0 m-b-30">Genaral Details</h4>
                                    <!-- end of header-->

                                    <!-- Genaral Details -->

                                    <div class="row">
                        				<div class="col-md-9">

                                                <div class="form-group">
	                                                <label class="col-md-3 control-label">Sation Code</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" id="txtStationCode" name="txtStationCode" class="form-control" readonly="" value=<?php echo $station[0]->stationID?>>
	                                                </div>
	                                            </div>

                                                
                                                <div class="form-group">
	                                                <label class="col-md-3 control-label">Sation Name</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" ID="txtStationName" Name="txtStationName" class="form-control" value=<?php echo $station[0]->name;?>>
	                                                </div>
	                                            </div>

                                                <div class="form-group">
	                                                <label class="col-md-3 control-label">Location</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" ID="txtLocation" name="txtLocation" class="form-control" value=<?php echo $station[0]->location;?>>
	                                                </div>
	                                            </div> 
                                                <div class="form-group">
	                                                <label class="col-md-3 control-label">Coordinates</label>
                                                    <div class="col-md-8">
                                                    <input type="text" id="txtCoordinates" name="txtCoordinates" class="form-control" placeholder="7��17&apos;26057&quot;N 80��38&apos;1-414&quot;E" value=<?php echo $station[0]->coordinates;?>>
                                                   </div>  
                                                    
	                                            </div>
                                           
                                         </div>       
                        			</div><!-- end row -->

               
                        		</div>
                        	</div><!-- end col -->
                        </div>
                        <!-- end row Genaral-->

                        <!-- ownner details-->
                        <div class="row">
                        	<div class="col-sm-12">
                            <div class="card-box">
                                <h4 class="header-title m-t-0 m-b-30">Owner Details</h4>

                               
                                    <div class="form-group">
	                                    <label class="col-md-3 control-label">Owner Name</label>
	                                    <div class="col-md-5">
	                                        <input type="text" id="txtOwnerName" name="txtOwnerName" class="form-control" value=<?php echo $station[0]->owner_name;?> >
	                                    </div>
	                                </div>

                                    <div class="form-group">
	                                    <label class="col-md-3 control-label">Address</label>
	                                    <div class="col-md-5">
	                                        <input type="text" id="txtAddress" name="txtAddress" class="form-control" value=<?php echo $station[0]->owner_address;?>>
	                                    </div>
	                                </div>

                                    <div class="form-group">
	                                    <label class="col-md-3 control-label">Email</label>
	                                    <div class="col-md-5">
	                                        <input type="email" id="txtemail" name="txtemail" class="form-control" value=<?php echo $station[0]->owner_email;?>>
	                                    </div>
	                                </div>

                                    <div class="form-group ">
	                                    <label class="col-md-3 control-label">Mobile</label>
	                                    <div class="col-md-5">
	                                        <input type="text" id="txtMobile" name="txtMobile" placeholder="" data-mask="(999) 999-9999" class="form-control" >
											<span class="font-13 text-muted"><?php echo trim($station[0]->owner_mobile," ");?></span>
                                            
	                                    </div>
	                                </div>
                               
                            </div>
                            </div>
                        </div>    

                       

                        <!-- button panel-->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                     
                                        <div class="form-group">
                                            <div class="col-md-3"></div>
                                            <div class="col-sm-3">
                                                <button type="button" align="right" class="btn btn-success btn-bordred waves-effect w-md waves-light m-b-5" id="cmdSave" onClick="UpdateData();">Save</button>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div><!-- end col -->
                        </div>

                    </div>
                </div>
                </div>
            </form>

            <!-- /Right-bar -->
        </div>
        <!-- END wrapper -->
    

        <?php
            $coor = $station[0]->coordinates;
            $coor = json_decode($coor);
           
        ?>
        

