function get_productos (id_departamento) {
	$.ajax({
		url: base+'index.php/productos/Mostrar_productos_c/get_productos',
		data: {id_departamento:id_departamento},
		type: 'POST',
		success: function(data){
			$("#lista_productos").html(data);
		},
		error: function(){
			alert('Error JavaScript');
		}
	});
}