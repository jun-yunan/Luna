<?php

$s = '../mod/database.php';
if (file_exists($s)){
   $f = $s;
}else{
    $f = './elements_lan/mod/database.php';
}
//require'./mod/database.php';

//require'./elements_lan/mod/database.php';
require $f;

class userCls extends database{
     
           
//thuc hien kiem tra dang nhap
    public function UserCheckLogin($username, $password) {
        $select = $this->connect->prepare("select * from user "
                . "where username = ? and password = ? and ability=1");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($username, $password));
        if (count($select->fetchAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //kiem tra ton tai username
    public function UserCheckUsername($username) {
        $select = $this->connect->prepare("select * from user where username = ?");
        $select->setFetchMode(PDO::FETCH_OBJ);
        $select->execute(array($username));
        if (count($select->fethAll()) == 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //lay all mau tin trong bang user tra ve mang du lieu
    public function UserGetAll() {
        $getAll = $this->connect->prepare("select * from user");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        
        return $getAll->fetchAll();
    }

    //them nguoi dung
    public function UserAdd($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai) {
//        echo var_dump($username);
//        $sql= "INSERT INTO user(iduser, username, password, hoten, gioitinh, ngaysinh, diachi, dienthoai) VALUES (?,?,?,?,?,?,?,?)";
//        echo var_dump($sql);
//        $add = $this->connect->prepare($sql);
//        echo var_dump($add);
        $add = $this->connect->prepare("INSERT INTO user(username, password, hoten,gioitinh, ngaysinh, diachi, dienthoai) 
                                        VALUES(?,?,?,?,?,?,?)");
        
        $add->execute(array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai));
        
        return $add->rowCount();
        
    }

    //xoa nguoi dung
    public function UserDelete($iduser) {
        $del = $this->connect->prepare("delete from user where iduser=?");
        $del->execute(array($iduser));
        return $del->rowCount();
    }

    //cap nhat du lieu nguoi dung
    public function UserUpdate($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser) {
        $update = $this->connect->prepare("UPDATE user SET "
                . "username = ?, password = ?, hoten = ?, gioitinh = ?, ngaysinh = ?, diachi = ?, dienthoai = ?"
                . "WHERE iduser = ?");
        $update->execute(array($username, $password, $hoten, $gioitinh, $ngaysinh, $diachi, $dienthoai, $iduser));
        return $update->rowCount();
    }

    // chon thong tin user bang id
    public function UserGetbyId($iduser) {
        $getTK = $this->connect->prepare("select * from user where iduser=?");
        $getTK->setFetchMode(PDO::FETCH_OBJ);
        $getTK->execute(array($iduser));
        return $getTK->fetch();
    }

    //set password nguoi dung
    public function UserSetPassword($iduser, $password) {
        $update = $this->connect->prepare("update user set password=? where iduser=?");
        $update->execute(array($password, $iduser));
        return $update->rowCount();
    }

    //khoa tai khoan nguoi dung
    public function UserSetActive($iduser, $ability) {
        $update = $this->connect->prepare("update user set ability=? where iduser=?");
        $update->execute(array($ability, $iduser));
        return $update->rowCount();
    }

    //doi password nguoi dung
    public function UserChangePassword($username, $passwordold, $passwordnew) {
        $selectMK = $this->connect->prepare("select password from user where username = ?");
        $selectMK->setFetchMode(PDO::FETCH_OBJ);
        $selectMK->execute(array($username));
        if (count($selectMK->fetch()) == 1) {
            $temp = $selectMK->fetch();
            if ($passwordold == $temp->password) {
                $update = $this->connect->prepare("update user set password=? where username=?");
                $update->execute(array($passwordnew, $username));
                return $update->rowCount();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}

?>

