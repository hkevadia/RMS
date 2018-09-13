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
            
            $('.badshah').css("z-index","1");
                      
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



///////////////////////////////////////////////////////////////////////////////////////////////////////////



$(document).ready(function(){
    $("#username").hover(function(e){
        $(this).toggleClass('active');
       
        e.preventDefault();
        },
        function(e)
    {
        $('#username').slideUp(150);
        $('.badshah').hide();
        e.preventDefault();

    });
});
$(document).ready(function(){
    $("#log_in_out").hover(function(e){
        $(this).toggleClass('active');
        $(document).on("click", "#un", function(e)
        {
            $(this).toggleClass('active');
            $('.badshah').show();
            $('#username').slideDown(150);
            $('.badshah').css("z-index","0");
           
            $('#username').css("z-index","2");
            
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
        $('.badshah').hide();
        e.preventDefault();

    });
});





/////////////////////////////////////////////////////////////////////////////////////////////////////////////



$(document).ready(function(){
    $(".badshah").hover(function(){
        
        $(this).hide();
        

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





/////////////////







</script>
<style type="text/css">

body {
//background-image: url('icons/bg.jpg');
    //background-color: #F4F4F4;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
   
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


.m5
{
    margin-top: 0px;
    margin-left: 0px;
    background-color: #a6a6a6;
    float:left;
    text-align: left;

    

    
    width: 225px ;
    height: 38px;
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
    z-index:2;
}

a{
    color: black;
    text-decoration: none;
    text-align: center;
}
.ig
{
    height:20px;
    width:25px;
}
.lg { text-indent:-9999em; border:0; width:30px; height:25px; background: url('icons/save.png') no-repeat 0 0 ; line-height:0 font-size:0; }
.sm5
{
    position: absolute;
    display: none;
    /* padding: 15px 15px 0px 15px; */
    height:70px;
    width:200px ;
    float: left;
    z-index: 150;
    margin-top: 40px;
    margin-left: 10px;
    opacity: 0.8;
    font-family: sans-serif;
    font-weight: lighter;

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

#username
{
    display: none;
    position: absolute;
    /* padding: 15px 15px 0px 15px; */
    height:70px;
    width:230px ;
    float: right;
    z-index:100;
     margin-top: 22px;
    margin-left: -5px;
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


.h1
{
    opacity:0.9;
    background-color: #ff751a;
    height: 25px;
    width: 200px ;
    text-align: center;
    margin: 1px 0 1px 0;
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
.f1
{
    background-color: #ff751a;
    height: 25px;
    width:180px ;
    text-align: center;
    margin: 19px 0 1px 0;
    padding: 5px 0 5px 0;
    z-index:2;
}
.f2
{
    background-color: #ff751a;
    height: 25px;
    width:180px ;
    text-align: center;
    margin: 2px 0 1px 0;
    padding: 5px 0 5px 0;
    z-index:2;
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
    width: 150px;
    font-size: 15px;
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
   // border-radius: 5px;
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
#hh
{
    margin-top: 40px;
}
.ig
{
    height:20px;
    width:25px;
}
.badshah
{
    position: absolute;
    width:99%;
    height: 85.7%;
    background-color: #000000;
    opacity:0.8;
    margin-top:40px;
    display: none;
    
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


        
       

        <div class="m5"> 
            <a href="#"><p id= "pm" style="float: right; padding: 0 15px 0 0;">PROJECT MANAGEMENT</p></a>
            <!--<img src="icons/master.png" style="float:right; height:40px; width:40px; margin:5px 5px 5px 0px; "/>-->
            <div class="sm5">
            <div class="h1"><a href="../User/res_request.php" >REQUEST RESOURCE</a></div>
            <div class="h2"><a href="../User/requested_res.php" >SAVED REQUEST</a></div>
        </div> 
        </div> 

       
            <!--<img src="icons/master.png" style="float:right; height:40px; width:40px; margin:5px 5px 5px 0px; "/>-->

            

           <div id="user" style="float:right;">
            <img src="icons/log_out.png"  style="float:right; height:30px; width:30px; margin: 6px 10px 0 0" id="un"/></a>
             <p id= "fm" style="float: right; margin:10px 10px 0 0;">
         
           
            </p>
               <div id="username">
            
            <div class="f1"><a href="../User/chngpass.php" >Change Password <img src="icons/cp.png" style="float: right; height: 30px; width: 30px;" /> </a></div>
           <div class="f2"><a href="../User/logout.php" >Logout <img src="icons/logout.png" style="float: right; height: 30px; width: 30px; margin-right: 4px" /></a></div>
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
