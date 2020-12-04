<?php
require __DIR__."/viewsource_clean.php";
/*
kill unwanted cookies
*/
vsp_kill();
/* inspect? */
vsp_inspect(false);
    /*
input loader
*/
vsp_loader(__DIR__."/view/loader.html");
/*
page builder
vsp_builder('type'      ,'patameter' ,'path/url'                     ,true/false);
*/
vsp_builder('load'     ,'home'      ,__DIR__."/view/home.html"      ,true);
vsp_builder('load'     ,'about'     ,__DIR__."/view/about.html"     ,true);
vsp_builder('load'     ,'clean'     ,__DIR__."/view/clean.html"     ,false);
/*
redirect builer
*/
vsp_builder('redirect' ,'google'    ,'https://google.com'           ,false);
/*
vsp default tidak dapat dipakai berulang!
jika digunakan secara berulang akan menimbulkan error!
*/
vsp_default(true        ,"redirect"  ,"home");
/*
kill again
*/
vsp_kill();
