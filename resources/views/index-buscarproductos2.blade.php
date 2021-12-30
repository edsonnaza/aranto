<!DOCTYPE html>
<html>

<head>
	<title>
		jQuery AutoComplete selection
	</title>

	<link rel="stylesheet" href=
"http://code.jquery.com/ui/1.11.3/themes/ui-lightness/jquery-ui.css"/>
	
	<script src=
		"http://code.jquery.com/jquery-2.1.3.js">
	</script>
	
	<script src=
		"http://code.jquery.com/ui/1.11.2/jquery-ui.js">
	</script>
	
 


  <script type="text/javascript">
$(function() {
            $("#seguro_nombre").autocomplete({
                //source: "consulta_seguros.php",

                 url:"{{ url('product-list') }}",
                minLength: 2,
                select: function(event, ui) {
          event.preventDefault();
               //     $('#nrodoc').val(ui.item.nrodoc);
        //  $('#nombrepaciente').val(ui.item.nombrepaciente);
         // $('#apellidopaciente').val(ui.item.apellidopaciente);
         // $('#paciente').val(ui.item.paciente);
          //$('#hcpaciente').val(ui.item.hcpaciente);
          $('#seguro_nombre').val(ui.item.producto_nombre);
          //$('#idseguro').val(ui.item.seguroid);
           }
            });
    });
</script>
</head>

<body>
	<form>	
		<div class="ui-widget">
			<label for="input">City Name : </label>
			<input id="seguro_nombre"/><br>
			
			Label of City Name: <div id="cityName"></div>			
		</div>
	</form>
</body>

</html>
