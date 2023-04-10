<?php
session_start();
?>
<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lunna nè!</title>
        <link href="stylecss_lan/mycss.css" rel="stylesheet" type="text/css"/>
        <script src="js_lan/jquery-3.6.4.min.js" type="text/javascript"></script>
        <script src="js_lan/jscript.js" type="text/javascript"></script>
    </head>
    <body>
        <?php
        if (!isset($_SESSION['USER']) and !isset($_SESSION['ADMIN'])) {
            header('location:userLogin.php');
        }
        ?>
       <div id="top_div">
            <?php  require'./elements_lan/top.php'?>
       </div>
        <div id="left_div">
           <?php require './elements_lan/left.php'; ?>
        </div>
        <div id="center_div">
             <?php //require './pageJs/exjs03.php'; 
                   //require './elements_lan/mUser/userView.php';
                   
                    require './elements_lan/center.php'; 
//                    require './pageJs/exjs.php'; 
                    //require './pageJs/exjs02.php'; 
             ?> 
            
        </div>
       
        <div id="right_div">
            <?php require './elements_lan/right.php'; ?>
        </div>
        <div id="bottom_div"></div>
<!--        Bài thực hành 3-->
        <div id="signoutbutton">
            <a href="elements_lan/mUser/userAct.php?reqact=userlogout">
                <img src="img_lan/logout.png" class="inconbutton"/>
            </a>
        </div>
    </body>
</html>
