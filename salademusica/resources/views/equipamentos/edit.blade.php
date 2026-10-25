<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

	<title>Editar Equipamento</title>

	<div class="p-4 rounded" style="background-color: #ffdede; height: 85.1vh;">
	
		<div class="container container-principal mx-auto sm:px-6 lg:px-8">
			
			<div class="lead">
			
				<svg class="imagem-equipamento" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-easel-fill" viewBox="0 0 16 16">
					<path d="M8.473.337a.5.5 0 0 0-.946 0L6.954 2H2a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h1.85l-1.323 3.837a.5.5 0 1 0 .946.326L4.908 11H7.5v2.5a.5.5 0 0 0 1 0V11h2.592l1.435 4.163a.5.5 0 0 0 .946-.326L12.15 11H14a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H9.046z"/>
				</svg>

				<h2>Editar um Equipamento</h2>
		
			</div>

			<form method="post" action="{{ route('equipamentos.update', $equipamento->id) }}">
				@method('patch')
				@csrf
				
				<div class="criar-equipamento">

					<label for="nome" class="form-label">Nome</label>

					<input  maxlength="255" value="{{ $equipamento->nome }}" type="text" class="form-control" name="nome" placeholder="Nome do Equipamento" required> 

					@if ($errors->has('nome'))

						<span class="text-danger text-left">{{ $errors->first('nome') }}</span>

					@endif

				</div>


				<div class="criar-equipamento">

					<label for="tipoEquipamento" class="form-label">Características do Equipamento (Opcional)</label>

					<input maxlength="255" value="{{ $equipamento->tipoEquipamento }}" type="text" class="form-control" name="tipoEquipamento" placeholder="Ex.: Instrumento musical de corda, cabos longos ou curtos..."> 
					
					@if ($errors->has('tipoEquipamento'))

						<span class="text-danger text-left">{{ $errors->first('tipoEquipamento') }}</span>

					@endif

					<p style="font-size: 12px; color:gray;">
						
						As características só vão servir para auxiliar caso algum outro administrador não saiba sobre algum equipamento
						na sala de música. Lembrando que, a característica para o equipamento vale para todos os equipamentos iguais dentro da sala de música.
					
					</p>

				</div>
		
				<div class="botoes">

					<button type="submit" class="btn btn-success" style="margin-right:30px; padding:10px; width:8em;">Salvar</button>
							
					<a href="{{ route('equipamentos.index')}}"><button type="button" style="padding:10px; width:8em;" class="btn btn-danger">Cancelar</button></a>
	
				</div>

			</form>

		</div>
	
	</div>

    @include('footer.footer')

</x-app-layout>

