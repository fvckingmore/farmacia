@extends('layouts.base')
@section('content')

<div class="row justify-content-center">
	<div class="col-4 ">
		<form action="{{url('empleado/'.$empleado->ci.'/edit')}}" method="POST">
			@csrf

			{{-- SECCION BASE --}}
			<div class="text-center">
				<h4 class="h4">Empleado</h4>
			</div>
			@include('empleado.edit.normal')
			{{-- FIN SECCION NORMAL --}}

			{{-- SECCION FARMACEUTICO --}}
			<div id="secFarma" 
			@if($empleado->cargo == 'farmaceutico')style="display: block" @else style="display: none" @endif>
			<div class="text-center">
				<h4 class="h4">Titulo</h4>
			</div>
			@include('empleado.edit.farmaceutico')
		</div>
		{{-- FIN SECCION FARMACEUTICO --}}

		{{-- SECCION PASANTE --}}
		<div id="secPasante" 
		@if($empleado->cargo == 'pasante')style="display: block" @else style="display: none" @endif>
		<div class="text-center">
			<h4 class="h4">Pasantia</h4>
		</div>
		@include('empleado.edit.pasante')
		<div class="text-center">
			<h4 class="h4">Responsable</h4>
		</div>
		@include('empleado.edit.responsable')
	</div>
	{{-- FIN SECCION PASANTE --}}

	<div class="text-center">
		<button type="submit" class="btn btn-primary">Guardar</button>
		<a href="{{url('empleado')}}" class="btn btn-danger">Cancelar</a>
	</div>
</form>
</div>
</div>

<script>
/*	var c = document.getElementById("cargo");
	c.addEventListener("change", function() {
		var f = document.getElementById("secFarma");
		var p = document.getElementById("secPasante");
		f.style.display = "none";
		p.style.display = "none";
		if(c.value == "farmaceutico") {
			f.style.display = "block";
		} else if( c.value == "pasante") {
			p.style.display = "block";
		} else {
			f.style.display = "none";
			p.style.display = "none";
		}
		*/
		$(document).ready(function() {
			$("#cargo").change(function(event) {
				$("#secFarma").hide();
				$("#secPasante").hide();

				if ($(this).val() == "farmaceutico") {
					$("#secFarma").show();
				} else if ($(this).val() == "pasante") {
					$("#secPasante").show();
				} else {
					$("#secFarma").hide();
					$("#secPasante").hide();
				}
			});	
		});

	</script>

	@endsection