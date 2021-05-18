<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">   </script>
<script src="https://momentjs.com/downloads/moment.min.js"></script> <script src="https://momentjs.com/downloads/moment-timezone-with-data-10-year-range.min.js"></script>
<script src="main.js"></script> 
<title> Discord Lookup </title>
</head>

<center>
Discord Lookup
<input class="smallbutton" href="#" id="input" value="<?=$_GET['id']?>" placeholder="Enter ID">
<input class="smallbutton" onclick="lookup();" value="Find" type="submit">
<a id="result"> </a>

<script type="text/javascript">
function lookup()
{
	var userid =$('#input').val();
	
    $.ajax({
        type:'GET',
        url:'lookup.php',
        data:{"id":userid},
        success : function(content)
        {			
                $('#result').html(content);
				convert(document.getElementById('input').value);
				
    }

} ) }
</script>