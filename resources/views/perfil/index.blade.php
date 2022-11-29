@extends('layouts.app')


@section('titulo')
Editar perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
<div class="md:flex md:justify-center">
    <div class="md:w-1/2 bg-white shadow p-6">
        <form action="{{ route('perfil.store') }}" method="POST" enctype="multipart/form-data" class="mt-10 md:mt-0">
            @csrf
            @if (session('mensaje'))
            <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
            @endif
            <div class="mb-5">
                <label for="username" id="username" class="m-2 block uppercase text-gray-500 font-bold">
                    Username
                </label>
                <input type="text" id="username" name="username" placeholder="Tu Nombre de Usuario" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ auth()->user()->username }}">
                @error('username')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" id="email" class="m-2 block uppercase text-gray-500 font-bold">
                    Email
                </label>
                <input type="email" id="email" name="email" placeholder="Tu Nombre de Usuario" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{ auth()->user()->email }}">
                @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" id="password" class="m-2 block uppercase text-gray-500 font-bold">
                    Contraseña
                </label>
                <input type="password" id="password" name="password" placeholder="Tu Contraseña" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" value="">
                @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password_confirmation" id="password_confirmation" class="m-2 block uppercase text-gray-500 font-bold">
                    Verificar Contraseña
                </label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Verificar Contraseña" class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror" value="">
                @error('password_confirmation')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="new_password" id="new_password" class="m-2 block uppercase text-gray-500 font-bold">
                    Nueva Contraseña
                </label>
                <input type="password" id="new_password" name="new_password" placeholder="Verificar Contraseña" class="border p-3 w-full rounded-lg @error('new_password') border-red-500 @enderror" value="">
                @error('new_password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="new_password_confirmation" id="new_password_confirmation" class="m-2 block uppercase text-gray-500 font-bold">
                    Verificar Nueva Contraseña
                </label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="Verificar Contraseña" class="border p-3 w-full rounded-lg @error('new_password_confirmation') border-red-500 @enderror" value="">
                @error('new_password_confirmation')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="imagen" id="imagen" class="m-2 block uppercase text-gray-500 font-bold">
                    imagen
                </label>
                <input type="file" id="imagen" name="imagen" accept=".jpg, .jpeg, .png" class="border p-3 w-full rounded-lg">
            </div>
            <input type="submit" value="Guardar Cambios" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
        </form>
    </div>
</div>
@endsection
