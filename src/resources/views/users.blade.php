<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Usuários</title>
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Listar Usuários</h1>

        <!-- Tabela para exibir os usuários -->
        <table id="userTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <!-- Os dados dos usuários serão inseridos aqui -->
            </tbody>
        </table>

        <p id="noUsersMessage" class="text-center d-none">Nenhum usuário cadastrado.</p>

        <a href="{{ route('users.create') }}" class="btn btn-success btn-lg w-100 mt-4">
            <i class="bi bi-person-plus"></i> Adicionar Usuário
        </a>
    </div>

    <script>
        // URL da API
        const apiUrl = 'http://localhost:8000/users';

        // Seleciona os elementos do DOM
        const userTable = document.getElementById('userTable');
        const noUsersMessage = document.getElementById('noUsersMessage');
        const tbody = userTable.querySelector('tbody');

        // Função para buscar e exibir os usuários
        async function fetchUsers() {
            try {
                const response = await fetch(apiUrl);
                if (!response.ok) {
                    throw new Error('Erro ao buscar usuários');
                }

                const users = await response.json();

                // Limpa o conteúdo atual da tabela
                tbody.innerHTML = '';

                if (users.length > 0) {
                    noUsersMessage.classList.add('d-none');
                    users.forEach(user => {
                        const row = `
                            <tr>
                                <td>${user.id}</td>
                                <td>${user.name}</td>
                                <td>${user.email}</td>
                                <td>
                                    <a class="btn btn-warning" href="editUser.php">
                                        <span class="material-symbols-outlined">
                                            manage_accounts
                                        </span>
                                    </a>
                                    <button class="btn btn-danger" onclick="deleteUser(${user.id})">
                                        <span class="material-symbols-outlined">
                                            person_remove
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        `;
                        tbody.innerHTML += row;
                    });
                } else {
                    noUsersMessage.classList.remove('d-none');
                }
            } catch (error) {
                console.error('Erro:', error);
            }
        }

        // Função para deletar um usuário (exemplo)
        async function deleteUser(id) {
            try {
                const response = await fetch(`${apiUrl}/${id}`, {
                    method: 'DELETE',
                });

                if (response.ok) {
                    alert('Usuário deletado com sucesso!');
                    fetchUsers(); // Atualiza a tabela após a exclusão
                } else {
                    alert('Erro ao deletar usuário.');
                }
            } catch (error) {
                console.error('Erro ao deletar usuário:', error);
            }
        }

        // Busca os usuários ao carregar a página
        fetchUsers();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>
