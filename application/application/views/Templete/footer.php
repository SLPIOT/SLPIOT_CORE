</div>
<?php $js_loader="../../"?>
<script>
        var resizefunc = [];
    </script>
    <script src="<?php echo $js_loader; ?>assets/js/modernizr.min.js"></script>
    <!-- jQuery  -->
    <script src="<?php echo $js_loader; ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo $js_loader; ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $js_loader; ?>assets/js/detect.js"></script>
    <script src="<?php echo $js_loader; ?>assets/js/fastclick.js"></script>
    <script src="<?php echo $js_loader; ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo $js_loader; ?>assets/js/jquery.blockUI.js"></script>
    <script src="<?php echo $js_loader; ?>assets/js/waves.js"></script>
    <script src="<?php echo $js_loader; ?>assets/js/jquery.nicescroll.js"></script>
    <script src="<?php echo $js_loader; ?>assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="<?php echo $js_loader; ?>assets/js/jquery.core.js"></script>
    <script src="<?php echo $js_loader; ?>assets/js/jquery.app.js"></script>
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyB81S2I2JznbU717prr8TUEHrY_lm2LOQ4'></script>
    
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

    <?php
           if(isset($scripts))
           {
               foreach($scripts as $script)
               {
                   echo '<script src="'.$js_loader.$script.'"></script>';
               }
           }
    ?>
            

       
        
    </body>


</html>