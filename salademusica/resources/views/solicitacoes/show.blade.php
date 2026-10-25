<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<title>Informações da Solicitação</title>

	<div class="p-4 rounded">
		
		<div class="container container-principal mx-auto sm:px-6 lg:px-8">
		
			<ol>

				<div>

					<a href="{{ route('solicitacoes.index') }}" class="voltar">
						
						<svg style="margin-top:1px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
						</svg>

						<button class="voltar-botao">Voltar</button>
					
					</a>
					
				</div>

				<div class="lead">

					<h1>Dados da solicitação</h1>
		
				</div>
					
				<li>
					
					<dt>

						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
						</svg>

						 Solicitação
					
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
							<path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
							<path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
						</svg>

						:

					</dt>
					
					<dd class="motivo-solicitacao">{{$solicitacao->motivoSolicitacao}}</dd>
					
				</li>
					
				<li>
					
					<dt>
						
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
						</svg>

						Status
					
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-hourglass" viewBox="0 0 16 16">
							<path d="M2 1.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1-.5-.5m2.5.5v1a3.5 3.5 0 0 0 1.989 3.158c.533.256 1.011.791 1.011 1.491v.702c0 .7-.478 1.235-1.011 1.491A3.5 3.5 0 0 0 4.5 13v1h7v-1a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351v-.702c0-.7.478-1.235 1.011-1.491A3.5 3.5 0 0 0 11.5 3V2z"/>
						</svg>

						:

					</dt>

					@switch($solicitacao->status)

						@case('Alterado')

							<dd><span class="status-alterado">Alterado</span></dd>

						@break

						@default

						<dd><span class="status-pendente">{{ $solicitacao->status }}</span></dd>

					@endswitch
					
				</li>

				<li>
					
					<dt>
						
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
						</svg>

						Dia de Empréstimo
						
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-calendar-plus" viewBox="0 0 16 16">
							<path d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7"/>
							<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
						</svg>
					
						:

					</dt>

					<dd>{{date('d/m/Y', strtotime($solicitacao->diaEmprestimo))}}</dd>
						
				</li>

				<li>
					
					<dt>

						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
						</svg>

						Horário de Entrada
					
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
							<path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
							<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
						  </svg>

						:

					</dt>
					
					<dd>{{date('H:i', strtotime($solicitacao->horarioEntrada))}}</dd>
							
				</li>

				<li>
					
					<dt>

						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-return-right" viewBox="0 0 16 16">
							<path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 0 1 2v4.8a2.5 2.5 0 0 0 2.5 2.5h9.793l-3.347 3.346a.5.5 0 0 0 .708.708l4.2-4.2a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 8.3H3.5A1.5 1.5 0 0 1 2 6.8V2a.5.5 0 0 0-.5-.5"/>
						</svg>

						Horário de Entrega
					
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
							<path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
							<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
						  </svg>

						:

					</dt>
					
					<dd>{{date('H:i', strtotime($solicitacao->horarioEntrega))}}</dd>
							
				</li>

				<div class="botoes">

					<a href="{{ route('solicitacoes.create') }}"><button type="button" class="btn btn-success criar-botao">Criar uma Nova Solicitação</button></a>

					<a href="{{ route('solicitacoes.edit', $solicitacao->id) }}"><button type="button" class="btn btn-warning editar-botao">Editar Solicitação</button></a>
					
				</div>

			</ol>
					
		</div>

	</div>

    @include('footer.footer')

</x-app-layout>

<style>

	*{

		text-decoration: none !important;

	}

	.container-principal{

		margin-top: 5em;
		background-color: white;
		border-radius: 10px;
		border:2px dashed #4fdb64;
		width: 60em;
		padding: 50px;
		margin-bottom: 20em;

	}

	.main{

		background-color: #e3f8e6 !important;

	}

	.lead{

		display: grid;
		text-align: center;
		margin-bottom: 2em;

	}

	.lead h1{

		margin-top: -1em;

	}

	li{

		display: flex;
		gap: 10px;


	}

	dt{

		display: flex;
		gap: 5px;
		padding-bottom: 4em;
		

	}

    .status-pendente{

        position: relative;
        border: 2px solid #bfc200;
        padding: 0.2em;
        border-radius: 10px;
        color: black !important;
        background-color: #fbff00; 

    }

    .status-alterado{

        position: relative;
        border: 2px solid #bfc200;
        padding: 0.2em;
        border-radius: 10px;
        color: black !important;
        background-color: #fdff6d;   

    }

	.criar-botao, .editar-botao{

		padding: 10px;

	}

	.criar-botao{

		background-color: #4fdb64;
		border: 2px solid green;
		font-weight: 500;
		color: black;

	}

	.editar-botao{

		background-color: #fbff00;
		border: 2px solid #959700;
		font-weight: 500;
		color: black;

	}

	.botoes{

		margin-top: 1em;
		text-align: center;

	}

	.voltar{

		display: flex;
		gap:10px;
		color: black;
		background-color: #a1ffaf;
		width: 6em;
		height: 2em;
		padding: 5px;
		border-radius: 10px;
		border: 2px solid rgba(0, 128, 0, 0.658);
	}

	.voltar-botao{

		color: black;
		margin-top: -2px;
		font-weight: 500;
		z-index: 1;

	}

	@media (min-width: 750px) and (max-width: 899px) {

		.voltar{

			margin-left:-4.5em;

		}

	}

	@media (min-width: 600px) and (max-width: 659px) {

		.lead h1{

			margin-top: 1em;

		}

		.botoes button{

			margin-top: 1em;

		}

		li{

			margin-left: -3em;
			margin-block: 2em;
		}

	}

	@media (min-width: 7680px) {

		.personalizacao-footer{

			margin-top: 139.8em;

		}	

	}

	@media (min-width: 5760px) and (max-width: 7679px) {

		.personalizacao-footer{

			margin-top: 79.6em;

		}

	}

	@media (min-width: 3600px) and (max-width: 4799px) { 

		.personalizacao-footer{

			margin-top: 19.2em;

		}

	}

	@media (min-width: 450px) and (max-width: 539px) {

		.container-principal{

			width: 27em;

		}

		.lead h1{

			margin-top: 1em;

		}

		.botoes button{

			margin-top: 1em;

		}

		.pendente{

			text-align: center;
			height: 3.5em;

		}

		li{

			margin-left: -4em;
			margin-block: 2em;

		}

	}

	@media (min-width: 300px) and (max-width: 449px) {

		.container-principal{

			width: 20.5em;

		}

		.lead h1{

			margin-top: 1em;

		}

		.botoes button{

			margin-top: 1em;

		}

		.pendente{

			text-align: center;
			height: 3.5em;

		}

		dt{

			gap: 0;

		}

		li{

			margin-left: -4.5em;
			margin-block: 2em;

		}

		.motivo-solicitacao{

			max-width: 10em;

		}

	}

</style>