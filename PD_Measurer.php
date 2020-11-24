<?php 
/*

Plugin Name: PD Measurer

Plugin URI: https://www.softprodigy.com/store/woocommerce-pd-measurement-plugin

Description: Woocommerce PD (Pupillary Distance) Measurement Plugin allows your customers to add their PD measurement to their orders when buying eyewear products.

Version: 1.1

Author: Softprodigy Solutions

Author URI:

License: Commercial License

*/



add_action( 'init', 'register_PD_Measurer');



function PD_Measurer_activation() {

     //require('update-notifier.php');

}

add_action('admin_menu', 'pd_plugin_setup_menu');
 
function pd_plugin_setup_menu(){
    add_menu_page( 'PD Measurer', 'PD Measurer', 'manage_options', 'pd-plugin', 'pd_init' );
}
 
function pd_init(){
   echo "<div class='container'>";
    echo "<div class='row'>";
    echo "<h1 style='text-align:center;' class='text-center'>PD MEASURER </h1>";
    echo '<p>Please use this shortcode where you need to implement the PD Measurer Plugin</p>';
    echo "<p>[PD_Measurement_display/]</p>";
    echo "</div>";
      echo "</div>";
}



register_activation_hook(__FILE__, 'PD_Measurer_activation');



function PD_Measurer_deactivation() {}



register_deactivation_hook(__FILE__, 'PD_Measurer_deactivation');



// When unistall Clean database

function PD_Measurer_uninstall(){}

register_uninstall_hook( __FILE__, 'PD_Measurer_uninstall' );



function register_PD_Measurer() {}



// add scripts

add_action('wp_enqueue_scripts', 'PD_Measurer_scripts');



function PD_Measurer_scripts() {

	if ( !is_shop() && !is_product() && !is_home() ) {

    global $post;



    //wp_enqueue_script( 'jquery', plugins_url('/js/jquery.js', __FILE__) );

     wp_enqueue_script('modernizr', plugins_url('js/modernizr.custom.28468.js', __FILE__),array("jquery"));

        // bootstrap



      //  wp_enqueue_script('bootstrap', plugins_url('js/bootstrap.js', __FILE__),array("jquery"));



        wp_enqueue_script('jquery-ui', plugins_url('js/jquery-ui-1.10.3.custom.min.js', __FILE__),array("jquery"));


        wp_enqueue_script('html2canvas', plugins_url('js/html2canvas.js', __FILE__));



        wp_enqueue_script('Canvas2Image', plugins_url('js/Canvas2Image.js', __FILE__));



        wp_enqueue_script('base64', plugins_url('js/base64.js', __FILE__));



	    		    	//   <!-- Default Script call -->

       wp_enqueue_script('jquery.ui.touch-punch', plugins_url('js/jquery.ui.touch-punch.js', __FILE__));
	
       wp_enqueue_script('jquery.Jcrop.min', plugins_url('/assets/js/jquery.Jcrop.min.js', __FILE__));
 //  wp_enqueue_script('jquery.imgpicker', plugins_url('/assets/js/jquery.imgpicker.js', __FILE__));

        wp_enqueue_script('app', plugins_url('./js/app.js', __FILE__));



        // if Internet explorer IE<=8 ( IE fixes)

        if(preg_match('/(?i)msie [1-8]/',$_SERVER['HTTP_USER_AGENT']))

            {

                wp_enqueue_script('responds', plugins_url('js/respond.js', __FILE__));

                wp_enqueue_script('excanvass', plugins_url('js/excanvas.js', __FILE__));

                wp_enqueue_script('html5shim', "http://html5shim.googlecode.com/svn/trunk/html5.js");

            }

            // if Internet explorer IE<=9

            if(preg_match('/(?i)msie [1-9]/',$_SERVER['HTTP_USER_AGENT']))

            {

                wp_enqueue_script('dropfileFix', plugins_url('js/dropfileFix.js', __FILE__));

            }



}

}

//add styles

add_action('wp_enqueue_scripts', 'PD_Measurer_styles');



function PD_Measurer_styles() {

    global $post;
	if ( !is_shop() && !is_product() && !is_home() ) {







		wp_enqueue_style('imgpickers', plugins_url('assets/css/imgpickers.css', __FILE__));



        wp_enqueue_style('bootstrap-responsives', plugins_url('css/bootstrap-responsives.css', __FILE__));



      wp_enqueue_style('font-awesomes', plugins_url('css/font-awesomes.css', __FILE__));



      wp_enqueue_style('animates', plugins_url('css/animates.css', __FILE__));



    wp_enqueue_style('jquery-ui-1.8.17.customs', plugins_url('css/jquery-ui-1.8.17.customs.css', __FILE__));





    //    wp_enqueue_style('pick-a-colors', plugins_url('css/pick-a-color-1.1.7.mins.css', __FILE__));



       wp_enqueue_style('apps', plugins_url('css/apps.css', __FILE__));







      //<!-- HTML5 shim,Responsive design, canvas, fontawesome for IE6-8 support -->









}



}







//add_action('woocommerce_thankyou', 'send_order_pd');



function send_order_pd($order_id) {





	 $_url = get_permalink(get_page_by_title('PD Measurer'));

	 $urlimg=  plugins_url('img/measure_pd.png',__FILE__) ;

	 $urlp = home_url();





		echo"

		<form id='zip_searchx' method='post' action=".$_url.">

		​<textarea id='zipfieldx' name='zipfieldx' rows='5' cols='70' style='display:none;'>$order_id</textarea>

		​<textarea id='zipfieldlx' name='zipfieldlx' rows='5' cols='70' style='display:none;' >$urlp</textarea>

        <input type='image' src='$urlimg' border='0' type='submit' value=''></form><br>";



}





/**

 * Adds a box to the main column on the Post and Page edit screens.

 */

