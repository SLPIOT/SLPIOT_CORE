<!DOCTYPE html>
<html>
<?php $code_url ='../'?>
<head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="<?php echo $code_url;?>assets/images/favicon.ico">

        <title>SLPIOT</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="<?php echo $code_url;?>assets/plugins/morris/morris.css">

        <!-- App css -->

        <link href="<?php echo $code_url;?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $code_url;?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" type="text/css"/>
        <link href="<?php echo $code_url;?>assets/css/core.css" rel="stylesheet" type="text/css" type="text/css"/>
        <link href="<?php echo $code_url;?>assets/css/components.css" rel="stylesheet" type="text/css" type="text/css" />
        <link href="<?php echo $code_url;?>assets/css/icons.css" rel="stylesheet" type="text/css" type="text/css"/>
        <link href="<?php echo $code_url;?>assets/css/pages.css" rel="stylesheet" type="text/css" type="text/css"/>
        <link href="<?php echo $code_url;?>assets/css/menu.css" rel="stylesheet" type="text/css" type="text/css"/>
        <link href="<?php echo $code_url;?>assets/css/responsive.css" rel="stylesheet" type="text/css" type="text/css"/>
        
       
        <!-- Circlifull chart css -->
        <link href="<?php echo $code_url;?>assets/plugins/jquery-circliful/css/jquery.circliful.css" rel="stylesheet" type="text/css"/>


        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo $code_url;?>assets/js/modernizr.min.js"></script>

        <?php
           if(isset($links))
           {
               foreach($links as $link)
               {
                   echo '<link href="'.$code_url.$link.'" rel="stylesheet" type="text/css" />';
               }
           }
        ?>
           
</head>