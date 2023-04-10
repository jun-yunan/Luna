<?php
require'../../elements_lan/mod/hanghoaCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqacr'];
    switch ($requestAction) {
        case 'addnew':
            $tenhanghoa = $_REQUEST['tenhanghoa'];
            $mota = $_REQUEST['mota'];
            $giathamkhao = $_REQUEST['giathamkhao'];
            $tenhinhanh = $_REQUEST['tenhinhanh'];
            $idloaihang = $_REQUEST['idloaihang'];
            
            $hinhanh = $_FILES['fileimage']['tmp_name'];
            $hinhanh = base64_encode(file_get_contents($hinhanh));
            $hanghoa = new hanghoaCls();
            $rs = $hanghoa->HanghoaAdd($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang);
            if ($rs) {
                header('location:../../index,php?req=hanghoaView&result=ok');
            } else {
                header('location:../../index,php?req=hanghoaView&result=notok');
            }
            break;
            case 'deletehanghoa':
            $idhanghoa = $_REQUEST['idhanghoa'];
            $hanghoa = new hanghoaCls();
            $rs = $hanghoa->HanghoaDelete($idhanghoa);
            if ($rs) {
                 header('location:../../index.php?req=hanghoaView&result=ok');
            } else {
                header('location:../../index.php?req=hanghoaView&result=notok');
            }
            break;
            case 'updatehanghoa':
            $idhanghoa = $_REQUESTT['idhanghoa'];
            $tenhanghoa = $_REQUESTT['tenhanghoa'];
            $mota = $_REQUESTT['mota'];
            $giathamkhao = $_REQUESTT['giathamkhao'];
            $idloaihang = $_REQUESTT['idloaihang'];
            $tenhinhanh = $_REQUESTT['tenhinhanh'];
            
//            echo var_dump($_POST);
//            echo var_dump($_FILES);
            
            //kiểm tra có đổi hình ảnh ko
            if (getimagesize($_FILES['fileimage']['tmp_name']) == false) {
                $hinhanh = $_REQUESTT['hinhanh'];
            } else {
            $hinhanh = $_FILES['fileimage']['tmp_name'];
            $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
            }
            
            $hanghoa = new hanghoaCls();
            $rs = $hanghoa->HanghoaUpdate($tenhanghoa,$mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang);
            if ($rs)  {
                header('location:../../index.php?req=hanghoaView&result=ok');
            } else {
                header('location:../../index.php?req=hanghoaView&result=notok');
            }
            break;
//            default :
//             header('location:../../index.php?req=hanghoaView');
//             break;
    }
} else {
    header('locaton:../../index.php?req=hanghoaView');    
}