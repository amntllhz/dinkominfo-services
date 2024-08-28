<section id="accordion" class="max-w-6xl mx-auto py-12 sm:max-w-sm md:max-w-2xl">
    <div class="gap-y-2 text-center">
        <h3 class="text-5xl text-indigo-950 font-clash font-bold mb-2 sm:text-4xl">Frequently Asked <br> Questions (FAQ)</h3>
        <p class="text-base leading-loose text-gray-500 mb-7 sm:text-xs sm:max-w-xs sm:mx-auto">Jawaban atas pertanyaan umum yang sering diajukan tentang layanan kami.</p>
    </div>
    
    <div id="accordion-flush" data-accordion="collapse" data-active-classes="bg-['#f1f4f5'] dark:bg-gray-900 text-gray-900 dark:text-white" data-inactive-classes="text-gray-500 dark:text-gray-400">
        @foreach ($questions as $index => $question)
            <h2 id="accordion-flush-heading-{{ $index }}">
                <button type="button" class="flex items-center justify-between w-full py-5 font-medium rtl:text-right text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400 gap-3" data-accordion-target="#accordion-flush-body-{{ $index }}" aria-expanded="false" aria-controls="accordion-flush-body-{{ $index }}">
                    <span>{{ $question }}</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-flush-body-{{ $index }}" class="hidden" aria-labelledby="accordion-flush-heading-{{ $index }}">
                <div class="py-5 border-b border-gray-200 dark:border-gray-700">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $answers[$index] }}</p>
                </div>
            </div>
        @endforeach
    </div>

</section>


