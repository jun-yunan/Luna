



  
        <div id="content">
            <div id="video">
                    <video width="320" height="240" controls>
                        <source src="./img_lan/bunny.mp4" type="video/mp4">
                       
                    </video>
                    
                
            </div>
        </div>
        <br/>
        <div id="menu">
            No ajax <br/>
            <a href="index.php?page01">Page 01</a>
            <a href="index.php?page02">Page 02</a>
            <a href="index.php?page03">Page 03</a>
            <a href="index.php?page04">Page 04</a>
            <br/>
            Use ajax <br/>
            <b class="linkmenu" value="page01">Page 01</b>
            <b class="linkmenu" value="page02">Page 02</b>
            <b class="linkmenu" value="page03">Page 03</b>
            <b class="linkmenu" value="page04">Page 04</b>
            <br/>
        </div>
        <br/>
        <div id="getContent">
            <?php
            if (isset($_GET["page"])){
                $page = $_GET["page"];
                include './pageJS/' .$page . 'php';
            } else {
                echo "Nothing to show!";
            }
            ?>
        </div>
    


