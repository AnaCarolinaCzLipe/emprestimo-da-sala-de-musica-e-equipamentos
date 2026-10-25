<link rel="icon" width="50px" href="/assets/images/icone-site.png">

<x-app-layout>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Histórico de penalizações de {{$usuario->nome}}</title>

    <section style="margin-bottom: 25em;" class="py-10 mx-auto px-4 sm:px-6 lg:px-8">

        <div class="conteudo-principal mx-auto py-6 p-4 sm:p-8 bg-white shadow sm:rounded-lg">

            <div style="margin-bottom: 4em;">

                <h1 style="margin-bottom: 1em;"> Histórico de penalizações de {{$usuario->nome}}</h1>

            </div>

            <div class="table-responsive-xxl">

                <table class="table">

                    <thead style="text-align: center;">

                        <th scope="col" width="5%">Motivo da Penalização</th>
                            
                        <th scope="col" width="5%">Dia da Penalização</th>

                        <th scope="col" width="5%">Tempo da Penalização</th>

                    </thead>

                    <tbody style="text-align: center;">

                        @foreach($penalizacoes as $penalizacao)

                            <tr> 

                                <td><div>{{$penalizacao->motivo_penalizacao}}</div></td>

                                <td><div>{{$penalizacao->created_at->format('d/m/Y H:i')}}</div></td>
                                        
                                <td><div>{{$penalizacao->penalizacao_tempo_historico->format('d/m/Y H:i')}}</div></td>

                            </tr>

                           @endforeach

                    </tbody>

                </table>

            </div>

            <div class="paginacao">

                {!! $penalizacoes->links() !!}
                
            </div>

        </div>

    </section>

    @include('footer.footer')
    
</x-app-layout>

<style>

    *{

        text-decoration: none !important;

    }

    .main{

        background-color: #ffdede;

    }

    .conteudo-principal{

        text-align: center;
        margin-bottom: 10.1em;

    }

    td div{

        padding: 1em !important;   

    }

    .paginacao{

        margin: auto;
        margin-top: 1em;
        padding-right: 13em;
        width: 1%;
    }

    @media (min-width: 7680px) {

        .personalizacao-footer{

            margin-top: 175em;

        } 

    }

    @media (min-width: 5760px) and (max-width: 7679px) {

        .personalizacao-footer{

            margin-top: 116em;

        } 

    }

    @media (min-width: 3600px) and (max-width: 4799px) { 

        .personalizacao-footer{

            margin-top: 54.2em;

        }

    }

    @media (min-width: 450px) and (max-width: 539px) {

        .conteudo-principal{

            border-radius: 5px;

        }

    }

    @media (min-width: 300px) and (max-width: 449px) {

        .conteudo-principal{

            border-radius: 5px;

        }

        thead, tbody{


        }

    }

</style>