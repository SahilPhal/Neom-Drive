<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/style.css">
    
    <?php 
// function for login check
function myphp(){
   $con = mysqli_connect("localhost","root","");
   if (!$con)
   {
   ��die('Could not connect: ' . mysqli_connect_error());
   }
   mysqli_select_db($con,"car-rental");
   $result = mysqli_query($con,"SELECT v_email,v_pass from vendor ");
  $arr="";
while($row = mysqli_fetch_array($result))
{
  $arr=$arr.$row['v_email'].$row['v_pass']." ";
}
return $arr;
mysqli_close($con);
}
?>
<script typr="text/javascript">
    // javascript function for login check
        function chkPasswords() { 

  var sec = document.getElementById("em");
  var pas = document.getElementById("second");
  var con=sec.value.concat(pas.value);
  
  var i="<?php echo myphp()?>"
  
  var j=i.split(" ");

  var s=0;
  for(var k=0;k<((j.length)-1);k++)
  {
    if(j[k]==con)
    {
      s=1;
    }
  }
  if(s==0){
    alert("Invalid Login!!Please Check your Details");
  sec.style.backgroundColor="#f2b9c4"
  pas.style.backgroundColor="#f2b9c4"
  sec.focus();
  pas.focus();
  return false;
  }
  if(s==1)
  {
  alert("Login Successful- WELCOME");
  return true;
  }
 

}
    // function to see password 
        function check(){
  var x=document.getElementById("check");
  var y=document.getElementById("second");
  if(x.checked){
    y.type="text";
  }
  else{
    y.type="password";
  }
}
    </script>
</head>
<body>
<header class="header">
        <section class="flex">
    <a href="about.html" class="logo"><img src="./image/NeomDrive.png" class="img-circle" alt="No image found" height="70px"  ></a>
    <div class="page-header">
        <nav class="nav-bar">
            <a href="index.php">Home</a>
            <a href="about.html">About</a>
            <a href="carlisting.php">Car Listing</a>
            <a href="faqs.html">FAQs</a>
            
        </nav>
    </div>
     </section>

    </header>

    <div class="container" >
        <!-- login credentials form  -->
        <div width="200" height="700">
            <h2>Vendor Login</h2>
            <form id = "myForm" action="admin.php" method="post" >
              <div class="form-group">
              
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="em" placeholder="Enter email" name="email" required autocomplete="off">
                

              </div>
              <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="second" placeholder="Enter password" name="pwd" required>
              
              </div>
              <div class="checkbox">
                <label><input type="checkbox" id="check"> Show Password</label>
              </div>
              <button type="submit" class="btn btn-success">Login</button>
              
            </form>
          </div>



          <script>
          document.getElementById("myForm").onsubmit = chkPasswords;
          document.getElementById("check").onclick=check;
          </script>
</body>
</html>