function myplugin_add_meta_box() {



	$screens = array( 'custom_order_option', 'Custom Order Option', 'custom_order_option_cb','shop_order');



	foreach ( $screens as $screen ) {



		add_meta_box(

			'myplugin_sectionid',

			__( 'Pupillary Distance Image:', 'myplugin_textdomain' ),

			'myplugin_meta_box_callback',

			$screen

		);

	}

}

//add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );



/**

 * Prints the box content.

 *

 * @param WP_Post $post The object for the current post/page.

 */

function myplugin_meta_box_callback( $post ) {



	// Add an nonce field so we can check for it later.

	wp_nonce_field( 'myplugin_meta_box', 'myplugin_meta_box_nonce' );



	/*retrieve an existing value of get_post_meta()

	 * Use get_post_meta() to retrieve an existing value

	 * from the database and use the value for the form.

	 */

	$value = get_post_meta( $post->ID, '_my_meta_value_key_new1', true );





	echo '<label for="myplugin_new_field">';

	_e( '', 'myplugin_textdomain' );

	echo '</label> ';

	    $args = array( 'post_type' => 'product');

        $product = new WP_Query( $args ); // get post templates



	if ( ! empty($value) ) {



		echo'

<ul>

     <li>

<a href="'. esc_attr( $value ) .'" download="PD.png" ><b> Download PD Measurement Image</b> </a>

	 </li>

</ul>





';

		}else{



	echo'PD Measurement unavailable for this order :/ ';



             }









}



/**

 * When the post is saved, saves our custom data.

 *

 * @param int $post_id The ID of the post being saved.

 */

function myplugin_save_meta_box_data( $post_id ) {



	/*

	 * We need to verify this came from our screen and with proper authorization,

	 * because the save_post action can be triggered at other times.

	 */



	// Check if our nonce is set.

	if ( ! isset( $_POST['myplugin_meta_box_nonce'] ) ) {

		return;

	}



	// Verify that the nonce is valid.

	if ( ! wp_verify_nonce( $_POST['myplugin_meta_box_nonce'], 'myplugin_meta_box' ) ) {

		return;

	}



	// If this is an autosave, our form has not been submitted, so we don't want to do anything.

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {

		return;

	}



	// Check the user's permissions.

	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {



		if ( ! current_user_can( 'edit_page', $post_id ) ) {

			return;

		}



	} else {



		if ( ! current_user_can( 'edit_post', $post_id ) ) {

			return;

		}

	}



	/* OK, it's safe for us to save the data now. */



	// Make sure that it is set.

	if ( ! isset( $_POST['myplugin_new_field'] ) ) {

		return;

	}



	// Sanitize user input.

	$my_data = sanitize_text_field( $_POST['myplugin_new_field'] );
	// Update the meta field in the database.

	update_post_meta( $post_id, '_my_meta_value_key_new1', $my_data );
}

add_action( 'save_post', 'myplugin_save_meta_box_data' );

// Shortcode to use

add_shortcode("PD_Measurer_display", "PD_Measurer_display");


// Shortcode to use

add_shortcode("PD_Measurement_display", "PD_Measurement_display");





