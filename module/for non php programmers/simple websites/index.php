<?php
require __DIR__."/tools/viewsource_clean.php";
vsp_kill();
vsp_inspect(true);
/* input loader */
vsp_loader(__DIR__."/view/loader.html");
/* page builder */
vsp_builder('home',__DIR__."/view/home.html",true);
vsp_builder('about',__DIR__."/view/about.html",true);
vsp_builder('clean',__DIR__."/view/clean.html",false);
vsp_default(true,"redirect","?home=");
vsp_kill();
