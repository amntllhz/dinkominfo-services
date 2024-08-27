<section id="accordion" class="max-w-6xl mx-auto py-12 sm:max-w-sm md:max-w-2xl">
        <div class="flex flex-col gap-y-2 text-center">
        <h3 class="text-5xl text-indigo-950 font-clash font-bold sm:text-4xl">Frequently Asked <br> Questions (FAQ)</h3>
        <p class="text-base leading-loose text-gray-500 sm:text-xs">Jawaban atas pertanyaan umum yang sering diajukan tentang layanan kami.</p>
    </div>
    
    <div class="mt-8" id="accordion-collapse" data-accordion="collapse">
        @foreach ($questions as $index => $question)
            <h2 id="accordion-collapse-heading-{{ $index }}">
                <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-{{ $index }}" aria-expanded="false" aria-controls="accordion-collapse-body-{{ $index }}">
                    <span>{{ $question }}</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-{{ $index }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $index }}">
                <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $answers[$index] }}</p>
                    <p class="text-gray-500 dark:text-gray-400">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
                </div>
            </div>
        @endforeach
    </div>
</section>
