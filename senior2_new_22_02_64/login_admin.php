<?php require_once('Connections/condb.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['admin_user'])) {
  $loginUsername=$_POST['admin_user'];
  $password=$_POST['admin_pass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "backend/index.php";
  $MM_redirectLoginFailed = "login_admin.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_condb, $condb);
  
  $LoginRS__query=sprintf("SELECT admin_user, admin_pass FROM tbl_admin WHERE admin_user=%s AND admin_pass=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $condb) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <title>Register Page</title>
        <link rel = "icon" href ="logo.jpg"  type = "image/x-icon">
        <link rel="stylesheet" href="style.css">
        <link rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <style>
            body{
                background-image: linear-gradient(to right,#028A0E,#3DED98);
                margin-top:90px !important;
                font-family: sans-serif;
            }
            .register-left{
                text-align: center;
                color: #fff;
                padding: 30px;
            }
            .register-left img{
                margin-top:60px;
                margin-bottom: 18px;
                width: 200px;
                animation: mover 1s infinite alternate;
            }
            .register-left p{
                padding :20px 20px 0;
            }
            .register-left .btn-primary{
                border-radius: 1.5rem;
                border:none;
                width: 102px;
                background: #f8f8f8;
                font-weight: 600;
                color: #555;
                margin-top:20px;
                padding: 10px;
            }
            .register-left .btn-primary:hover{
                background: #000;
            }
            
           
            @keyframes mover{
                0%{transform: translateY(0);}
                100%{transform: translateY(-20px);}

            }
          
        .from-box{
          width: 450px;
          height: 450px;
          position: relative;
          margin: 6% auto;
          background: #fff;
          padding: 5px;
          overflow: hidden;
          border-top-right-radius: 400px 70px;
          border-bottom-left-radius: 400px 70px;
        }
        .button-box{
          width: 270px;
          margin: auto;
          margin-top: 50px;
          position: relative;
          box-shadow: 0 0 20px 9px #fdd7fd;
          border-radius: 30px;
          text-align: center;
        }
      
        .toggle-btn{
          padding: 10px 30px;
          cursor: pointer;
          background: transparent;
          border: 0;
          outline: none;
          position: relative;
        }
        #btn{
          top: 0;
          left: 0;
          position: absolute;
          width: 100%;
          height: 100%;
          background: linear-gradient(to right,#ff105f,#ffad06);
          border-radius: 30px;
          cursor: pointer;
          border: 0;
          display: block;
          outline: none;
          
          
        }
        .social-icon{
          margin: 30px auto;
          text-align: center;
          
        }
        .social-icon img{
          width: 50px;
          margin: 0 12px;
          box-shadow: 0 0 20px 0 #7f7f77;
          cursor: pointer;
          border-radius: 50%;
        }
       .input-group{
         
          top:120px;
          position: absolute;
          width: 280px;
          transition: .5s;
          margin-left: 30px;
        }
        .input-field{
          width: 100%;
          padding: 10px 0;
          margin: 5px 0;
          border-left: 0;
          border-top: 0;
          border-right: 0;
          border-bottom: 1px solid #999;
          outline: none;
          background: transparent;
        }
        .submit-btn{
          width: 85%;
          padding: 10px 30px;
          cursor: pointer;
          display: block;
          margin: auto;
          background: linear-gradient(to right,#ff105f,#ffad06);
          border: 0;
          outline: none;
          border-radius:30px;
        }
      .check-box{
          margin: 30px 10px 30px 0;
        }
       span{
          color:#777;
          font-size: 10px;
          bottom: 5px;
          margin-top: 30px;
       }
         #login{
          left: 50px;
        }
        #Register{
          left: 450px;
        }

        </style>
      <body>
    <form ACTION="<?php echo $loginFormAction; ?>"  name="formlogin" method="POST" id="login" class="form-horizontal">
        <div class ="container">
            <div class="row">
                <div class ="col-md-10 offset=md-1">
                    <div class =" row">
                        <div class="col-md-5 register-left">
                        <img src="logoemee.png"  > 
                        <h3>Login Admin</h3>
                        <p>สำหรับ<b>ADMIN</b>เท่านั้น</p>
                        
                   
                </div>
              <div class="col-md-7 register-right">

                            <div class="from-box">
                              <div class="button-box">
                                <div id="btn"></div>
                                <h4 class="toggle-btn">เข้าสู่ระบบ</h4>
                              </div>
                              <div id= "login" class="input-group">
                              <form action="login.php" method="post">
                                <input  name="admin_user" type="text" required class="input-field" id="admin_user" placeholder="Username" />
                                <input name="admin_pass" type="password" required class="input-field" id="admin_pass" placeholder="Password" />
                                <input type="checkbox" class="check-box" ><span>Remember Password</span>
                                
                                <button type="submit" class="submit-btn" >
                                  <span class="glyphicon glyphicon-log-in"> </span>
                                    Login 
                                </button>
                              </form>
                              </div>
                             </div>
                  </div>
            </div>
        </div>
    </div>
</div>
       
           
    </body>
</html>
