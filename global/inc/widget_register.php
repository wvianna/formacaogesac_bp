<?php
/*
Function Name: Widget Register
Plugin URI: http://xemele.cultura.gov.br/
Version: 0.1
Author: Marcos Maia Lopes
Author URI: http://xemele.cultura.gov.br/
*/

class widget_register extends WP_Widget
{	
	function widget_register()
	{
		$widget_args = array('classname' => 'widget_register', 'description' => __( 'Registre-se') );
		parent::WP_Widget('Registre-se', __('Registre-se'), $widget_args);
	}

	function widget($args, $instance)
	{
		extract($args);
        
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Registre-se' : $instance['title']);
		
		if( !is_user_logged_in() ) :
		
		echo $before_widget
			 .$before_title
			 .$title
			 .$after_title;        
        ?>
        <form id="registerform" action="<?php bloginfo('url'); ?>/register/" method="post">
            <fieldset>
                <div class="formfield">
					<label for="field_1">Nome Completo:</label>
                    <div class="inputDefault"><input id="field_1" type="text" name="field_1" value="Meu nome" /></div>
                    
                    <label for="userLogin_">Nome do usuário:</label>
                    <div class="inputDefault"><input type="text" name="signup_username" id="userLogin_" value="usuário" /></div>
                    
                    <label for="signup_email">E-mail:</label>
                    <div class="inputDefault"><input type="text" id="signup_email" name="signup_email" value="exemplo@exemplo.org" /></div>
                    
                    <label for="signup_password">Senha:</label>
                    <div class="inputDefault"><input type="password" id="signup_password" name="signup_password" value="senha" /></div>
                    
                    <div class="datebox">
                        <label for="field_4_day">Data de nascimento:</label>
                        <label for="field_4_day" class="displayNone">Dia:</label>
                        <select name="field_4_day" id="field_4_day">
                            <option value="">--</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option>
                        </select>
    					<label for="field_4_month" class="displayNone">Mês:</label>
                        <select name="field_4_month" id="field_4_month">
                            <option value="">------</option><option value="January">janeiro</option><option value="February">fevereiro</option><option value="March">março</option><option value="April">abril</option><option value="May">maio</option><option value="June">junho</option><option value="July">julho</option><option value="August">agosto</option><option value="September">setembro</option><option value="October">outubro</option><option value="November">novembro</option><option value="December">dezembro</option>								</select>
    					<label for="field_4_year" class="displayNone">Ano:</label>
                        <select name="field_4_year" id="field_4_year">
                            <option value="">----</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option><option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option><option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option><option value="1905">1905</option><option value="1904">1904</option><option value="1903">1903</option><option value="1902">1902</option><option value="1901">1901</option><option value="1900">1900</option>
                        </select>
                    </div>

                    <button type="submit" name="wp-submit" class="userSubmit submitDefault" tabindex="40">Continuar &raquo;</button>
                </div>
            </fieldset>
        </form>
        <?php
		echo $after_widget;
		endif;
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		if( $instance != $new_instance )
			$instance = $new_instance;
		
		return $instance;
	}

	function form($instance)
	{
	    $title = esc_attr( $instance['title'] );
	?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Título:</label>
				<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" maxlength="26" value="<?php echo $title; ?>" class="widefat" />
			</p>
        <?php
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("widget_register");'));
