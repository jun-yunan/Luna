$(document).ready(function(){
   // alert("JQ đã chạy!!!");
   //chọn all thẻ p và áp dụng sự kiện
    $("p").mouseenter(function (){
        $(this).css("color","#00FF00");
    });
    $("p").mouseleave(function (){
        $(this).css("color","#000066");
    });
    $(".cls01").mouseenter(function (){
        $(this).css("color","#00FF00");
    });
    $(".cls01").mouseleave(function (){
        $(this).css("color","#000066");
    });
    $("#id01").mouseenter(function (){
        $(this).css("color","#AA00BB");
        $(this).css("font-weight","bold");
    });
    $("#id01").mouseleave(function (){
        $(this).css("color","#BB0000");
        $(this).css("font-weight","normal");
    });

//Menu
$(".itemOrder").hide();
$(".cateOrder").click(function(){
    $(this).next().slideDown();
});
$(".itemOrder").mouseleave(function(){
    $(this).slideUp();
});
//Slide Image;
$(".imgCls").mouseover(function(){
    var s = $(this).attr('src');
    //alert(s);
    $("#imgView").attr('src',s);
});
var s = $("#DivList").children();
var l = s.length;
var i = 0;
setInterval(function(){
    if (i === 1)
        i = 0;
    var p = $(s[i]).attr('src');
    $("#imgView").attr('src',p);
    i++;
},3000);
//jq ajax
$(".linkmenu").click(function(){
    var v = $(this).attr('value');
    $('#getContent').load('./pageJS/' + v + '.php');
});
$('#formreg').submit(function(){
    var username = $("input[name*='username']").val();
    if (username.length === 0 || username.length < 2){
        $("input [name*='username']").focus();
        $('#noteForm').html(("Username chưa hợp lệ! "));
        return false;
    }
    var password = $("input[name*='password']").val();
    if (password.length === 0 || password.length < 6){
        $("input [name*='password']").focus();
        $('#noteForm').html(("Password chưa hợp lệ! "));
        return false;
    }
    var hoten = $("input[name*='hoten']").val();
    if (hoten.length === 0 || hoten.length < 6){
        $("input [name*='hoten']").focus();
        $('#noteForm').html(("Họ tên chưa hợp lệ! "));
        return false;
    }
    var ngaysinh = $("input[name*='ngaysinh']").val();
    if (ngaysinh.length === 0 || ngaysinh.length < 6){
        $("input [name*='ngaysinh']").focus();
        $('#noteForm').html(("Ngày sinh chưa hợp lệ! "));
        return false;
    }
    var diachi = $("input[name*='diachi']").val();
    if (diachi.length === 0 || diachi.length < 6){
        $("input [name*='diachi']").focus();
        $('#noteForm').html(("Địa chỉ chưa hợp lệ! "));
        return false;
    }
    var dienthoai = $("input[name*='dienthoai']").val();
    if (dienthoai.length === 0 || dienthoai.length < 6){
        $("input [name*='dienthoai']").focus();
        $('#noteForm').html(("Điện thoại chưa hợp lệ! "));
        return false;
    }
    return true;
});
//btnupdate
$("temps").click(function (){
    var iduser = $(this).attr("value");
    $("#right_inner").load("./elements_lan/mUser/userUpdate.php?iduser="+iduser);
});
//btnupdateloaihang
$("temploaihang").click(function ()  {
    var idloaihang = $(this).attr("value");
    $("#right_inner").load("./elements_lan/mLoaihang/loaihangUpdate.php?idloaihang="+idloaihang);
});
});