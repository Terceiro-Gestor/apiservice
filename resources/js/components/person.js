<script>
    function personAddressComponent() {
    return {
        address: null,
        isModalOpen: false,

        initAddress(data) {
            this.address = data;
            console.log('Endereço inicial:', data);
        },

        openModal() {
            this.isModalOpen = true
        },
        closeModal() {
            this.isModalOpen = false
        },

        async submitForm() {
            Swal.fire({
                icon: 'info',
                title: 'Enviando dados!',
                timer: 2000,
                showConfirmButton: false
            });
            const formEl = this.$refs.form;
            const formData = new FormData(formEl);

            try {
                let res = await fetch('{{ route('addresses.store') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData,
                });

                if (!res.ok) throw new Error('Erro ao salvar endereço');

                const address = await res.json();

                // Aqui você pode vincular também, como já configuramos antes
                this.address = address;
                this.closeModal();

                Swal.fire({
                    icon: 'success',
                    title: 'Endereço salvo!',
                    timer: 2000,
                    showConfirmButton: false
                });

            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: error.message || 'Falha ao salvar endereço'
                });
            }
        }
    }
}
</script>
