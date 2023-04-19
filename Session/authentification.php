<?php
session_start();
require_once('session_connect.php');

if (isset($_POST['numeprenume']) && isset($_POST['parola'])) {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $grad = validate($_POST['grad']);
    $numeprenume = validate($_POST['numeprenume']);
    $pass = validate($_POST['parola']);

    $parts = explode(" ", $numeprenume);
    $prenume = array_pop($parts);
    $nume = implode(" ", $parts);
    echo $_SESSION['user_type'];
    if (empty($numeprenume)) {
        echo("User Name is required");
        exit();
    }else if(empty($pass)){
        echo("Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM Ofiteri WHERE Nume='$nume' and Prenume='$prenume' and Parola='$pass'";
        $rezultat = sqlsrv_query($conn, $sql);

        $result = sqlsrv_query($conn, "SELECT count(*) FROM Ofiteri WHERE Nume='$nume' and Parola='$pass'");
        $nr_row = sqlsrv_fetch_array($result);

        if ($nr_row[0] === 1) {
            $rand = sqlsrv_fetch_array($rezultat, SQLSRV_FETCH_ASSOC);
            if ($rand['Nume'] === $nume && $rand['Parola'] === $pass) {
                if ($rand['Grad'] == $grad) {
                    echo "Logged in!";
                    $_SESSION['Grad'] = $rand['Grad'];
                    $_SESSION['Nume'] = $rand['Nume'];
                    $_SESSION['Prenume'] = $rand['Prenume'];
                    $_SESSION['Parola'] = $rand['Parola'];
                    $_SESSION['Ofiter_ID'] = $rand['Ofiter_ID'];

                    if ($_SESSION['user_type'] == 'admin'){
                        header ("Location: ../Admin/Routes/login.php");
                        exit();
                        }
                        else {
                            header ("Location: ../User/Routes/login.php");
                        exit();
                        }
                }else{
                    echo ("Gradul dumneavoastra este gresit!");
                }
            } else {
                echo ("Numele si parola nu coincid!");
                exit();
            }
        } else {
            echo ("Numele si parola nu coincid!");
            exit();
        }
    }   
}else{
    exit('Please fill both the username and password fields!');;
}
?>
