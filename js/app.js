jQuery(document).ready(function ($) {



        //font size using Slider based on jquery UI sliders


        //font size using Slider based on jquery UI sliders



		   $( "#sliderk" ).slider({

            range: "max", // set range Type

            min: 4, // set a minimum value

            max: 100, //a max value

            value: 32, // default value

            slide: function( event, ui ) { // event onslider

                $( ".size" ).text(ui.value + "px"); // update text on slider

                $('.imagesm img').css( 'height',ui.value); // apply value on text (font-size) using css function (jquery)
         your_credit_card=  $('.imagesm').width();
         var offset_white = $('#imagesContainer1').offset();
           var xPos_white_top = offset_white.top;

         var offset_top = $('#imagesContainer2').offset();
         var xPos_top = offset_top.top;

          var distance_sh = xPos_top - xPos_white_top;
           var SHdis = (distance_sh * 85.6 / your_credit_card).toFixed(1);
            //$('.imagesSH').text("SH: " + SHdis + " mm");
            $('.imagesSH').text("SH for right-eye: " + SHdis + " mm");

                 $('.imagesSH2').text("SH for left-eye: " + SHdis + " mm");
                 var offset_right = $('#imagesContainerGs').position();
                 

                 var xPos_right = offset_right.left;


          
                 var offset_center = $('#imagesContainer2').position();
                 
                 var xPos_center = offset_center.left;

               var distance_px_right = xPos_right - xPos_center  ;
                
                 var PD = (distance_px_right * 85.6 / your_credit_card).toFixed(1);
                 
                //$('.imagespd').text("PD: " + PD + " mm");
                $('.imagespd').text("PD for right-eye: " + PD + " mm");

                var offset_left = $('#imagesContainer1').position();
                 var xPos_left = offset_left.left;

                 var distance_px_left = xPos_center - xPos_left;
                
                 var PD2 = (distance_px_left * 85.6 / your_credit_card).toFixed(1);
                
                $('.imagespd2').text("PD for left-eye: " + PD2 + " mm");

                var total_pd = parseInt(PD) + parseInt(PD2);
                if ( total_pd > 80 || total_pd < 40 ){

                  $('.imagespd').text("Out of range");
                  $('.imagespd2').text("Out of range");

            }


                }

            });



			  $(".resize").on("click", function() {

            console.log('resize working');
          // range: "max", // set range Type

            // min: 4, // set a minimum value

            // max: 400, //a max value

            // value: 200, // default value

           // slide: function( event, ui ) { // event onslider

               // $( '.slider_value' ).text(ui.value + "px"); // update text on slider
               var value =  $(".slider_value").val();
               console.log(value);
               $('.imagesm').css( 'width',value); // apply value on text (font-size) using css function (jquery)
     
            your_credit_card=  $('.imagesm').width();
            var offset_white = $('#imagesContainer1').offset();
              var xPos_white_top = offset_white.top;
     
            var offset_top = $('#imagesContainer3').offset();
            var xPos_top = offset_top.top;
     
             var distance_sh = xPos_top - xPos_white_top;
     
              var SHdis = (distance_sh * 85.6 / your_credit_card).toFixed(1);
     
              //$('.imagesSH').text("SH: " + SHdis + " mm");
              $('.imagesSH').text("SH for right-eye: " + SHdis + " mm");

              var offset_white = $('#imagesContainerGs').offset();
              var xPos_white_top = offset_white.top;
     
            var offset_top = $('#imagesContainer4').offset();
            var xPos_top = offset_top.top;
     
             var distance_sh = xPos_top - xPos_white_top;
     
              var SHdis = (distance_sh * 85.6 / your_credit_card).toFixed(1);

     
                      $('.imagesSH2').text("SH for left-eye: " + SHdis + " mm");
                      var offset_right = $('#imagesContainerGs').position();
                      
     
                      var xPos_right = offset_right.left;
     
     
               
                      var offset_center = $('#imagesContainer2').position();
                      
                      var xPos_center = offset_center.left;
     
                    var distance_px_right = xPos_right - xPos_center  ;
                     
                      var PD = (distance_px_right * 85.6 / your_credit_card).toFixed(1);
                      
                     //$('.imagespd').text("PD: " + PD + " mm");
                     $('.imagespd').text("PD for left-eye: " + PD + " mm");
     
                     var offset_left = $('#imagesContainer1').position();
                      var xPos_left = offset_left.left;
     
                      var distance_px_left = xPos_center - xPos_left;
                     
                      var PD2 = (distance_px_left * 85.6 / your_credit_card).toFixed(1);
                     
                     $('.imagespd2').text("PD for right-eye: " + PD2 + " mm");
     
                     var total_pd = parseInt(PD) + parseInt(PD2);
                     if ( total_pd > 80 || total_pd < 40 ){
     
                       $('.imagespd').text("Out of range");
                       $('.imagespd2').text("Out of range");
     
                 }
     
     
                     //}

            });










			$( ".rotate" ).on("click", function() {

		setTimeout(function(){ 


            // range: "max", // set range Type

            // min: -45, // set a minimum value

            // max: 45, //a max value

            // value: 0, // default value

          //  slide: function( event, ui ) { // event onslider
          slider_value = $(".deg_value").val();

                $( ".deg_value" ).text(slider_value + ' deg '); // update text on slider

 		 var offset_white = $('#imagesContainer1').offset();
              var xPos_white_top = offset_white.top;

            var offset_top = $('#imagesContainer4').offset();
            var xPos_top = offset_top.top;

             var distance_sh = xPos_top - xPos_white_top;
              var SHdis = (distance_sh * 85.6 / your_credit_card).toFixed(1);
               $('.imagesSH2').text("SH for right-eye: " + SHdis + " mm");

               var offset_white = $('#imagesContainerGs').offset();
               var xPos_white_top = offset_white.top;

             var offset_top = $('#imagesContainer3').offset();
             var xPos_top = offset_top.top;

              var distance_sh = xPos_top - xPos_white_top;
               var SHdis = (distance_sh * 85.6 / your_credit_card).toFixed(1);
               
                $('.imagesSH').text("SH for left-eye: " + SHdis + " mm");

                
                 var offset_right = $('#imagesContainerGs').position();
                 var xPos_right = offset_right.left;
                 var offset_center = $('#imagesContainer2').position();
                 var xPos_center = offset_center.left;
                 var distance_px_right = xPos_right - xPos_center  ;
                 var PD = (distance_px_right * 85.6 / your_credit_card).toFixed(1);
                $('.imagespd').text("PD for left-eye: " + PD + " mm");
                
                 var offset_left = $('#imagesContainer1').position();
                 var xPos_left = offset_left.left;
                 var distance_px_left = xPos_center - xPos_left;
                 var PD2 = (distance_px_left * 85.6 / your_credit_card).toFixed(1);
                $('.imagespd2').text("PD for right-eye: " + PD2 + " mm"); 
      var total_pd = parseInt(PD) + parseInt(PD2);
                if ( total_pd > 80 || total_pd < 40 ){

                  $('.imagespd').text("Out of range");
                  $('.imagespd2').text("Out of range");

            }

			$('.imagesm').css({'-webkit-transform' : 'rotate('+slider_value+'deg)',

                 '-moz-transform' : 'rotate('+slider_value+'deg)',

                 '-ms-transform' : 'rotate('+slider_value+'deg)',

                 'transform' : 'rotate('+slider_value+'deg)'});


		}, 0);
                //}

            });

		   // $( ".deg_value" ).text($( "#slidergx" ).slider( "value" ) +   "°"); // get default value from slider and show it to the user





            // function to get image preview on the template we don't need to upload it on the server using this function

            var countImg = 1;

          function readURL(input) {

		 var src = $(this).find('img').attr('src');

            if (input.files && input.files[0]) { // if there is a file from input

                var reader = new FileReader(); // read file

                reader.onload = function (e) { // on load


                          $('#Tshirtsrc').attr('src',e.target.result);



                    countImg ++;



                }

                reader.readAsDataURL(input.files[0]);

            }

        }





                        // load imagesx

                        $("#imgInp").on('change',function(){

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

                          $('#imagesContainerpd2').find('.imagespd2').remove();

                          $('#imagesContainerSH').find('.imagesSH').remove();

                          $('#imagesContainerSH2').find('.imagesSH2').remove();

                          $('#imagesContainerGs').append("<div class='images' style='z-index:999'><img src="+marker_red+" ></div>");

                          $('#imagesContainer1').append("<div class='images1' style='z-index:999'><img src="+marker+" ></div>");

                          $('#imagesContainer2').append("<div class='images2' style='z-index:999'><img src="+markerblue+" ></div>");

                          $('#imagesContainer3').append("<div class='images3' style='z-index:999'><img src="+markerpurple1+" ></div>");

                          $('#imagesContainer4').append("<div class='images4' style='z-index:999'><img src="+markerpurple2+" ></div>");

                          $('#imagesContainerm').append("<div class='imagesm' style='z-index:999'><img src="+credit_card+" ></div>");

                         // $('#imagesContainerpd').append("<div class='imagespd' style='z-index:999; color:#FFFFFF;'></div>");

                         // $('#imagesContainerSH').append("<div class='imagesSH' style='z-index:999; color:#FFFFFF;'></div>");
                           $('#imagesContainerpd').append("<div class='imagespd' style='z-index:999; color:#000; width:auto;'></div>");

                           $('#imagesContainerpd2').append("<div class='imagespd2' style='z-index:999; color:#000; width:auto;'></div>");

                          $('#imagesContainerSH').append("<div class='imagesSH' style='z-index:999; color:#56D04C; width:auto;'></div>");

                          $('#imagesContainerSH2').append("<div class='imagesSH2' style='z-index:999; color:#FF7F50; width:auto;'></div>");
                            readURL(this); // call our function readURL


                        });




                        $('#imgInp').customFileInput({

                            // put button 'browse' on right

                            button_position : 'right'

                        });















        //change Guitar template

        $('.tshirts a').click(function(){

            //get clicked template src

            var src = $(this).find('img').attr('src');

            //apply it on the original image to be edited

            $('#Tshirtsrc').attr('src', src);



            return false;

        });









        // tooltip

       // $('.font-tooltip').tooltip();



        //$('.tooltip-show').tooltip({

        //  selector: "a[data-toggle=tooltip]"

       // });



          var your_credit_card="";
          
          $('#imagesContainer3').draggable({
            drag: function(){

              your_credit_card=  $('.imagesm').width();
              var offset_white = $('#imagesContainerGs').offset();
                var xPos_white_top = offset_white.top;

              var offset_top = $('#imagesContainer3').offset();
              var xPos_top = offset_top.top;

               var distance_sh = xPos_top - xPos_white_top;
                var SHdis = (distance_sh * 85.6 / your_credit_card).toFixed(1);
                
                // $('.imagesSH').text("SH for right-eye: " + SHdis + " mm");

                 $('.imagesSH2').text("SH for left-eye: " + SHdis + " mm");
            }
          });

          $('#imagesContainer4').draggable({
            drag: function(){
              your_credit_card=  $('.imagesm').width();
              var offset_white = $('#imagesContainer1').offset();
                var xPos_white_top = offset_white.top;

              var offset_top = $('#imagesContainer4').offset();
              var xPos_top = offset_top.top;

               var distance_sh = xPos_top - xPos_white_top;
                var SHdis = (distance_sh * 85.6 / your_credit_card).toFixed(1);
                
                 $('.imagesSH').text("SH for right-eye: " + SHdis + " mm");

                // $('.imagesSH2').text("SH for left-eye: " + SHdis + " mm");
            }
          });





                       // set draggable stuff
           $('#imagesContainerGs').draggable({
              drag: function(){

              your_credit_card=  $('.imagesm').width();
              var offset_white = $('#imagesContainerGs').offset();
                var xPos_white_top = offset_white.top;

              var offset_top = $('#imagesContainer3').offset();
              var xPos_top = offset_top.top;

               var distance_sh = xPos_top - xPos_white_top;
                var SHdis = (distance_sh * 85.6 / your_credit_card).toFixed(1);
                
                 $('.imagesSH').text("SH for left-eye: " + SHdis + " mm");

                // $('.imagesSH2').text("SH for left-eye: " + SHdis + " mm");

                 var offset_right = $('#imagesContainerGs').position();
                 

                 var xPos_right = offset_right.left;


          
                 var offset_center = $('#imagesContainer2').position();
                 
                 var xPos_center = offset_center.left;

               var distance_px_right = xPos_right - xPos_center  ;
                
                 var PD = (distance_px_right * 85.6 / your_credit_card).toFixed(1);
                 
                //$('.imagespd').text("PD: " + PD + " mm");
                $('.imagespd').text("PD for left-eye: " + PD + " mm");

                var offset_left = $('#imagesContainer1').position();
                 var xPos_left = offset_left.left;

                 var distance_px_left = xPos_center - xPos_left;
                
                 var PD2 = (distance_px_left * 85.6 / your_credit_card).toFixed(1);
                
                $('.imagespd2').text("PD for right-eye: " + PD2 + " mm");
        		   $('.navbar').show('bounce', {}, 800);
        		//   	$('.Start_Measuring,.ip-webcam').hide();

        			 	$('.attach').hide();
        				$('.saveimge,.pd_cancel').show();

                var total_pd = parseInt(PD) + parseInt(PD2);
                if ( total_pd > 80 || total_pd < 40 ){

                  $('.imagespd').text("Out of range");
                  $('.imagespd2').text("Out of range");

            }
              
                 
        	        }
                    });



                    // set draggable stuff
              $('#imagesContainer2').draggable({
                 drag: function(){

                    your_credit_card=  $('.imagesm').width();
                    var offset_right = $('#imagesContainerGs').position();
                    var xPos_right = offset_right.left;
                    var offset_center = $('#imagesContainer2').position();
                    var xPos_center = offset_center.left;
                    var distance_px_right = xPos_right - xPos_center; 
                    var PD = (distance_px_right * 85.6 / your_credit_card).toFixed(1);
                    $('.imagespd').text("PD for left-eye: " + PD + " mm");

                    var offset_left = $('#imagesContainer1').position();
                    var xPos_left = offset_left.left;
                    var distance_px_left = xPos_center - xPos_left;
                    var PD2 = (distance_px_left * 85.6 / your_credit_card).toFixed(1);
                    $('.imagespd2').text("PD for right-eye: " + PD2 + " mm");

                    var total_pd = parseInt(PD) + parseInt(PD2);
                     if ( total_pd > 80 || total_pd < 40 ){
                        $('.imagespd').text("Out of range");
                        $('.imagespd2').text("Out of range");
            }
           
        }

        });

        			   // set draggable stuff
           $('#imagesContainer1').draggable({
              drag: function(){

              your_credit_card=  $('.imagesm').width();
              var offset_white = $('#imagesContainer1').offset();
                var xPos_white_top = offset_white.top;

              var offset_top = $('#imagesContainer4').offset();
              var xPos_top = offset_top.top;

               var distance_sh = xPos_top - xPos_white_top;
                var SHdis = (distance_sh * 85.6 / your_credit_card).toFixed(1);
                // $('.imagesSH').text("SH: " + SHdis + " mm");
                //$('.imagesSH').text("SH for right-eye: " + SHdis + " mm");

                 $('.imagesSH2').text("SH for right-eye: " + SHdis + " mm");

                 var offset_right = $('#imagesContainerGs').position();
                 var xPos_right = offset_right.left;


          
                 var offset_center = $('#imagesContainer2').position();
                 
                 var xPos_center = offset_center.left;

               var distance_px_right = xPos_right - xPos_center  ;
                
                 var PD = (distance_px_right * 85.6 / your_credit_card).toFixed(1);
                 
                //$('.imagespd').text("PD: " + PD + " mm");
                $('.imagespd').text("PD for left-eye: " + PD + " mm");

                var offset_left = $('#imagesContainer1').position();
                 var xPos_left = offset_left.left;

                 var distance_px_left = xPos_center - xPos_left;
                
                 var PD2 = (distance_px_left * 85.6 / your_credit_card).toFixed(1);
                
                $('.imagespd2').text("PD for right-eye: " + PD2 + " mm");
        		       $('.navbar').show('bounce', {}, 800);
        			   //	 $('.Start_Measuring,.ip-webcam').hide();
        				  	$('.attach').hide();
                $('.saveimge,.pd_cancel').show();
                var total_pd = parseInt(PD) + parseInt(PD2);
                if ( total_pd > 80 || total_pd < 40 ){

                  $('.imagespd').text("Out of range");
                  $('.imagespd2').text("Out of range");

            }


        	      }
                    });

        			   // set draggable stuff
           $('#imagesContainerm').draggable({
               drag: function(){

              your_credit_card=  $('.imagesm').width();
              var offset_white = $('#imagesContainer1').offset();
              var xPos_white_top = offset_white.top;

            var offset_top = $('#imagesContainer4').offset();
            var xPos_top = offset_top.top;

             var distance_sh = xPos_top - xPos_white_top;
              var SHdis = (distance_sh * 85.6 / your_credit_card).toFixed(1);
               $('.imagesSH2').text("SH for right-eye: " + SHdis + " mm");

               var offset_white = $('#imagesContainerGs').offset();
               var xPos_white_top = offset_white.top;

             var offset_top = $('#imagesContainer3').offset();
             var xPos_top = offset_top.top;

              var distance_sh = xPos_top - xPos_white_top;
               var SHdis = (distance_sh * 85.6 / your_credit_card).toFixed(1);
               
                $('.imagesSH').text("SH for left-eye: " + SHdis + " mm");

                
                 var offset_right = $('#imagesContainerGs').position();
                 var xPos_right = offset_right.left;
                 var offset_center = $('#imagesContainer2').position();
                 var xPos_center = offset_center.left;
                 var distance_px_right = xPos_right - xPos_center  ;
                 var PD = (distance_px_right * 85.6 / your_credit_card).toFixed(1);
                $('.imagespd').text("PD for left-eye: " + PD + " mm");
                
                 var offset_left = $('#imagesContainer1').position();
                 var xPos_left = offset_left.left;
                 var distance_px_left = xPos_center - xPos_left;
                 var PD2 = (distance_px_left * 85.6 / your_credit_card).toFixed(1);
                $('.imagespd2').text("PD for right-eye: " + PD2 + " mm"); 

        	    $('.navbar').show('bounce', {}, 800);
        		//  $('.Start_Measuring,.ip-webcam').hide();
        		  	$('.attach').hide();
        				$('.saveimge,.pd_cancel').show();

                var total_pd = parseInt(PD) + parseInt(PD2);
                if ( total_pd > 80 || total_pd < 40 ){

                  $('.imagespd').text("Out of range");
                  $('.imagespd2').text("Out of range");

            }


        	      }
                    });


        	$('#imagesContainerpd, #imagesContainerSH,#imagesContainerpd2,#imagesContainerSH2').draggable();

                setTimeout(function(){

                 if($('#Tshirtsrc').length > 0){

                        var h = $('#Tshirtsrc').height();

                        var w = $('#Tshirtsrc').width();

                        $('.imageContainerLimit').css({

                        'width': w,

                        'height': h

                        })
                    }

                }, 2000);

            });
