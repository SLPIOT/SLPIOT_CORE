
        <div>
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <form class="form-horizontal" role="form" id="frmStation" method="post" action="addStation">
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
                                        </ul>
                                    </div>
                                    <!-- end of Action bar-->

                                    <!--  header - genaral delaits-->
                        			<h4 class="header-title m-t-0 m-b-30">Genaral Details</h4>
                                    <!-- end of header-->

                                    <!-- Genaral Details -->

                                    <div class="row">
                        				<div class="col-md-8">

                                                <div class="form-group">
	                                                <label class="col-md-3 control-label">Station Code</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" id="txtStationCode" name="txtStationCode" class="form-control" readonly="" value="">
	                                                </div>
	                                            </div>

                                                
                                                <div class="form-group">
	                                                <label class="col-md-3 control-label">Station Name</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" ID="txtStationName" Name="txtStationName" class="form-control" value="">
	                                                </div>
	                                            </div>

                                                <div class="form-group">
	                                                <label class="col-md-3 control-label">Location</label>
	                                                <div class="col-md-8">
	                                                    <input type="text" ID="txtLocation" name="txtLocation" class="form-control" value="">
	                                                </div>
	                                            </div>
                                                    
                                                <div class="form-group">
	                                                <label class="col-md-3 control-label">Coordinates</label>
                                                    <div class="col-md-8">
                                                        <input type="text" id="txtCoordinatesLat" name="txtCoordinates" class="form-control" placeholder="Latitude">
                                                        <br>
                                                        <input type="text" id="txtCoordinatesLng" name="txtCoordinates" class="form-control" placeholder="Longitude">
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
	                                        <input type="text" id="txtOwnerName" name="txtOwnerName" class="form-control" >
	                                    </div>
	                                </div>

                                    <div class="form-group">
	                                    <label class="col-md-3 control-label">Address</label>
	                                    <div class="col-md-5">
	                                        <input type="text" id="txtAddress" name="txtAddress" class="form-control" >
	                                    </div>
	                                </div>

                                    <div class="form-group">
	                                    <label class="col-md-3 control-label">Email</label>
	                                    <div class="col-md-5">
	                                        <input type="email" id="txtemail" name="txtemail" class="form-control" >
	                                    </div>
	                                </div>

                                    <div class="form-group ">
	                                    <label class="col-md-3 control-label">Mobile</label>
	                                    <div class="col-md-5">
	                                        <input type="text" id="txtMobile" name="txtMobile" placeholder="" data-mask="(999) 999-9999" class="form-control">
											<span class="font-13 text-muted">(999) 999-9999</span>
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
                                                <button type="button" align="right" class="btn btn-success btn-bordred waves-effect w-md waves-light m-b-5" id="cmdSave" onClick="insertData();">Save</button>
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
        