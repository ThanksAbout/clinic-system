<?php
class PageAssets {
    private $page_name;

    public function __construct() {
        $this->page_name = basename($_SERVER["SCRIPT_NAME"], ".php");
    }

    public function addScripts() {
        
        echo '<script src="js/bootstrap.bundle.min.js"></script>';
        echo '<script src="js/owl.carousel.min.js"></script>';
        echo '<script src="js/jquery.min.js"></script>';
        echo '<script src="js/custom.js"></script>';

        if ($this->page_name == 'index') {
            echo '<script src="js/scrollspy.min.js"></script>';
        }
    }

    public function addStylesheets() {
        echo '<link rel="stylesheet" href="css/bootstrap.min.css">';
        echo '<link rel="stylesheet" href="css/bootstrap-icons.css">';
        echo '<link rel="stylesheet" href="css/templatemo-medic-care.css">';
        echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
        echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';

        if ($this->page_name == 'index') {
            echo '<link rel="stylesheet" href="css/owl.carousel.min.css">';
            echo '<link rel="stylesheet" href="css/owl.theme.default.min.css">';
        }
    }
}
 ?>