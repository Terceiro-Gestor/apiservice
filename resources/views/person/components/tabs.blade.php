<div class="border-b border-gray-200 dark:border-gray-700 dark:bg-gray-800">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center text-gray-500 dark:text-gray-400 ">

        <template x-for="(tab, index) in tabs" :key="index">
            <li class="me-2">
                <button @click="step = index + 1"
                    class="inline-flex items-center justify-center p-4 border-b-2 rounded-t-lg group dark:bg-gray-700"
                    :class="step === index + 1 ?
                        'text-blue-600 border-blue-600 bg-indigo-50 dark:text-blue-500 dark:border-blue-500' :
                        'border-transparent hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 bg-gray-50'">
                    <span x-html="tab.icon"
                        class="text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300"></span>
                    <span x-text="tab.title" class="ml-1"></span>
                </button>
            </li>
        </template>

    </ul>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('tabs', () => ({
            step: 1,
            tabs: [{
                    title: 'Dados Pessoais',
                    icon: `<svg class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" /></svg>`
                },
                {
                    title: 'Endereço',
                    icon: `<svg class="w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
</svg>
`
                },
                {
                    title: 'Contatos',
                    icon: `<svg class="w-4 h-4 me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
</svg>
`
                },
                {
                    title: 'View',
                    icon: `<svg class="w-4 h-4 me-2 text-gray-400 group-hover:text-gray-500 dark:text-gray-500 dark:group-hover:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20"><path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Z"/></svg>`
                }
            ]



        }))
    });
</script>
