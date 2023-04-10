<?php
require './elements_lan/mod/loaihangCls.php';
$obj = new loaihangCls();
$list_loaihang = $obj->LoaihanggetAll();
?>
<div><img class="iconimg" src="./img_lan/goods.png"/>Quản lý Hàng hóa</div>
<hr>
<div><img class="title_mod"><img class="iconimg" src="./img_lan/insert.png"/>Thêm hàng hóa</div>
<div class="content_mod">
    <form name="newhanghoa" id="formadd_hanghoa" method="post"
          enctype="multipart/form-data"
          action="./elements_lan/mHanghoa/hanghoaAct.php?reqact=addnew">
        <table>
            <tr>
                <td>Tên loại hàng:</td>
                <td><input type="text" name="tenhanghoa"/></td>
            </tr>
            <tr>
                <td>Mô tả:</td>
                <td><textarea name="mota" cols="30" row="10"></textarea></td>
            </tr>
            <tr>
                <td>Giá tham khảo:</td>
                <td><input type="number" name="giathamkhao"/></td>
            </tr>
            <tr>
                <td>Tên hình ảnh:</td>
                <td><input type="text" name="tenhinhanh"/></td>
            </tr>
            <tr>
                <td>Hình ảnh:</td>
                <td><input type="file" name="fileimage"/></td>
            </tr>
            <tr>
                <td>Chọn loại hàng:</td>
                <td>
                    <?php
                    foreach ($list_loaihang as $l) {
                    ?>
                    <input type="radio" name="idloaihang" value="<?php echo $l->idloaihang;?>"/>
                    <img class="iconimg" src='data:image/png;base64,<?php echo ($l->hinhanh);?>'/>
                    <?php echo ($l->tenloaihang);?><br>
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td><input type="submit" id="btnsubmit" value="Tạo mới"/></td>
                <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>
<hr>
<div class="title_mod"><input class="iconimg" src="./img_lan/list.png"/>Danh sách hàng hóa</div>
<div class="content_mod">
    <?php 
     require './elements_lan/mod/hanghoaCls.php';
    $obj_hanghoa = new hanghoaCls();
    $list_hanghoa = $obj_hanghoa->HanghoaGetAll();
    $l = count($list_hanghoa);
    ?>
    <p>Trong bảng có:<b><?php echo $l;?></b></p>
    <?php
    if ($l > 0) {
        ?>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Tên hàng hóa</th>
                <th><img src="./img_lan/moneys.png" class="iconimg"/></th>
                <th><img src="./img_lan/nameing.png" class="iconimg"/></th>
                <th><img src="./img_lan/image.png" class="iconimg"/></th>
                <th><img src="./img_lan/tool.png" class="iconimg"/></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($list_hanghoa as $v) {
            ?>
            <tr>
                <td><?php echo $v->idhanghoa;?></td>
                <td><?php echo $v->tenhanghoa;?></td>
                <td><?php echo $v->giathamkhao;?></td>
                <td><?php echo $v->tenhinhanh;?></td>
                <td><img class="imgtable" src='data:image/png;base64,<?php echo ($v->hinhanh);?>'/></td>
                <td>
                    
                    <?php
                    if (isset($_SESSION['ADMIN'])) {
                    ?>
                    <a href="./elements_lan/mHanghoa/hanghoaAct.php?reqact=deletehanghoa&ihanghoa=<?php echo $v->idhanghoa; ?>">
                    <img class="iconimg" src="./img_lan/idelete.png"/>
                    </a>
                    <?php
                    } else {
                    ?>    
                    <img class="iconimg" src="./img_lan/idelete.png"/>
                    <?php
                    }
                    ?>
                    <a href="index.php?req=hanghoaUpdate&idhanghoa=<?php echo $v->idhanghoa;?>">
                        <img class="iconimg" src="./img_lan/update2.png"/>
                    </a>
                </td>
                    
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <?php
    }
    ?>
</div>
<hr/>

