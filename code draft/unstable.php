<?php
function vsp_loader($dir){
    /*
    MENDEFINISIKAN LOADER, UNTUK DIPAKAI PADA FUNCTION SELANJUTNYA,
    */
    return define("VSP_LOADER",$dir);
}
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
    /*
    MENDEFINISIKAN SESSION
    */
    session_start();
    if(isset($_GET) && !isset($_GET[$param]) && empty($_GET)){
        /*
        set cookie ke kosong, untung menghapus cookie penerima
        penting untuk mengosongkan viewsource
        */
        setcookie("vsp", "", time() - 3600);
        /*
        jika loader set true, tampilkan loader
        */
        if($load_dir == true){include VSP_LOADER;};
        /*
        fungsi refresh untuk kembali ke parameter yang ditentukan,
        */
        header("Refresh:0;url=?$param=load",true,301);
        die();
    }
    switch($_GET[$param]){
        case "show":
            if(empty($_COOKIE['vsp'])){
                /*
                set cookie ke kosong, untung menghapus cookie penerima
                penting untuk mengosongkan viewsource
                */
                setcookie("vsp", "", time() - 3600);
                /*
                jika loader set true, tampilkan loader
                */
                if($load_dir == true){include VSP_LOADER;};
                /*
                fungsi refresh untuk kembali ke parameter yang ditentukan,
                */
                header("Refresh:0;url=?$param=load",true,301);
                die();
            }else{
                if($dir == false){
                    /*
                    set cookie ke kosong, untung menghapus cookie penerima
                    penting untuk mengosongkan viewsource
                    */
                    setcookie("vsp", "", time() - 3600);
                }
                else
                {
                    /*
                    set cookie ke kosong, untung menghapus cookie penerima
                    penting untuk mengosongkan viewsource
                    */
                    setcookie("vsp", "", time() - 3600);
                    /*
                    include file yang akan ditampilkan,
                    dapat berupa controler maupun viewnya langsung.
                    */
                    include $dir;
                    die();
                }
            }
            break;
        case 'load':
            /*
            set cookie ke kosong, untung menghapus cookie penerima
            penting untuk mengosongkan viewsource
            */
            setcookie("vsp", "", time() - 3600);
            /*
            menyalakan cookie 1x untuk validasi
            cookie ini sangat penting.
            */
            setcookie("vsp", "true");
            /*
            jika loader set true, tampilkan loader
            */
            if($load_dir == true){include VSP_LOADER;};
            /*
            fungsi refresh untuk kembali ke parameter yang ditentukan,
            */
            header("Refresh:0;url=?$param=show",true,301);
            die();
        default:
            if(empty($_COOKIE['vsp'])){
                /*
                set cookie ke kosong, untung menghapus cookie penerima
                penting untuk mengosongkan viewsource
                */
                setcookie("vsp", "", time() - 3600);
                /*
                jika loader set true, tampilkan loader
                */
                if($load_dir == true){include VSP_LOADER;};
                /*
                fungsi refresh untuk kembali ke parameter yang ditentukan,
                */
                header("Refresh:0;url=?$param=load",true,301);
                die();
            }else{
                if($dir == false){
                    /*
                    set cookie ke kosong, untung menghapus cookie penerima
                    penting untuk mengosongkan viewsource
                    */
                    setcookie("vsp", "", time() - 3600);
                }
                else
                {
                    /*
                    set cookie ke kosong, untung menghapus cookie penerima
                    penting untuk mengosongkan viewsource
                    */
                    setcookie("vsp", "", time() - 3600);
                    include $dir;
                    die();
                }
            }
    }
};

function vsp_init($param,$load_dir){
    if(empty($_COOKIE['vsp'])){
        /*
        set cookie ke kosong, untung menghapus cookie penerima
        penting untuk mengosongkan viewsource
        */
        setcookie("vsp", "", time() - 3600);
        /*
        jika loader set true, tampilkan loader
        */
        if($load_dir == true){include VSP_LOADER;};
        /*
        fungsi refresh untuk kembali ke parameter yang ditentukan,
        */
        header("Refresh:0;url=?$param=load",true,301);
        die();
    }
}
function vsp_kill(){
    /*
    MENDEFINISIKAN SESSION
    */
    session_start();
    /*
    set cookie ke kosong, untung menghapus cookie penerima
    penting untuk mengosongkan viewsource
    */
    setcookie("vsp", "", time() - 3600);
}

function vsp_builder($param,$dir,$load_dir){
    if(isset($_GET[$param])){
        vsp_start(  $param,$dir,$load_dir);
        vsp_init(   $param,$load_dir);
        die();
    }
}

function vsp_default($var,$dir,$redir_url){
    if($dir != 'redirect' && $redir_url == false){
        if($var == true){
            include $dir;
        }
    }elseif($dir == 'redirect' && $redir_url != false){
        header("location: $redir_url");
        die();
    }
}