function PD_Measurement_display(){
ob_start();
     // container

	$Xname = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)); // random(ish) 5 character string

	$urlimg =  plugins_url('img/EXP.png',__FILE__) ;

	$urlimg_face_guide =  plugins_url('img/face-size-guide.png',__FILE__) ;

    $marker =  plugins_url('img/navy-blue.png',__FILE__) ;
    
    $marker_red =  plugins_url('img/red.png',__FILE__) ;

  $markerblue = plugins_url('img/blue.png',__FILE__) ;

  $markergreen = plugins_url('img/green.png',__FILE__) ;

  $markerorange = plugins_url('img/orange.png',__FILE__) ;

    $credit_card =  plugins_url('img/rectangle.png',__FILE__) ;
     // add this code to "container-fluid" bellow style="width:185%;"

     
    echo '
         <div class="container-fluid"  >
         <div class="row-fluid content" >';
    //get posts Type
        echo'<div class="span6" style="grids-area:left;width:100%;">';
		echo' 
	  <label style="color:#000;"> Put the <span style="color:#000080;">blue</span> and <span style="color:#FF0000;">red </span> markers on your right and left pupils respectively, and the <span style="color:#793090;">purple</span> marker in the middle of your nose, adjust the <span style="color:#EE161F">red</span> line to the card magnetic tape width</label>
      <label style="color:#000;"> Put the  <span style="color:#56D04C;">green</span> and  <span style="color:#FF7F50;">orange</span> markers on the right and left edges of the glasses respectively, to measure SH</label>';
      echo '  	<div class="designContainer" id="printable">
                    <div class="imageContainerLimit">
                    <div class="span12" id="imagesContainerGs" >
                    </div>
					<div class="span12" id="imagesContainer1" >
                    </div>
                    <div class="span12" id="imagesContainer2" >
                              </div>
					<div class="span12" id="imagesContainerm" >
                    </div>
                    <div class="span12 ui-draggable" id="imagesContainer3" >
                    </div>
                    <div class="span12 ui-draggable" id="imagesContainer4" >
                              </div>
					
					';
                  ?>
        <img id="Tshirtsrc" src="<?php echo $urlimg; ?>" alt="<?php echo  the_title() ?>">

        </div>
        <?php
		$url = home_url();
        echo '</div><hr>
					';
        echo ' </div>'; // /.span6
        echo '<div class="span6" style="grid-area:right;width:100%;">

		<div class="face_guide" style="display:none;">' .$urlimg_face_guide. ' </div>
        <div class="marker" style="display:none;">' .$marker. ' </div>
        <div class="marker_red" style="display:none;">' .$marker_red. ' </div>
        <div class="markerblue" style="display:none;">' .$markerblue. ' </div>
        <div class="markerpurple1" style="display:none;">' .$markerorange. ' </div>
        <div class="markerpurple2" style="display:none;">' .$markergreen. ' </div>
	    <div class="credit_card" style="display:none;">' .$credit_card. ' </div>
  <div class="my_order_id" style="display:none;">'.$_POST['zipfieldx'].'</div>
  <div class="my_site_home_link" style="display:none;">' .$_POST['zipfieldlx']. ' </div>
  <div class="img_saved" style="display:none;"></div>
                    <div class="widget">
                        <div class="widget-header" id="koko">
                        
                        <center>
                            <h3 style="color:#000;">Pupillary Distance & segement height Measurement </h3>
						   </center>
                        </div>
                        <div class="widget-content" style="background-color:#F1F5F1">
		           <div class="span12">

						<div class="ip-modal" id="avatarModal">
		<div class="ip-modal-dialog">
			<div class="ip-modal-content">
				<div class="ip-modal-body">

        <center><button type="button" class="btn btn-primary ip-webcam" style="background: #005bcc;
        border-radius: 5px;">Webcam</button>		</center>
					<div class="alert ip-alert"></div>
						    <div class="ip-preview">
 						    </div>
					<div class="ip-progress">
						<div class="text">Uploading</div>
					</div>
				</div><br>
				<div class="ip-modal-footer">
					<div class="ip-actions">
						<button type="button" class="btn btn-success ip-save" style="display:none">Save Image</button>
						<button type="button" class="btn btn-primary ip-capture" style="display:none">Capture</button>
						<button type="button" class="btn btn-default ip-cancel" style="display:none">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
  <center>
  <div class="span12" > <h3 style="color:#000;"><i class="icon-picture"></i> Upload an image </h3><br>

          <input type="file" id="imgInp" class="span11" name="file" />
  </div ></center>


							<br>
                        <div class="alldivs">
                        <br>
                        
                        <div class = "values_f">
                            <div>
                                <div style="color:#000; top:32%; left:unset;" id="imagesContainerpd" >
                                </div>
                                <div class="ui-draggable"  id="imagesContainerpd2" >
                                </div>
                            </div>

                            <div>
                                <div class="" style="color:#000; top:28%; left:unset;" id="imagesContainerSH" >
                                </div>
                                <div class="ui-draggable"  id="imagesContainerSH2" >
                                </div>
                            </div>
                        </div>
                        
					<BR>
		    <div class="span12 resize_width">

							       <center>     <h3 style="color:#000;"><i class="icon-zoom-in"></i> Adjust the red line width to the card magnetic tape:   </h3>        </center>

                             <!-- Slider to change font size -->

                                 <div class="sliderpom">

                                    <!-- default value -->
                                   

                                     <!-- slider generated by jQuery UI -->

                                     <div class="inc resize button">+</div><input class="slider_value" type="text" value="200"  readonly min="4" max="400"><div class="dec resize button">-</div>

                                 </div>

							</div>
                           <BR><BR><BR>
			<div class="span12 rotate_box">
							     <center>     <h3 style="color:#000;"><i class="icon-repeat"></i> Rotate the red line in case your photo is diagonal:   </h3>        </center>
                                 <div class="slidergx">
                                    <center>       <div class="sizeg"></div>		    </center>
                                    <div class="rotate button rot_left">Left<i class="fa fa-rotate-left"></i></div><input class="deg_value" type="text" value="0" readonly min="-45" max="45"><div class="rotate button rot_right">Right<i class="fa fa-rotate-right"></i></div>
								</div>
											<br>	<br>	<br>
							</div>
	        </div>
				</div>
	';

echo'
	</div>
	</div>
	</div>
	</div>
  </div>
	';

    // preview modal

    echo '

   <div id="convascontent" style="display:none"></div>
   
   
   ';

	   ?>

<script language="JavaScript" type="text/javascript">

jQuery(document).ready(function ($) {

<?php

	$url = home_url();

		?>

var urlx='<?php echo $url ?>';






	        function VoucherSourcetoPrint(source) {

            return "<html><head><script>function step1(){\n" +

                    "setTimeout('step2()', 10);}\n" +

                    "function step2(){window.print();window.close()}\n" +

                    "</scri" + "pt></head><body onload='step1()'>\n" +

                    "<img src='" + source + "' /></body></html>";

        }

        function VoucherPrint(source) {

            Pagelink = "about:blank";

            var pwa = window.open(Pagelink, "_new");

            pwa.document.open();

            pwa.document.write(VoucherSourcetoPrint(source));

            pwa.document.close();

        }



    // Initialise the canvas



     var exportCanvas = document.getElementById('printable');



     var canvasContainer = document.getElementById('convascontent');



            html2canvas(exportCanvas, {



            onrendered: function(canvas) {



                canvasContainer.appendChild(canvas);



            }

        });



		      // Export Design

         $('.saveimge').click(function(){



		  setTimeout(function(){

 $('.saveimge,.pd_cancel,.divhidex').hide();

 $('.Downloadimage,.Down,.sharei,.shareimage,.prin,.printimg ').css('visibility', 'visible');

			 } , 7000);



            $('#printable').find('i').css('visibility', 'hidden');

            $('#printable').find('.ui-icon').css('visibility', 'hidden');

             var exportCanvas = document.getElementById('printable');
             var canvasContainer = document.getElementById('convascontent');



                html2canvas(exportCanvas, {



                onrendered: function(canvas) {



                   $('#convascontent').html(' ');



                    canvasContainer.appendChild(canvas);



                    $('#convascontent').find('canvas').attr('id','mycanvas');





                }

            });

                $('body').append("<div class='overlay'>Saving your image..</div>");



             setTimeout(function(){



                // display options again



                    $('#printable').find('i').css('visibility', 'visible');

                    $('#printable').find('.ui-icon').css('visibility', 'visible');

                    var oCanvas = document.getElementById("mycanvas");

					var canvasData = oCanvas.toDataURL("image/png");



                   	var name='<?php echo $Xname ?>';

					var postData = "canvasData="+canvasData+"&name="+name ;



                    var ajax = new XMLHttpRequest();

                    ajax.open("POST","<?php echo plugins_url('save.php',__FILE__) ?>",true);



                    ajax.setRequestHeader('Content-Type', 'canvas/upload');

                    ajax.onreadystatechange=function()



                    {



                        if (ajax.readyState == 4)



                        {



                            $('.overlay').remove();







	 $('.attach').show('bounce', {}, 800);



     $('.Downloadimage').attr("href", "<?php echo plugins_url('../../uploads/PDS/" + ajax.responseText + "', __FILE__) ?>").attr("download",'<?php echo 'My_image.png'; ?>');



	 $('.img_saved').text( "<?php echo plugins_url('../../uploads/PDS/" + ajax.responseText + "', __FILE__) ?>");


						res =  ajax.responseText;



                        }



                    }



                    ajax.send( postData );

           } , 9000);



        //return false;

       });

       $(".resize").on("click", function() {

            var $button = $(this);
            var oldValue = $(".slider_value").val();
            if ($button.text() == "+" && oldValue != 400) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
            // Don't allow decrementing below zero
            if ($button.text() == "-" && oldValue > 4) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 200;
            }
            }

        $(".slider_value").val(newVal);

});

