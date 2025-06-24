<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">Perfil da Pessoa</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p><strong>Nome completo:</strong> {{ $person->full_name }}</p>
                <p><strong>Email:</strong> {{ $person->email }}</p>
                <p><strong>Gênero:</strong> {{ $person->gender }}</p>
                <p><strong>Data de nascimento:</strong>
                    {{ \Carbon\Carbon::parse($person->birth_date)->format('d/m/Y') }}</p>
            </div>

            <div>
                <p><strong>CPF:</strong> {{ $person->cpf }}</p>
                <p><strong>RG:</strong> {{ $person->rg }}</p>
                <p><strong>NIS:</strong> {{ $person->nis }}</p>
                <p><strong>Estado civil:</strong> {{ $person->marital_status }}</p>
            </div>
        </div>

        {{-- Contatos, Endereço, e outros dados opcionais podem ser incluídos aqui --}}
    </div>
</x-app-layout>
