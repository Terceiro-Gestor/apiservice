<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <title>CRUD Pessoas com Paginação</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            max-width: 700px;
            margin: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th,
        td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: left;
        }
        input[type="text"],
        input[type="email"] {
            padding: 6px;
            margin-right: 10px;
            width: 250px;
        }
        button {
            padding: 6px 12px;
            cursor: pointer;
        }
        .actions button {
            margin-right: 5px;
        }
        #message {
            margin-top: 10px;
            color: green;
        }
        #error {
            margin-top: 10px;
            color: red;
        }
        #pagination {
            margin-top: 15px;
            user-select: none;
        }
        #pagination button {
            padding: 5px 10px;
            margin-right: 5px;
        }
        #pagination button[disabled] {
            opacity: 0.5;
            cursor: default;
        }
    </style>
</head>
<body>
    <h1>Gerenciar Pessoas (CRUD com Paginação)</h1>

    <form id="person-form">
        <input type="hidden" id="person-id" value="" />
        <input type="text" id="name" placeholder="Nome" required />
        <input type="email" id="email" placeholder="Email" required />
        <button type="submit">Salvar</button>
        <button type="button" id="cancel-edit" style="display: none">Cancelar</button>
    </form>

    <div id="message"></div>
    <div id="error"></div>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="people-list"></tbody>
    </table>

    <div id="pagination"></div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const baseApiUrl = '{{ url("/api/people") }}';
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    const form = document.getElementById('person-form');
    const inputId = document.getElementById('person-id');
    const inputName = document.getElementById('name');
    const inputEmail = document.getElementById('email');
    const cancelBtn = document.getElementById('cancel-edit');
    const messageDiv = document.getElementById('message');
    const errorDiv = document.getElementById('error');
    const peopleList = document.getElementById('people-list');
    const paginationDiv = document.getElementById('pagination');

    let currentPageUrl = baseApiUrl;

    function showMessage(msg) {
        messageDiv.textContent = msg;
        errorDiv.textContent = '';
        setTimeout(() => (messageDiv.textContent = ''), 3000);
    }

    function showError(msg) {
        errorDiv.textContent = msg;
        messageDiv.textContent = '';
        setTimeout(() => (errorDiv.textContent = ''), 5000);
    }

    function loadPeople(url = baseApiUrl) {
        currentPageUrl = url;
        fetch(url)
            .then(response => {
                if (!response.ok) throw new Error('Erro na requisição: ' + response.status);
                return response.json();
            })
            .then(data => {
                peopleList.innerHTML = '';
                data.data.forEach(person => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
                        <td>${person.name}</td>
                        <td>${person.email}</td>
                        <td class="actions">
                            <button onclick="editPerson('${person.id}', '${person.name}', '${person.email}')">Editar</button>
                            <button onclick="deletePerson('${person.id}')">Excluir</button>
                        </td>
                    `;
                    peopleList.appendChild(tr);
                });
                renderPagination(data);
            })
            .catch(() => showError('Erro ao carregar pessoas.'));
    }

    // Monta os botões de paginação
    function renderPagination(data) {
        paginationDiv.innerHTML = '';

        const { current_page, last_page, prev_page_url, next_page_url } = data.meta;

        const btnPrev = document.createElement('button');
        btnPrev.textContent = 'Anterior';
        btnPrev.disabled = !prev_page_url;
        btnPrev.onclick = () => {
            if (prev_page_url) loadPeople(prev_page_url);
        };

        const btnNext = document.createElement('button');
        btnNext.textContent = 'Próximo';
        btnNext.disabled = !next_page_url;
        btnNext.onclick = () => {
            if (next_page_url) loadPeople(next_page_url);
        };

        const pageInfo = document.createElement('span');
        pageInfo.textContent = `Página ${current_page} de ${last_page}`;

        paginationDiv.appendChild(btnPrev);
        paginationDiv.appendChild(pageInfo);
        paginationDiv.appendChild(btnNext);
    }

    window.editPerson = function (id, name, email) {
        inputId.value = id;
        inputName.value = name;
        inputEmail.value = email;
        cancelBtn.style.display = 'inline';
    };

    cancelBtn.addEventListener('click', function () {
        form.reset();
        inputId.value = '';
        cancelBtn.style.display = 'none';
        messageDiv.textContent = '';
        errorDiv.textContent = '';
    });

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        const id = inputId.value.trim();
        const name = inputName.value.trim();
        const email = inputEmail.value.trim();

        if (!name || !email) {
            showError('Nome e Email são obrigatórios.');
            return;
        }

        const method = id ? 'PUT' : 'POST';
        const url = id ? `${baseApiUrl}/${id}` : baseApiUrl;

        fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: JSON.stringify({ name, email }),
        })
            .then(async (response) => {
                if (!response.ok) {
                    const errorData = await response.json();
                    const msg = errorData.message || 'Erro ao salvar.';
                    throw new Error(msg);
                }
                return response.json();
            })
            .then(() => {
                showMessage(id ? 'Pessoa atualizada com sucesso!' : 'Pessoa criada com sucesso!');
                form.reset();
                inputId.value = '';
                cancelBtn.style.display = 'none';
                loadPeople(currentPageUrl);
            })
            .catch((err) => showError(err.message));
    });

    window.deletePerson = function (id) {
        if (!confirm('Confirma exclusão?')) return;

        fetch(`${baseApiUrl}/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                Accept: 'application/json',
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error('Erro ao excluir.');
                showMessage('Pessoa excluída com sucesso!');
                loadPeople(currentPageUrl);
            })
            .catch((err) => showError(err.message));
    };

    // Carrega a primeira página ao abrir
    loadPeople();
});
</script>
</body>
</html>
