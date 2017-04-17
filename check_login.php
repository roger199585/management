<?php 
    include("config.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 

        $myaccount = $_POST["account"];
        $mypassword = $_POST["password"]; 

        $sql = "SELECT * FROM account WHERE account = '$myaccount' and password = '$mypassword'";
        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $active = $row['id'];
        $count = mysqli_num_rows($result);
        // If result matched $myusername and $mypassword, table row must be 1 row
        if($count == 1 && $row['permit'] == 1) {
            // session login 是使用者的ＩＤ
            // session uer 是使用者的名稱
            $_SESSION['User'] = $myaccount;
            $_SESSION['Login'] = $result;
            
            header("Location: index.php");
        }
        else {
            header("Location: login.php");
            echo "<script>alert('帳密有誤');</script>";
        }
    }
?>