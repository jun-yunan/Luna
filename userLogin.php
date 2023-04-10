<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login website</title>
        <script src="js_lan/jquery-3.6.4.min.js" type="text/javascript"></script>
        <script src="js_lan/jscript.js" type="text/javascript"></script>
        <link href="stylecss_lan/mycss.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div id="loginBody">
            <h4 align="center">ĐĂNG NHẬP HỆ THỐNG</h4>
            <form name="frmLogin" method="post" action="elements_lan/mUser/userAct.php?reqact=checklogin">
                <table>
                    <tr><td>Tên tài khoản: </td>
                        <td><input type="text" name="username" id="username"/></td></tr>
                    <tr><td>Mật khẩu: </td>
                        <td><input type="password" name="password" id="password"/></td></tr>
                    <tr><td></td>
                        <td><input type="submit" value="Đăng nhập"/></td></tr>
                </table>
            </form>
        </div>
    </body>
</html>
