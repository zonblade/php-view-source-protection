<?php
function view_source_lock($var,$get_param,$get_value,$view_path,$load,$error){
    session_start();
    if($var == true){
        switch($_GET[$get_param]){
            /*
            ID : untuk case page load
            EN : to initialize load page
            */
            case $get_value:
                if($_SESSION["protect"] != true){
                    /*
                    ID : cek session protectnya
                    EN : checking the session
                    */
                    header("location: ?$get_param=$get_value-load");
                }else{
                    /*
                    ID : include halaman view/controler
                    EN : including the view/controller, as you wish
                    */
                    include $view_path;
                    /*
                    ID :
                    session protectnya cukup sampai sini,
                    agar jika reload akan kembali ke view load
                    ##
                    EN :
                    turning session to false,
                    this is mandatory to protect the view source.
                    */
                    $_SESSION["protect"] = false;
                    die();
                }
                break;
            case $get_value.'-load':
                /*
                ID :
                cek apakah halaman load diaktifkan?
                jika iya set load view dan set time ke 2 detik
                ##
                EN :
                checking if you have inputed the design for the load or not
                if its not it will set refresh value to 0 sec.
                */
                if($load != null){
                    include $load;
                    $time = 2; /* refresh after x sec */
                }else{
                    $time = 0;
                }
                /*
                ID :
                pada case ini session protect diaktifkan
                ##
                EN :
                acivating the session protect
                */
                $_SESSION["protect"] = true;
                header("Refresh:$time;url=?$get_param=$get_value");
                die();
                break;
            default:
                /*
                ID : menambahkan halaman error/404, ini penting
                EN : adding the error/notfound page, this is important
                */
                include $error;
        }
    }else{
        /*
        ID : kalau viewsource protectnya false langsung masuk halaman
        EN : if the protect view turn into false, it will directly gone into the page mentioned, get and param will be ignored.
        */
        include $view_path;
        die();
    }
}
