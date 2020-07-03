<?php

                unset($_SESSION['usuario']);
                unset($_SESSION['senha']);
                
                header('location:front.php');
?>