<style>

	*{

		text-decoration: none !important;

	}

	.main{

		background-color: #ffdede !important;

	}
	
	.container-principal{

		background-color: white;
		border-radius: 10px;
		border:2px solid #f8b4f5;
		width: 60em;

	}

	.criar-equipamento{

		padding:30px;
		text-align: center;
		font-size: 30px;
		font-weight: 500;
		display: grid;

	}

	.nome-id{

		display: flex;
		justify-content: center;

	}

	form h2{

		text-align: center;
		margin-top: 1em;

	}

	.nome-id label{
	
		text-align: start;

	}

	.lead{

		position: relative;
		border-bottom: 2px solid #f8b4f5;
		padding: 30px;
		width: 47.9em;
		margin-left: -13px;
		text-align: center;
		justify-content: center;
		border-top-right-radius: 6px;
		border-top-left-radius: 6px;
		background-color: #f8b4f5;

	}

	.imagem-equipamento{

		position: relative;
		margin-left: 10em;
		margin-bottom: -2em;
		color: #300030;

	}

	.titulo-solicitacao{

		border: 2px solid #f8b4f5;
		border-radius: 10px;
		background-color: #f8f8f8;

	}

	.titulo-solicitacao:focus {

		outline: none !important;
		border:2px solid #f8b4f5;
		box-shadow: 0 0 10px #ce71ba;

	}

	.data-solicitacao{

		display:flex;
		font-size: 25px;
		font-weight: 500;
		gap:0.5em;
		margin-left: 5.7em;

	}

	textarea{

		width: 100%;
		height: 80px;
		padding: 10px 20px;
		box-sizing: border-box;
		border: 2px solid #c3e6c8;
		border-radius: 10px;
		background-color: #f8f8f8;
		font-size: 16px;
		resize: none;

	}

	textarea:focus {

		outline: none !important;
		border:1px solid #f8b4f5;
		box-shadow: 0 0 10px #ce71ba;

	}

	.botoes{

		margin-bottom:3em;
		margin-top: 3em;
		text-align: center;

	}

	.form-control{

		border: 2px solid #e6c3e4;
		background-color: #f8f8f8;

	}

	.form-control:focus, .data-horario input:focus{

		outline: none !important;
		border:2px solid #f8b4f5;
		box-shadow: 0 0 10px #ce71ba;

	}

	input[type="number"] {
  	
		width: 100px;
	
	}

	input + span {
	
		padding-right: 50px;
	
	}

	.personalizacao-footer{

		margin-top: 40em;

	}


    @media (min-width: 900px) and (max-width: 1049px) {

		.lead{

			width: 35.9em;

		}

		.imagem-equipamento{

			margin-left: 5em;

		}

		.data-horario{

			margin-left: -6em;

		}

	}

	@media (min-width: 750px) and (max-width: 899px) {

		.lead{

			width: 35.9em;

		}

		.imagem-equipamento{

			margin-left: 5.5em;

		}

		.data-horario{

			margin-left: -6em;

		}

	}

	@media (min-width: 600px) and (max-width: 659px) {

		.lead{

			width: 26.9em;

		}

		.imagem-equipamento{

			margin-left: 1.5em;

		}

		.data-horario{

			margin-left: -8.5em;
			margin-bottom: 2em;

		}

		.horarios{

			text-align: center;
			height: 15.5em;
			width: 12em;

		}

		.horario-entrega{

			margin-top: 5em;
			margin-left: -6.9em;

		}

		.horario-entrada{

			margin-left: 1.6em;

		}

		.horarios label{

			margin-left: 0.4em;

		}

		.horarios p{

			margin-top: 3.3em;
			margin-left: -2.5em;

		}

		.entrada input:invalid + span::after{

			margin-left: 6em;

		}

		.entrada input:valid + span::after{

			margin-left: 6em;

		}

		.entrega input:invalid + span::after{

			margin-left: -2em;

		}

		.entrega input:valid + span::after{

			margin-left: -1.6em;
			margin-top: 5.8em;

		}

		.entrega input:invalid + span::after{

			margin-left: -1.6em;
			margin-top: 5.8em;

		}

	}

	@media (min-width: 450px) and (max-width: 539px) {

		.container-principal{

			width: 27.3em;
			margin-left: -0.5em !important;

		}

		.lead{

			width: 21.7em;

		}

		.imagem-equipamento{

			margin-left: -0.5em;
			width: 35px;
			height: 35px;
			margin-bottom: -1.7em;

		}

		.data-horario{

			margin-left: -4.6em;
			display: grid;

		}

		.horarios{

			text-align: center;
			height: 15.5em;
			width: 12em;
			margin-top: -3em;
			margin-left: 10.5em;
			margin-bottom: 2em;

		}

		.horario-entrega{

			margin-top: 5em;
			margin-left: -6.9em;

		}

		.horario-entrada{

			margin-left: 1.6em;

		}

		.horarios label{

			margin-left: 0.4em;

		}

		.horarios p{

			margin-top: 3.3em;
			margin-left: -2.5em;

		}

		.entrada input:invalid + span::after{

			margin-left: 6em;

		}

		.entrada input:valid + span::after{

			margin-left: 6em;

		}

		.entrega input:invalid + span::after{

			margin-left: -2em;

		}

		.entrega input:valid + span::after{

			margin-left: -1.6em;
			margin-top: 5.8em;

		}

		.entrega input:invalid + span::after{

			margin-left: -1.6em;
			margin-top: 5.8em;

		}

	}

	@media (min-width: 300px) and (max-width: 449px) {

		.container-principal{

			width: 23em;

		}

		.lead{

			width: 18.35em;

		}

		.imagem-equipamento{

			width: 35px;
			height: 35px;
			margin-left: -1.5em;
			margin-bottom: -1.8em;

		}

		.data-horario{

			margin-left: -6.8em;
			display: grid;

		}

		.horarios{

			text-align: center;
			height: 15.5em;
			width: 12em;
			margin-top: -3em;
			margin-left: 10.5em;
			margin-bottom: 2em;

		}

		.horario-entrega{

			margin-top: 5em;
			margin-left: -6.9em;

		}

		.horario-entrada{

			margin-left: 1.6em;

		}

		.horarios label{

			margin-left: 0.4em;

		}

		.horarios p{

			margin-top: 3.3em;
			margin-left: -2.5em;

		}

		.entrada input:invalid + span::after{

			margin-left: 6em;

		}

		.entrada input:valid + span::after{

			margin-left: 6em;

		}

		.entrega input:invalid + span::after{

			margin-left: -2em;

		}

		.entrega input:valid + span::after{

			margin-left: -1.6em;
			margin-top: 5.8em;

		}

		.entrega input:invalid + span::after{

			margin-left: -1.6em;
			margin-top: 5.8em;

		}

	}

</style>