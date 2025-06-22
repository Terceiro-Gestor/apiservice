<!-- Stepper lateral -->
<ol class="flex flex-row items-center w-full h-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-xs dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
    <li class="flex-1 flex flex-col items-center">
        <button type="button" class="flex flex-row items-center w-full justify-center" @click="step = 1" :class="step === 1 ? 'font-bold text-blue-600 ' : ''">
            <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500"> 1 </span>
            <span class="">Dados Pessoais</span>
            <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 12 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m7 9 4-4-4-4M1 9l4-4-4-4" />
            </svg>
        </button>
    </li>
    <li class="flex-1 flex flex-col items-center">
        <button type="button" class="flex flex-row items-center w-full justify-center" @click="step = 2" :class="step === 2 ? 'font-bold text-blue-600 ' : ''">
            <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                2
            </span> 
            <span class="hidden sm:inline-flex sm:ms-2">Endereço</span>
            <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 12 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m7 9 4-4-4-4M1 9l4-4-4-4" />
            </svg>
        </button>
    </li>
    <li class="flex-1 flex flex-col items-center">
        <button type="button" class="flex flex-row items-center w-full justify-center" @click="step = 3" :class="step === 3 ? 'font-bold text-blue-600 ' : ''">
            <span class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                3
            </span> 
            <span class="hidden sm:inline-flex sm:ms-2">Contato</span>
            <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 12 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m7 9 4-4-4-4M1 9l4-4-4-4" />
            </svg>
        </button>
    </li>
    <li class="flex-1 flex flex-col items-center">
        <button type="button" class="flex flex-row items-center w-full justify-center" @click="step = 4" :class="step === 4 ? 'font-bold text-green-600 ' : ''">
            <span
                class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                4
            </span>
            Composição Familiar
        </button>
    </li>
    <li class="flex-1 flex flex-col items-center">
        <button type="button" class="flex flex-row items-center w-full justify-center" @click="step = 5" :class="step === 5 ? 'font-bold text-green-600 ' : ''">
            <span
                class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                5
            </span>
            Saúde
        </button>
    </li>
    <li class="flex-1 flex flex-col items-center">
        <button type="button" class="flex flex-row items-center w-full justify-center" @click="step = 6" :class="step === 6 ? 'font-bold text-green-600 ' : ''">
            <span
                class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                6
            </span>
            Perfil Financeiro
        </button>
    </li>
    <li class="flex-1 flex flex-col items-center">
        <button type="button" class="flex flex-row items-center w-full justify-center" @click="step = 10" :class="step === 10 ? 'font-bold text-green-600 ' : ''">
            <span
                class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                10
            </span>
            Confirmar
        </button>
    </li>
</ol>
