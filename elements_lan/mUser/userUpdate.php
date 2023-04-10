<div>Cập nhật người dùng</div>
<?php
//require './elements_lan/mod/userCls.php';
require '../mod/userCls.php';
$iduser = $_REQUEST['iduser'];
$user = new userCls();
$getuser = $user->UserGetbyId($iduser);
?>
<div class="title_user">Người dung mới</div>
<div class="content_user">
    <form name="updateuser" id="formupdate" method="post" action="./elements_lan/mUser/userAct.php?reqact=updateuser">
        <input type="hidden" name="iduser" value="<?php  echo $iduser;?>"/>
<!--        <input type="text" name="iduser" value="<?php //echo $getuser->iduser; ?>" hidden="true"/>-->
        <table>
            <tr>
                <td>Tên đăng nhập:</td>
                <td><input type="text" name="username" value="<?php echo $getuser->username;?>"/></td>
            </tr>
            <tr>
                <td>Mật khẩu:</td>
                <td><input type="password" name="password" value="<?php echo $getuser->password;?>"/></td>
            </tr>
            <tr>
                <td>Họ tên:</td>
                <td><input type="text" name="hoten" value="<?php echo $getuser->hoten;?>"/></td>
                
            </tr>
            <tr>
                <td>Giới tính:</td>
                <td>Nam<input type="radio" name="gioitinh" value="1"<?php if($getuser->gioitinh==1) {echo "checked=true";} ?>/>
                    Nữ<input type="radio" name="gioitinh" value="0"<?php if($getuser->gioitinh==0) {echo "checked=true";} ?>/>
                </td>
            </tr>
            <tr>
            <td>Ngày sinh:</td>
            <td><input type="date" name="ngaysinh" value="<?php echo $getuser->ngaysinh;?>"/></td>
        </tr>
        <tr>
            <td>Địa chỉ:</td>
            <td><input type="text" name="diachi" value="<?php echo $getuser->diachi;?>"/></td>
        </tr>
        <tr>
            <td>Điện thoại:</td>
            <td><input type="tel" name="dienthoai" value="<?php echo $getuser->dienthoai;?>"/></td>
        </tr>
        <tr>
            <td><input type="submit" id="btnsubmit" value="Cập nhật"/></td>
            <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
        </tr>
        </table>
    </form>    
</div>



