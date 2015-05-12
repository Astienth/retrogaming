<footer>
        <div class='container'>

                <div class='eight columns'>
                        <h5>Some stuff can go here</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>

                <div class='four columns social'>
                        <h5>Social media</h5>
                        <a href='#'><img src='images/social/dribbble.png'></a>
                        <a href='#'><img src='images/social/facebook.png'></a>
                        <a href='#'><img src='images/social/twitter.png'></a>
                        <a href='#'><img src='images/social/forrst.png'></a>
                </div>

                <div class='four columns'>
                        <h5>Get in touch</h5>
                        <p>You can call us at:<br>
                                t: 161 - 123 - CALL - NOW</p>
                        <p>Or drop us a line on:
                                e: <a href='mailto:contact@free.com'>contact@free.com</a></p>
                </div>


        <a id='top' href='#'>&uarr;</a>	
        </div>
</footer>
	<script type="text/javascript">	
		var form = $('form');
	
		$(document).ready(function(){
		    form.validate({
		    	ignore: "",
	            rules: {
	            	'message': {
	                    required: true,	                 
	                },
	            	'name': {
	                    required: true,	                 
	                },
	                'mail': {
	                    required: true,
	                    email: true
	                }			                
	            },
	            errorPlacement: function(error, element){}

		    });
		  });     
	</script>


	<script type="text/javascript">
		var toper = $('a#top');


		$(window).scroll(function(){
            if ($(this).scrollTop() > 100) {
                toper.fadeIn( 200 );
            } else {
                toper.fadeOut( 200 );
            }
        });

         toper.click(function(){
        	$('html, body').animate({scrollTop:0}, 500);	        	
        	return false;
    	}); 
	</script>


</body>
</html>