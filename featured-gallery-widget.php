<?php
/*
Plugin Name: Featured Gallery Widget
Plugin URI: http://www.frakmedia.net/wordpress/featured-gallery-widget
Description: Inserts the code needed to display the Featured Content Gallery player into a widgeted area of a Wordpress widget-ready theme... and that's all, folks!
Version: 0.1
Author: J. James Beaudoin (joe@frakmedia.net)
Author URI: http://www.frakmedia.net
License: GPL2
*/

/*  Copyright 2010  J. James Beaudoin / FrakMedia! Productions, LLC  (email : joe@frakmedia.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

// The meat of the plugin

function featured_gallery_init() 
{

     if ( !function_exists('register_sidebar_widget') || !function_exists('register_widget_control') )
    	   return; 

    function featured_gallery_control() 
    {
	
	$blogdomain = get_bloginfo('url');
	$url = $blogdomain.'/wp-admin/options-general.php?page=featured-content-gallery/options.php';
	
		echo 'No configuration of this widget is necessary. To configure the Content Gallery, <a href="'.$url.'">click here.</a>';
    }

	


    /////////////////////////////////////////////////////////////////////////////////////////////////////
    //
    //	OUTPUT CLOCK WIDGET
    //
    /////////////////////////////////////////////////////////////////////////////////////////////////////

     function featured_gallery_clock($args) 
     {

	// Output everything
	
	echo $before_widget;
	
	include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery.php'); // placeholder

	echo $after_widget;
	
    }
  	
    register_sidebar_widget('Featured Gallery Widget', 'featured_gallery_clock');
    register_widget_control('Featured Gallery Widget', 'featured_gallery_control', 245, 300);

}

add_action('plugins_loaded', 'featured_gallery_init');

?>