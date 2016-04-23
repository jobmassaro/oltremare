
<?php 
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
if($user_level!='1'){include('data/visitor-stats-log.php');}
//SITE SETTINGS

?>
<!DOCTYPE html>
<html lang="it">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../../../assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../../assets/js/bootstrap.min.js"></script>
</head>
 
<body>
	<?php include('../../assets/comp/top-nav.php');?>
<div class="container">
    
                    <div class="row">
                    <div class="row">
                        <h3>Update a User</h3>
                    </div>
            
<form method="POST" action="update.php?id=<?php echo $id?>">
    <div class="form-group <?php echo !empty($fnameError)?'has-error':'';?>">
        <label for="inputFName">First Name</label>
        <input type="text" class="form-control" required="required" id="inputFName" value="<?php echo !empty($fname)?$fname:'';?>" name="fname" placeholder="First Name">
        <span class="help-block"><?php echo $fnameError?$fnameError:'';?></span>
    </div>
    <div class="form-group <?php echo !empty($lnameError)?'has-error':'';?>">
        <label for="inputLName">Last Name</label>
        <input type="text" class="form-control" required="required" id="inputLName" value="<?php echo !empty($lname)?$lname:'';?>" name="lname" placeholder="Last Name">
        <span class="help-block"><?php echo $lnameError?$lnameError:'';?></span>
    </div>
    <div class="form-group <?php echo !empty($ageError)?'has-error':'';?>">
        <label for="inputAge">Age</label>
        <input type="number" required="required" class="form-control" id="inputAge" value="<?php echo !empty($age)?$age:'';?>" name="age" placeholder="Age">
        <span class="help-block"><?php echo $ageError?$ageError:'';?></span>
    </div>
    <div class="form-group <?php echo !empty($genderError)?'has-error':'';?>">
        <label for="inputGender">Gender</label>
        <select class="form-control" required="required" id="inputGender" name="gender" >
        <option></option>
        <option value="male" <?php echo $gender == 'male'?'selected':'';?>>Male</option>
        <option value="female" <?php echo $gender == 'female'?'selected':'';?>>Female</option>
        </select>
    <span class="help-block"><?php echo $genderError?$genderError:'';?></span>
        
    </div>
    
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn btn-default" href="http://localhost/oltremare/manager-users.php#tabs-4">Back</a>
    </div>
</form>
                
    </div> <!-- /row -->
    </div> <!-- /container -->
</body>
</html>