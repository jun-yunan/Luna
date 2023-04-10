<?php

$s = '../../elements_lan/mod/database.php';
if (file_exists($s)) {
    $f = $s;
} else {
    $f = './elements_lan/mod/database.php';    
}
require $f;
class hanghoaCls extends database {
    public function HanghoaGetAll() {
        $getAll = $this->connect->prepare("select * from hanghoa");
        $getAll->setFetchMode(PDO::FETCH_OBJ);
        $getAll->execute();
        
        return $getAll->fetchAll();
        
    }
    public function HanghoaAdd($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang) {
      $add = $this->connect->prepare("INSERT INTO hanghoa(tenhanghoa, mota, giathamkhao, tenhinhanh, hinhanh, idloaihang)
              VALUES (?,?,?,?,?,?)"); 
      $add->execute(array($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang));
      
      return $add->rowCount();
    }
    public function HanghoaDelete($idhanghoa) {
        $del = $this->connect->prepare("delete from hanghoa where idhanghoa=?");
        $del->execute(array($idhanghoa));
        
        return $del->rowCount();
    }
    public function HanghoaUpdate($tenhanghoa, $mota, $giathamkhao, $tenhinhanh, $hinhanh, $idloaihang, $idhanghoa) {
        $update = $this->connect->prepare("UPDATE hanghoa SET "
               ." tenhanghoa=?, mota=?, giathamkhao=?, tenhinhanh=?, hinhanh=?, idloaihang=?"
                ."WHERE idhanghoa = ?");
        $update->execute(array($tenhanghoa, $mota, $giathamkhao, $tenhinhanh,$hinhanh, $idloaihang, $idhanghoa));
        
        return $update->rowCount();
    }
    public function HanghoaGetbyId($idhanghoa) {
       $getTK = $this->connect->prepare("slect * from hanghoa where idhanghoa=?");
       $getTK->setFetchMode(PDO::FETCH_OBJ);
       $getTK->execte(array($idhanghoa));
       
       return $getTK->fetch();
    }
    public function HanghoaGetbyIdloaihang($idloaihang) {
        $getTK = $this->connect->prepare("slect * from hanghoa where idloaihang=?");
        $getTK->setFetchMode(PDO::FETCH_OBJ);
        $getTK->execute(array($idloaihang));
        
        return $getTK->fetch();
    }
}
