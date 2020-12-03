<?php
class vsp {
    /* penjelasannya mirip ya seperti viewsource_protect */
    function loader($dir,$time){
        $this->loader       = $dir;
        $this->loader_time  = $time;
    }
    function inspect($var){
        /*
        kode javascript didapatkan dari stackoverflow 
        https://stackoverflow.com/a/53511363
        thanks to PK-1825
        */
        $this->inspect = '
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
            <script type="text/javascript">
            document.addEventListener("contextmenu", event => event.preventDefault());
            window.onload = function () {
            document.addEventListener("contextmenu", function (e) {
            e.preventDefault();
            }, false);
            document.addEventListener("keydown", function (e) {
            //document.onkeydown = function(e) {
            // "I" key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
            disabledEvent(e);
            }
            // "J" key
            if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
            disabledEvent(e);
            }
            // "S" key + macOS
            if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
            disabledEvent(e);
            }
            // "U" key
            if (e.ctrlKey && e.keyCode == 85) {
            disabledEvent(e);
            }
            // "F12" key
            if (event.keyCode == 123) {
            disabledEvent(e);
            }
            }, false);
            function disabledEvent(e) {
            if (e.stopPropagation) {
            e.stopPropagation();
            } else if (window.event) {
            window.event.cancelBubble = true;
            }
            e.preventDefault();
            return false;
            }
            }
            </script>
            ';
        if($var == true){
            echo $this->inspect;
        }
    }
    function start(){
        session_start();
        if($_GET['load'] == 'on'){
            if(isset($this->loader)){
                include $this->loader;
                $time = $this->loader_time;
            }else{
                $time = 0;
            }
            $_SESSION["protect"] = true;
            header("Refresh:$time;url=?");
            die();
        }else{
            switch($_SESSION['protect']){
                case false:
                    header("location: ?load=on");
                    die();
                    break;
                default :
            }
        }
    }

    function stop(){
        session_start();
        $_SESSION['protect'] = false;
    }
}
