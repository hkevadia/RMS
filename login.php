<html>
<head>
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

<style>

body
{
    font-family: 'Calisto MT', 'Bookman Old Style', Bookman, 'Goudy Old Style', Garamond, 'Hoefler Text', 'Bitstream Charter', Georgia, serif;
    font-variant: all;
    font-weight: 400;
}



#logo
{  
    position: fixed;
    float: left;
    //margin-top: 100px;
    margin-left: 100px;
    z-index: 20;
}


#login
{
    
    //background-image: url('icons/bgl.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;

    
    width: 100%;
    height:90%;
    opacity:0.9; 
   
}

#tech
{
    float: left;
    margin-top: 180px;
    height:83%;

}

</style>
</head>
<body>


<div id="login" >

<img id="tech" src="icons/technology.png" />
</div>
      


    


</body>
</html>