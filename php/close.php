<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
session_destroy();
echo '<script> location.href="http://localhost/EscuelaSecundaria/index.php" </script>';