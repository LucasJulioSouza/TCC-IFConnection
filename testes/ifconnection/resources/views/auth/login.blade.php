@extends('templates.main', ['titulo' => ""])

@section('titulo') IFConnection @endsection

@section('conteudo')
<div class="container d-flex justify-content-center align-items-center ">
    <div class="card card-lg"> <!-- Adicionei a classe "card-lg" para aumentar o tamanho da div central -->
        <div class="card-body">
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <x-input id="email" class="form-control form-control-lg" type="email" name="email" :value="old('email')" required autofocus /> <!-- Adicionei a classe "form-control-lg" para aumentar o tamanho do input -->
                    <x-label for="email" :value="__('Email')" />
                </div>

                <div class="mb-3">
                    <x-input id="password" class="form-control form-control-lg" type="password" name="password" required autocomplete="current-password" /> <!-- Adicionei a classe "form-control-lg" para aumentar o tamanho do input -->
                    <x-label for="password" :value="__('Senha')" />
                </div>

                <div class="d-flex flex-column justify-content-center align-items-center">
                    <div class="mb-3">
                        <x-button class="btn btn-success btn-lg"> <!-- Adicionei a classe "btn-lg" para aumentar o tamanho do botão -->
                            {{ __('Entrar') }}
                        </x-button>
                    </div>
                    
                    @if (Route::has('password.request'))
                        <div class="mb-3">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Esqueceu sua senha?') }}
                            </a>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
