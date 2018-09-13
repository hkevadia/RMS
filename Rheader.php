<!Doctype html>
<html>
<head>
<title>RMS</title>
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
body 

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
}

.m1
{
    margin-top: 0px;
    margin-left: 10px;
	background-color: #a6a6a6;
	float:left;
	text-align: left;
    

	
	width: 175px ;
	height: 28px;
	
	
}
.m2
{
	margin-top: 0px;
    margin-left: 25px;
    background-color: #a6a6a6;
    float:left;
    text-align: left;
    width: 175px ;
    height: 28px;
}
.m3
{
	margin-top: 0px;
    margin-left: -20px;
    background-color: #a6a6a6;
    float:left;
    text-align: left;

    

    
    width: 175px ;
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
    margin-left: -30px;
    background-color: #a6a6a6;
    float:left;
    text-align: left;

    

    
    width: 225px ;
    height: 38px;
}
.m6
{
    margin-top: 0px;
    margin-left: -px;
    background-color: #a6a6a6;
    float:left;
    text-align: left;

    

    
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

    
    margin-bottom: -20px;
    
    width: 175px ;
    height: 28px;
}

a{
	color: black;
	text-decoration: none;
	text-align: center;
}
.sm1
{
    position: absolute;
	display: none;
	/* padding: 15px 15px 0px 15px; */
	height:175px;
	width:158px ;
	float: left;
    z-index: 150;
    margin-top: -12px;
    opacity: 0.8;
	
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
    margin-left: -24px;
    opacity: 0.8;
}
.sm3
{
    position: absolute;
	display: none;
    /* padding: 15px 15px 0px 15px; */
    height:150px;
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
    height:70px;
    width:200px ;
    float: left;
    z-index: 150;
    margin-top: -14px;
    margin-left: -10px;
    opacity: 0.8;

}
.sm6
{
    position: absolute;
    display: none;
    /* padding: 15px 15px 0px 15px; */
    height:150px;
    width:200px ;
    float: left;
    z-index: 150;
    margin-top: 40px;
    opacity: 0.8;

}
#username
{
    display: none;
    
    /* padding: 15px 15px 0px 15px; */
    height:287px;
    width:230px ;
    float: right;
    z-index: 50px;
    margin-right: -70px;
    margin-top: -14px;
    opacity: 0.8;
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
	margin: 4px 0 1px 0;
	padding: 5px 0 5px 0;
}
.c3
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:158px ;
    text-align: center;
    margin: 1px 0 1px 0;
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
    width:158px ;
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
    width:200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
    margin-top: 4px;
}
.g2
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
   
}
.g3
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:200px ;
    text-align: center;
    margin: 0px 0 1px 0;
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
    width:158px ;
    text-align: center;
    margin: 5px 0 1px 0;
    padding: 5px 0 5px 0;
}
.f2
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:158px ;
    text-align: center;
    margin: 2px 0 1px 0;
    padding: 5px 0 5px 0;
}

.h1
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 6px 0 1px 0;
    padding: 5px 0 5px 0;
}
.h2
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
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


.error
{
	color: red;
	font-size: 16px;
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
    margin-top: 30px;
    width: 50%;
    border-color: #2f2f2f;
    border-style: solid;
    padding: -2px -2px -2px -2px;
    border-spacing: 0px;
    border-width: 2px;
    border-collapse: collapse;
    font-family: sans-serif;
    font-variant: all;
    font-weight: lighter;
    font-size: 12px;
    color: #2F2f2f;

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
    font-family: sans-serif;
    font-variant: all;
    font-weight: lighter;
	font-size: 15px;
	color: #2F2f2f;
    text-align:left;
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
    
    
}

.t2 th:first-child {text-align:center;} 
.t2 td
{
    
    border-color: #2f2f2f;
    //border-style: solid;
    height: 25px;
    border:none;
    padding-left: 2px;
    //border-left: 1em solid transparent;
    //border-top: 1em solid transparent;
    //border-bottom: 10px solid transparent;
    //width: 10px;
    //border-right: 1px solid;
    //border-left: 1px solid;
    text-align: left;
    //border: all;
}

.t2 td:first-child {text-align:center;} 


