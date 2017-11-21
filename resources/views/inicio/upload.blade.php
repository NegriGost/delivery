<div>
	
	<form method="post" action="/uploadimg" enctype="multipart/form-data">
	    <!--csrf_field-->
	 	{{csrf_field()}}

	 	<input type="file" name="file" >
	 	<button type="submit">Gravar</button>
</form>
</div>