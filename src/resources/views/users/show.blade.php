<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Usuário</title>
</head>
<body>
    <h1>Detalhes do Usuário</h1>
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Nome:</strong> {{ $user->name }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <a href="{{ route('users.index') }}">Voltar</a>
</body>
</html>
