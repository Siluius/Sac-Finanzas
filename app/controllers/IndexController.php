<?php

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    		    	$this->assets
    	->addCss("css/bootstrap.min.css")
    	->addCss("css/font-awesome.min.css")
    	->addCss("css/superslides.css")
    	->addCss("css/slick.css")
    	->addCss("css/animate.css")
    	->addCss("css/elastic_grid.css")
    	->addCss("https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/css/jquery.circliful.css")
    	->addCss("css/themes/eucalyptus-theme.css")
    	->addCss("css/style.css")
    	->addCss("");

    	$this->assets
    	->addJs("https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js")
    	->addJs("https://maps.googleapis.com/maps/api/js")
    	->addJs("js/jquery.ui.map.js")
    	->addJs("js/wow.min.js")
    	->addJs("js/bootstrap.min.js")
    	->addJs("js/jquery.superslides.min.js")
    	->addJs("js/slick.min.js")
    	->addJs("https://cdn.rawgit.com/pguso/jquery-plugin-circliful/master/js/jquery.circliful.min.js")
    	->addJs("js/modernizr.custom.js")
    	->addJs("js/classie.js")
    	->addJs("js/elastic_grid.min.js")
    	->addJs("js/portfolio_slider.js")
    	->addJs("js/custom.js");


    }

}

