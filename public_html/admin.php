<link rel="stylesheet" href="asset/admin.css">

<?php
include 'config.php';   //import de la db
include 'header.php';   //import de header

if(isset($_POST['but_submit'])){

    $uname = mysqli_real_escape_string($con,$_POST['txt_uname']);
    $password = mysqli_real_escape_string($con,$_POST['txt_pwd']);

    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser from users where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];

        if($count > 0){
            $_SESSION['uname'] = $uname;
            header('Location: home.php');
        }else{
            echo "<h2>Invalid Password</h2>";
        }

    }

}
?>


<!-- Marche pas cherche pas ! -->

		<div class="container">
    		<form method="post" action="">
        		<div id="div_login">
            		<div>
            			<img src="asset/img/admin.png">
                		<input type="text" class="textbox" id="txt_uname" name="txt_uname" placeholder="Username" />
            		</div>
            		<div>
                		<input type="password" class="textbox" id="txt_uname" name="txt_pwd" placeholder="Password"/>
            		</div>
            		<div>
                		<input type="submit" value="Submit" name="but_submit" id="but_submit" />
            		</div>
        		</div>
    		</form>
		</div>

    </body>
</html>