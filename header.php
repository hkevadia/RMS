<!Doctype html>
<html>
<head>
<title>RMS</title>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>


$(document).ready(function(){
    $(".badshah").hover(function(){
        
        $(this).hide();
        

    });
});



$(document).ready(function(){
    $(".sm1").hover(function(e){
        $(this).toggleClass('active');
        e.preventDefault();
        },
        function(e)
    {
        $('.sm1').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});
$(document).ready(function(){
    $("#log_in_out").hover(function(e){
        $(this).toggleClass('active');
        $(document).on("click", "#um", function(e)
        {
            $(this).toggleClass('active');
            $('.sm1').slideDown(150);
            $('.sm1').css("z-index","10");
            $('.sm2').css("z-index","10");
            $('.sm3').css("z-index","10");
            $('.badshah').css("z-index","1");
            $('.sm2').hide();
            $('.sm3').hide();
            $('.sm4').hide();

            $('.sm5').hide();

            $('.sm6').hide();

            $('.badshah').show();
            e.stopPropagation();
   
        } );
        e.preventDefault();
        },
        function(e)
    {
        $('.sm1').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});




$(document).ready(function()
{
    $(".sm2").hover(function(e){
        $(this).toggleClass('active');
       
        e.preventDefault();
        },
        function(e)
    {
        $('.sm2').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});

$(document).ready(function()
{
    $("#log_in_out").hover(function(e){
        $(this).toggleClass('active');
        $(document).on("click", "#rm", function(e)
        {
            $(this).toggleClass('active');
            $('.sm2').slideDown(150);
            $('.sm1').css("z-index","10");
            $('.sm2').css("z-index","10");
            $('.sm3').css("z-index","10");
            $('.badshah').css("z-index","1");
            $('.sm1').hide();
            $('.sm3').hide();
            $('.sm4').hide();
            $('.sm5').hide();
            $('.sm6').hide();
            $('.badshah').show();
            e.stopPropagation();
   
        } );
        e.preventDefault();
        },
        function(e)
    {
        $('.sm2').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});

$(document).ready(function()
{
    $(".sm4").hover(function(e){
        $(this).toggleClass('active');
       
        e.preventDefault();
        },
        function(e)
    {
        $('.sm4').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});
$(document).ready(function()
{
    $("#log_in_out").hover(function(e){
        $(this).toggleClass('active');
        $(document).on("click", "#dm", function(e)
        {
            $(this).toggleClass('active');
            $('.sm4').slideDown(150);
            $('.sm1').css("z-index","10");
            $('.sm2').css("z-index","10");
            $('.sm3').css("z-index","10");
            $('.badshah').css("z-index","1");
            $('.sm1').hide();
            $('.sm2').hide();
            $('.sm3').hide();
            $('.sm5').hide();
            $('.sm6').hide();
            $('.badshah').show();
            e.stopPropagation();
   
        } );
        e.preventDefault();
        },
        function(e)
    {
        $('.sm4').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});
/////////
$(document).ready(function()
{
    $(".sm5").hover(function(e){
        $(this).toggleClass('active');
       
        e.preventDefault();
        },
        function(e)
    {
        $('.sm5').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});
$(document).ready(function()
{
    $("#log_in_out").hover(function(e){
        $(this).toggleClass('active');
        $(document).on("click", "#pm", function(e)
        {
            $(this).toggleClass('active');
            $('.sm5').slideDown(150);
            $('.sm1').css("z-index","10");
            $('.sm2').css("z-index","10");
            $('.sm3').css("z-index","10");
            $('.badshah').css("z-index","1");
            $('.badshah').show();
            $('.sm1').hide();
            $('.sm2').hide();
            $('.sm3').hide();
            $('.sm4').hide();
            $('.sm6').hide();
            $('.badshah').show();
            e.stopPropagation();
   
        } );
        e.preventDefault();
        },
        function(e)
    {
        $('.sm5').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});


$(document).ready(function()
{
    $(".sm3").hover(function(e)
    {
        $(this).toggleClass('active');
       
        e.preventDefault();
        },
        function(e)
    {
        $('.sm3').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});
$(document).ready(function(){
    $("#log_in_out").hover(function(e)
    {
        $(this).toggleClass('active');
        $(document).on("click", "#em", function(e)
        {
            $(this).toggleClass('active');
            $('.sm3').slideDown(150);
            $('.sm1').css("z-index","10");
            $('.sm2').css("z-index","10");
            $('.sm3').css("z-index","10");
            $('.badshah').css("z-index","1");
            $('.sm1').hide();
            $('.sm2').hide();
            $('.sm4').hide();
            $('.sm5').hide();
            $('.sm6').hide();
            $(".badshah").show();
            e.stopPropagation();
   
        } );
        e.preventDefault();
        },
        function(e)
    {
        $('.sm3').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});

$(document).ready(function(){
    $("#log_in_out").hover(function(e)
    {
        $(this).toggleClass('active');
        $(document).on("click", "#rp", function(e)
        {
            $(this).toggleClass('active');
            $('.sm6').slideDown(150);
            $('.sm1').css("z-index","10");
            $('.sm2').css("z-index","10");
            $('.sm3').css("z-index","10");
            $('.badshah').css("z-index","1");
            $('.sm1').hide();
            $('.sm2').hide();
            $('.sm3').hide();
            $('.sm4').hide();
            $('.sm5').hide();
            $(".badshah").show();
            e.stopPropagation();
   
        } );
        e.preventDefault();
        },
        function(e)
    {
        $('.sm6').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});
$(document).ready(function()
{
    $(".sm6").hover(function(e)
    {
        $(this).toggleClass('active');
       
        e.preventDefault();
        },
        function(e)
    {
        $('.sm6').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});
////////

$(document).ready(function(){
    $("#username").hover(function(e){
        $(this).toggleClass('active');
       
        e.preventDefault();
        },
        function(e)
    {
        $('#username').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});
$(document).ready(function(){
    $("#log_in_out").hover(function(e){
        $(this).toggleClass('active');
        $(document).on("click", "#fm", function(e)
        {
            $(this).toggleClass('active');
            $('#username').slideDown(150);
            $(".badshah").show();
            $('.badshah').css("z-index","1");
            $('.sm1').hide();
            $('.sm2').hide();
            $('.sm3').hide();
            $('.sm4').hide();
            $('.sm5').hide();
            $('.sm6').hide();
            
            e.stopPropagation();
   
        } );
        e.preventDefault();
        },
        function(e)
    {
        $('#username').slideUp(150);
        $(".badshah").hide();
        e.preventDefault();

    });
});


////////////////////////


$(document).ready(function(){
    $(".f1").hover(function(e){
    	$(this).toggleClass('active');
    	$(this).css("height","30px");
    	$('.f2').css("transform","translate(0px,1px)");
    	
    	$(this).css("opacity","1.0");
    	e.preventDefault();
    	},
    	function(e)
    {
    	$(this).css("height","25px");
    	$('.f2').css("transform","translate(0px,0px)");
    	$(this).css("opacity","0.9");
    	e.preventDefault();

    });
});

$(document).ready(function(){
    $(".c2").hover(function(e){
    	$(this).toggleClass('active');
    	$(this).css("height","30px");
    	$(this).css("opacity","1.0");
    	
    	e.preventDefault();
    	},
    	function(e)
    {
    	$(this).css("height","25px");
    	$(this).css("opacity","0.9");
    	
    	e.preventDefault();

    });
});
$(document).ready(function(){
    $(".c3").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $(this).css("opacity","0.9");
        
        e.preventDefault();

    });
});
$(document).ready(function(){
    $(".c4").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $(this).css("opacity","0.9");
        
        e.preventDefault();

    });
});
$(document).ready(function(){
    $(".c5").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $(this).css("opacity","0.9");
        
        e.preventDefault();

    });
});
$(document).ready(function(){
    $(".c6").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $(this).css("opacity","0.9");
        
        e.preventDefault();

    });
});
$(document).ready(function(){
    $(".f2").hover(function(e){
    	$(this).toggleClass('active');
    	$(this).css("height","30px");
    	$(this).css("opacity","1.0");
    	e.preventDefault();
    	},
    	function(e)
    {
    	$(this).css("height","25px");
    	$(this).css("opacity","0.9");
    	e.preventDefault();

    });
});

$(document).ready(function(){
    $(".d1").hover(function(e){
    	$(this).toggleClass('active');
    	$(this).css("height","30px");
    	$('.d2').css("transform","translate(0px,1px)");
    	$('.d3').css("transform","translate(0px,1px)");
		$('.d4').css("transform","translate(0px,1px)");
    	$(this).css("opacity","1.0");
    	e.preventDefault();
    	},
    	function(e)
    {
    	$(this).css("height","25px");
    	$('.d2').css("transform","translate(0px,0px)");
    	$('.d3').css("transform","translate(0px,0px)");
		$('.d4').css("transform","translate(0px,0px)");
    	$(this).css("opacity","0.9");
    	e.preventDefault();

    });
});

$(document).ready(function(){
    $(".d2").hover(function(e){
    	$(this).toggleClass('active');
    	$(this).css("height","30px");
		$('.d3').css("transform","translate(0px,1px)");
    	$('.d4').css("transform","translate(0px,1px)");
    	$(this).css("opacity","1.0");
        e.preventDefault();
    	},
    	function(e)
    {
    	$(this).css("height","25px");
    	$('.d3').css("transform","translate(0px,0px)");
    	$('.d4').css("transform","translate(0px,0px)");
    	$(this).css("opacity","0.9");
    	e.preventDefault();

    });
});
$(document).ready(function(){
    $(".d3").hover(function(e){
    	$(this).toggleClass('active');
    	$(this).css("height","30px");
		$('.d4').css("transform","translate(0px,1px)");
		$(this).css("opacity","1.0");
    	e.preventDefault();
    	},
    	function(e)
    {
    	$(this).css("height","25px");
		$('.d4').css("transform","translate(0px,0px)");
		$(this).css("opacity","0.9");
    	e.preventDefault();

    });
});
$(document).ready(function(){
    $(".g1").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.g2').css("transform","translate(0px,1px)");
        $('.g3').css("transform","translate(0px,1px)");
        //$('.4').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.g2').css("transform","translate(0px,0px)");
        $('.g3').css("transform","translate(0px,0px)");
        //$('.d4').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});
$(document).ready(function(){
    $(".g2").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.g3').css("transform","translate(0px,1px)");
        //$('.g4').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.g3').css("transform","translate(0px,0px)");
        //$('.d4').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});
$(document).ready(function(){
    $(".g3").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        //$('.4').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        //$('.d4').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});
/*$(document).ready(function(){
    $(".d4").hover(function(e){
    	$(this).toggleClass('active');
    	$(this).css("height","30px");
		$(this).css("opacity","1.0");
    	e.preventDefault();
    	},
    	function(e)
    {
    	$(this).css("height","25px");
		$(this).css("opacity","0.9");
    	e.preventDefault();

    });
});

*/
$(document).ready(function(){
    $(".e1").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.e2').css("transform","translate(0px,1px)");
        $('.e3').css("transform","translate(0px,1px)");
        $('.e4').css("transform","translate(0px,1px)");
        $('.e5').css("transform","translate(0px,1px)");
        $('.e6').css("transform","translate(0px,1px)");
        $('.e7').css("transform","translate(0px,1px)");
        $('.e8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.e2').css("transform","translate(0px,0px)");
        $('.e3').css("transform","translate(0px,0px)");
        $('.e4').css("transform","translate(0px,0px)");
        $('.e5').css("transform","translate(0px,0px)");
        $('.e6').css("transform","translate(0px,0px)");
        $('.e7').css("transform","translate(0px,0px)");
        $('.e8').css("transform","translate(0px,0px)");
         $(this).css("opacity","0.9");      
        
        
        e.preventDefault();

    });
});


$(document).ready(function(){
    $(".e2").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        
        $('.e3').css("transform","translate(0px,1px)");
        $('.e4').css("transform","translate(0px,1px)");
        $('.e5').css("transform","translate(0px,1px)");
        $('.e6').css("transform","translate(0px,1px)");
        $('.e7').css("transform","translate(0px,1px)");
        $('.e8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.e3').css("transform","translate(0px,0px)");
        $('.e4').css("transform","translate(0px,0px)");
        $('.e5').css("transform","translate(0px,0px)");
        $('.e6').css("transform","translate(0px,0px)");
        $('.e7').css("transform","translate(0px,0px)");
        $('.e8').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});


$(document).ready(function(){
    $(".e3").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");   
        $('.e4').css("transform","translate(0px,1px)");
        $('.e5').css("transform","translate(0px,1px)");
        $('.e6').css("transform","translate(0px,1px)");
        $('.e7').css("transform","translate(0px,1px)");
        $('.e8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");       
        $('.e4').css("transform","translate(0px,0px)");
        $('.e5').css("transform","translate(0px,0px)");
        $('.e6').css("transform","translate(0px,0px)");
        $('.e7').css("transform","translate(0px,0px)");
        $('.e8').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});

$(document).ready(function(){
    $(".e4").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.e5').css("transform","translate(0px,1px)");
        $('.e6').css("transform","translate(0px,1px)");
        $('.e7').css("transform","translate(0px,1px)");
        $('.e8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.e5').css("transform","translate(0px,0px)");
        $('.e6').css("transform","translate(0px,0px)");
        $('.e7').css("transform","translate(0px,0px)");
        $('.e8').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});

$(document).ready(function(){
    $(".e5").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.e6').css("transform","translate(0px,1px)");
        $('.e7').css("transform","translate(0px,1px)");
        $('.e8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.e6').css("transform","translate(0px,0px)");
        $('.e7').css("transform","translate(0px,0px)");
        $('.e8').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});

$(document).ready(function(){
    $(".e6").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.e7').css("transform","translate(0px,1px)");
        $('.e8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.e7').css("transform","translate(0px,0px)");
        $('.e8').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});

$(document).ready(function(){
    $(".e7").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.e8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.e8').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});

$(document).ready(function(){
    $(".e8").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});

$(document).ready(function(){
    $(".h3").hover(function(e){
    	$(this).toggleClass('active');
    	$(this).css("height","30px");
    	$('.h2').css("transform","translate(0px,1px)");
    	$('.h1').css("transform","translate(0px,1px)");
    	$(this).css("opacity","1.0");
    	e.preventDefault();
    	},
    	function(e)
    {
    	$(this).css("height","25px");
    	$('.h2').css("transform","translate(0px,0px)");
    	$('.h1').css("transform","translate(0px,0px)");
    	$(this).css("opacity","0.9");
    	e.preventDefault();

    });
});

$(document).ready(function(){
    $(".h1").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $(this).css("opacity","0.9");
        
        e.preventDefault();

    });
});

$(document).ready(function(){
    $(".h2").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $(this).css("opacity","0.9");
        
        e.preventDefault();

    });
});
$(document).ready(function(){
    $(".i1").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.i2').css("transform","translate(0px,1px)");
        $('.i3').css("transform","translate(0px,1px)");
        $('.i4').css("transform","translate(0px,1px)");
        $('.i5').css("transform","translate(0px,1px)");
        $('.i6').css("transform","translate(0px,1px)");
        $('.i7').css("transform","translate(0px,1px)");
        $('.i8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.i2').css("transform","translate(0px,0px)");
        $('.i3').css("transform","translate(0px,0px)");
        $('.i4').css("transform","translate(0px,0px)");
        $('.i5').css("transform","translate(0px,0px)");
        $('.i6').css("transform","translate(0px,0px)");
        $('.i7').css("transform","translate(0px,0px)");
        $('.i8').css("transform","translate(0px,0px)");
         $(this).css("opacity","0.9");      
        
        
        e.preventDefault();

    });
});


$(document).ready(function(){
    $(".i2").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        
        $('.i3').css("transform","translate(0px,1px)");
        $('.i4').css("transform","translate(0px,1px)");
        $('.i5').css("transform","translate(0px,1px)");
        $('.i6').css("transform","translate(0px,1px)");
        $('.i7').css("transform","translate(0px,1px)");
        $('.i8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.i3').css("transform","translate(0px,0px)");
        $('.i4').css("transform","translate(0px,0px)");
        $('.i5').css("transform","translate(0px,0px)");
        $('.i6').css("transform","translate(0px,0px)");
        $('.i7').css("transform","translate(0px,0px)");
        $('.i8').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});


$(document).ready(function(){
    $(".i3").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");   
        $('.i4').css("transform","translate(0px,1px)");
        $('.i5').css("transform","translate(0px,1px)");
        $('.i6').css("transform","translate(0px,1px)");
        $('.i7').css("transform","translate(0px,1px)");
        $('.i8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");       
        $('.i4').css("transform","translate(0px,0px)");
        $('.i5').css("transform","translate(0px,0px)");
        $('.i6').css("transform","translate(0px,0px)");
        $('.i7').css("transform","translate(0px,0px)");
        $('.i8').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});

$(document).ready(function(){
    $(".i4").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.i5').css("transform","translate(0px,1px)");
        $('.i6').css("transform","translate(0px,1px)");
        $('.i7').css("transform","translate(0px,1px)");
        $('.i8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.i5').css("transform","translate(0px,0px)");
        $('.i6').css("transform","translate(0px,0px)");
        $('.i7').css("transform","translate(0px,0px)");
        $('.i8').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});

$(document).ready(function(){
    $(".i5").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.i6').css("transform","translate(0px,1px)");
        $('.i7').css("transform","translate(0px,1px)");
        $('.i8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.i6').css("transform","translate(0px,0px)");
        $('.i7').css("transform","translate(0px,0px)");
        $('.i8').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});

$(document).ready(function(){
    $(".i6").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.i7').css("transform","translate(0px,1px)");
        $('.i8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.i7').css("transform","translate(0px,0px)");
        $('.i8').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});

$(document).ready(function(){
    $(".i7").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.i8').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.i8').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});

$(document).ready(function(){
    $(".i8").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $(this).css("opacity","1.0");
        
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});



</script>
<style type="text/css">

/* Tablet Landscape */
@media screen and (max-width: 1060px) {
    #primary { width:67%; }
    #secondary { width:30%; margin-left:3%;}  
}

/* Tabled Portrait */
@media screen and (max-width: 768px) 
{
    #primary { width:100%; }
    #secondary { width:100%; margin:0; border:none; }
}

table{
font-family: sans-serif;
    font-variant: all;
    font-weight: lighter;
	font-size: 12px;
	color: #2F2f2f;

}
input[type="date"]
{
    border-radius:0;
	border: 1px #2F2f2f;
	box-shadow: 0 0 2px 2px #2F2f2f;
	height: 20px;
	width: 180px;
}
body 
{

//background-image: url('icons/bg.jpg');
    //background-color: #F4F4F4;
    //background-repeat: no-repeat;
    //background-attachment: fixed;
    //background-size: cover;
   
}

#logo
{
	width:70%;
	height: 75px;
	float:left;
	margin:0px 5px 5px -3px;
}
#log_in_out
{
	background-color: #a6a6a6;
	float:left;
	margin:0px 5px 5px -3px;
	width:100% ;
	height: 40px;
    font-family: sans-serif;
        font-weight:lighter;
overflow:hidden;

	
}

#menu
{
	background-color: #808184;
	border-radius: 12px;
	float:left;
	margin:0px 5px 5px -3px;
	width:250px ;
	height: 310px;
    font-family: sans-serif;
        font-weight:lighter;
}

.m1
{
    margin-top: 0px;
    margin-left:10px;
	background-color: #a6a6a6;
	float:left;
	text-align: center;
     font-family: sans-serif;
    
  

	
	width: 125px ;
	height: 28px;
	
	
}
.m2
{
	margin-top: 0px;
    margin-left: 0px;
    background-color: #a6a6a6;
    float:left;
    text-align: center;
    width: 130px ;
    height: 28px;
}
.m3
{
    margin-top: 0px;
    margin-left: -20px;
    background-color: #a6a6a6;
    float:left;
    text-align:center;
    width: 140px;
    height: 28px;
}
.m4
{
    margin-top: 0px;
    margin-left: -10px;
    background-color: #a6a6a6;
    float:left;
    text-align: left;

    

    
    width: 150px ;
    height: 28px;
}
.m5
{
    margin-top: 0px;
    margin-left: -10px;
    background-color: #a6a6a6;
    float:left;
    text-align: center;

    

    
    width: 235px ;
    height: 38px;
}
.m6
{
    margin-top: 0px;
    margin-left: 20px;
    background-color: #a6a6a6;
    float:left;
    text-align: center;
    width: 125px ;
    height: 28px;
}
#user
{
    margin-top: 0px;
    margin-left: 20px;
    background-color: #a6a6a6;
    float:right;
    text-align: right;
    font-family: sans-serif;
display:block;
    
    margin-bottom: -20px;
    
    width: 175px ;
    height: 28px;
}

a{
	color: black;
	text-decoration: none;
	text-align: center;
    //font-weight: 550;
}

p
{
    font-weight: lighter;
}
.sm1
{
    position: absolute;
	display: none;
	/* padding: 15px 15px 0px 15px; */
	height:115px;
	width:150px ;
	float: left;
    z-index: 150;
    margin-top: -12px;
    margin-left: -16px;
    opacity: 0.8;
	 font-family: sans-serif;
}
.sm2
{
    position: absolute;
	display: none;
    /* padding: 15px 15px 0px 15px; */
    height:125px;
    width:158px ;
    float: left;
    z-index: 150;
    margin-top: -12px;
    margin-left: -10px;
    opacity: 0.8;
}
.sm3
{
    position: absolute;
    display: none;
    /* padding: 15px 15px 0px 15px; */
    height:340px;
    width:200px ;
    float: left;
    z-index: 150;
    margin-top: 40px;
    opacity: 0.8;
}
.sm4
{
    position: absolute;
    display: none;
    /* padding: 15px 15px 0px 15px; */
    height:125px;
    width:200px ;
    float: left;
    z-index: 150;
    margin-top: -12px;
    margin-left: -40px;
    opacity: 0.8;

}
.sm5
{
    position: absolute;
    display: none;
    /* padding: 15px 15px 0px 15px; */
    height:140px;
    width:200px ;
    float: left;
    z-index: 150;
    margin-top: -12px;
    margin-left: 20px;
    opacity: 0.8;

}
.sm6
{
    position: absolute;
    display: none;
    /* padding: 15px 15px 0px 15px; */
    height:220px;
    width:200px ;
    float: left;
    z-index: 150;
    margin-top: 40px;
    opacity: 0.8;
    margin-left: -30px;

}
#username
{
   display: none;
    position: absolute;
    /* padding: 15px 15px 0px 15px; */
    height:70px;
    width:230px ;
    float: right;
    z-index:100;
     margin-top: 20px;
    margin-left: -6px;
    opacity: 0.8;
     font-family: sans-serif;
    font-weight: lighter;
    position: center;

}

/*.c1
{
	background-color: #8c8c8c;
	height: 25px;
	width:130px ;
    text-align: center;
	
	margin: 1px 0 1px 0;
	padding: 15px 0 5px 0;
}*/
.c2
{
     opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:158px ;
    text-align: center;
    margin: 1px 0 1px 0;
    padding: 5px 0 5px 0;
}
.c3
{
   

    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:158px ;
    text-align: center;
    margin: 4px 0 1px 0;
    padding: 5px 0 5px 0;
}
.c4
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:158px ;
    text-align: center;
    margin: 1px 0 1px 0;
    padding: 5px 0 5px 0;
}
.c5
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:158px ;
    text-align: center;
    margin: 1px 0 1px 0;
    padding: 5px 0 5px 0;
}
.c6
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:158px ;
    text-align: center;
    margin: 1px 0 1px 0;
    padding: 5px 0 5px 0;
}
/*.c3
{
	background-color: #8c8c8c;
	height: 25px;
	width:130px ;
	text-align: center;
	margin: 1px 0 1px 0;
	padding: 5px 0 5px 0;
}*/
.d1
{
    opacity:0.9;
	background-color: #ff751a;
    height: 25px;
    width:190px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
    margin-top: 4px;
}
.d2
{
    opacity:0.9;
	background-color: #ff751a;
    height: 25px;
    width:158px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.d3
{
    opacity:0.9;
	background-color: #ff751a;
    height: 25px;
    width:158px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
/*.d4
{
    opacity:0.9;
	background-color: #ff751a;
    height: 25px;
    width:158px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}*/
.g1
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:190px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
    //margin-top: 4px;
}
.g2
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:190px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
   
}
.g3
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 1px 5x 0px 0;
    padding: 5px 0 5px 0;
    
}
.e1
{
     opacity:0.9;
	background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
    margin-top: 2px;
}
.e2
{
     opacity:0.9;
	background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.e3
{
    opacity:0.9;
	background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.e4
{
    opacity:0.9;
	background-color: #ff751a;
    height: 30px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.e5
{
    opacity:0.9;
	background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.e6
{
    opacity:0.9;
	background-color: #ff751a;
    height: 30px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.e7
{
    opacity:0.9;
	background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.e8
{
    opacity:0.9;
	background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}

.f1
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:180px ;
    text-align: center;
    margin: 5px 0 1px 0;
    padding: 5px 0 5px 0;
    z-index: 10;
}
.f2
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:180px ;
    text-align: center;
    margin: 2px 0 1px 0;
    padding: 5px 0 5px 0;
    z-index: 10;
}

.h1
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.h2
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 1px 0 1px 0;
    padding: 5px 0 5px 0;
}
.h3
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 10px 5x 0px 0;
    padding: 5px 0 5px 0;
    margin-top:4px;
}
.i1
{
     opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
    margin-top: 2px;
}
.i2
{
     opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.i3
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.i4
{
    opacity:0.9;
    background-color: #ff751a;
    height: 30px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.i5
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.i6
{
    opacity:0.9;
    background-color: #ff751a;
    height: 30px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.i7
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.i8
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
/*a:hover
{
	color: white;
}*/
div .m1:hover 
{
    color: #ffffff;
}
div .m2:hover 
{
    color: #ffffff;
}
div .m3:hover 
{
    color: #ffffff;
}
div .m4:hover 
{
    color: #ffffff;
}
div .m5:hover 
{
    color: #ffffff;
}
div .m6:hover 
{
    color: #ffffff;
}

.button
{
	color:white;
	background-color: #000000;
	font-family: sans-serif;
    font-variant: all;
    font-weight: lighter;
	border-color: #2F2f2f;
	height: 25px;
	width: 90px;
	font-size: 15px;
    opacity: 0.7;
        
}
 .b
{
    color:white;
    background-color: #000000;
 font-family: sans-serif;
    font-variant: all;
    font-weight: lighter;
    border-color: #2F2f2f;
    height: 25px;
    width: 140px;
    font-size: 18px;
    opacity: 0.7;
}
.button:hover
{
	background-color: #808184;
	border-color: #808184;
}
.button1
{
	color:white;
	background-color: #000000;
	font-family: sans-serif;
    font-variant: all;
    font-weight: lighter;
	border-color: #2F2f2f;
	height: 30px;
	width: 80px;
	font-size: 15px;
    opacity: 0.7;
}
.button1:hover
{
	background-color: #808184;
	border-color: #808184;
}
.font
{	
    font-family: sans-serif;
    font-variant: all;
    font-weight: lighter;
	font-size: 12px;
	color: #2F2f2f;

}
.textbox
{
	//border-radius: 5px;
	border: 1px #2F2f2f;
	box-shadow: 0 0 2px 2px #2F2f2f;
	height: 20px;
	width: 180px;
}
.tex
{
    //border-radius: 5px;
    border: 1px #2F2f2f;
    box-shadow: 0 0 2px 2px #2F2f2f;
    height: 20px;
    width: 130px;
}
.textbox1
{
	//border-radius: 5px;
	border: 1px #2F2f2f;
	box-shadow: 0 0 2px 2px #2F2f2f;
	height: 50px;
	width: 180px;
}
.textbox2
{
	//border-radius: 5px;
	border: 1px #2F2f2f;
	box-shadow: 0 0 2px 2px #2F2f2f;
	height: 20px;
	width: 160px;
}
.error
{
	color: red;
	font-size: 16px;
}


.t6
{
    width: 75%;
    border-color: #2f2f2f;
    border-style: solid;
    padding: -2px -2px -2px -2px;
    border-spacing: 0px;
    border-width: 2px;

}
.t6 tr
{
    border-color: #2f2f2f;
    border-style: solid;
    border:1px ;
}
.t6 th
{
    border-color: #2f2f2f;
    border-style: solid;
    background-color: #f37123;
    border:1px;
    color: black;
    padding-left: 10px;
    height: 30px;
    margin-top: -10px;
    //opacity: 0.8;
    //border-width: 2px;
    
    
}
.t6 td
{
    width: 7%;
    white-space: nowrap;
    border-color: #2f2f2f;
    border-style: solid;
    border:none;
    padding-left: 10px;
    border-left: 5px solid transparent;
    border-top: 4px solid transparent;
    border-bottom: 4px solid transparent;
    
    //border:1px solid;
}


.t6 input[type="text"] 
{
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}

.t6 input[type="date"] 
{
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}

.t6 select 
{
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}

.t6 textarea 
{
     width: 100%; 
     box-sizing: border-box;
     -webkit-box-sizing:border-box;
     -moz-box-sizing: border-box;
}

.t6 td:first-child
{
    text-align:left;
}

.t1
{
    width: 75%;
    border-color: #2f2f2f;
    border-style: solid;
    padding: -2px -2px -2px -2px;
    border-spacing: 0px;
    border-width: 2px;

}
.t1 tr
{
    border-color: #2f2f2f;
    border-style: solid;
}
.t1 th
{
    border-color: #2f2f2f;
    border-style: solid;
    background-color: #f37123;
    color: black;
    padding-left: 10px;
    height: 30px;
    margin-top: -10px;
    //opacity: 0.8;
    //border-width: 2px;
    
    
}
.t1 td
{

    border-color: #2f2f2f;
    border-style: solid;
    border:none;
    padding-left: 10px;
    border-left: 1em solid transparent;
    border-top: 1em solid transparent;
    border-bottom: 10px solid transparent;
    width: 30px;
}

.t2 tr:nth-child(even) {background: #CCC}
.t2 tr:nth-child(odd) {background: #e6e6e6}

.t2
{
    //margin-top: 30px;
    width: 100%;
    border-color: #2f2f2f;
    //border-style: solid;
    //padding: -2px -2px -2px -2px;
    //border-spacing: 0px;
    //border-width: 2px;
    border-collapse: collapse;

}
.t2 tr
{
    border-color: #2f2f2f;
    //border-style: solid;
    //border-right: 1px solid;
    align :center;
 
}
.t2 th
{
    border:none;
    border-color: #2f2f2f;
    //border-style: solid;
    background-color: #f37123;
    color: black;
    padding-left: 10px;
    height: 30px;
    margin-top: -10px;
    //opacity: 0.8;
    //border-width: 2px;
    font-weight: lighter;
    
    
}
.t2 td
{
    border-color: #2f2f2f;
    //border-style: solid;
    border:none;
    //padding-left: 2px;
    //border-left: 1em solid transparent;
    //border-top: 1em solid transparent;
    //border-bottom: 10px solid transparent;
    //width: 10px;
    //border-right: 1px solid;
    //border-left: 1px solid;
    text-align: center;
    //border: all;
    height:27px;

}

.t2 td > p
{
    margin:-10px 0 -10px 0;

}

.t2 .tb2
{
    width:150px;
    align : center;
}
.t3  tr:nth-child(even) {background: #CCC}
.t3 tr:nth-child(odd) {background: #e6e6e6}

.t3
{
    z-index: -1;
    //margin-top: 30px;
    width: 100%;
    border-color: #2f2f2f;
    //border-style: solid;
    //padding: -2px -2px -2px -2px;
    //border-spacing: 0px;
    //border-width: 2px;
    border-collapse: collapse;

}
.t3 tr
{
    border-color: #2f2f2f;
    height: -30px;
    //margin: -20px 0 -20px 0;
    //border-style: solid;
    //border-right: 1px solid;
    align :center;
}
.t3 tr
{
    margin: -20px 0 -20px 0;
}
.t3 th
{
    border:none;
    border-color: #2f2f2f;
    //border-style: solid;
    background-color: #f37123;
    color: black;
    //padding-left: 10px;
    height: 30px;
    //margin-top: -10px;
    //opacity: 0.8;
    //border-width: 2px;
    font-weight: lighter;
    text-align: left;
    
    
}
.t3 td
{
    border-color: #2f2f2f;
    //border-style: solid;
    border: none  ;
   // border: 9px 0px 9px 0px;
    //padding-left: 2px;
    height: 27px;
    //width: 9px;
    //border-right: 1px solid;
    //border-left: 1px solid;
    text-align: left;
    //border: all;
}
.t3 td:first-child
{
    text-align: center;
}
.t3 th:first-child
{
    text-align: center;
}
.t3 .tb3
{
    width:200px;
    align : center;
}
.t3 td 
{
    margin:0;
    padding:0;

}
.t3 td > p
{
    margin:0;
    padding:0;

}
.t4
{
    width: 35%;
    border-color: #2f2f2f;
    border-style: solid;
    padding: -2px -2px -2px -2px;
    border-spacing: 0px;
    border-width: 2px;

}
.t4 tr
{
    border-color: #2f2f2f;
    border-style: solid;
}
.t4 th
{
    border-color: #2f2f2f;
    border-style: solid;
    background-color: #f37123;
    color: black;
    padding-left: 10px;
    height: 30px;
    margin-top: -10px;
    //opacity: 0.8;
    //border-width: 2px;
    
    
}
.t4 td
{

    border-color: #2f2f2f;
    border-style: solid;
    border:none;
    padding-left: 10px;
    border-left: 1em solid transparent;
    border-top: 1em solid transparent;
    border-bottom: 10px solid transparent;
    width: 30px;
}
.t5
{
    width: 50%;
    border-color: #2f2f2f;
    border-style: solid;
    padding: -2px -2px -2px -2px;
    border-spacing: 0px;
    border-width: 2px;

}
.t5 tr
{
    border-color: #2f2f2f;
    border-style: solid;
}
.t5 th
{
    border-color: #2f2f2f;
    border-style: solid;
    background-color: #f37123;
    color: black;
    padding-left: 10px;
    height: 30px;
    margin-top: -10px;
}   
    
.t5 td
{

    border-color: #2f2f2f;
    border-style: solid;
    border:none;
    padding-left: 10px;
    border-left: 15px solid transparent;
    border-top: 17px solid transparent;
    border-bottom: 2px solid transparent;

    width: 30px;
}
.t5 td:first-child {text-align: right;}


.patiya
{
    margin-left: -10px;
    color:white;
    background-color: #000000;
    //border-radius: 5px;
   font-family: sans-serif;
    font-variant: all;
    font-weight: lighter;
	border-color: #2F2f2f;
	height: 25px;
	width: 90px;
	font-size: 15px;
    opacity: 0.7;
}

#hh
{
    margin-top: 40px;
}

.ig
{
    height:20px;
    width:25px;
}

.lg 
{ 
    text-indent:-9999em; border:0; height:25px; width:30px; background: url('icons/save1.png') no-repeat 0 0 ; 
}

.badshah
{
    position: absolute;
    width:99%;
    height: 85.7%;
    background-color: #000000;
    opacity:0.8;
    margin-top:40px;
    display:none;
    background-size:cover;
    overflow-y: hidden;
    z-index: 1;

}
#dm
{
    font-weight: lighter;
}
#pm
{
    font-weight: lighter;
}
#rp
{
    font-weight: lighter;
}

</style>
</head>
<body >
	<header>
		
		<div id="logo">
		<img src="icons/Logo.png" width="200px" height="75px" />
		</div>
		<div id="log_in_out">
			<a href="../Admin/home.php" title="Home"><img src="icons/home.png" style="float:left; height:30px; width:30px; margin:5px 10px 0px 15px; " /></a>


        <div class="m1"> 
           <a href="#"><p id="um"> RESOURCE</p></a>
          <!--  <img src="icons/user.png" style="float:right; height:40px; width:40px; margin:5px 5px 5px 5px; "/> -->
            <div class="sm1">
            <!--<div class="c1"><a href="../Admin/chngpass.php"  >Change Password</a></div>
            
            <div class="c3"><a href="../Admin/logout.php">Log Out</a></div>-->
            
            <div class="c3"><a href="../Admin/rescreate.php" >Create Resource</a></div>
            <div class="c2"><a href="../Admin/createuser.php" >Allocate User</a></div>
           <!-- <div class="c4"><a href="../Admin/resupdt.php" >Update Resource</a></div>
            <div class="c5"><a href="../Admin/resdisable.php">Disable Resource</a></div>-->
            <div class="c6"><a href="../Admin/linkemp.php">Employee Details</a></div>
            </div>
        </div>

        <div class="m2"> 
           <a href="#"> <p id= "rm">SOW</p></a>
            <!--<img src="icons/Human_resource_icons-14-512.png" style="float:right; height:40px; width:40px; margin:5px 5px 5px 0px; "/>-->
            <div class="sm2">
            <div class="d1"><a href="../Admin/sow_pg.php" >Create SOW</a></div>
            <div class="g2"><a href="../Admin/sow_req1.php" >Resource Requirement</a></div>
            <div class="g2"><a href="../Admin/sowsaved.php" >SOW Saved Request</a></div>
            <div class="g1"><a href="../Admin/sow.php" >SOW Details</a></div>
            </div>  
        </div>

        
<!--<div class="m4"> 
            <a href="#"><p id= "dm">DETAILS</p></a>
            <!--<img src="icons/Human_resource_icons-14-512.png" style="float:right; height:40px; width:40px; margin:5px 5px 5px 0px; "/>-
            <div class="sm4">
            <div class="g1"><a href="../Admin/sow.php" >SOW Details</a></div>
            <div class="g2"><a href="../Admin/sow_req.php" >SOW Resource Request</a></div>
           
            </div>  
        </div>-->


        <div class="m5"> 
           <a href="#"> <p id= "pm">PROJECT MANAGEMENT</p></a>
            <!--<img src="icons/Human_resource_icons-14-512.png" style="float:right; height:40px; width:40px; margin:5px 5px 5px 0px; "/>-->
            <div class="sm5">
             <div class="h3"><a href="../Admin/selectpm.php">Allocate Project Manager</a></div>
            <div class="h2"><a href="../Admin/res_allocation.php" >Resource Allocation</a></div>
            <div class="h1"><a href="../Admin/allocation.php" >Shadow Allocation</a></div>
            </div>  
        </div>

        <div class="m3"> 
            <a href="#"><p id= "em" style="float: right; padding: 0 15px 0 0;">MASTER</p></a>
            <!--<img src="icons/master.png" style="float:right; height:40px; width:40px; margin:5px 5px 5px 0px; "/>-->
            <div class="sm3">
            <div class="e1"><a href="../Admin/tblpracticehead.php" >Manage Practice Head</a></div>
            <div class="e2"><a href="../Admin/tblbilling.php" >Manage Billing Type</a></div>
            <div class="e3"><a href="../Admin/tbldept.php">Manage Department</a></div>
            <div class="e4"><a href="../Admin/tblsdept.php">Manage Sub-Department</a></div>
            <div class="e5"><a href="../Admin/tbldesignation.php">Manage Designation</a></div>
            <div class="e6"><a href="../Admin/tblreason.php">Project Disabling Reasons</a></div>
            <div class="e6"><a href="../Admin/tblRreason.php">Employee Leave Reasons</a></div>
            <div class="e7"><a href="../Admin/tblskill.php">Manage Skills</a></div>
            <div class="e8"><a href="../Admin/tbllocation.php">Manage Location</a></div>
            <div class="e8"><a href="../Admin/tblblocation.php">Billing Location</a></div>
        </div> 
        </div> 


         <div class="m6"> 
            <a href="#"><p id= "rp" style="float: right; padding: 0 15px 0 0;">REPORTS</p></a>
            <!--<img src="icons/master.png" style="float:right; height:40px; width:40px; margin:5px 5px 5px 0px; "/>-->
            <div class="sm6">
            <div class="i1"><a href="../Reports/AllocationReport.php" >Allocation</a></div>
            <div class="i2"><a href="../Reports/Availability.php" >Availability</a></div>
            <!--<div class="i3"><a href="../Reports/deptReport.php">Projectwise Allocation</a></div>-->
            <div class="i4"><a href="../Reports/RprojDetails.php">Project Details</a></div>
            <div class="i5"><a href="../Reports/DeptWiseReport.php">Department Report</a></div>
            <div class="i6"><a href="../Reports/DesigWiseReport.php">Designation Report</a></div>
            <div class="i7"><a href="../Reports/EmployeeReport.php">Employee Report</a></div>
            <!--<div class="i8"><a href="../Reports/.php"> </a></div>-->
        </div> 
        </div> 
       
            <!--<img src="icons/master.png" style="float:right; height:40px; width:40px; margin:5px 5px 5px 0px; "/>-->

            <div id="user" style="float:right;">
            <img src="icons/log_out.png" id= "fm" style="float:right; height:30px; width:30px; margin: 6px 10px 0 0" /></a>
             <p id= "fm" style="float: right; margin:10px 10px 0 0;">
              <div id="welcome" style="float:right;">
            
            <p>
            <?php
             session_start();
             if(isset($_SESSION['adminid']))
             {
                echo $_SESSION['adminid'];  
             }

            ?>
            </p>
            </div>
         
           
            </p>
               <div id="username">
            
            <div class="f1"><a href="../Admin/chngpass.php" >Change Password <img src="icons/cp.png"  style="float: right; height: 30px; width: 30px;" /></a></div>
           <div class="f2"><a href="../Admin/logout.php" >Logout <img src="icons/logout.png" style="float: right; height: 30px; width: 30px; margin-right: 4px" /></a></div>
          
            </div>

            </div>

            
            
            
		
        <div class="badshah">

        </div>
</header>
<br>
<br />

</body>
</html>
							