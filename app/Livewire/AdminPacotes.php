<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Pacote;

class AdminPacotes extends Component
{
    use WithPagination;

    public $nome, $tipo, $preco, $beneficios, $pacoteId;
    public $isEditMode = false;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'tipo' => 'required|string|max:255',
        'preco' => 'required|numeric|min:0',
        'beneficios' => 'nullable|string',
    ];

    public function render()
    {
        return view('livewire.admin-pacotes', [
            'pacotes' => Pacote::paginate(10),
        ]);
    }

    public function resetForm()
    {
        $this->reset(['nome', 'tipo', 'preco', 'beneficios', 'pacoteId', 'isEditMode']);
    }

    public function create()
    {
        $this->validate();

        Pacote::create([
            'nome' => $this->nome,
            'tipo' => $this->tipo,
            'preco' => $this->preco,
            'beneficios' => $this->beneficios,
        ]);

        session()->flash('message', 'Pacote criado com sucesso!');
        $this->resetForm();
    }

    public function edit($id)
    {
        $pacote = Pacote::findOrFail($id);
        $this->pacoteId = $pacote->id;
        $this->nome = $pacote->nome;
        $this->tipo = $pacote->tipo;
        $this->preco = $pacote->preco;
        $this->beneficios = $pacote->beneficios;
        $this->isEditMode = true;
    }

    public function update()
    {
        $this->validate();

        $pacote = Pacote::findOrFail($this->pacoteId);
        $pacote->update([
            'nome' => $this->nome,
            'tipo' => $this->tipo,
            'preco' => $this->preco,
            'beneficios' => $this->beneficios,
        ]);

        session()->flash('message', 'Pacote atualizado com sucesso!');
        $this->resetForm();
    }

    public function delete($id)
    {
        Pacote::findOrFail($id)->delete();
        session()->flash('message', 'Pacote excluído com sucesso!');
    }
}