.t2 .tb2
{
    width:200px;
    align : center;
}
.t3  tr:nth-child(even) {background: #CCC}
.t3 tr:nth-child(odd) {background: #e6e6e6}

.t3
{
    margin-top: 30px;
    width: 70%;
    border-color: #2f2f2f;
    border-style: solid;
    //padding: -2px -2px -2px -2px;
    border-spacing: 0px;
    border-width: 2px;
    border-collapse: collapse;

}
.t3 tr
{
    border-color: #2f2f2f;
    height:50px;
    //border-style: solid;
    //border-right: 1px solid;
    align :center;
}
.t3 th
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
    
    
}
.t3 td
{
    border-color: #2f2f2f;
    //border-style: solid;
    border: none  ;
    border: 9px 0px 9px 0px;
    padding-left: 2px;
    
    width: 9px;
    //border-right: 1px solid;
    //border-left: 1px solid;
    text-align: center;
    //border: all;
}

.t3 .tb3
{
    width:200px;
    align : center;
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
    border-radius: 5px;
    border-color: #2F2f2f;
    height: 30px;
    width: 100px;
    font-size: 18px;
    opacity: 0.9;
}
#hh
{
    margin-top: 40px;
}
.ig
{
    height:30px;
    width:40px;
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
		
		<!--<div id="logo">
		<img src="icons/Logo.png" width="200px" height="75px" />
		</div>
		<div id="log_in_out">
			<a href="../Admin/home.php" title="Home"><img src="icons/home.png" style="float:left; height:30px; width:30px; margin:5px 10px 0px 15px; " /></a>


            <div class="sm1">
            
            <div class="c2"><strong><a href="../Admin/createuser.php" >Create User</a></div></strong>
            <div class="c3"><strong><a href="../Admin/rescreate.php" >Create Resource</a></div></strong>
            <div class="c4"><strong><a href="../Admin/resupdt.php" >Update Resource</a></div></strong>
            <div class="c5"><strong><a href="../Admin/resdisable.php">Disable Resource</a></div></strong>
            <div class="c6"><strong><a href="../Admin/linkemp.php">Employee Details</a></div></strong>
            </div>
        </div>
    

        <div class="m2"> 
            <p id= "rm">SOW MASTER</p>
            
            <div class="sm2">
            <div class="d1"><strong><a href="../Admin/sow_pg.php" >Create SOW</a></div></strong>
            <div class="d2"><strong><a href="../Admin/sow_pgupdate.php" >Update SOW</a></div></strong>
            <div class="d3"><strong><a href="../Admin/projdisable.php">Disable Project</a></div></strong>
            </div>  
        </div>

        
<div class="m4"> 
            <p id= "dm">DETAILS</p>
        
            <div class="sm4">
            <div class="g1"><strong><a href="../Admin/sow.php" >SOW Details</a></div></strong>
            <div class="g2"><strong><a href="../Admin/sow_req.php" >SOW Resource Request</a></div></strong>
            <div class="g3"><strong><a href="../Admin/selectpm.php">Select Project Manager</a></div></strong>
            </div>  
        </div>


        <div class="m5"> 
            <p id= "pm">PROJECT MANAGEMENT</p>
           
            <div class="sm5">
            <div class="h1"><strong><a href="../Admin/allocation.php" >Shadow Allocation</a></div></strong>
            <div class="h2"><strong><a href="../Admin/res_allocation.php" >Resource Allocation</a></div></strong>
            </div>  
        </div>

        <div class="m3"> 
            <p id= "em" style="float: right; padding: 0 15px 0 0;">UPDATE MASTER</p>
          
            <div class="sm3">
            <div class="e1"><strong><a href="../Admin/tblpracticehead.php" >Manage Practice Head</a></strong></div>
            <div class="e2"><strong><a href="../Admin/tblbilling.php" >Manage Billing Type</a></div></strong>
            <div class="e3"><strong><a href="../Admin/tbldept.php">Manage Department</a></div><strong></strong>
            <div class="e4"><strong><a href="../Admin/tblsdept.php">Manage Sub-Department</a></div></strong>
            <div class="e5"><strong><a href="../Admin/tbldesignation.php">Manage Designation</a></div></strong>
            <div class="e6"><strong><a href="../Admin/tblreason.php">Project Disabling Reasons</a></div></strong>
            <div class="e7"><strong><a href="../Admin/tblskill.php">Manage Skills</a></div></strong>
            <div class="e8"><strong><a href="../Admin/tbllocation.php">Manage Location</a></div></strong>
        </div> 
        </div> 


         <div class="m6"> 
            <p id= "rp" style="float: right; padding: 0 15px 0 0;">REPORTS</p>
         
            <div class="sm6">
            <div class="i1"><strong><a href="../Reports/AllocationReport.php" >Allocation</a></strong></div>
            <div class="i2"><strong><a href="../Reports/Availability.php" >Availability</a></div></strong>
            <div class="i3"><strong><a href="../Reports/deptReport.php">Projectwise Allocation</a></div><strong></strong>
            <div class="i4"><strong><a href="../Reports/RprojDetails.php">Project Details</a></div></strong>
            <div class="i5"><strong><a href="../Reports/DeptWiseReport.php">Department Report</a></div></strong>
            <div class="i6"><strong><a href="../Reports/DesigWiseReport.php">Designation Report</a></div></strong>
            <div class="i7"><strong><a href="../Reports/EmployeeReport.php">Employee Report</a></div></strong>
            <div class="i8"><strong><a href="../Reports/.php"> </a></div></strong>
        </div> 
        </div> 
       
            

            <div id="user" style="float:right;">
            <img src="icons/log_out.png" id= "fm" style="float:right; height:30px; width:30px; margin: 6px 10px 0 0" /></a>
             <p id= "fm" style="float: right; margin:10px 10px 0 0;">
              <div id="welcome" style="float:right;">
            
            <p>
            <?php/
             session_start();
             if(isset($_SESSION['adminid']))
             {
                echo $_SESSION['adminid'];  
             }

            ?>
            <!--</p>
            </div>
         
           
            </p>
               <div id="username">
            
            <div class="f1"><a href="../Admin/chngpass.php" ><strong>Change Password</strong> </a> <img src="icons/cp.png" style="float: right; height: 30px; width: 30px;" /></div>
           <div class="f2"><a href="../Admin/logout.php" ><strong>Logout</strong> </a> <img src="icons/logout.png" style="float: right; height: 30px; width: 30px; margin-right: 4px" /></div>
          
            </div>

            </div>

            
            
            
		
        <div class="badshah">

        </div>-->
</header>
<br>
<br />

</body>
</html>