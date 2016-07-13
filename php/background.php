<?php
//get the params

$bg_id    	   = $params->get("bgid", "body");
$bg_image    	   = $params->get("imagebg", "");
$bg_image_two    = $params->get("imagebgtwo", "");
$bg_image_three  = $params->get("imagebgthree", "");
$bg_image_four   = $params->get("imagebgfour", "");
$bg_image_five   = $params->get("imagebgfive", "");
$bg_image_six    = $params->get("imagebgsix", "");
$bg_image_seven  = $params->get("imagebgseven", "");
$bg_gradtop      = $params->get("gradtop", "");
$bg_gradbottom   = $params->get("gradbottom", "");
$bg_position 	   = $params->get("imageposition", "");
$bg_attachment   = $params->get("imageattachment", "");
$bg_repeat       = $params->get("imagerepeat", "");
$bg_color        = $params->get("bgcolor", "");
$bg_customcss    = $params->get("customcss", "");
$bg_importance   = $params->get("importance", "");
$bg_type         = $params->get("bgtype", "");
$spitout           = "";

$urlsniffer     = $params->get("urlsniffer", "");
$browsersniffer = $params->get("browsersniffer", "all");
$browser        = strtolower($_SERVER['HTTP_USER_AGENT']);
$current_domain = JURI::base();
$current_url    = $_SERVER['REQUEST_URI'];
$this_url       = $current_domain.$current_url;

// Change this value if you do not wish to use 'images/' as the root image folder.
$root_image        = "";

global $mainframe;

