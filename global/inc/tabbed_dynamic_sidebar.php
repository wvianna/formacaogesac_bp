<?php
	include_once(ABSPATH .'/wp-includes/widgets.php');

	function tabbed_dynamic_sidebar( $index = 1 ) {

		global $wp_registered_sidebars, $wp_registered_widgets;
		
		$widgets = array();
		
		if ( is_int($index) ) {
			$index = "sidebar-$index";
		} else {
			$index = sanitize_title($index);
			foreach ( (array) $wp_registered_sidebars as $key => $value ) {
				if ( sanitize_title($value['name']) == $index ) {
					$index = $key;
					break;
				}
			}
		}

		$sidebars_widgets = wp_get_sidebars_widgets();
		
		if ( empty($wp_registered_sidebars[$index]) || !array_key_exists($index, $sidebars_widgets) || !is_array($sidebars_widgets[$index]) || empty($sidebars_widgets[$index]) )
			return false;
	
		$sidebar = $wp_registered_sidebars[$index];
		
		foreach ( (array) $sidebars_widgets[$index] as $id ) {
			if ( !isset($wp_registered_widgets[$id]) ) continue;
			
			$option = get_option($wp_registered_widgets[$id]['callback'][0]->option_name);
			
			$title = $option[$wp_registered_widgets[$id]['params'][0]['number']]['title'];
			
			if(empty($title))
				$title = $wp_registered_widgets[$id]['callback'][0]->name;

			$widgets[$wp_registered_widgets[$id]['id']] = $title;
		}

		echo '<ul class="tabs">';
		
		$i = 0;
		
		foreach( $widgets as $value => $key ) {
			$i++;
			
			if($key == 'Entrar' && is_user_logged_in()) {
				echo '<li class="ui-tabs-selected"><a href="#', $value, '">Minha Conta</a></li>';
				
				break;
			} elseif($key == 'Minha Conta' && !is_user_logged_in()) {
                echo '<li class="ui-tabs-selected"><a href="#', $value, '">Entrar</a></li>';
                
                continue;
            }
			
			if($i == 1) {
				echo '<li class="ui-tabs-selected"><a href="#', $value, '">', $key, '</a></li>';
			} else {
				echo '<li><a href="#', $value, '">', $key, '</a></li>';	
			}
		}
		
		echo '</ul>';
		
		$i = 0;
		
		foreach ( (array) $sidebars_widgets[$index] as $id ) {
			$params = array_merge(
				array( array_merge( $sidebar, array('widget_id' => $id, 'widget_name' => $wp_registered_widgets[$id]['name']) ) ),
				(array) $wp_registered_widgets[$id]['params']
			);

			// Substitute HTML id and class attributes into before_widget
			$classname_ = '';
			foreach ( (array) $wp_registered_widgets[$id]['classname'] as $cn ) {
				if ( is_string($cn) )
					$classname_ .= '_' . $cn;
				elseif ( is_object($cn) )
					$classname_ .= '_' . get_class($cn);
			}
			$classname_ = ltrim($classname_, '_');
			
			$i++;
			
			if($i != 1)
				$classname_ .= ' ui-tabs-hide';
			
			$params[0]['before_widget'] = sprintf($params[0]['before_widget'], $id, $classname_);

			$params = apply_filters( 'dynamic_sidebar_params', $params );

			$callback = $wp_registered_widgets[$id]['callback'];
			
			if ( is_callable($callback) ) {
				call_user_func_array($callback, $params);
			}
		}
	}
	
	function has_active_widgets( $index = 1 )
	{
		global $wp_registered_sidebars, $wp_registered_widgets;

		if ( is_int($index) ) {
			$index = "sidebar-$index";
		} else {
			$index = sanitize_title($index);
			foreach ( (array) $wp_registered_sidebars as $key => $value ) {
				if ( sanitize_title($value['name']) == $index ) {
					$index = $key;
					break;
				}
			}
		}

		$sidebars_widgets = wp_get_sidebars_widgets();
		
		if ( empty($wp_registered_sidebars[$index]) || !array_key_exists($index, $sidebars_widgets) || !is_array($sidebars_widgets[$index]) || empty($sidebars_widgets[$index]) )
			return false;

		return true;
	}
?>