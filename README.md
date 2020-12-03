# php-view-source-protection
protect a view source, since f12 and right click can be disabled, so for protecting viewsource this is the way (mandalorian) haha

# viewsource_protect.php
# usage ID
view_source_lock($var,$get_param,$get_value,$view_path,$load,$error);<br>
<b>$var</b> : true/false, kalau true aktif kalau false ya gak aktif,<br>
<b>$get_param</b> : domain.com/?<param>= , nah dapetin param nya ini.<br>
<b>$get_value</b> : domain.com/?<param>=<value>, dapetin valuenya ini,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;contoh kalau halaman mau ditampilkan pada domain.com/?<b>halaman=home</b><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;maka $get_param adalah <i>halaman</i>,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;dan $get_value adalah <i>home</i><br>
    <b>$view_path</b> : path halaman yang ingin ditampilkan<br>
    <b>$load</b> : path tampilan ui load yang ingin ditampilkan, jika ingin dikosongkan harap isi <i>null</i><br>
    <b>$error</b> : path tampilan ui error atau 404, wajib diisi.

# usage EN
view_source_lock($var,$get_param,$get_value,$view_path,$load,$error);

# viewsource_noparam.php
# usage ID
view_source_noparam();

# usage EN
view_source_noparam();

# License
under MIT license
