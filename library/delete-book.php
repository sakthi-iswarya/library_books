<?php
session_start();
include'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['aid']==0)) {
  header('location:logout.php');
  } else{

// for deleting user
if(isset($_GET['rid']))
{
$adminid=$_GET['rid'];
$msg=mysqli_query($con,"delete from rent_book where rid='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Books</title>
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
            <a href="dashboard.php" class="logo"><b>Delete Rent Books</b></a>
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
          	<h3><i class="fa fa-angle-right"></i> Deleted Rented Books</h3>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Books </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Sno.</th>
                                  <th class="hidden-phone"> Book Name</th>
                                  <th> User Name</th>
                                  <th> Issue Date</th>
                                  <th> Return Date</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from rent_book");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                    <td><?php echo $row['bid'];?></td>                                
                                    <td><?php echo $row['uid'];?></td> 
                                    <td><?php echo $row['rent_date'];?></td>
                                    <td><?php echo $row['return_date'];?></td>

                                    <td>
                                    <a href="update-book.php?uid=<?php echo $row['rid'];?>"> 
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    <a href="delete-book.php?rid=<?php echo $row['rid'];?>"> 
                                    <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="fa fa-trash-o "></i></button></a>
                                    </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section
  ></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>