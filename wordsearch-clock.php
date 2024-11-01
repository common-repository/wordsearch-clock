<?php 
/*Plugin Name: Wordsearch Clock Widget
Description: This widget shows a wordsearch style clock
Version: 0.2
Author: Emil J. Khatib
Author URI: http://www.emilkhatib.com
License: GPLv2
*/
?>
<?php


define ('WSC_URL', plugin_dir_url (__FILE__));

class Wordsearch_Clock_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
	
		parent::__construct(
			'wsc_widget', // Base ID
			__( 'Wordsearch Clock Widget', 'wsc' ), // Name
			array( 'description' => __( 'A simple wordsearch clock Widget', 'wsc' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$w = $instance['wsc-width'];
		wp_enqueue_style ('wsc', WSC_URL . '/wordsearch-clock.css');
		$out = "
		<div id='clock-face' style='width:".$w." !important;'>
			<div id='its' class='fixed-text'>IT'S</div><div id='m-half' class='minute'>HALF</div><div id='m-five' class='minute'>FIVE</div><div id='m-a' class='minute'>A</div><div id='m-ten' class='minute'>TEN</div><div id='m-quarter' class='minute'>QUARTER</div>
			<div id='m-twenty' class='minute'>TWENTY</div><div id='m-twentyfive' class='minute'>FIVE</div><div id='m-past' class='minute'>PAST</div><div id='m-to' class='minute'>TO</div><div id='f2' class='filler-text'>IOET</div><div id='h-one' class='hour'>ONE</div>
			<div id='h-two' class='hour'>TWO</div><div id='f3' class='filler-text'>URLT</div><div id='h-three' class='hour'>THREE</div><div id='h-four' class='hour'>FOUR</div><div id='h-five' class='hour'>FIVE</div><div id='h-six' class='hour'>SIX</div>
			<div id='h-seven' class='hour'>SEVEN</div><div id='f4' class='filler-text'>DJT</div><div id='h-eight' class='hour'>EIGHT</div><div id='f5' class='filler-text'>BA</div><div id='h-nine' class='hour'>NINE</div><div id='f6' class='filler-text'>X</div><div id='h-ten' class='hour'>TEN</div>
			<div id='h-eleven' class='hour'>ELEVEN</div><div id='h-twelve' class='hour'>TWELVE</div><div id='f7' class='filler-text'>VDFX</div><div id='oclock' class='fixed-text'>O'CLOCK</div>
		</div>
		<script>
			function showtime(){
			
			
				var d = new Date();
				var hour = d.getHours() % 12;
				var minutes = d.getMinutes();
				var seconds = d.getSeconds();
				// Approximate to nearest 5 minutes
				minutes_rem = minutes % 5; 
				minutes = minutes - minutes_rem;
				if (minutes_rem > 3) {
					minutes = minutes + 5;
				} else if ((minutes_rem == 3) && (seconds > 30)){
					minutes = minutes + 5;
				}
				if (minutes == 60) {minutes=0}
				
				// clear previous hour
				var mact = document.getElementsByClassName('m-active');
				var i;
				for (i = 0; i < mact.length; i++) {
					mact[i].className = 'minute';
				}
				
				
				var hact = document.getElementsByClassName('h-active');
				var i;
				for (i = 0; i < hact.length; i++) {
					hact[i].className = 'hour';
				}
				
				
				var tact = document.getElementsByClassName('t-active');
				var i;
				for (i = 0; i < tact.length; i++) {
					tact[i].className = 'fixed-text';
				}
				
				
				
				switch(minutes) {
					case 0:
						document.getElementById('oclock').className='t-active';
						break;
					case 5:
						document.getElementById('m-five').className='m-active';
						document.getElementById('m-past').className='m-active';
						break;
					case 10:
						document.getElementById('m-ten').className='m-active';
						document.getElementById('m-past').className='m-active';
						break;
					case 15:
						document.getElementById('m-a').className='m-active';
						document.getElementById('m-quarter').className='m-active';
						document.getElementById('m-past').className='m-active';
						break;
					case 20:
						document.getElementById('m-twenty').className='m-active';
						document.getElementById('m-past').className='m-active';
						break;
					case 25:
						document.getElementById('m-twenty').className='m-active';
						document.getElementById('m-twentyfive').className='m-active';
						document.getElementById('m-past').className='m-active';
						break;
					case 30:
						document.getElementById('m-half').className='m-active';
						document.getElementById('m-past').className='m-active';
						break;
					case 35:
						document.getElementById('m-twenty').className='m-active';
						document.getElementById('m-twentyfive').className='m-active';
						document.getElementById('m-to').className='m-active';
						break;
					case 40:
						document.getElementById('m-twenty').className='m-active';
						document.getElementById('m-to').className='m-active';
						break;
					case 45:
						document.getElementById('m-a').className='m-active';
						document.getElementById('m-quarter').className='m-active';
						document.getElementById('m-to').className='m-active';
						break;
					case 50:
						document.getElementById('m-ten').className='m-active';
						document.getElementById('m-to').className='m-active';
						break;
					case 55:
						document.getElementById('m-five').className='m-active';
						document.getElementById('m-to').className='m-active';
						break;
				}
				
				if (minutes>30) {hour = hour +1}
				if (hour == 0) {hour = 12}
				if (hour == 13) {hour = 1}
				console.log(minutes);
				console.log(hour);
				switch (hour) {
					case 1:
						document.getElementById('h-one').className='h-active';
						break;
					case 2:
						document.getElementById('h-two').className='h-active';
						break;
					case 3:
						document.getElementById('h-three').className='h-active';
						break;
					case 4:
						document.getElementById('h-four').className='h-active';
						break;
					case 5:
						document.getElementById('h-five').className='h-active';
						break;
					case 6:
						document.getElementById('h-six').className='h-active';
						break;
					case 7:
						document.getElementById('h-seven').className='h-active';
						break;
					case 8:
						document.getElementById('h-eight').className='h-active';
						break;
					case 9:
						document.getElementById('h-nine').className='h-active';
						break;
					case 10:
						document.getElementById('h-ten').className='h-active';
						break;
					case 11:
						document.getElementById('h-eleven').className='h-active';
						break;
					case 12:
						document.getElementById('h-twelve').className='h-active';
						break;
						
				}
				document.getElementById('its').className='t-active';
				setTimeout(showtime,60*1000);
			}
			
			showtime();
			
		</script>";
		echo $args['before_widget'];
		echo $out;
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
     * TODO: Add decoration options here
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) { 
	// widget form creation
		// Check values
		if(  isset( $instance[ 'wsc-width' ] )) {
			 $wsc_width = esc_textarea($instance['wsc-width']);
		} else {
			 $wsc_width = '17em';
		}
		
     	$f = "<p><label for='".$this->get_field_id('wsc-width')."'>Width:<input class='widefat' id='".$this->get_field_id('wsc-width')."' name='".$this->get_field_name('wsc-width')."' type='text' value='".$wsc_width."' /></label></p>";
    	echo $f;
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
		$instance = $old_instance;
		// Fields
		$instance['wsc-width'] = strip_tags($new_instance['wsc-width']);
		return $instance;
		//update_option('wsc-width', $new_instance['wsc-form-width']);
	}
} 

function wsc_register_widget() {
 
    register_widget( 'Wordsearch_Clock_Widget' );
	//add_option('wsc-width', '17em');
 
}

//function wsc_startdb() {
//	add_option('wsc-width', '17em');
//}

add_action( 'widgets_init', 'wsc_register_widget' );
//register_activation_hook(__FILE__,'wsc_startdb');
?>