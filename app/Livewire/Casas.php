<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CasaDeAposta;

class Casas extends Component
{
    use WithPagination;

    public $nome, $logo_url, $descricao, $avaliacao, $url_review, $selectedId;
    public $isEditMode = false;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'logo_url' => 'nullable|url',
        'descricao' => 'nullable|string|max:500',
        'avaliacao' => 'required|numeric|min:0|max:5',
        'url_review' => 'nullable|url',
    ];

    public function render()
    {
        $casas = CasaDeAposta::paginate(10);
        return view('livewire.casas', compact('casas'));
    }

    public function resetForm()
    {
        $this->reset(['nome', 'logo_url', 'descricao', 'avaliacao', 'url_review', 'selectedId', 'isEditMode']);
    }

    public function create()
    {
        $this->validate();
        CasaDeAposta::create([
            'nome' => $this->nome,
            'logo_url' => $this->logo_url,
            'descricao' => $this->descricao,
            'avaliacao' => $this->avaliacao,
            'url_review' => $this->url_review,
        ]);
        session()->flash('message', 'Casa criada com sucesso!');
        $this->resetForm();
    }

    public function edit($id)
    {
        $casa = CasaDeAposta::findOrFail($id);
        $this->selectedId = $casa->id;
        $this->nome = $casa->nome;
        $this->logo_url = $casa->logo_url;
        $this->descricao = $casa->descricao;
        $this->avaliacao = $casa->avaliacao;
        $this->url_review = $casa->url_review;
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate();
        $casa = CasaDeAposta::findOrFail($this->selectedId);
        $casa->update([
            'nome' => $this->nome,
            'logo_url' => $this->logo_url,
            'descricao' => $this->descricao,
            'avaliacao' => $this->avaliacao,
            'url_review' => $this->url_review,
        ]);
        session()->flash('message', 'Casa atualizada com sucesso!');
        $this->resetForm();
    }

    public function delete($id)
    {
        CasaDeAposta::findOrFail($id)->delete();
        session()->flash('message', 'Casa excluída com sucesso!');
    }
}
