<?php
function vsp_kill()
{
    /*gunakan ini jika kurang yakin ter kill cookienya */
    session_start();
    setcookie("vsp", "", time() - 3600);
}

/*
param init sama param vsp_start kudu sama ya
taruh vsp_init() dibawah vsp_start();
contoh

.......kode....
$param = 'about';
vsp_start($param,false,false);
vsp_init($param);
...kode selesai...

bertujaun untuk menghindari repeated request,
*/
function vsp_init($param){
    if(empty($_COOKIE['vsp'])){
        setcookie("vsp", "", time() - 3600);
        header("Refresh:0;url=?$param=load",true,301);
        die();
    }
}

function vsp_start($param,$dir,$load_dir)
{
    session_start();
    if(isset($_GET) && !isset($_GET[$param]) && empty($_GET)){
        setcookie("vsp", "", time() - 3600);
        header("Refresh:0;url=?$param=load",true,301);
        die();
    }
    switch($_GET[$param]){
        case "show":
            if(empty($_COOKIE['vsp'])){
                setcookie("vsp", "", time() - 3600);
                header("Refresh:0;url=?$param=load",true,301);
                die();
            }else{
                if($dir == false){
                    setcookie("vsp", "", time() - 3600);
                }
                else
                {
                    setcookie("vsp", "", time() - 3600);
                    include $dir;
                    die();
                }
            }
            break;
        case 'load':
            setcookie("vsp", "", time() - 3600);
            setcookie("vsp", "true");
            include $load_dir;
            header("Refresh:0;url=?$param=show",true,301);
            die();
        default:
            if(empty($_COOKIE['vsp'])){
                setcookie("vsp", "", time() - 3600);
                header("Refresh:0;url=?$param=load",true,301);
                die();
            }else{
                if($dir == false){
                    setcookie("vsp", "", time() - 3600);
                }
                else
                {
                    setcookie("vsp", "", time() - 3600);
                    include $dir;
                    die();
                }
            }
    }
};


function vsp_inspect($var)
{
    /*
        kode javascript didapatkan dari stackoverflow 
        https://stackoverflow.com/a/53511363
        thanks to PK-1825
        */
    $inspect = '
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
        echo $inspect;
    }
};
