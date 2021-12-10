# php-view-source-protection (devs still active)
Update 17/1/2021 this project still active
this project has slow phase, current phase was stable enough.
NOT FOR HUGE PROJECT, ONLY FOR PERSONAL WEBSITE!

protect a view source, since f12 and right click can be disabled, so for protecting viewsource this is the way (mandalorian) haha

# quick how to use
├&nbsp;index.php (can be anything too)<br>
&nbsp;&nbsp;&nbsp;└ require "<your_OWN_directory>/viewsource_clean.php";<br>
  (can be anywhere in the world lol i mean folder)<br>
```
<?php
require /var/www/html/anywhere/anywhare/viewsource_clean.php;
/*codes here*/
```
<br>

# new version released! Ver 2.0.3 D5 , PHP 7.X
__introducing secure page builder (read the docs)<br>
*__sample websites ready to run__*<br>
https://github.com/zonblade/php-view-source-protection/tree/main/module/for%20non%20php%20programmers/simple%20websites<br><br>
*__Sample Codes__*<br><br>
https://retas.dev/demo_script/viewsource.php?about=load&samplecodes<br>
*__whats new?__*<br>
+ multi param! ?home=show&param2=x&param3=x&and_so_on<br>
+ safer method
+ build in redirect option
+ build in anti rightclick, ctrl+u & f12
<br>

# about this code
this is raw code, edit it as fits your system build with basic logic.<br>
this code was <b><u>intended to protect HTML files</u></b> using simple render tools.
which is usefull for UI/UX demo sites.<br>
<b> developer of this code (me), are still active developing this code, feel free to post an issue or request</b><br>
feel free to modify this code as you need :)

+ why do i even need this if its is cant hide it completely?
you know, view-source is impossible to hide! but now your dream come true! you can hide your viewsource ;)
+ for now this script can only do some trick , but i'm sure there's something else we can do with this logic in the future.

# docs
LANG_ID dokumentasi berbahasa indonesia<br>
https://github.com/zonblade/php-view-source-protection/wiki/(active)-ViewSource-Switch
<br><br>
LANG_EN documentation<br>
soon
<br><br>
live DEMO:<br>
https://retas.dev/demo_script/viewsource.php (no longger available)<br>
latest version (ready to use) check here :<br>
https://github.com/zonblade/php-view-source-protection/releases<br>

# tested browser
+ all modern browsers

# License
under MIT license
+ you can help me improve this code

## Created by 
obviously its me lol,<br>
instagram.com/zonblade

## changelog
+ parameter management (multi parameter);
+ *updated Documentation ID*
+ obliterate viewsource mode added
+ changing the code entirely
+ <b>ADD PARAMETER MANAGEMENT</B>
+ viewsource_protect.php (depreciated, but still exist, please use NOPARAM instead of this)
+ removing only LOAD parameter
+ Adding Load Render fixing Firefox bug.
+ Adding Firefox compability
+ Fixing Firefox compability
