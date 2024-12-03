@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ $user->name }}" required>
        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" value="{{ $user->email }}" required>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password">
    <button type="submit">Actualizar Usuario</button>
</form>

</div>
@endsection
