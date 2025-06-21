<ol class=" overflow-hidden space-y-8">

    <li class="relative flex-1 w-full after:content-[''] after:w-0.5 after:h-full after:inline-block after:absolute after:-bottom-11 after:left-1/2 transition-all"
        :class="step > 1 ? 'after:bg-indigo-600' : 'after:bg-gray-200'">
        <div class="flex items-center justify-center gap-8 w-full">
            <button type="button" class="w-full" @click="step = 1">
                <div class="flex items-center gap-3.5 p-3.5 rounded-xl relative z-10 w-full transition"
                    :class="step >= 1 ? 'bg-indigo-50 border border-indigo-600' : 'bg-gray-50 border border-gray-50'">
                    <div class="rounded-lg flex items-center justify-center transition"
                        :class="step >= 1 ? 'bg-indigo-600' : 'bg-gray-200'">
                        <span :class="step >= 1 ? 'text-white' : 'text-gray-600'" class="p-3 transition">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M15.9998 7C15.9998 9.20914 14.2089 11 11.9998 11C9.79067 11 7.99981 9.20914 7.99981 7C7.99981 4.79086 9.79067 3 11.9998 3C14.2089 3 15.9998 4.79086 15.9998 7Z"
                                    stroke="currentColor" stroke-width="1.6" />
                                <path
                                    d="M11.9998 14C9.15153 14 6.65091 15.3024 5.23341 17.2638C4.48341 18.3016 4.10841 18.8204 4.6654 19.9102C5.2224 21 6.1482 21 7.99981 21H15.9998C17.8514 21 18.7772 21 19.3342 19.9102C19.8912 18.8204 19.5162 18.3016 18.7662 17.2638C17.3487 15.3024 14.8481 14 11.9998 14Z"
                                    stroke="currentColor" stroke-width="1.6" />
                            </svg>
                        </span>
                    </div>
                    <div class="flex items-start rounded-md justify-center flex-col">
                        <h6 class="text-base font-semibold text-black mb-0.5">
                            Dados Pessoais
                        </h6>
                    </div>
                </div>
            </button>
        </div>
    </li>

    <li class="relative flex-1 w-full after:content-[''] after:w-0.5 after:h-full after:inline-block after:absolute after:-bottom-11 after:left-1/2 transition-all"
        :class="step > 2 ? 'after:bg-indigo-600' : 'after:bg-gray-200'">
        <div class="flex items-center justify-center gap-8 w-full">
            <button type="button" class="w-full" @click="step = 2">
                <div class="flex items-center gap-3.5 p-3.5 rounded-xl relative z-10 w-full transition"
                    :class="step >= 2 ? 'bg-indigo-50 border border-indigo-600' : 'bg-gray-50 border border-gray-50'">
                    <div class="rounded-lg flex items-center justify-center transition"
                        :class="step >= 2 ? 'bg-indigo-600' : 'bg-gray-200'">
                        <span :class="step >= 2 ? 'text-white' : 'text-gray-600'" class="p-3 transition">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z" />
                            </svg>

                        </span>
                    </div>
                    <div class="flex items-start rounded-md justify-center flex-col">
                        <h6 class="text-base font-semibold text-black mb-0.5">
                            Endereço
                        </h6>
                    </div>
                </div>
            </button>
        </div>
    </li>

    <li class="relative flex-1 w-full after:content-[''] after:w-0.5 after:h-full after:inline-block after:absolute after:-bottom-11 after:left-1/2 transition-all"
        :class="step > 3 ? 'after:bg-indigo-600' : 'after:bg-gray-200'">
        <div class="flex items-center justify-center gap-8 w-full">
            <button type="button" class="w-full" @click="step = 3">
                <div class="flex items-center gap-3.5 p-3.5 rounded-xl relative z-10 w-full transition"
                    :class="step >= 3 ? 'bg-indigo-50 border border-indigo-600' : 'bg-gray-50 border border-gray-50'">
                    <div class="rounded-lg flex items-center justify-center transition"
                        :class="step >= 3 ? 'bg-indigo-600' : 'bg-gray-200'">
                        <span :class="step >= 3 ? 'text-white' : 'text-gray-600'" class="p-3 transition">
                            <svg class="w-4 h-4 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>


                        </span>
                    </div>
                    <div class="flex items-start rounded-md justify-center flex-col">
                        <h6 class="text-base font-semibold text-black mb-0.5">
                            Contatos
                        </h6>
                    </div>
                </div>
            </button>
        </div>
    </li>

    <li class="relative flex-1 w-full after:content-[''] after:w-0.5 after:h-full after:inline-block after:absolute after:-bottom-11 after:left-1/2 transition-all"
        :class="step > 10 ? 'after:bg-indigo-600' : 'after:bg-gray-200'">
        <div class="flex items-center justify-center gap-8 w-full">
            <button type="button" class="w-full" @click="step = 10">
                <div class="flex items-center gap-3.5 p-3.5 rounded-xl relative z-10 w-full transition"
                    :class="step >= 10 ? 'bg-indigo-50 border border-indigo-600' : 'bg-gray-50 border border-gray-50'">
                    <div class="rounded-lg flex items-center justify-center transition"
                        :class="step >= 10 ? 'bg-indigo-600' : 'bg-gray-200'">
                        <span :class="step >= 10 ? 'text-white' : 'text-gray-600'" class="p-3 transition">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </span>
                    </div>
                    <div class="flex items-start rounded-md justify-center flex-col">
                        <h6 class="text-base font-semibold text-black mb-0.5">
                            Confirmar
                        </h6>
                    </div>
                </div>
            </button>
        </div>
    </li>


</ol>
