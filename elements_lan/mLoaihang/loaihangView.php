<div><img class="iconimg" src="./img_lan/catelog.png"/>Quản lý loại hàng</div>
<hr>
<div class="title_mod"><img class="iconimg" src="./img_lan/insert.png"/>Thêm loại hàng</div>
<div class="content_mod">
    <form name="newloaihang" id="formadd_loaihang" method="post"
          enctype="multipart/form-data"
          action="./elements_lan/mLoaihang/loaihangAct.php?reqact=addnew">
        <table>
            <tr>
                <td>Tên loại hàng:</td>
                <td><input type="text" name="tenloaihang"/></td>
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
                <td><input type="submit" id="btnsubmit" value="Tạo mới"/></td>
                <td><input type="reset" value="Làm lại"/><b id="noteForm"></b></td>
            </tr>
        </table>
    </form>
</div>
<hr/>
<?php
require './elements_lan/mod/loaihangCls.php';
?>
<div class="title_mod"><img class="iconimg" src="./img_lan/list.png"/>Danh sách loại hàng</div>
<div class="content_mod">
    <?php 
    $obj = new loaihangCls();
    $list_loaihang = $obj->LoaihanggetAll();
    $l = count($list_loaihang);
    ?>
    <p>Trong bảng có:<b><?php echo $l;?></b></p>
    <?php
    if ($l > 0) {
        ?>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Tên loại hàng</th>
                <th><img src="./img_lan/nameing.png" class="iconimg"/></th>
                <th><img src="./img_lan/image.png" class="iconimg"/></th>
                <th><img src="./img_lan/tool.png" class="iconimg"/></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($list_loaihang as $v) {
            ?>
            <tr>
                <td><?php echo $v->idloaihang;?></td>
                <td><?php echo $v->tenloaihang;?></td>
                <td><?php echo $v->tenhinhanh;?></td>
                <td><img class="imgtable" src='data:image/png;base64,<?php echo ($v->hinhanh);?>'/></td>
                <td>
                    <?php
                    if (isset($_SESSION['ADMIN'])) {
                    ?>
                    <a href="./elements_lan/mLoaihang/loaihangAct.php?reqact=deleteloaihang&idloaihang=<?php echo $v->idloaihang; ?>">
                    <img class="iconimg" src="./img_lan/idelete.png"/>
                    </a>
                    <?php
                    } else {
                    ?>    
                    <img class="iconimg" src="./img_lan/idelete.png"/>
                    <?php
                    }
                    ?>
                    <temploaihang class="btnupdate" value="<?php echo $v->idloaihang; ?>">
                        <img class="iconimg" src="./img_lan/update2.png"/>
                    </temploaihang>
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

