<?php
function bbcode($msg)
{
//Smileys
$msg = str_replace(':)', '<img src="images/smileys/icon_biggrin.gif" alt=":)" />', $msg);
$msg = str_replace(':D', '<img src="images/smileys/icon_lol.gif" alt=":D" />', $msg);
$msg = str_replace(':love:', '<img src="images/smileys/sm3.gif" alt=":love:" />', $msg);
$msg = str_replace(':o', '<img src="images/smileys/icon_eek.gif" alt=":o" />', $msg);
$msg = str_replace(';)', '<img src="images/smileys/icon_wink.gif" alt=";)" />', $msg);
$msg = str_replace(':cry:', '<img src="images/smileys/icon_cry.gif" alt=":cry:" />', $msg);
$msg = str_replace(':(', '<img src="images/smileys/icon_sad.gif" alt=":(" />', $msg);
$msg = str_replace(';(', '<img src="images/smileys/icon_evil.gif" alt=";(" />', $msg);
$msg = str_replace(':fuck:', '<img src="images/smileys/sm30.gif" alt=":fuck:" />', $msg);
$msg = str_replace(':cool:', '<img src="images/smileys/sm28.gif" alt=":cool:" />', $msg);
$msg = str_replace(':p', '<img src="images/smileys/sm12.gif" alt=":p" />', $msg);
$msg = str_replace(':haha:', '<img src="images/smileys/sm38.gif" alt=":haha:" />', $msg);
$msg = str_replace('[br]', '<br />', $msg);
$msg = str_replace('[hr]', '<hr width=\"100%\" size=\"1\" />', $msg);

//Mise en forme du texte
$msg = preg_replace('`\[g\](.+)\[/g\]`isU', '<strong>$1</strong>', $msg);
$msg = preg_replace('`\[b\](.+)\[/b\]`isU', '<strong>$1</strong>', $msg);
$msg = preg_replace('`\[i\](.+)\[/i\]`isU', '<em>$1</em>', $msg);
$msg = preg_replace('`\[s\](.+)\[/s\]`isU', '<u>$1</u>', $msg);
$msg = preg_replace('`\[u\](.+)\[/u\]`isU', '<u>$1</u>', $msg);
$msg = preg_replace('`\[left\](.+)\[/left\]`isU', '<div style="text-align: left">$1</div>', $msg);
$msg = preg_replace('`\[center\](.+)\[/center\]`isU', '<div style="text-align: center">$1</div>', $msg);
$msg = preg_replace('`\[right\](.+)\[/right\]`isU', '<div style="text-align: right">$1</div>', $msg);
$msg = preg_replace('`\[justify\](.+)\[/justify\]`isU', '<div style="text-align: justify">$1</div>', $msg);
$msg = preg_replace('`\[url\](.+)\[/url\]`isU', '<a href="$1">$1</a>', $msg);
$msg = preg_replace('`\[url\=(.*?)\](.*?)\[/url\]`isU', '<a href="$1">$2</a>', $msg);
$msg = preg_replace('`\[email\](.+)\[/email\]`isU', '<a href="mailto:$1">$1</a>', $msg);
$msg = preg_replace('`\[img\](.+)\[/img\]`isU', '<img src="$1" alt="." border="0" />', $msg);
$msg = preg_replace('`\[size=(.*?)\](.+)\[/size\]`isU', '<span style="font-size: $1;">$2</span>', $msg);
$msg = preg_replace('`\[color=(.*?)\](.+)\[/color\]`isU', '<span style="color: $1;">$2</span>', $msg);
$msg = preg_replace('`\[font=(.*?)\](.+)\[/font\]`isU', '<span style="font-family: $1;">$2</span>', $msg);

//On retourne la variable texte
return $msg;
}
?>