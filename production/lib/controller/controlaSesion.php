<?php

if (!$_SESSION["session_user"])
    {
        header("Location: ../../index.php");
    }
    
?>