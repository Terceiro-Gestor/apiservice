<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>People List</title>
</head>
<body>
    <h1>Lista de Pessoas</h1>
    <ul id="people-list"></ul>

    <script>
        fetch('http://localhost:8000/api/people')
            .then(response => response.json())
            .then(data => {
                const list = document.getElementById('people-list');
                data.forEach(person => {
                    const li = document.createElement('li');
                    li.textContent = person.name;
                    list.appendChild(li);
                });
            })
            .catch(error => console.error('Erro ao buscar pessoas:', error));
    </script>
</body>
</html>
