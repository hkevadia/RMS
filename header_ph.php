<!Doctype html>
<html>
<head>
<title>RMS</title>
<script type="text/javascript">
    function ShowLoading(e) {
        var div = document.createElement('div');
        var img = document.createElement('img');
        img.src = 'icons/loader.gif';
        div.innerHTML = "<b>Loading...<br/><br/></b>";
        div.style.cssText = 'position: fixed; top: 1%; left: 45%; border: none; height:10px; width:10px;' ;
        div.appendChild(img);
        document.body.appendChild(div);
        return true;
    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script>
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
    $(".badshah").hover(function(){
        
        $(this).hide();
        

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
            $('.sm1').hide();
            $('.sm2').hide();
            $('.sm3').hide();
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
    	
    	$('.f2').css("opacity","0.7");
    	e.preventDefault();
    	},
    	function(e)
    {
    	$(this).css("height","25px");
    	$('.f2').css("transform","translate(0px,0px)");
    	$('.f2').css("opacity","1.0");
    	e.preventDefault();

    });
});


$(document).ready(function(){
    $(".f2").hover(function(e){
    	$(this).toggleClass('active');
    	$(this).css("height","30px");
    	$('.f1').css("opacity","0.7");
    	e.preventDefault();
    	},
    	function(e)
    {
    	$(this).css("height","25px");
    	$('.f1').css("opacity","1.0");
    	e.preventDefault();

    });
});
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

