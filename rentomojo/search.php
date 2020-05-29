<?php

$db=new mysqli('localhost','root','');

if(isset($_POST['save']))
{
    $name=trim($_POST['name']);
    $phno=trim($_POST['phno']);
    $email=trim($_POST['email']);
	$dob=trim($_POST['dob']);
    
    //if data supplied are not empty
    if(!$name=='' || !$phno=='')
    {
        //if this is the first time
        //and database is not craeted
        if(!$db->select_db('one'))
            //create the database
            $db->query('create database one');
        
        //select the databasw to work with
        $db->select_db('one');
            
        //if table is not craeted, craete it
        if(!$db->query('select * from phno'))
            $db->query('create table phno(id int auto_increment primary key, name varchar(50), phnum varchar(20),email varchar(50),dob varchar(15))');
        
        //ready to insert data
         $db->query("insert into phno (name, phnum,email,dob) values ('$name', '$phno','$email','$dob')");
     }
}
//show the form
?>
<html>
<head>
<title>My Phone Book</title>
</head>
<style>

.login-page {
  width: 360px;
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
  <input type="text" id="search" name="search" placeholder="Search..">
<input name="searchb" type="submit" id="searchb" value="Search">
 </div>


</form>
<p></p>

<h2 style="background: #000; color: #fff;">Previously Stored</h2>
<p>ORDER BY: <a href="?order=new">newest first </a>| <a href="?order=old">oldest 
  first</a> | <a href="?order=az">a-z</a> | <a href="?order=za">z-a</a></p>
 
</body>
</html>
<?php


//create the SQL query as per the action
//if any ordering is selected
$order=(isset($_GET['id'])? $_GET['order']: '');
if($order=='new')
    $query="select * from phno order by id desc";
elseif($order=='old')
    $query="select * from phno order by id asc";
elseif($order=='az')
    $query="select * from phno order by name asc";
elseif($order=='za')
    $query="select * from phno order by name desc";
//or if user is searching
elseif(isset($_GET['searchb']))
    {
        $search=$_GET['search'];
        $query="select * from phno where name like '$search%' OR email like '$search%'";
    }
else
    //use the default query
    $query="select * from phno";
    
//if database does not exits
//first time operation
if(!$db->select_db('one'))
{
    echo "<p><i>NONE</i></p>";
    exit;
}
//else
//do the query
$result=$db->query($query);
//find number of rows
$num_rows=$result->num_rows;
//if no rows present probably when
//searching
if($num_rows<=0)
    echo "<p><i>No Match Found!</i></p>";
//process all the rows one-by-one
for($i=0;$i<$num_rows;$i++)
{
    //fetch one row
    $row=$result->fetch_row();
    //print the values
     echo "<p><span style=\"font-size: 100%; color: red;\">$row[1]: </span> $row[2] : $row[3] : $row[4]</p>";
}
//close MySQL connection
$db->close();
?>
    <button onclick="window.location.href='ph.php';" >Save Sontact</button>
 

 </div>
</div>