$(".rotate").on("click", function() {

var $button = $(this);
var oldValue = $(".deg_value").val();
if ($button.text() == "Left" && oldValue != 45) {
    var newVal = parseFloat(oldValue) + 1;
} else {
// Don't allow decrementing below zero
if ($button.text() == "Right" && oldValue > -45 ) {
    var newVal = parseFloat(oldValue) - 1;
} else {
    newVal = 0;
}
}

$(".deg_value").val(newVal);

});








	    $('.pd_cancel').click(function(){

	    $('.navbar').hide('blind', {}, 800);

		$('.Start_Measuring,.ip-webcam').show('blind', {}, 800);

	        });







	    $('.attach').click(function(){

	    var my_pd_img_link=$('.img_saved').text();

		var my_order_id=$('.my_order_id').html();





 $('.alldivs').css('visibility', 'hidden');

 $(".imagespd,.images1,.images,.imagesm").hide();



	// Create our XMLHttpRequest object

    var hr = new XMLHttpRequest();

    // Create some variables we need to send to our PHP file



    var url = urlx+"/my_meta_value_key.php";



    var fn =my_order_id;

    var ln =my_pd_img_link;

    var vars ="lastname="+ln+"&firstname="+fn;

    hr.open("POST", url, true);

    // Set content type header information for sending url encoded variables in the request

    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Access the onreadystatechange event for the XMLHttpRequest object

    hr.onreadystatechange = function() {

   if(hr.readyState == 4 && hr.status == 200) {

   var return_data = hr.responseText;

   document.getElementById("buy").innerHTML = return_data;



   }

    }

    // Send the data to PHP now... and wait for response to update the status div

    hr.send(vars); // Actually execute the request

    document.getElementById("buy").innerHTML = "";



	   });













<?php

	$url = home_url();

		?>

	var urlx='<?php echo $url ?>';

		<?php $urltofile= plugins_url('server/upload_avatar.php',__FILE__) 	?> ;

	var urltofile='<?php echo $urltofile ?>';



	<?php $urltofile1= plugins_url('assets/img/default-avatar.png',__FILE__) 	?> ;

	var urltofile1='<?php echo $urltofile1 ?>';



	<?php $urltofile2= plugins_url('/',__FILE__) ?> ;

	var urltofile2='<?php echo $urltofile2 ?>';






