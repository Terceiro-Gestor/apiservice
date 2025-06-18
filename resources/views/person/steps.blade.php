<!-- Stepper lateral -->
<ol class="relative text-gray-500 border-s border-gray-200 dark:border-gray-700 dark:text-gray-400">
    <li class="mb-10 ms-6 cursor-pointer">
        <button type="button" @click="step = 1" :class="step === 1 ? 'font-bold text-blue-500 ' : ''">
            <span
                class="absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 transition-colors duration-300"
                :class="step === 1 ?
                    'bg-blue-200 dark:bg-blue-900' :
                    'bg-gray-100 dark:bg-gray-700'">
                <svg class="w-3.5 h-3.5 text-blue-500 dark:text-blue-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5.917 5.724 10.5 15 1.5" />
                </svg>
            </span>
            <h3 class="font-medium leading-tight">Dados Pessoais</h3>
        </button>
    </li>

    <li class="mb-10 ms-6 cursor-pointer">
        <button type="button" @click="step = 2" :class="step === 2 ? 'font-bold text-indigo-600 ' : ''">
            <span
                class="absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 transition-colors duration-300"
                :class="step === 2 ?
                    'bg-blue-200 dark:bg-blue-900' :
                    'bg-gray-100 dark:bg-gray-700'">
                <svg class="w-3.5 h-3.5 text-blue-500 dark:text-blue-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path
                        d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z" />
                </svg>
            </span>
            <h3 class="font-medium leading-tight">Endereço</h3>
        </button>
    </li>
    <li class="ms-6 cursor-pointer">
        <button type="button" @click="step = 3" :class="step === 3 ? 'font-bold text-indigo-600 ' : ''">
            <span
                class="absolute flex items-center justify-center w-8 h-8 rounded-full -start-4 ring-4 ring-white dark:ring-gray-900 transition-colors duration-300"
                :class="step === 3 ?
                    'bg-blue-200 dark:bg-blue-900' :
                    'bg-gray-100 dark:bg-gray-700'">
                <svg class="w-3.5 h-3.5 text-blue-500 dark:text-blue-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path
                        d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z" />
                </svg>
            </span>
            <h3 class="font-medium leading-tight">Confirmação</h3>
        </button>
    </li>
</ol>
