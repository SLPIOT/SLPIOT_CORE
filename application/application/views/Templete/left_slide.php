            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                
                <div class="text-center">
                    <a href="Dashboard" class="logo" style="width:60px"><span>SLPIOT</span><i class="zmdi zmdi-layers"></i></a>
                </div>
                    
                    <div class="user-box">
                        <h3 ><?php echo $_SESSION['username'];?></h3>
                        <ul class="list-inline">
                        
                            <li>
                                <a href=<?php echo base_url().'Login/signout'?> class="text-custom">
                                    <i class="zmdi zmdi-power"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <ul>
                        	<li class="text-muted menu-title"> SLPIOT </li>

                            <li>
                                <a href="<?php echo base_url();?>" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect active"><i class="zmdi zmdi-collection-text"></i><span> Station Details </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url().'WhetherStation/viewStation';?>">View Station</a></li>
                                    <li><a href="<?php echo base_url().'WhetherStation/newStation';?>">New Station</a></li>
                                </ul>
                            </li>
                          

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>

            </div>
            <!-- Left Sidebar End -->

            <?php
            
            function getAuthorization($access_level){
                return true;
            }
            
            ?>