///////////////////////////////////////////
;(function($, window, document, undefined) {

    // Detect XMLHttpRequest support
    $.support.xhrUpload =  !!(window.XMLHttpRequest && window.File && window.FileReader
                                && window.FileList && window.Blob && window.FormData);

    // Detect getUserMedia support
    $.support.getUserMedia = !!(navigator.getUserMedia || navigator.webkitGetUserMedia ||
                                navigator.mozGetUserMedia || navigator.msGetUserMedia);

    // Detect Jcrop support
    $.support.Jcrop = !!$.Jcrop;

    // Detect JPEGCam support
    $.support.Webcam = !!window.Webcam;

    var
    // Plugin name
    pluginName = 'imgPicker',

    // Default plugin options
    defaults = {
        // Upload url (Value Type: string)
        url: 'server/upload.php',

        // DropZone (See Plugin.prototype.init())
        //dropZone: null,

        // Whether crop is enabled (Value Type: boolean)
        crop: true,

        // Aspect ratio of w/h (Value Type: decimal)
        aspectRatio: null,

        // Minimum width/height, use 0 for unbounded dimension (Value Type: array [ w, h ])
        minSize: null,

        // Maximum width/height, use 0 for unbounded dimension (Value Type: array [ w, h ])
        maxSize: null,

        // Set an initial selection area (Value Type: array [ x, y, x2, y2 ])
        setSelect: null,

        // Flash swf url
        swf: 'assets/webcam.swf',

        // Flash swf width/height (Value Type: array [ w, h ])
        swfSize: [470, 350],

        // Custom data to be passed to server (Value Type: object)
        data: {},

        // Messages
        messages: {
            selectimg: 'Please select a image to upload',
            parsererror: 'Invalid response',
            webcamerror: 'Webcam Error: ',
            uploading: 'Uploading...',
            error: 'Unexpected error',
            datauri: 'Cannot locate image format in Data URI',
            webcamjs: 'Flash webcam not found',
            upgrade: 'This feature is not available in this browser',
            loading: 'Loading image...',
            saving: 'Saving...',
            jcrop: 'jQuery Jcrop not found',
            minCropWidth: 'Crop selection requires a minimum width of ',
            maxCropWidth: 'Crop selection exceeds maximum width of ',
            minCropHeight: 'Crop selection requires a height of ',
            maxCropHeight: 'Crop selection exceeds maximum height of ',
            img404: 'Error 404: No image was found'
        },
    },
    // HTML5 webcam stream
    stream,

    // IframeTransport iframe counter
    counter = 0;

    // Plugin constructor
    function Plugin(container, options) {
        this.options   = $.extend({}, defaults, options);
        this.container = $(container);
        this.init();
    }

    // Plugin functions
    Plugin.prototype = {

        // Initialization function
        init: function() {

            // Add click events for the buttons
            this.elem('.ip-upload').on('change', 'input', $.proxy(this.upload, this));
            this.elem('.ip-webcam').on('click', $.proxy(this.webcam, this));
            this.elem('.ip-edit').on('click', $.proxy(this.edit, this));
            this.elem('.ip-delete').on('click', $.proxy(this._delete, this));
            this.elem('.ip-cancel').on('click', $.proxy(this.reset, this));

            if (this.options.dropZone === undefined)
                this.options.dropZone = this.container;

            var self = this,
            trigger  = $('[data-ip-modal="#'+ this.container.attr('id') +'"]');

            if (trigger.length) {
                // Modal events
                this.container.on({
                    'show.ip.modal': function() {
                        self.container.fadeIn(150, function() {
                            $(this).trigger('shown.ip.modal', self);
                        });
                    },
                    'hide.ip.modal': function() {
                        self.container.fadeOut(150, function() {
                            self.reset();
                            $(this).trigger('hidden.ip.modal', self);
                        });
                    }
                });

                // Add click event on the button to open modal
                trigger.on('click', function(e) {
                    e.preventDefault();
                    self.modal('show');
                    self.elem('.ip-close').off().on('click', function() {
                        self.modal('hide');
                    });
                });

                if (this.options.dropZone === undefined)
                    this.options.dropZone = this.elem('.ip-modal-content');
            }

            // Drag & drop upload
            if (this.options.dropZone) {
                this.options.dropZone.on('dragenter', function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                }).on('dragover', function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                }).on('drop', function(e) {
                    e.preventDefault();
                    if (e.originalEvent.dataTransfer.files && e.originalEvent.dataTransfer.files[0]) {
                        self.reset();
                        self.handleFileUpload(e.originalEvent.dataTransfer.files[0]);
                    }
                });
            }

            if (this.options.loadComplete)
                this.load();
        },

        // Modal function, show/hide modal
        modal: function(action) {
            this.container.trigger(action + '.ip.modal');
        },

        // Autoload image from server
        load: function() {
            var self = this;
            $.ajax({
                url: this.options.url,
                dataType: 'json',
                data: {action: 'load', data: this.getData()},
                success: function(response) {
                    self.dispatch('loadComplete', response);
                }
            });
        },

        // Upload init
        upload: function(event) {
            this.reset();

            // Iframe Transport fallback
            if (!$.support.xhrUpload)
                return this.iframeTransport(event);

            // XHR Upload
            if (event.target.files && event.target.files[0])
                this.handleFileUpload(event.target.files[0]);

            $(event.target).val('');
        },

        // Iframe Transport upload
        iframeTransport: function(event) {
            var iframe, form, self = this,
            fileInput = $(event.target),
            parent = fileInput.parent(),
            fileInputClone = fileInput.clone();

            this.dispatch('uploadProgress', 100);

            // Create & add iframe to body
            iframe = $('<iframe name="iframe-transport-'+(counter+1)+'" style="display:none;"></iframe>')
            .appendTo('body')
            .on('load', function() {
                self.dispatch('uploadProgressComplete', function() {
                    try {
                        var response = $.parseJSON( iframe.contents().find('body').html() );
                    } catch(e) {}

                    // Check for response
                    if (response) {
                        self.alert('', 'hide');
                        self.uploadComplete(response);
                    } else
                        self.alert(self.i18n('parsererror'), 'error');

                    // Remove iframe & form
                    setTimeout(function() {
                        iframe.remove(); form.remove();
                        parent.append(fileInputClone);
                    }, 100);
                });
            });

            // Create form
            form = $('<form style="display:none;"><form/>');
            form.prop('method', 'POST');
            form.prop('action', this.options.url);
            form.prop('target', iframe.prop('name'));
            form.prop('enctype', 'multipart/form-data');
            form.prop('encoding', 'multipart/form-data');
            form.prop({action: this.options.url, target: iframe.prop('name')});
            form.append(fileInput);
            form.append('<input type="hidden" name="action" value="upload"/>');

            // Add custom data to the form
            var data = this.getData();
            if (data) {
                $.each(data, function (name, value) {
                    $('<input type="hidden"/>').prop('name', 'data['+name+']').val(value).appendTo(form);
                });
            }

            // Append the form to body and submit
            form.appendTo('body').trigger('submit');
        },

        // Webcam snapshot
        webcam: function() {
            this.reset();

            // Flash webcam fallback
            if (!$.support.getUserMedia)
                return this.flashWebcam();

            // HTML5 Webcam with <video>
            var video = $('<video autoplay></video>');
            this.elem('.ip-preview').html(video);

            var self = this;

            var constraints = { video: true }

            var onSuccess = function (_stream) {
                if ('srcObject' in video[0]) {
                    video[0].srcObject = stream = _stream;
                } else {
                    video.attr('src', window.URL.createObjectURL(stream = _stream));
                }

                self.elem('.ip-preview, .ip-cancel').show();
                self.elem('.ip-capture').on('click', function() {
                    var canvas = document.createElement('canvas'),
                        ctx    = canvas.getContext('2d');

                    canvas.width  = video[0].videoWidth;
                    canvas.height = video[0].videoHeight;
                    ctx.drawImage(video[0], 0, 0);

                    self.reset();
                    self.handleFileUpload( canvas.toDataURL('image/jpeg') );
                }).show();
            }

            var onError = function (error) {
                self.alert(self.i18n('webcamerror') + error.name, 'error');
            }

            if ('mediaDevices' in navigator) {
                navigator.mediaDevices.getUserMedia(constraints)
                    .then(onSuccess)
                    .catch(onError)
            } else {
                navigator.getUserMedia = (navigator.getUserMedia || navigator.webkitGetUserMedia ||
                                       navigator.mozGetUserMedia || navigator.msGetUserMedia);

                navigator.getUserMedia(constraints, onSuccess, onError)
            }
        },

        // Flash webcam fallback
        flashWebcam: function() {
            //if (!$.support.Webcam)
            //  return this.alert(this.i18n('webcamjs'), 'error');

            // Check if browser supports XHR upload
            if (!$.support.xhrUpload)
                return this.alert(this.i18n('upgrade'), 'error');

            var self = this;
            Webcam.error = function() {
                self.elem('.ip-preview').html('');
                return self.alert('Webcam not detected.', 'error');
            };

            this.elem('.ip-preview').html( Webcam.getHtml(this.options.swf, this.options.swfSize) ).show();

            var self = this;
            Webcam.loaded = function() {
                self.elem('.ip-cancel').show();
                self.elem('.ip-capture').on('click', function() {
                    var imageData = Webcam.snap();
                    self.reset();
                    self.handleFileUpload(imageData);
                }).show();
            };
        },


        // Handle file upload
        handleFileUpload: function(file) {
            // Check for file
            if (!file)
                return this.alert(this.i18n('selectimg'), 'error');

            // Check if file is ImageData string
            if (!file.name) {
                if (!file.match(/^data\:image\/(\w+)/))
                    return this.alert(this.i18n('datauri'), 'error');

                var rawImageData = file.replace(/^data\:image\/\w+\;base64\,/, '');
                file = new Blob([this.base64DecToArr(rawImageData)], {type: 'image/jpeg'});
            }

            var self = this;

            this.elem('.ip-upload input, .ip-webcam').prop('disabled', true),

            // Init XHR upload
            xhr = $.ajaxSettings.xhr();
            xhr.open('POST', this.options.url, true);

            // XHR upload progress
            xhr.upload.onprogress = function(e) {
                if (e.lengthComputable) {
                    var percentage = Math.floor((e.loaded / e.total) * 100);
                    self.dispatch('uploadProgress', percentage);
                }
            };

            // XHR upload complete
            xhr.onload = function() { setTimeout(function() {
                self.elem('.ip-upload input, .ip-webcam').prop('disabled', false);
                self.dispatch('uploadProgressComplete', function() {
                    if (xhr.status == 200) {
                        try {
                            var response = $.parseJSON(xhr.responseText);
                        } catch(e) {}

                        // Check for response
                        if (response) {
                            self.alert('', 'hide');
                            return self.uploadComplete(response);
                        }
                    }
                    self.alert(self.i18n('parsererror'), 'error');
                });
            }, 500)};

            // Create form, append file input and custom inputs
            var form = new FormData();
            form.append('action', 'upload');
            form.append('file', file);
            $.each(this.getData(), function(name, val) {
                form.append('data['+name+']', val);
            });

            // Send request
            xhr.send(form);
        },

        // Upload progress
        uploadProgress: function(percentage) {
            this.elem('.ip-progress').fadeIn().find('.progress-bar').css('width', percentage+'%');
        },

        // Upload progress complete
        uploadProgressComplete: function(callback) {
            this.elem('.ip-progress').fadeOut(function() {
                $(this).find('.progress-bar').css('width', '0%');
                callback();
            });
        },

        // Upload complete
        uploadComplete: function(image) {
            // Check for image erro
            if (image.error)
                return this.alert(this.i18n(image.error||'error'), 'error');

            // Dispatch uploadSuccess callback
            this.dispatch('uploadSuccess', image);

            if (this.options.crop)
                this.crop(image);
        },

        // Crop function
        crop: function(image) {
            this.reset();

            // Check if Jcrop exists
            if (!$.support.Jcrop)
                return this.dispatch('alert', this.i18n('jcrop'), 'error');

            var self = this,
            rotation = 0,
            coords,
            updateCoords = function(_coords) { coords = _coords },
            options = {onChange: updateCoords, onRelease: updateCoords, bgColor: 'white'},
            imagePreview = this.options.url + '?action=preview&file=' + image.name + '&width=800';

            var data = this.getData();
            for (var key in data) {
                imagePreview += '&data['+key+']='+data[key];
            }

            var rotate = function(deg) {
                rotation += deg;
                if (Math.abs(rotation) >= 360) rotation = 0;
                loadjcrop(imagePreview+'&rotate='+rotation);
            };

            if (this.options.aspectRatio) options.aspectRatio = this.options.aspectRatio;
            if (this.options.setSelect) options.setSelect = this.options.setSelect;
            if (this.options.minSize) options.minSize = this.options.minSize;
            if (this.options.maxSize) options.maxSize = this.options.maxSize;

            var loadjcrop = function(imagePreview) {
                imagePreview += '&rand=' + new Date().getTime();
                self.alert(self.i18n('loading'), 'loading');

                var tmpImage = new Image();
                tmpImage.onload = function() {
                    self.alert('', 'hide');
                    self.elem('.ip-cancel').show();

                    var img = $('<img src="'+imagePreview+'" style="visibility:hidden;">');
                    self.elem('.ip-preview').html(img);

                    if (Math.abs(rotation) == 90 || Math.abs(rotation) == 270)
                        options.trueSize = [image.height, image.width];
                    else
                        options.trueSize = [image.width, image.height];

                    self.elem('.ip-preview, .ip-rotate, .ip-info, .ip-save').show();

                    img.Jcrop(options);
                };

                tmpImage.onerror = function() { self.alert(self.i18n('img404'), 'error') };
                tmpImage.src = imagePreview;
            };

            loadjcrop(imagePreview);

            // Rotate events
            this.elem('.ip-rotate-ccw').on('click', function() { rotate(-90) }).show();
            this.elem('.ip-rotate-cw').on('click', function() { rotate(90) }).show();

            // Save event
            this.elem('.ip-save').on('click', function() {
                $.ajax({
                    url: self.options.url,
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'crop',
                        image: image.name,
                        coords: coords,
                        rotate: rotation,
                        data: self.getData()
                    },
                    beforeSend: function() {
                        if (!self.validateCrop(coords||{})) return;

                        self.elem('.ip-save').prop('disabled', true);
                        self.alert(self.i18n('saving'), 'loading');
                    },
                    success: function(image) {
                        if (image.error)
                            return self.alert(self.i18n(image.error||'error'), 'error');
                        self.reset();
                        self.setImage(image);
                        self.dispatch('cropSuccess', image);
                    },
                    error: function() { self.alert(self.i18n('parsererror'), 'error') },
                    complete: function() { self.elem('.ip-save').prop('disabled', false) }
                });


            });
        },

        // Crop validation
        validateCrop: function(coords) {
            var  options = this.options;
            if (options.minSize) {
                if (options.minSize[0] && (coords.w||0) < options.minSize[0])
                   return this.alert(this.i18n('minCropWidth')+options.minSize[0]+'px', 'error');

                if (options.maxSize && options.maxSize[0] && (coords.w||0) > options.maxSize[0])
                    return this.alert(this.i18n('maxCropWidth')+options.maxSize[0]+'px', 'error');

                if (options.minSize[1] && (coords.h||0) < options.minSize[1])
                    return this.alert(this.i18n('minCropHeight')+options.minSize[1]+'px', 'error');

                if (options.maxSize && options.maxSize[1] && (coords.h||0) > options.maxSize[1])
                   return this.alert(this.i18n('maxCropHeight')+options.maxSize[1]+'px', 'error');
            }

                    var marker =$('.marker').text();

                var marker_red = $('.marker_red').text();
                var markerblue =$('.markerblue').text();

                var markerpurple1 =$('.markerpurple1').text();
                var markerpurple2 =$('.markerpurple2').text();

                var credit_card = $('.credit_card').text();

        $('.imagespd,.imagesSH').text("");

	 $('.imagespd2,.imagesSH2').text("");

        $('#imagesContainerGs').find('img').remove();

        $('#imagesContainer1').find('img').remove();

        $('#imagesContainerm').find('img').remove();

        $('#imagesContainer2').find('img').remove();

        $('#imagesContainer3').find('img').remove();

        $('#imagesContainer4').find('img').remove();	

        $('#imagesContainerpd').find('.imagespd').remove();

        $('#imagesContainerSH').find('.imagesSH').remove();


         $('#imagesContainerpd2').find('.imagespd2').remove();

                          
        $('#imagesContainerSH2').find('.imagesSH2').remove();

        $('#imagesContainerGs').append("<div class='images' style='z-index:999'><img src="+marker_red+" ></div>");

                          $('#imagesContainer1').append("<div class='images1' style='z-index:999'><img src="+marker+" ></div>");

                          $('#imagesContainer2').append("<div class='images2' style='z-index:999'><img src="+markerblue+" ></div>");

                          $('#imagesContainer3').append("<div class='images3' style='z-index:999'><img src="+markerpurple1+" ></div>");

                          $('#imagesContainer4').append("<div class='images4' style='z-index:999'><img src="+markerpurple2+" ></div>");

                          $('#imagesContainerm').append("<div class='imagesm' style='z-index:999'><img src="+credit_card+" ></div>");

        // $('#imagesContainerpd').append("<div class='imagespd 2112' style='z-index:999; color:#000; width:auto;'></div>");

        // $('#imagesContainerSH').append("<div class='imagesSH 1355' style='z-index:999; color:#000; width:auto;'></div>");
	
	 $('#imagesContainerpd').append("<div class='imagespd' style='z-index:999; color:#000; width:auto;'></div>");

         $('#imagesContainerpd2').append("<div class='imagespd2' style='z-index:999; color:#000; width:auto;'></div>");

        $('#imagesContainerSH').append("<div class='imagesSH' style='z-index:999; color:#56D04C; width:auto;'></div>");

        $('#imagesContainerSH2').append("<div class='imagesSH2' style='z-index:999; color:#FF7F50; width:auto;'></div>");

            return true;
        },

        // Delete action
        _delete: function() {
            if (this.image && this.image.name)
                $.post(this.options.url, {action: 'delete', data: this.getData(), file: this.image.name});

            this.elem('.ip-delete, .ip-edit').hide();
            this.dispatch('deleteComplete');
        },

        // Edit action
        edit: function() {
            if (this.image)
                this.crop(this.image);
        },

        // Set image object
        setImage: function(image) {
            this.image = image;
            this.elem('.ip-delete, .ip-edit').show();
        },

        // Reset everything
        reset: function() {
            this.alert('', 'hide');

            this.elem('.ip-preview').html('').fadeOut();
            this.elem('.ip-save, .ip-capture, .ip-rotate-cw, .ip-rotate-ccw').off().hide();
            this.elem('.ip-cancel, .ip-rotate, .ip-info').hide();

            if (stream) {
                try { stream.getTracks()[0].stop(); } catch (e) { }
                delete stream;
            }
        },

        // Alert function
        alert: function(message, messageType) {
            if (this.options.alert)
                return this.options.alert(message, messageType);

            var alert = this.container.find('.ip-alert');

            if (messageType == 'hide')
                return alert.hide();

            alert.html(message)
                .removeClass(
                    (messageType == 'success' ? 'alert-danger alert-warning' :
                        messageType =='warning' || messageType == 'loading' ?
                            'alert-danger alert-success' :
                                'alert-warning alert-danger')
                )
                .addClass('alert-'+ ( messageType == 'success' ? 'success' :
                            messageType =='warning' || messageType == 'loading' ?
                                'warning' : 'danger')
                ).append( $('<a class="dismiss">&times;</a>').on('click', function() { alert.hide(); }) )
                .show();
        },

        getData: function() {
            if (typeof this.options.data == 'function') {
                return this.options.data();
            }

            return this.options.data;
        },

        // Translation function
        i18n: function(message) {
            return (this.options.messages[message] || message.toString());
        },

        // Get element from container
        elem: function(selector) {
            return this.container.find(selector);
        },

        // Dispatch callbacks
        dispatch: function() {
            var name = arguments[0].replace(/^on/i, ''),
                args = Array.prototype.slice.call(arguments, 1),
                callback = this.options[name] || this[name];

            if (callback) {
                if (typeof(callback) == 'function') {
                    callback.apply(this, args);
                    return true;
                }
            }
            return false;
        },

        // Convert base64 encoded character to 6-bit integer
        b64ToUint6: function(nChr) {
            // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Base64_encoding_and_decoding
            return nChr > 64 && nChr < 91 ? nChr - 65
                : nChr > 96 && nChr < 123 ? nChr - 71
                : nChr > 47 && nChr < 58 ? nChr + 4
                : nChr === 43 ? 62 : nChr === 47 ? 63 : 0;
        },

        // Convert base64 encoded string to Uintarray
        base64DecToArr: function(sBase64, nBlocksSize) {
            // https://developer.mozilla.org/en-US/docs/Web/JavaScript/Base64_encoding_and_decoding
            var sB64Enc = sBase64.replace(/[^A-Za-z0-9\+\/]/g, ""), nInLen = sB64Enc.length,
                nOutLen = nBlocksSize ? Math.ceil((nInLen * 3 + 1 >> 2) / nBlocksSize) * nBlocksSize : nInLen * 3 + 1 >> 2,
                taBytes = new Uint8Array(nOutLen);

            for (var nMod3, nMod4, nUint24 = 0, nOutIdx = 0, nInIdx = 0; nInIdx < nInLen; nInIdx++) {
                nMod4 = nInIdx & 3;
                nUint24 |= this.b64ToUint6(sB64Enc.charCodeAt(nInIdx)) << 18 - 6 * nMod4;
                if (nMod4 === 3 || nInLen - nInIdx === 1) {
                    for (nMod3 = 0; nMod3 < 3 && nOutIdx < nOutLen; nMod3++, nOutIdx++) {
                        taBytes[nOutIdx] = nUint24 >>> (16 >>> nMod3 & 24) & 255;
                    }
                    nUint24 = 0;
                }
            }
            return taBytes;
        }
    };

    // Plugin wrapper, prevents multiple instantiations
    $.fn[pluginName] = function(options) {
        this.each(function() {
            if (!$.data(this, 'plugin_' + pluginName)) {
                $.data(this, 'plugin_' + pluginName, new Plugin(this, options));
            }
        });

        // chain jQuery functions
        return this;
    };

})(jQuery, window, document);


