

        <?php
            if(isset($_REQUEST['req'])){
                $request = $_REQUEST['req'];
                switch ($request){
                    case 'exjs':
                        require './pageJS/exjs.php';
                        break;
                    case 'exjs02':
                        require './pageJS/exjs02.php';
                        break;
                    case 'exjs03':
                        require './pageJS/exjs03.php';
                        break;
                    case 'userview':
                        require './elements_lan/mUser/userView.php';
                        break;
                    case 'updateuser':
                        require './elemments_lan/mUser/userUpdate.php';
                        break;
                    case 'loaihangView':
                        require './elements_lan/mLoaihang/loaihangView.php';
                        break;
                    case 'hanghoaView':
                        require './elements_lan/mHanghoa/hanghoaView.php';
                        break;
                    case 'hanghoaUpdate':
                        require './elements_lan/mHanghoa/hanghoaUpdate.php';
                        break;
                }
            } else {
                require './elements_lan/default.php';
            }
        ?>

