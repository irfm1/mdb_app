<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Perfil;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class MultiStepRegistration extends Component
{
    public $currentStep = 1;

    // Etapa 1: Dados User
    public $name, $email, $password, $password_confirmation, $terms;

    // Etapa 2: Verificação de Email
    public $emailVerified = false;

    // Etapa 3: Dados Perfil
    public $genero, $telefone, $cpf, $rg, $data_nascimento, $nacionalidade;

    // Etapa 4: Escolha do Plano
    public $plan = 'free';

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:6',
        'terms' => 'accepted',

    ];

    public function render()
    {
        if (Auth::check() && !Auth::user()->perfil) {
            $this->currentStep = 3; // Redireciona para a etapa de criação do perfil.
        }
        return view('livewire.multi-step-registration')
            ->layout('components.layouts.guest', ['title' => 'Registro de Usuário']);
    }

    public function nextStep()
    {
        Log::info("Validando etapa: {$this->currentStep}");
        if ($this->currentStep == 1) {
            $validatedData = $this->validate($this->rules);
            Log::info("Dados validados na Etapa 1: ", $validatedData);
            $this->createUser();
            Log::info("Usuário criado com sucesso após validação da Etapa 1.");
        }

        if ($this->currentStep == 2) {
            if (!$this->emailVerified) {
                session()->flash('error', 'Confirme o e-mail antes de prosseguir.');
                Log::warning("E-mail ainda não confirmado.");
                return;
            }
            Log::info("E-mail verificado com sucesso.");
        }

        if ($this->currentStep == 3) {
            $this->validatePerfil();
            Log::info("Perfil validado com sucesso.");
            $this->createPerfil();
            Log::info("Perfil criado com sucesso.");
        }

        // Incrementa a etapa
        $this->currentStep++;
        Log::info("Avançando para a Etapa: {$this->currentStep}");
    }


    public function previousStep()
    {
        $this->currentStep--;
    }

    public function verifyEmail()
    {
        //todo: Enviar email de confirmação
        $this->emailVerified = true; // Simula a confirmação de email
    }

    private function createUser()
    {
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);
    }

    private function validatePerfil()
    {
        $this->validate([
            'genero' => 'required|string',
            'telefone' => 'required|digits_between:10,15',
            'cpf' => 'required|digits:11',
            'data_nascimento' => 'required|date',

        ]);
    }

    private function createPerfil()
    {
        Perfil::create([
            'user_id' => Auth::id(),
            'genero' => $this->genero,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'data_nascimento' => $this->data_nascimento,
        ]);
    }

    public function submit()
    {
        $user = Auth::user();
        $user->perfil->update(['plan' => $this->plan]);

        return redirect()->route('dashboard')->with('success', 'Registro concluído com sucesso!');
    }
}
