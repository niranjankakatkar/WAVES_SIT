<?php
session_start();
session_destroy();
$_SESSION['loginID']="";
if($_SESSION['loginID']=="")
{
    ?>

     
        <script> 
            window.location.href="../ADMIN"; 
            </script>
            
              <?php
}

?>