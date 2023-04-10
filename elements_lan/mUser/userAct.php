<?php

    session_start();
   //require '../../elements_lan/mod/userCls.php'; 
   require '../mod/userCls.php';
   if (isset($_REQUEST['reqact'])){
       $requestAction = $_REQUEST['reqact'];
   switch ($requestAction){
       case 'addnew':
           //xử lý thêm
           //echo var_dump($_POST);
           $username = $_REQUEST['username'];
           $password = $_REQUEST['password'];
           $hoten = $_REQUEST['hoten'];
           $gioitinh = $_REQUEST['gioitinh'];
           $ngaysinh = $_REQUEST['ngaysinh'];
           $diachi = $_REQUEST['diachi'];
           $dienthoai = $_REQUEST['dienthoai'];
           
           $user = new userCls();
           
           $rs = $user->UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai);
//           $rs = $user->UserAdd($username, $password, $hoten, 
//                   $gioitinh, $ngaysinh, $diachi, $dienthoai);
                   //echo $hoten;
           if($rs){
               header("location:../../index.php?req=userview&result=ok");
               
           }else{
             header("location:../../index.php?req=userview&result=notok")  ;
           }
           break;
        case 'deleteuser':
           $iduser = $_REQUEST['iduser'];
            //echo $iduser;
           $user = new userCls();
           $rs = $user->UserDelete($iduser);
           if($rs){
               header("location:../../index.php?req=userview&result=ok");
               
           }else{
             header("location:../../index.php?req=userview&result=notok")  ;
           }
           break;
           case 'setlock':   
               $iduser = $_REQUEST['iduser'];
               $ability = $_REQUEST['ability'];
               $user = new userCls();
               if ($ability == 0){
                   $rs = $user->UserSetActive($iduser, 1);
               } else {
                $rs = $user->UserSetActive($iduser, 0);
               }
           if($rs){
               header("location:../../index.php?req=userview&result=ok");
               
           }else{
             header("location:../../index.php?req=userview&result=notok")  ;
           }
           break;
       case 'updateuser':
           //echo 'fgfgfgf';
           $iduser = $_REQUEST['iduser'];
           $username = $_REQUEST['username'];
           $password = $_REQUEST['password'];
           $hoten = $_REQUEST['hoten'];
           $gioitinh = $_REQUEST['gioitinh'];
           $ngaysinh = $_REQUEST['ngaysinh'];
           $diachi = $_REQUEST['diachi'];
           $dienthoai = $_REQUEST['dienthoai'];
           $user = new userCls();
           $rs = $user->UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser);
           if($rs){
               header("location:../../index.php?req=userview&result=ok");
               
           }else{
             header("location:../../index.php?req=userview&result=notok")  ;
           }
           break;
           //BAI THUC HANH 3
           case 'checklogin':
            $username = $_REQUEST['username'];
            $password = $_REQUEST['password'];
            $user = new userCls();
            //echo $username;
            
            $rs = $user->UserCheckLogin($username, $password);
            //echo $rs;
            if ($rs) {
                if ($username == "admin") {
                    $_SESSION['ADMIN'] = $username;
                } else {
                    $_SESSION['USER'] = $username;
                }
                header('location:../../index.php?req=userview&result=ok');
            } else {
                header('location:../../index.php?req=userview&result=notok');
            }
            break;
        case 'userlogout':
            $timelogin = date('h:i - d/m/Y');
            if (isset($_SESSION['USER'])) {
                $namelogin = $_SESSION['USER'];
            }
            if (isset($_SESSION['ADMIN'])) {
                $namelogin = $_SESSION['ADMIN'];
            }
            setcookie($namelogin, $timelogin, time() + (86400 * 30), "/");
            session_destroy();
            header('location:../../index.php');
            break;
        default :
           header("location:../../index.php?req=userview");
           break;
        }
   } else {
       header("location:../../index.php?req=userview");
       
           
   }


   
   