/**
 * JPEGCam (custom)
 * Joseph Huckaby
 * https://code.google.com/p/jpegcam/
 */
window.Webcam = {
    isLoaded: false,
    loaded: null,
    complete: null,
    error: null,

    // Return html to embed webcam.swf flash
    getHtml: function(swf, swfSize) {
        return '<object id="webcam_movie_obj" type="application/x-shockwave-flash" width="'+swfSize[0]+'" height="'+swfSize[1]+'"><param name="allowScriptAccess" value="always"/><param name="allowFullScreen" value="false"/><param name="movie" value="'+swf+'"/><param name="wmode" value="transparent"/><param name="flashvars" value="width='+swfSize[0]+'&height='+swfSize[1]+'&dest_width='+(swfSize[0]*1.5)+'&dest_height='+(swfSize[1]*1.5)+'&image_format=jpeg&jpeg_quality=100&force_flash=false">'+
                '</object>';
    },

    // Send request to webcam.swf
    snap: function() {
        if (!this.isLoaded)
            return alert('JPEGCam ERROR: Movie is not loaded yet');

        var movie = document.getElementById('webcam_movie_obj'),
            rawData = '';

        if (!movie)
            alert('JPEGCam ERROR: Cannot locate movie #webcam_movie_obj in DOM');

        try {
            rawData = 'data:image/jpeg;base64,' + movie._snap();
        } catch (e) {}

        return rawData;
    },

    // webcam.swf will call this function
    flashNotify: function(type, msg) {
        switch (type) {
            case 'flashLoadComplete':
                this.isLoaded = true;
            break;

            case 'cameraLive':
                this.loaded();
            break;

            case 'error':
                this.error(msg);
            break;
        }
    }
};


        $(function() {
    var time = function(){return'?'+new Date().getTime()};

    // Avatar setup
    $('#avatarModal').imgPicker({
      url:urltofile,
      aspectRatio: 1, // Crop aspect ratio
      // Delete callback
      deleteComplete: function() {
        $('#Tshirtsrc').attr('src',urltofile1);
        this.modal('hide');
      },
      // Crop success callback
      cropSuccess: function(image) {
        console.log(image);
        $('#Tshirtsrc').attr('src',urltofile2+image.versions.avatar.url + time());
        this.modal('hide');
      },

      // Send some custom data to server
      data: {
        key: 'value',
      }
    });
  });





});
</script>




  <?php
$out1 = ob_get_contents();
ob_end_clean();
return $out1;

}
