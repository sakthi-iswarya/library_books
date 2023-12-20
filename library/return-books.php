<?php
session_start();
error_reporting(0);
include'dbconnection.php';
//Checking session is valid or not
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

if(isset($_POST['Submit']))
{

    $rid=$_POST['rid'];
    
    $status=$_POST['status'];
    if($status=="Yes"){
        $status="Returned";
    }
    else{
        $status="Not Returned";
    }
    $rent_date=$_POST['rent_date'];
    $return_date=$_POST['return_date'];
    $msg=mysqli_query($con,"insert into return_book(rid,status,rent_date,return_date) 
          values('$rid','$status','$rent_date','$return_date')");       

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Books </title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>
    <section id="container" >
        <header class="header black-bg"  style="background-color:black;">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <a href="dashboard.php" class="logo"><b>Rent Books</b></a>
            <div class="nav notify-row" id="top_menu"> </ul></div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </header>
        <aside>
          <div id="sidebar"  class="nav-collapse " style="background-color:#212121; color:white;">
             <ul class="sidebar-menu" id="nav-accordion">       
                 
                  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>       
                  <li class="mt"><a href="dashboard.php"><span>Dashboard</span></a></li>
                  <li class="mt"><a href="add-books.php"> <span>Add books </span></a> </li>
                  <li class="mt"><a href="add-users.php"> <span>Add Users </span></a> </li>
                  <li class="mt"><a href="rent-books.php"><span>Rent Book </span></a> </li>
                  <li class="mt"><a href="return-books.php"><span>Returning Book </span></a> </li>
                  <li class="mt"><a href="return-books-report.php"> <span>Returning Books report</span></a> </li>
                  <li class="mt"><a href="change-password.php"><span>Change Password</span></a></li>
                  <li class="sub-menu"><a href="manage-users.php" ><span>Manage Users</span></a></li>
              
              </ul>   
               
          </div>
      </aside>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Return Book </h3>
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="content-panel">
                            <form class="form-horizontal style-form" name="form1" method="post" enctype="multipart/form-data" action="" onSubmit="return valid();">
                            <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                            
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Book Name</label>
                                <div class="col-sm-10">

                                <select name='rid' style="padding:7px;">  
                                    <option value="<?php echo $row_list['rid'];?>">Book name</option> 
                                    <?php  
                                        $list=mysqli_query($con,"select * from rent_book");  
                                    while($row_list=mysqli_fetch_assoc($list)){  
                                        ?>  
                                            <option value="<?php echo $row_list['rid']; ?>"> 
                                             <?php echo $row_list['bid'];?>  
                                            </option>  
                                        <?php  
                                        }  
                                        ?>
                                      
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Status</label>
                                <div class="col-sm-10">

                                <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="Yes" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Returned
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" value="No" id="flexRadioDefault2">
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Not Returned
                                        </label>
                                    </div>

                                    </select>
                                        
                                </div>
                            </div>

                            

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Issue Date</label>
                                <div class="col-sm-10">
                                    

                                <select name='rent_date' style="padding:7px;">  
                                    <option value="<?php echo $row_list['rent_date'];?>">Issue Date</option> 
                                    <?php  
                                        $list=mysqli_query($con,"select * from rent_book");  
                                    while($row_list=mysqli_fetch_assoc($list)){  
                                        ?>  
                                            <option value="<?php echo $row_list['rent_date']; ?>"> 
                                             <?php echo $row_list['rent_date'];?>  
                                            </option>  
                                        <?php  
                                        }  
                                        ?>
                                      
                                    </select>


                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Return Date</label>
                                <div class="col-sm-10">
                                    
                                <select name='return_date' style="padding:7px;">  
                                    <option value="<?php echo $row_list['return_date'];?>">Returning Date</option> 
                                    <?php  
                                        $list=mysqli_query($con,"select * from rent_book");  
                                    while($row_list=mysqli_fetch_assoc($list)){  
                                        ?>  
                                            <option value="<?php echo $row_list['return_date']; ?>"> 
                                             <?php echo $row_list['return_date'];?>  
                                            </option>  
                                        <?php  
                                        }  
                                        ?>
                                      
                                    </select>
                                        
                                </div>
                            </div>

                            <div style="margin-left:100px; padding-bottom:20px;" >
                                <input type="submit" name="Submit" value="Return Book" class="btn btn-theme" style="color:white;
                                background-color:black">
                            </div>
                        
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  

  </body>
</html>
<?php } ?>