$(document).ready(function(){
    $(".d4").hover(function(e){
    	$(this).toggleClass('active');
    	$(this).css("height","30px");
		$('.d3').css("opacity","0.7");
    	$('.d2').css("opacity","0.7");
    	$('.d1').css("opacity","0.7");
    	e.preventDefault();
    	},
    	function(e)
    {
    	$(this).css("height","25px");
		$('.d3').css("opacity","1.0");
    	$('.d2').css("opacity","1.0");
    	$('.d1').css("opacity","1.0");
    	e.preventDefault();

    });
});


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
    	$('.e2').css("opacity","1.0");
    	$('.e3').css("opacity","1.0");
    	$('.e4').css("opacity","0.7");
    	$('.e5').css("opacity","0.7");
    	$('.e6').css("opacity","0.7");
    	$('.e7').css("opacity","0.7");
    	$('.e8').css("opacity","0.7");
    	
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
    	    	
    	$('.e2').css("opacity","0.9");
    	$('.e3').css("opacity","0.9");
    	$('.e4').css("opacity","1.0");
    	$('.e5').css("opacity","1.0");
    	$('.e6').css("opacity","1.0");
    	$('.e7').css("opacity","1.0");
    	$('.e8').css("opacity","1.0");
    	
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
    	$('.e1').css("opacity","1.0");
    	$('.e3').css("opacity","1.0");
    	$('.e4').css("opacity","0.7");
    	$('.e5').css("opacity","0.7");
    	$('.e6').css("opacity","0.7");
    	$('.e7').css("opacity","0.7");
    	$('.e8').css("opacity","0.7");
    	
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
    	$('.e1').css("opacity","0.9");
    	$('.e3').css("opacity","0.9");
    	$('.e4').css("opacity","1.0");
    	$('.e5').css("opacity","1.0");
    	$('.e6').css("opacity","1.0");
    	$('.e7').css("opacity","1.0");
    	$('.e8').css("opacity","1.0");
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
    	$('.e1').css("opacity","1.0");
    	$('.e2').css("opacity","1.0");
    	$('.e4').css("opacity","0.7");
    	$('.e5').css("opacity","0.7");
    	$('.e6').css("opacity","0.7");
    	$('.e7').css("opacity","0.7");
    	$('.e8').css("opacity","0.7");
    	
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
    	$('.e1').css("opacity","0.9");
    	$('.e2').css("opacity","0.9");
    	$('.e4').css("opacity","1.0");
    	$('.e5').css("opacity","1.0");
    	$('.e6').css("opacity","1.0");
    	$('.e7').css("opacity","1.0");
    	$('.e8').css("opacity","1.0");
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
    $(".h3").hover(function(e){
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



$(document).ready(function(){
    $(".d1").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.d2').css("transform","translate(0px,1px)");
        $('.d3').css("transform","translate(0px,1px)");
        //$('.4').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.d2').css("transform","translate(0px,0px)");
        $('.d3').css("transform","translate(0px,0px)");
        //$('.d4').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});
$(document).ready(function(){
    $(".d2").hover(function(e){
        $(this).toggleClass('active');
        $(this).css("height","30px");
        $('.d3').css("transform","translate(0px,1px)");
        //$('.g4').css("transform","translate(0px,1px)");
        $(this).css("opacity","1.0");
        e.preventDefault();
        },
        function(e)
    {
        $(this).css("height","25px");
        $('.d3').css("transform","translate(0px,0px)");
        //$('.d4').css("transform","translate(0px,0px)");
        $(this).css("opacity","0.9");
        e.preventDefault();

    });
});
$(document).ready(function(){
    $(".d3").hover(function(e){
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
</script>
<style type="text/css">
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
body {
//background-image: url('icons/bg.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    font-family: 'Calisto MT', 'Bookman Old Style', Bookman, 'Goudy Old Style', Garamond, 'Hoefler Text', 'Bitstream Charter', Georgia, serif;
    font-variant: all;
    font-weight: 400;
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



.m3
{
    margin-top: 0px;
    margin-left: -30px;
    background-color: #a6a6a6;
    float:left;
    text-align: left;

    

    
    width: 225px ;
    height: 28px;
}
.m4
{
    margin-top: 0px;
    margin-left: 10px;
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
    text-align: left;
padding-left:none;

    

    
    width: 180px ;
    height: 50px;
}
.m5 p
{
   text-align: center;


}
#user
{
    margin-top: 0px;
    margin-left: 20px;
    background-color: #a6a6a6;
    float:right;
    text-align: left;

    

    
    width: 175px ;
    height: 28px;
}
#welcome
{
    margin-top: 0px;
    margin-right: -135px;
    background-color: #a6a6a6;
    float:right;
    text-align: right;
 font-family: sans-serif;
        font-weight:lighter;
    

    
    width: 250px ;
    height: 28px;
}
.ig
{
     height:20px;
    width:25px;
}
.lg { text-indent:-9999em; border:0; width:30px; height:25px; background: url('icons/save.png') no-repeat 0 0 ; line-height:0 font-size:0; }
a{
	color: black;
	text-decoration: none;
	text-align: center;
}


.sm3
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
    margin-left: -50px;
    opacity: 0.8;
     font-family: sans-serif;
    font-weight: lighter;

}
.sm5
{
    position: absolute;
    display: none;
    /* padding: 15px 15px 0px 15px; */
    height:120px;
    width:180px ;
    float: left;
    z-index: 150;
    margin-top: -12px;
    margin-left: 20px;
    opacity: 0.8;
     font-family: sans-serif;
    font-weight: lighter;

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
     margin-top: 37px;
    margin-left: -5px;
    opacity: 0.8;
     font-family: sans-serif;
    font-weight: lighter;
    position: center;
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
    margin-top: 1px;
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
	background-color: #ff751a;
    height: 30px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.e5
{
	background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.e6
{
	background-color: #ff751a;
    height: 30px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.e7
{
	background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.e8
{
	background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
}
.f1
{
    background-color: #ff751a;
    height: 25px;
    width:180px ;
    text-align: center;
    margin: 5px 0 1px 0;
    padding: 5px 0 5px 0;
}
.f2
{
    background-color: #ff751a;
    height: 25px;
    width:180px ;
    text-align: center;
    margin: 1px 0 1px 0;
    padding: 5px 0 5px 0;
}
.g1
{
     opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width:180px ;
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
    width:180px ;
    text-align: center;
    margin: 0px 0 1px 0;
    padding: 5px 0 5px 0;
   
}
.g3
{
   opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 180px ;
    text-align: center;
    margin: 1px 0 1px 0;
    padding: 5px 0 5px 0;

    
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
    margin-top:54px;
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
    height:30px;

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
    height: 30px;
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
.badshah
{
    position: absolute;
    width:99%;
    height: 85.7%;
    background-color: #000000;
    opacity:0.8;
    margin-top:40px;
    display:none;
    z-index: 10;
}
.error
{
	color: red;
	font-size: 16px;
}
</style>
</head>
<body >
	<header>
		
		<div id="logo">
		<img src="icons/Logo.png" width="200px" height="75px" />
		</div>
		<div id="log_in_out">
			<a href="../User/home.php" title="Home"><img src="icons/home.png" style="float:left; height:30px; width:30px; margin:5px 10px 0px 15px; " /></a>


        
        

      
       
            <!--<img src="icons/master.png" style="float:right; height:40px; width:40px; margin:5px 5px 5px 0px; "/>-->

            
        <div class="m5"> 
             <a href="#"><p id= "pm">SOW</p></a>
            <!--<img src="icons/Human_resource_icons-14-512.png" style="float:right; height:40px; width:40px; margin:5px 5px 5px 0px; "/>-->
            <div class="sm5">
            <div class="g1"><a href="../User/sow_pg.php" >Create SOW</a></div>
            <div class="g2"><a href="../User/sow_req1.php" >Resource Requirement</a></div>
            <div class="g3"><a href="../User/sowsaved.php" >SOW Saved Request</a></div>
            <div class="g3"><a href="../User/sow.php" >SOW Details</a></div>
            </div>  
        </div>
<!--
        <div class="m4"> 
             <a href="#"><p id= "dm">DETAILS</p></a>
            <!--<img src="icons/Human_resource_icons-14-512.png" style="float:right; height:40px; width:40px; margin:5px 5px 5px 0px; "/>
            <div class="sm4">
            <div class="g1"><a href="../User/sow.php" >SOW Details</a></div>
            <div class="g2"><a href="../User/sow_req1.php" >SOW Resource Request</a></div>
            <div class="g3"><a href="../User/selectpm.php">Select Project Manager</a></div>
            </div>  
        </div>
        -->

        <div class="m3"> 
             <a href="#"><p id= "em" style="float: right; padding: 0 15px 0 0;">PROJECT MANAGEMENT</p></a>
            <!--<img src="icons/master.png" style="float:right; height:40px; width:40px; margin:5px 5px 5px 0px; "/>-->
            <div class="sm3">
            <div class="h3"><a href="../User/selectpm.php">Allocate Project Manager</a></div>
            
            <div class="h2"><a href="../User/res_allocation.php" >Resource Allocation</a></div>
            <div class="h1"><a href="../User/allocation.php" >Shadow Allocation</a></div>
            </div> 
        </div> 

           <div id="user" style="float:right;">
            <img src="icons/log_out.png" id= "fm" style="float:right; height:30px; width:30px; margin: 6px 10px 0 0" /></a>
             <p id= "fm" style="float: right; margin:10px 10px 0 0;">
         
           
            </p>
               <div id="username">
            
            <div class="f1"><a href="../User/chngpass.php" >Change Password <img src="icons/cp.png" style="float: right; height: 30px; width: 30px;" /></a></div>
           <div class="f2"><a href="../User/logout.php" >Logout  <img src="icons/logout.png" style="float: right; height: 30px; width: 30px; margin-right: 4px" /></a></div>
            </div>
            </div>
            <div id="welcome" style="float:right;">
            
            <p>
            <?php
             session_start();
             if(isset($_SESSION['usernm']))
             {
                echo $_SESSION['usernm'];  
             }

            ?>
            </p>
            </div>
        
		
	
        
 <div class="badshah">

        </div>

</header>



</body>
</html>	