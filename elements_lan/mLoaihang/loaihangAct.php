<?php

require '../../elements_lan/mod/loaihangCls.php';
if (isset($_GET['reqact'])) {
    $requestAction = $_GET['reqact'];
    switch ($requestAction) {
        case 'addnew':
            //xử lý thêm
            $tenloaihang = $_REQUEST['tenloaihang'];
            $tenhinhanh = $_REQUEST['tenhinhanh'];
            $hinhanh = $_FILES['fileimage']['tmp_name'];
            $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
            
            $loaihang = new loaihangCls();
            $rs = $loaihang->LoaihangAdd($tenloaihang, $tenhinhanh, $hinhanh);
            if ($rs) {
                header('location:../../index.php?req=loaihangView&result=ok');
            } else {
                header('location:../../index.php?req=loaihangView&result=notok');
            }
            break;
        case 'deleteloaihang':
            $idloaihang = $_REQUEST['idloaihang'];
            $loaihang = new loaihangCls();
            $rs = $loaihang->LoaihangDelete($idloaihang);
            if ($rs) {
                 header('location:../../index.php?req=loaihangView&result=ok');
            } else {
                header('location:../../index.php?req=loaihangView&result=notok');
            }
            break;
        // chỗ của kiệt sửa nè
        case 'updateloaihang':
            $file_tmp = $_FILES['fileimage']['tmp_name']; // code mới nè


            $idloaihang = $_POST['idloaihang'];
            $tenloaihang = $_POST['tenloaihang'];
            $tenhinhanh = $_POST['tenhinhanh'];
            
            // echo var_dump($_POST);
            // echo var_dump($_FILES);
            
            // code của lan
            //kiểm tra có đổi hình ảnh ko
            // if (getimagesize($_FILES['fileimage']['tmp_name']) == false) {
            //     $hinhanh = $_POST['hinhanh'];
            // } else {
            // $hinhanh = $_FILES['fileimage']['tmp_name'];
            // $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
            // }
            
            // $loaihang = new loaihangCls();
            // $rs = $loaihang->LoaihangUpdate($tenloaihang, $tenhinhanh, $hinhanh, $idloaihang);
            // if ($rs)  {
            //     header('location:../../index.php?req=loaihangView&result=ok');
            // } else {
            //     header('location:../../index.php?req=loaihangView&result=notok');
            // }
            // break;

            //---------------------

            // code của kiệt
            if(isset($_FILES['fileimage']['tmp_name']) && !empty($_FILES['fileimage']['tmp_name'])) {
                $image_size = getimagesize($_FILES['fileimage']['tmp_name']);
                if ($image_size == FALSE) {
                    //$hinhanh = $_POST['hinhanh'];
                    $hinhanh = $_POST['hinhanh'];
                }
                else {
                    $hinhanh = $file_tmp;
                    $hinhanh = base64_encode(file_get_contents(addslashes($hinhanh)));
                }
            }
            else {
                echo "Ảnh không được tải lên";
            }


            $loaihang = new loaihangCls();
            //$rs = $loaihang->LoaihangUpdate($tenloaihang, $tenhinhanh, $hinhanh, $idloaihang);
            $rs = $loaihang->LoaihangUpdate($tenloaihang, $tenhinhanh, $hinhanh, $idloaihang);

            if ($rs) {
                header('location:../../index.php?req=loaihangView&result=ok');
            }
            else {
                header('location:../../index.php?req=loaihangView&result=notok');
            }
            break;

            //--------------------------------------
            
            
        default :
            header('location:../../index.php?req=loaihangView');
            break;
    }
} else {
    header('location:../../index.php?req=loaihangView');
}

