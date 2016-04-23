<?php include_once 'auth/protect.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $meta_description;?>">
    <meta name="author" content="">

    <title><?php echo $meta_title;?></title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
   	<link href="../assets/css/base.css" rel="stylesheet">
	
		<!-- Font Awesome Icons -->

		<link href="../assets/fonts/css/fa.css" rel="stylesheet">
		<!-- Webfont -->
		<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
		<!-- Animation Effects -->
		<link href="../assets/css/plugins/hover.css" rel="stylesheet" media="all">
		<!-- SweetAlert Plugin -->
		<link href="../assets/css/plugins/sweetalert.css" rel="stylesheet" media="all">
		<!-- Datatables Plugin -->
		<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css" rel="stylesheet" media="all">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 
</head>

<body>
	<!-- Start Top Navigation -->
	<?php include('../assets/comp/top-nav.php');?>
    <!-- Start Main Wrapper --> 
   	<div id="wrapper">
		<!-- Side Wrapper -->
        <div id="side-wrapper">
            <ul class="side-nav">
                <?php include('../assets/comp/side-nav.php');?>
			</ul>
        </div><!-- End Main Navigation --> 
        <div class="container">
 <?php       	
	$uid = filter_input(INPUT_POST, 'm', FILTER_SANITIZE_STRING);
	if($user_level=='1')
	{
			$query = "SELECT * FROM ".$prefix."members WHERE id = " . $uid ." LIMIT 1";
			if ($result = $mysqli->real_escape_string($query))
			{
				if($result = $mysqli->query($query))
				{
					while($row = $result->fetch_array())
					{
						echo $row['surname'];
						echo $row['name'];
					}
					
    			}
		
			}
	}
	?>

        </div>