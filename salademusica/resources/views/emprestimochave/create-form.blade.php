<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	
	<title>Criar uma Nova Solicitação</title>

	<div class="p-4 rounded" style="background-color: #e3f8e6;">
	
		<div class="container container-principal mx-auto sm:px-6 lg:px-8">
			
			<div class="lead">
			
				<svg class="imagem-envio" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-send-plus-fill" viewBox="0 0 16 16">
					<path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z"/>
					<path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5"/>
				</svg>

				<h2>Criar uma Nova Solicitação</h2>
		
			</div>

			<form method="POST" action="{{ route('emprestimochave.store', auth()->user()->nome)}}">
				@csrf
					
				<div class="criar-solicitacao">
					
					<label for="texto" class="form-label">Justificativa da Solicitação</label>
						
					<textarea maxlength="100" id="texto-solicitacao" class="texto-solicitacao" name="texto-solicitacao" placeholder="Insira sua solicitação aqui" rows="1" cols="1" required>{{ old('texto') }}</textarea>
					
					<span id="limite-caracteres" class="limite-caracteres">100</span>

					@if ($errors->has('texto'))
						
						<span class="text-danger text-left">{{ $errors->first('texto') }}</span>
							
					@endif
						
				</div>

				<div class="data-horario">
					
					<div class="data-solicitacao" style="border:2px solid #c3e6c8; border-radius:10px; padding:25px;">

						<label for="dia-emprestimo" class="form-label">Data de Entrada</label>
						
						<input value="{{ old('diaEmprestimo') }}" type="date" max="9999-12-31" class="dia-emprestimo" name="dia-emprestimo" required onclick="verificarData()">
						
						<span class="erro-data"></span>

						@if ($errors->has('diaEmprestimo'))
							
							<span class="text-danger text-left">{{ $errors->first('diaEmprestimo') }}</span>
							
						@endif
						
					</div>

					<div class="horarios" style="border:2px solid #c3e6c8; border-radius:10px; padding:25px;">

						<label for="horario-entrada" class="form-label">Horários de Uso</label>

						<div class="horarios-div">

							<div class="entrada">
							
								<input value="{{ old('horarioEntrada') }}" min="07:00" max="18:50" type="time" class="horario-entrada" name="horario-entrada" placeholder="Horário de Entrada da Chave" required>
					
								<span class="validacao-2"></span>

								@if ($errors->has('horarioEntrada'))

									<span class="text-danger text-left">{{ $errors->first('horarioEntrada') }}</span>

								@endif

							</div>
															
							<p>até</p>

							<div class="entrega">

								<input value="{{ old('horarioEntrega') }}" min="07:10" max="19:00" type="time" class="horario-entrega" name="horario-entrega" placeholder="Horário de Entrega da Chave" required>
						
								<span class="validacao-2"></span>

								@if ($errors->has('horarioEntrega'))

									<span class="text-danger text-left">{{ $errors->first('horarioEntrega') }}</span>
											
								@endif

							</div>			

						</div>

						<span style="font-size: 12px; color:gray;">Horários Disponíveis: Das 7:00 até às 19:00</span>

					</div>

				</div>
					
				<div class="botoes">

					<button type="submit" class="btn btn-success" style="margin-right:30px; padding:10px; width:8em;">Salvar</button>
						
					<a href="{{ route('emprestimochave.index')}}"><button type="button" style="padding:10px; width:8em;" class="btn btn-danger">Cancelar</button></a>

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

		background-color: #e3f8e6 !important;

	}
	
	.container-principal{

		background-color: white;
		border-radius: 10px;
		border:2px solid #c3e6c8;
		width: 60em;
		margin-bottom: 20em;
		margin-top: 2em;

	}

	.criar-solicitacao{

		padding:30px;
		text-align: center;
		font-size: 30px;
		font-weight: 500;
		display: grid;

	}

	.lead{

		position: relative;
		border-bottom: 1px solid #c3e6c8;
		padding: 30px;
		width: 47.9em;
		margin-left: -13px;
		text-align: center;
		justify-content: center;
		border-top-right-radius: 6px;
		border-top-left-radius: 6px;
		background-color: #c3e6c8;

	}

	.imagem-envio{

		position: relative;
		margin-left: 9em;
		margin-bottom: -2em;
		color: #00300a;

	}

	.titulo-solicitacao{

		border: 2px solid #c3e6c8;
		border-radius: 10px;
		background-color: #f8f8f8;

	}

	.titulo-solicitacao:focus {

		outline: none !important;
		border:2px solid rgba(0, 255, 0, 0.603);
		box-shadow: 0 0 10px #71ce85;

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
		border:1px solid rgba(0, 255, 0, 0.603);
		box-shadow: 0 0 10px #71ce85;

	}

	.botoes{

		margin-bottom:3em;
		text-align: center;

	}

	.horario-entrada{

		position: absolute;
		border: 2px solid #c3e6c8;
		background-color: #f8f8f8;
		border-radius: 10px;
		height: 3em;
		width: 6em !important;

	}
	
	.horario-entrega{

		border: 2px solid #c3e6c8;
		background-color: #f8f8f8;
		border-radius: 10px;
		height: 3em;
		width: 6em;
		margin-left: -2.1em;

	}

	.form-control{

		border: 2px solid #c3e6c8;
		background-color: #f8f8f8;

	}

	.form-control:focus, .data-horario input:focus{

		outline: none !important;
		border:2px solid rgba(0, 255, 0, 0.603);
		box-shadow: 0 0 10px #71ce85;

	}

	.data-solicitacao{

		display: grid;
		width: 10em;
		margin-bottom: 2em;

	}

	.data-solicitacao input{

		width: 11em;
		border: 2px solid #c3e6c8;
		background-color: #f8f8f8;
		border-radius: 10px;

	}

	.data-horario{

		display: flex;
		margin-left: 3em;
		gap:50px;

	}

	.horarios{

		width: 19em;
		height: 10.6em;

	}

	.horarios-div{

		display: flex;
		gap:50px;

	}

	.horarios label{

		font-size: 25px;
		font-weight: 500;
		cursor: text;
		margin-left: 1.3em;

	}

	.horarios p {

		margin-top: 0.7em;
		margin-left: 0.9em;
		font-weight: 500;

	}

	.limite-caracteres {

        position: absolute;
        font-size: 12px;
        color: grey;
		margin-top: 9.5em;
		margin-left: 70em;

    }

	input[type="time"]::-webkit-calendar-picker-indicator {
		
		display: none;

	}

	input[type="number"] {
  	
		width: 100px;
	
	}

	input + span {
	
		padding-right: 50px;
	
	}

	.entrada input:invalid + span::after {
	
		position: absolute;
		content: "✖";
		color: red;
		margin-left: 4.6em;
		margin-top: 0.8em;

	}

	.entrada input:valid + span::after {
	
		position: absolute;
		content: "✓";
		color: #00801c;
		margin-left: 4.6em;
		margin-top: 0.8em;
		
	}

	.entrega input:invalid + span::after {
	
		position: absolute;
		content: "✖";
		color: red;
		margin-left: 2.4em;
		margin-top: -2.2em;

	}

	.entrega input:valid + span::after {

		position: absolute;
		content: "✓";
		color: #00801c;
		margin-left: 2.4em;
		margin-top: -2.2em;
		
	}
	
	::-webkit-datetime-edit-text { 
		
		color: rgb(33, 65, 35); 
		padding: 0 0.3em; 
	
	}

	::-webkit-datetime-edit-month-field, ::-webkit-datetime-edit-day-field, ::-webkit-datetime-edit-year-field{ 
		
		color: #035314; 
		text-transform: uppercase;
	
	}

	::-webkit-inner-spin-button { 
		
		display: none; 
	
	}

	@media (min-width: 7680px) {

		.personalizacao-footer{

			margin-top: 131em

		}

	}

	@media (min-width: 5760px) and (max-width: 7679px) {

		.personalizacao-footer{

			margin-top: 71.3em

		}

	}

	@media (min-width: 3600px) and (max-width: 4799px) { 

		.personalizacao-footer{

			margin-top: 11.4em

		}

	}

    @media (min-width: 900px) and (max-width: 1049px) {

		.lead{

			width: 35.9em;

		}

		.imagem-envio{

			margin-left: 3.8em;

		}

		.data-horario{

			margin-left: -6em;

		}

		.limite-caracteres{

			margin-left: 50em;

		}

	}

	@media (min-width: 750px) and (max-width: 899px) {

		.lead{

			width: 35.9em;

		}

		.imagem-envio{

			margin-left: 3.8em;

		}

		.data-horario{

			margin-left: -6em;

		}

		.limite-caracteres{

			margin-left: 50em;

		}

	}

	@media (min-width: 600px) and (max-width: 659px) {

		.lead{

			width: 26.9em;

		}

		.imagem-envio{

			margin-left: 0.01em;

		}

		.data-horario{

			margin-left: -8.5em;
			margin-bottom: 2em;

		}

		.horarios{

			text-align: center;
			height: 18.5em;
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

		.limite-caracteres{

			margin-left: 35em;

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

		.imagem-envio{

			margin-left: -1.4em;

		}

		.data-horario{

			margin-left: -4.6em;
			display: grid;

		}

		.horarios{

			text-align: center;
			height: 18.5em;
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

		.limite-caracteres{

			margin-left: 26.5em;
			margin-top: 13em;

		}

	}

	@media (min-width: 300px) and (max-width: 449px) {

		.container-principal{

			width: 23em;

		}

		.lead{

			width: 18.35em;

		}

		.imagem-envio{

			margin-left: -0.1em;

		}

		.data-horario{

			margin-left: -6.8em;
			display: grid;

		}

		.horarios{

			text-align: center;
			height: 18.5em;
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

		.limite-caracteres{

			margin-left: 19em;
			margin-top: 13em;

		}

	}

</style>

<script>

	function verificarHorarios() {

		var horarioEntrada = document.querySelector('.horario-entrada').value;
        var horarioEntrega = document.querySelector('.horario-entrega').value;

        var entradaDate = new Date('1970-01-01T' + horarioEntrada);
        var entregaDate = new Date('1970-01-01T' + horarioEntrega);

        var horarioLimiteEntrada = new Date('1970-01-01T18:50');
        var horarioLimiteEntrega = new Date('1970-01-01T19:00');
        var horarioMinimoEntrada = new Date('1970-01-01T07:00');
        var horarioMinimoEntrega = new Date('1970-01-01T07:10');

    	if (entradaDate <= horarioLimiteEntrada && entradaDate >= horarioMinimoEntrada && entregaDate <= horarioLimiteEntrega && entregaDate >= horarioMinimoEntrega) 
		{

			document.querySelector('button[type="submit"]').disabled = false;

        } 
		else 
		{

			document.querySelector('button[type="submit"]').disabled = true;

        }
    }

    document.querySelector('.horario-entrada').addEventListener('change', verificarHorarios);
    document.querySelector('.horario-entrega').addEventListener('change', verificarHorarios);

    verificarHorarios();

	const textarea = document.getElementById('texto-solicitacao');
    const charCount = document.getElementById('limite-caracteres');
    const maxLength = textarea.getAttribute('maxlength');

    textarea.addEventListener('input', function() 
	{

        const remaining = maxLength - textarea.value.length;
        charCount.textContent = remaining;

    });

</script>