// Standard background image display
if ($bg_type=="standard") {$spitout = '<style type="text/css">
'.$bg_id.' {background-image: url("'.JURI::base().$root_image.$bg_image.'")'.$bg_importance.'; background-attachment:'.$bg_attachment.''.$bg_importance.'; background-position:'.$bg_position.''.$bg_importance.'; background-repeat:'.$bg_repeat.''.$bg_importance.'; background-color:'.$bg_color.''.$bg_importance.';}
'.$bg_customcss.'</style>'; }

// Multiple background image overlay display
 elseif ($bg_type=="overlay") {
$bg_one = ''; $bg_two = ''; $bg_three = ''; $bg_four = ''; $bg_five = ''; $bg_six = ''; $bg_seven = '';
$bg_one = 'url("'.JURI::base().$root_image.$bg_image.'") ';
if (!empty($bg_image_two)) {$bg_two = ', url("'.JURI::base().$root_image.$bg_image_two.'") ';};
if (!empty($bg_image_three)) {$bg_three = ', url("'.JURI::base().$root_image.$bg_image_three.'") ';};
if (!empty($bg_image_four)) {$bg_four = ', url("'.JURI::base().$root_image.$bg_image_four.'") ';};
if (!empty($bg_image_five)) {$bg_five = ', url("'.JURI::base().$root_image.$bg_image_five.'") ';};
if (!empty($bg_image_six)) {$bg_six = ', url("'.JURI::base().$root_image.$bg_image_six.'") ';}; 
if (!empty($bg_image_seven)) {$bg_seven = ', url("'.JURI::base().$root_image.$bg_image_seven.'")';};
$spitout = '<style type="text/css">'.$bg_id.' {background-image: '.$bg_one.$bg_two.$bg_three.$bg_four.$bg_five.$bg_six.$bg_seven.'; background-attachment: '.$bg_attachment.''.$bg_importance.'; background-position:'.$bg_position.''.$bg_importance.'; background-repeat:'.$bg_repeat.''.$bg_importance.'; background-color:'.$bg_color.''.$bg_importance.';}
'.$bg_customcss.'
</style>';}

// Random background image display
 elseif ($bg_type=="random") {
$randimage = '';
$randfigure = '7';
if ($bg_image_seven == '') {$randfigure = '6';}
if ($bg_image_six == '') {$randfigure = '5';}
if ($bg_image_five == '') {$randfigure = '4';}
if ($bg_image_four == '') {$randfigure = '3';}
if ($bg_image_three == '') {$randfigure = '2';}
if ($bg_image_two == '') {$randfigure = '1';}
$randbg = rand(1, $randfigure);
if ($randbg == 1) {$randimage = JURI::base().$root_image.$bg_image;};
if ($randbg == 2) {$randimage = JURI::base().$root_image.$bg_image_two;};
if ($randbg == 3) {$randimage = JURI::base().$root_image.$bg_image_three;};
if ($randbg == 4) {$randimage = JURI::base().$root_image.$bg_image_four;};
if ($randbg == 5) {$randimage = JURI::base().$root_image.$bg_image_five;};
if ($randbg == 6) {$randimage = JURI::base().$root_image.$bg_image_six;};
if ($randbg == 7) {$randimage = JURI::base().$root_image.$bg_image_seven;};
$spitout = '<style type="text/css">'.$bg_id.' {background-image: url("'.$randimage.'") '.$bg_importance.'; background-attachment: '.$bg_attachment.''.$bg_importance.'; background-position:'.$bg_position.''.$bg_importance.'; background-repeat:'.$bg_repeat.''.$bg_importance.'; background-color:'.$bg_color.''.$bg_importance.';}
'.$bg_customcss.'
</style>';
}

// Daily background image display
 elseif ($bg_type=="daily") {
 $todayimage = ''; $todaybg = date("w");
if ($todaybg == 0) {$todayimage = JURI::base().$root_image.$bg_image;};
if ($todaybg == 1) {$todayimage = JURI::base().$root_image.$bg_image_two;};
if ($todaybg == 2) {$todayimage = JURI::base().$root_image.$bg_image_three;};
if ($todaybg == 3) {$todayimage = JURI::base().$root_image.$bg_image_four;};
if ($todaybg == 4) {$todayimage = JURI::base().$root_image.$bg_image_five;};
if ($todaybg == 5) {$todayimage = JURI::base().$root_image.$bg_image_six;};
if ($todaybg == 6) {$todayimage = JURI::base().$root_image.$bg_image_seven;};
$spitout = '<style type="text/css">'.$bg_id.' {background-image: url("'.$todayimage.'") '.$bg_importance.'; background-attachment: '.$bg_attachment.''.$bg_importance.'; background-position:'.$bg_position.''.$bg_importance.'; background-repeat:'.$bg_repeat.''.$bg_importance.'; background-color:'.$bg_color.''.$bg_importance.';}
'.$bg_customcss.'
</style>';
}

// Gradient
 elseif ($bg_type=="gradient") {
$spitout = '<style type="text/css">'.$bg_id.' { background-color: #'.$bg_gradtop.'; background-color: #'.$bg_gradbottom.'; background-image: -moz-linear-gradient(top, #'.$bg_gradtop.', #'.$bg_gradbottom.'); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#'.$bg_gradtop.'), to(#'.$bg_gradbottom.')); background-image: -webkit-linear-gradient(top, #'.$bg_gradtop.', #'.$bg_gradbottom.');  background-image: -o-linear-gradient(top, #'.$bg_gradtop.', #'.$bg_gradbottom.'); background-image: linear-gradient(to bottom, #'.$bg_gradtop.', #'.$bg_gradbottom.');  background-repeat: repeat-x;   filter: progid:dximagetransform.microsoft.gradient(startColorstr=\'#ff'.$bg_gradtop.'\', endColorstr=\'#ff'.$bg_gradbottom.'\', GradientType=0);} </style>';
}

else {;};
 
// Render to screen

if ($urlsniffer=="")             
   { if ($browsersniffer=="all") { echo $spitout; } 
                                       elseif (ereg($browsersniffer, $browser)) { echo $spitout; };}
elseif (strstr($this_url, $urlsniffer)) 
   { if ($browsersniffer=="all") { echo $spitout; } 
                                       elseif (ereg($browsersniffer, $browser)) { echo $spitout; }; }; 
 ?>