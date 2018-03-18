            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                    
                    
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
                                <a href="" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                            </li>

                            <li class="has_sub">
                                 <a href="javascript:void(0);" class="waves-effect active"><i class="zmdi zmdi-collection-text"></i><span class="label label-warning pull-right">2</span><span> Station Details </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="WhetherStation/newStation">Add Station</a></li>
                                    <li><a href="WhetherStation/viewStation">View Station</a></li>
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

