<?php
function insertarhc ($atts) { include ( get_stylesheet_directory() .'/PDO_Implement_With_PHP/index.php'); }
add_shortcode ('miphp', 'insertarhc');

function addrecordhc ($atts) { 
    include ( get_stylesheet_directory() .'/PDO_Implement_With_PHP/add-records.php');
 
}
add_shortcode ('addrecord', 'addrecordhc');

function editarhc ($atts) { include ( get_stylesheet_directory() .'/PDO_Implement_With_PHP/edit.php'); }
add_shortcode ('updatehc', 'editarhc');


function deletehiscli ($atts) { include ( get_stylesheet_directory() .'/PDO_Implement_With_PHP/delete.php'); }
add_shortcode ('deletehc', 'deletehiscli');


function boot_css_hc(){
    echo '<link href="'. get_stylesheet_directory_uri() . '/PDO_Implement_With_PHP/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">';
}
add_action('wp_head','boot_css_hc');

?>