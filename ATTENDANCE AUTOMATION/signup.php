<?php
$u =false;
$p =false;
$r =false;
$e =false;
$v =false;
$valU =";
$valP =";
$valR =";
$valE =";
$valV =";

$num=";
$result;
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    include'./dbconnect.php';
    $userid = $_POST["userid"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $semsec = $_POST["semsec"];
    if($userid == "" or $password == "" or $_POST["loginas"] == 'select'){
        $v = true;
        // echo"enter an valid value";
        }
    else{
        $e=true;
        }
        $loginas = filter_input(INPUT_POST,'loginas',FILTER_SANITIZE_STRING);
        if($loginas =="stud"){
        {
            $sql ="SELECT*FROM'login_student WHERE'usn' = $userid';";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
        }
        else{} 
        ($login as == "fac")
        {
            $sql = "SELECT*FROM'login_faculty' WHERE'f_id' = $userid';";
            $result=mysqli_query($conn,$sql);
            $sum =mysqli_num_rows($result);
        }
if($num == 1 && $e == true){
    $u = true;
    $valU = trim($_POST['userid']);
    $valP = trim($_POST["password"]);
    $valN = trim($_POST["name"]);
    $valE = trim($_POST["email"]);
    // echo"<h4>Username already exist</h4>";
}
elseif ($cpassword ! == $password)
{
    $p = true;
    $val = trim($_POST['userid']);
    $valP = trim($_POST["password"]);
    $valN = trim($_POST["name"]);
    $valE = trim($_POST["email"]);
    // echo"password does not match";
}
        elseif($password == $cpassword && $e == true)
{
    if($loginas =="stud"){
        $sql2="INSERT INTO 'student'('s_name','usn','ssid') VALUES('$name','$userid','$semsec')";
        $sql1 = "INSERT INTO 'login_student'('usn','s_name','password')VALUES
        ('$userid','$name','$password')";
    $null = 1;
    $result = mysqli_query($conn,$sql2);
    $result = mysqli_query($conn,$sql1);
    mysqli_query($conn,"INSERT INTO'$SEMSEC'('USN','ssid','15CS61T','Total1','15CS62T','Total2','15CS63A','Total3','15CS64P','Total4','15CS65P','Total5',)VALUES('$userid','$semsec','$null','l','$null','l','$null','l','$null','l','$null','l')");
    mysqli_query($conn,"INSERT INTO's_temp$semsec'('USN','SName','AorP')VALUES 
    ($userid','$name','$null')");
    }
    elseif($loginas == "fac"){
        $sql2 = "INSERT INTO'faculty'(f_id','f_name')VALUES ('$userid','$name')";
        $sql1 ="INSERT INTO 'login_faculty'('f_id','f_name','password')VALUES
        ('$userid','$name','$password')";
        $result = mysqli_query($conn,$sql2);
        $result = mysqli_query($conn,$sql1);
    }
    if($result){
        $r true;
$_SESSION["register"]-'Registered succesfully. You can now login';
header("location: login.php"); 
// echo "registered succesfully";
} else {
echo "something went wrong";
}
}
        }
        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SIGN UP</title>
<link rel="stylesheet" href="./css/signup.css" />
</head>
<body>
<div class="full-page">
<div id='login-form' class='login-page'>
<div class="form-box">
<div><img class="signinimg" src="./css/1.png" alt="img" /></div>
<button type='button' class='toggle-btn'>Sign Up</button>
<form id='register' class='input-group-register' 
action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
<div class="selectas">
<h2>register as:</h2>
<select id="select" name="loginas" onchange="return ssid();">
<option id="option" value="select">select</option>
<option id="option" value="stud">STUDENT</option> 
<option id="option" value="fac">FACULTY</option>
    </select>
    </div>
<input type='text' name="name" class="input-field" placeholder="Enter Name"
value="<?php echo $valN; ?> required>
<input type ="text" name="userid" class="input-field"  maxlength="10" placeholder REGISTER_NO / FID
value="<?php echo SvalU; ?>' required>
<div id="ssid" style="visibility:hidden;">
<select id="semsecid" name="semsec">

<option id="option" value="select">select</option> 
<option id="option" value="6a">6a</option>
<option id="option" value="6b">6b</option>
</select>
</div>
<input type="password" name="password" class="input-field" id="input1" maxlength="8"
placeholder="Enter Password" value="<?php echo SvalP; ?>" required> 
<input type='password' name="cpassword" class="input-field" id="input2" maxlength="8"
placeholder Confirm Password' required> 
<div class="lastrow"><input type='checkbox' class  "check-box" onclick="myFunction()"><span>Show
Password</span></div>
<?php
if($v) 
{
echo '<p id="p">Enter valid deatils </p>';
}elseif ($u) {
echo '<p id="p">Username already exists </p>';
 } elseif (Sp) {
    echo '<p id="p">Password does not match </p>';
 }
}
 ?>
<button type='submit' class='submit-btn">Register</button>
        </form>
            </div>
    </div>
    </div>
    <script>    
    function myFunction()
     {
        var x = document.getElementById("input1");
var y = document.getElementById("input2");
        if (x.type ==="password" && y.type="password")
         {
    x.type="text";
    y.type="text";
    } else {
    x.type= ="password";


    y.type = "password";
    }
}
    function ssid() 
    {
    var x = document.getElementById("select");
    var y = document.getElementById("ssid");
    if (x.options[x.selectedIndex].value == "stud")
    y.style.visibility ="visible";
    else if (x.options[x.selectedIndex].value="fac")
        y.style.visibility = "hidden";
    }
    </script>
</body>
</html>
