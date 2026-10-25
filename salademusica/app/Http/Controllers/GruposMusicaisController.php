<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GruposMusicais;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GruposMusicaisController extends Controller
{
    
    public function index(){

        $gruposMusicais = GruposMusicais::orderBy("id", "desc")->paginate(4);
        return view("gruposmusicais.inicio-grupos", compact("gruposMusicais"));

    }

    public function create()
    {

        $turmas = ['Nenhuma','Administração', 'Contabilidade', 'Eletrônica', 'Mecânica', 'Informática', 'Petróleo e Gás', 'Processos Fotográficos','Jogos Digitais'];
        $anoSeries = ['Nenhum','1°', '2°', '3°', '4°'];
        return view("gruposmusicais.criar-grupos-form", compact('turmas', 'anoSeries' ));
        
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            
            'nome-grupo' => 'required|string|max:70',
            'informacao-grupo' => 'required|string|max:700',
            'horarios-ensaio' => 'nullable|string|max:70',
            'foto-grupo.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'integrantes.*.foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'integrantes.*.nome' => 'required|string|max:255',
            'integrantes.*.funcao' => 'required|string|max:255',
            'integrantes.*.redeSocial' => 'nullable|string|max:255',
            'integrantes.*.linkRedeSocial' => 'nullable|string|max:255',
            'integrantes.*.turma' => 'required', 'string', 'in:Nenhuma,Administração,Contabilidade,Eletrônica,Mecânica,Informática,Petróleo e Gás,Processos Fotográficos,Jogos Digitais',
            'integrantes.*.anoSerie' => 'required', 'string', 'in:Nenhum,1°,2°,3°,4°',
            'integrantes.*.cor' => ['required', 'string', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'],

        ]);

        if ($request->anoSerie === '4°' && !in_array($request->turma, ['Informática', 'Jogos Digitais'])) 
        {

            return back()->withErrors(['anoSerie' => 'A série 4° só pode ser selecionada para as turmas Informática ou Jogos Digitais.']);

        }
        
        $grupoMusical = new GruposMusicais([

            'nomeGrupo' => $request->input('nome-grupo'),
            'informacaoGrupo' => $request->input('informacao-grupo'),
            'horariosEnsaio' => $request->input('horarios-ensaio'),

        ]);

        $fotoGrupoPaths = [];

        if ($request->hasFile('foto-grupo')) {

            foreach ($request->file('foto-grupo') as $fotoGrupo) 
            {

                if ($fotoGrupo) 
                {

                    $filename = uniqid() . '.' . $fotoGrupo->getClientOriginalExtension();

                    $fotoGrupo->move(public_path('fotosgrupos'), $filename);

                    $fotoGrupoPaths[] = 'fotosgrupos/' . $filename;

                } 

                else 
                {

                    $fotoGrupoPaths[] = null;

                }

            }

        } 
        else 
        {

            $fotoGrupoPaths[] = null;

        }
    
        $grupoMusical->fotoGrupo = json_encode($fotoGrupoPaths);
    
        $integrantes = [];
    
        foreach ($request->integrantes as $integrante) 
        {

            $fotoPath = null;

            if (isset($integrante['foto']) && $integrante['foto']) 
            {

                $filename = uniqid() . '.' . $integrante['foto']->getClientOriginalExtension();
                $integrante['foto']->move(public_path('fotosintegrantes'), $filename);
                $fotoPath = 'fotosintegrantes/' . $filename;

            }
    
            $integrantes[] = [

                'foto' => $fotoPath,
                'nome' => $integrante['nome'],
                'turma' => $integrante['turma'],
                'anoSerie' => $integrante['anoSerie'],
                'funcao' => $integrante['funcao'],
                'redeSocial' => $integrante['redeSocial'] ?? '',
                'linkRedeSocial' => $integrante['linkRedeSocial'] ?? '',
                'cor' => $integrante['cor'],

            ];
            
        }

        $grupoMusical->integrantes = json_encode($integrantes); 

        $grupoMusical->save();

        return redirect()->route('gruposmusicais.inicio-grupos')->with('success', 'Grupo musical criado com sucesso!');

    }

    public function show($id)
    {
    
        $grupoMusical = GruposMusicais::findOrFail($id);
        return view("gruposmusicais.informacoes-grupo", compact("grupoMusical"));
                
    }

    public function edit($id)
    {
    
        $grupoMusical = GruposMusicais::findOrFail($id);
        $turmas = ['Nenhuma','Administração', 'Contabilidade', 'Eletrônica', 'Mecânica', 'Informática', 'Petróleo e Gás', 'Processos Fotográficos','Jogos Digitais'];
        $anoSeries = ['Nenhum','1°', '2°', '3°', '4°'];

        return view("gruposmusicais.editar-grupos-form",compact("grupoMusical", "turmas", "anoSeries"));

    }

    public function update(Request $request, $id)
    {

        $request->validate([

            'nome-grupo' => 'required|string|max:70',
            'informacao-grupo' => 'required|string|max:700',
            'horarios-ensaio' => 'nullable|string|max:70',
            'foto-grupo.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'integrantes' => 'nullable|array',
            'integrantes.*.foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
            'integrantes.*.nome' => 'required|string|max:255',
            'integrantes.*.funcao' => 'required|string|max:255',
            'integrantes.*.redeSocial' => 'nullable|string|max:255',
            'integrantes.*.linkRedeSocial' => 'nullable|string|max:255',
            'integrantes.*.turma' => 'required|string|in:Nenhuma,Administração,Contabilidade,Eletrônica,Mecânica,Informática,Petróleo e Gás,Processos Fotográficos,Jogos Digitais',
            'integrantes.*.anoSerie' => 'required|string|in:Nenhum,1°,2°,3°,4°',
            'integrantes.*.cor' => ['required', 'string', 'regex:/^#([a-f0-9]{6}|[a-f0-9]{3})$/i'],
            
        ]);

        $grupoMusical = GruposMusicais::findOrFail($id);

        $fotosAntigasGrupo = json_decode($grupoMusical->fotoGrupo, true) ?? [];
        $fotoGrupoPaths = $fotosAntigasGrupo;

        if ($request->hasFile('foto-grupo')) 
        {

            foreach ($request->file('foto-grupo') as $fotoGrupo)
            {

                if ($fotoGrupo) 
                {

                    $filename = uniqid() . '.' . $fotoGrupo->getClientOriginalExtension();
                    
                    $fotoGrupo->move(public_path('fotosgrupos'), $filename);

                    $fotoGrupoPaths[] = 'fotosgrupos/' . $filename;

                }

            }

        }

        if ($request->has('remover-foto')) 
        {

            foreach ($request->input('remover-foto') as $index => $remover) 
            {

                if ($remover == '1' && isset($fotoGrupoPaths[$index]))
                {

                    $this->deleteOldGroupPhotos($fotoGrupoPaths[$index]);

                    unset($fotoGrupoPaths[$index]);

                }
                
            }

        }

        if (!empty($fotoGrupoPaths)) 
        {

            $grupoMusical->fotoGrupo = json_encode(array_values(array_filter($fotoGrupoPaths)));

        } 
        else 
        {

            $grupoMusical->fotoGrupo = json_encode([]);

        }

        $grupoMusical->fotoGrupo = json_encode(array_values(array_filter($fotoGrupoPaths)));

        // Integrantes
        $integrantesPaths = json_decode($grupoMusical->integrantes, true) ?? [];

        if (isset($request->integrantes) && is_array($request->integrantes)) 
        {

            foreach ($request->integrantes as $index => $integrante) 
            {
                $fotoPath = null;

                if (isset($integrante['remover']) && $integrante['remover'] == '1')
                {
                    
                    if (isset($integrantesPaths[$index]['foto'])) 
                    {

                        $this->deleteOldMemberPhoto($integrantesPaths[$index]['foto']);

                    }

                    unset($integrantesPaths[$index]);
                    continue;

                }

                if (isset($integrante['foto']) && $integrante['foto']) 
                {

                    if (isset($integrantesPaths[$index]['foto'])) 
                    {

                        $this->deleteOldMemberPhoto($integrantesPaths[$index]['foto']);

                    }

                    $filename = uniqid() . '.' . $integrante['foto']->getClientOriginalExtension();
                    $integrante['foto']->move(public_path('fotosintegrantes'), $filename);
                    $fotoPath = 'fotosintegrantes/' . $filename;

                }
                else 
                {

                    $fotoPath = $integrantesPaths[$index]['foto'] ?? null;

                }

                $integrantesPaths[$index] = [

                    'foto' => $fotoPath,
                    'nome' => $integrante['nome'],
                    'turma' => $integrante['turma'],
                    'anoSerie' => $integrante['anoSerie'],
                    'funcao' => $integrante['funcao'],
                    'redeSocial' => $integrante['redeSocial'] ?? '',
                    'linkRedeSocial' => $integrante['linkRedeSocial'] ?? '',
                    'cor' => $integrante['cor'],

                ];

            }
            
        }

        $grupoMusical->integrantes = json_encode(array_values(array_filter($integrantesPaths)));

        $grupoMusical->nomeGrupo = $request->input('nome-grupo');
        $grupoMusical->informacaoGrupo = $request->input('informacao-grupo');
        $grupoMusical->horariosEnsaio = $request->input('horarios-ensaio');
        
        $grupoMusical->save();

        return redirect()->route('gruposmusicais.inicio-grupos');
        
    }

    private function deleteOldGroupPhotos($fotoGrupo)
    {

        if (file_exists(public_path($fotoGrupo))) 
        {

            unlink(public_path($fotoGrupo));

        }

    }

    private function deleteOldMemberPhoto($fotoMembro)
    {

        if (file_exists(public_path($fotoMembro))) 
        {

            unlink(public_path($fotoMembro));

        }

    }

    public function destroy($id)
    {

        $grupoMusical = GruposMusicais::findOrFail($id);

        $fotosGrupo = json_decode($grupoMusical->fotoGrupo, true) ?? [];

        foreach ($fotosGrupo as $foto) 
        {

            $this->deleteOldGroupPhotos($foto);

        }

        $integrantes = json_decode($grupoMusical->integrantes, true) ?? [];

        foreach ($integrantes as $integrante) 
        {

            if (isset($integrante['foto']) && $integrante['foto']) 
            {

                $this->deleteOldMemberPhoto($integrante['foto']);

            }
            
        }

        $grupoMusical->delete();
            
        return redirect()->route('gruposmusicais.inicio-grupos');

    }

}