<?php
 function get_menu(array $pages){
     $menuItems = '';
     foreach ($pages as $page_name => $page_url) {
         $menuItems .= '<li><a href="' . $page_url . '">' . $page_name . '</a></li>'; 
     }   
     return $menuItems;
 }
 
 function add_script(){
     echo $_SERVER["SCRIPT_NAME"]; 
 
     
     $page_name = basename($_SERVER["SCRIPT_NAME"], ".php"); 
 
     echo '<script src="js/bootstrap.bundle.min.js"></script>';
     echo '<script src="js/owl.carousel.min.js"></script>';
     echo '<script src="js/jquery.min.js"></script>';
     echo '<script src="js/custom.js"></script>';
     switch ($page_name) {
         case 'index':
             echo '<script src="js/scrollspy.min.js"></script>';
             break;
         default:
             break;
     }
 }
 function add_stylesheets() {
     $page_name = basename($_SERVER["SCRIPT_NAME"], ".php");
 
     echo '<link rel="stylesheet" href="css/bootstrap.min.css">';
     echo '<link rel="stylesheet" href="css/bootstrap-icons.css">';
     echo '<link rel="stylesheet" href="css/templatemo-medic-care.css">';
     echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
     echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
 
 
     switch ($page_name) {
         case 'index':
             echo '<link rel="stylesheet" href="css/owl.carousel.min.css">';
             echo '<link rel="stylesheet" href="css/owl.theme.default.min.css">';
             break;
         default:
             break;
     }
 }
 ?>