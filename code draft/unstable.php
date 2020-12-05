<?php
function vsp_loader($dir)
{
    return define("VSP_LOADER",$dir);
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
function vsp_start($param,$dir,$load_dir)
{
    session_start();
    /*
    getting other params to save while loading
    */
    $uri_current = $_SERVER['REQUEST_URI'];
    $uri_confirm = substr($uri_current, strpos($uri_current, "&") + 1);
    if(strpos($uri_current, '&') !== false){
        $back_param = "&".$uri_confirm;
    }else{
        $back_param = '';
    }
    /*
    filter for not looping if got same param as main parameter!
    contohnya
    ?home=show&home=blabla > akan redirect ke ?home=load
    ?invalid=show&about= > akan redirect ke ?about=load
    */
    if(strpos($back_param, $param) !== false)
    {
        /*
        fungsi clear cookies & redirect
        */
        $_SESSION['vsp'] = '';
        setcookie("vsp", "", time() - 3600);
        if($load_dir == true){include VSP_LOADER;}else{echo '';};
        header("Refresh:0;url=?$param=load",true,301);
        die();
    }
    /*
    checking up if everything exist
    */
    if(isset($_GET) && !isset($_GET[$param]) && empty($_GET))
    {
        /*
        fungsi clear cookies & redirect
        */
        $_SESSION['vsp'] = '';
        setcookie("vsp", "", time() - 3600);
        if($load_dir == true){include VSP_LOADER;}else{echo '';};
        header("Refresh:0;url=?$param=load$back_param",true,301);
        die();
    }
    /*
    getting the real deal
    */
    switch($_GET[$param]){
        case "show":
            if(empty($_COOKIE['vsp']) && empty($_SESSION['vsp']))
            {
                /*
                fungsi clear cookies & redirect
                */
                $_SESSION['vsp'] = '';
                setcookie("vsp", "", time() - 3600);
                if($load_dir == true){include VSP_LOADER;}else{echo '';};
                header("Refresh:0;url=?$param=load$back_param",true,301);
                die();
            }else{
                if($dir == false)
                {
                    $_SESSION['vsp'] = '';
                    setcookie("vsp", "", time() - 3600);
                }
                else
                {
                    $_SESSION['vsp'] = '';
                    setcookie("vsp", "", time() - 3600);
                    include $dir;
                    die();
                }
            }
            break;
        case 'load':
            /*
            fungsi load, disinilah kuncinya
            */
            $_SESSION['vsp'] = '';
            setcookie("vsp", "", time() - 3600);
            $_SESSION['vsp'] = true;
            setcookie("vsp", "true");
            if($load_dir == true){include VSP_LOADER;}else{echo '';};
            header("Refresh:0;url=?$param=show$back_param",true,301);
            die();
        default:
            if(empty($_COOKIE['vsp']) && empty($_SESSION['vsp']))
            {
                /*
                fungsi clear cookies & redirect
                */
                $_SESSION['vsp'] = '';
                setcookie("vsp", "", time() - 3600);
                if($load_dir == true){include VSP_LOADER;}else{echo '';};
                header("Refresh:0;url=?$param=load$back_param",true,301);
                die();
            }
            else
            {
                if($dir == false)
                {
                    $_SESSION['vsp'] = '';
                    setcookie("vsp", "", time() - 3600);
                }
                else
                {
                    $_SESSION['vsp'] = '';
                    setcookie("vsp", "", time() - 3600);
                    include $dir;
                    die();
                }
            }
    }
};
function vsp_init($param,$load_dir)
{
    if(empty($_COOKIE['vsp'])){
        /*
        fungsi clear cookies & redirect
        */
        session_start();
        $_SESSION['vsp'] = '';
        setcookie("vsp", "", time() - 3600);
        if($load_dir == true){include VSP_LOADER;}else{echo '';};
        header("Refresh:0;url=?$param=load",true,301);
        die();
    }
};
function vsp_builder($type,$param,$dir,$load_dir)
{
    if($type == 'load')
    {
        if(isset($_GET[$param]) && $dir != 'redirect')
        {
            vsp_start(  $param,$dir,$load_dir);
            vsp_init(   $param,$load_dir);
            die();
        }
    }

    if($type == 'redirect')
    {
        if(isset($_GET[$param]) && $load_dir == true)
        {
            header("location: $dir");
            die();
        }
        elseif(isset($_GET[$param]) && $load_dir == false)
        {
            header("location: ?");
            die();
        }
    }
};
function vsp_default($var,$dir,$redir_url)
{
    if($dir != 'redirect' && $redir_url == false)
    {
        if($var == true){
            include $dir;
        }
    }
    elseif($dir == 'redirect' && $redir_url != false)
    {
        header("location: ?$redir_url=");
        die();
    }
};
function vsp_kill()
{
    session_start();
    $_SESSION['vsp'] = '';
    setcookie("vsp", "", time() - 3600);
};
