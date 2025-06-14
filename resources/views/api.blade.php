<script>
fetch('{{ url("/api/people") }}')
    .then(response => {
        if (!response.ok) throw new Error('Status HTTP: ' + response.status);
        return response.json();
    })
    .then(data => console.log(data))
    .catch(err => console.error('Fetch error:', err));
</script>