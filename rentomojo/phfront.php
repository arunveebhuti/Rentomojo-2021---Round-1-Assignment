
<?php
$connect = mysqli_connect("localhost", "root", "","one");
$record_per_page = 4;
$page = '';
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
if(isset($_GET["page"]))
{
 $page = $_GET["page"];
}
else
{
 $page = 1;
}

$start_from = ($page-1)*$record_per_page;

$query = "select * from phno LIMIT $start_from, $record_per_page";
$result = mysqli_query($connect, $query);

?>

<html>
<head>
<title>My Phone Book</title>
</head>
<style>

.login-page {
  width: 888px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>
<body>
<div class="login-page">
  <div class="form">

<form name="form2" method="get" action="">
<div class="topnav">
  <h2>My Phone Book</h2>
  </div>  
</form>
<div class="table-responsive">
    <table class="table table-bordered">
     <tr>
      <td>Name</td>
      <td>Phone</td>
     </tr>
	
     <?php
     while($row = mysqli_fetch_array($result))
     {
     ?>
     <tr>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $row["phnum"]; ?></td>
	  
     </tr>
     <?php
     }
     ?>
    </table>
    <div align="center">
    <br />
    <?php
    $page_query = "SELECT * phno ORDER BY name DESC";
    if ($page_result = mysqli_query($connect, $page_query)){
		
		
		
    $total_records = mysqli_num_rows($page_result);
	}
    $total_pages = ceil($record_per_page);
    $start_loop = $page;
    $difference = $total_pages - $page;
    if($difference <= 5)
    {
     $start_loop = $total_pages - 5;
    }
    $end_loop = $start_loop + 4;
    if($page > 1)
    {
     echo "<a href='phfront.php?page=1'>First </a>";
     echo "<a href='phfront.php?page=".($page - 1). "'> <<  </a>";
    }
    for($i=$start_loop; $i<=$end_loop; $i++)
    {     
     echo "<a href='phfront.php?page=".$i."'>"  .$i.  "</a>";
    }
    if($page <= $end_loop)
    {
     echo "<a href='phfront.php?page=".($page + 1)."'   >>></a>";
     echo "<a href='phfront.php?page=".$total_pages."'> Last </a>";
    }
    
    
    ?>
	<p>
	</p>
	<p>
	</p>
    <button onclick="window.location.href='ph.php';" >Save Contact</button>
 <p>
 </p>
 <button onclick="window.location.href='search.php';" >search contact</button>

</body>
</html>


 </div>
</div>