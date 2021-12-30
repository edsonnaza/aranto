<DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Autocomplete Search using Typehead JS - XpertPhp</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>  
	<script type="text/javascript">
		var path = "{{ route('/api/search') }}";
		$('input.typeahead').typeahead({
			source:  function (query, process) {
				return $.get(path, { query: query }, function (data) {
					return process(data);
				});
			},
			highlighter: function (item, data) {
				var parts = item.split('#'),
				html = "<div class='row'>";
				html += "<div class='col-lg-12'>";
				html += "<span>"+data.producto_nombre+" "+data.id+"</span>";
				html += "</div>";
				html += "</div>";
				return html;
			}
		});
	</script>
</head>
<body>
<div class="container">
  <h2>Laravel 8 Autocomplete Search using Typehead JS</h2> 
        <div class="form-group">
            <input type="text" class="form-control typeahead">
        </div>
    </div>


       <div id="app">

                <div class="card-body">
                 
                  <autocomplete-component></autocomplete-component>
                </div>
                </div>
</body>
</html>