@props(['interns'])

<!-- contributor container -->
<div class="grid grid-cols-6 gap-x-2 gap-y-6 mx-auto max-w-5xl md:grid-cols-3 sm:grid-cols-2">
    @foreach ($interns as $index => $intern)
    <div class="col-span-1 max-w-sm bg-white p-4 rounded-lg mx-auto text-center">
        <img class="h-[100px] mb-2" src="{{ asset('assets/images/interns/avatar-pic/' . $intern['avatar']) }}" alt="{{ $intern['fullname'] }}">
        <p class="text-sm text-slate-600 py-1 px-4">
            {{ $intern['name'] }}
        </p>
        <button data-modal-target="default-modal-{{ $index }}" data-modal-toggle="default-modal-{{ $index }}" type="button" class="text-sm text-white bg-violet-700 py-1 px-4 rounded-full">
            Lihat Profil
        </button>
    </div>
    @endforeach
</div>        

<!-- modals -->
@foreach ($interns as $index => $intern)
    <div id="default-modal-{{ $index }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-xl max-h-full sm:max-w-sm">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Contributors
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal-{{ $index }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="flex p-6 justify-between sm:flex-col">
                    <div class="flex flex-row w-fit sm:flex-col sm:mx-auto">
                        <img class="h-[150px] mb-4 p-4 bg-violet-100 rounded-xl sm:mb-2" src="{{ asset('assets/images/interns/real-pic/' . $intern['real']) }}" alt="{{ $intern['fullname'] }}">
                    </div>                                                                        

                    <div class="flex flex-col text-left w-full max-w-xs pl-2">
                        <h2 class="text-2xl font-bold text-indigo-950 sm:text-center sm:mb-1">{{ $intern['fullname'] }}</h2>
                        <span class="inline-flex items-center rounded-md bg-violet-50 px-2 py-1 text-xs font-medium text-violet-700 ring-1 ring-inset ring-violet-700/10 w-fit sm:mx-auto">{{ $intern['role'] }}</span>                                                   
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">{{ $intern['major'] }}</p>                          
                            <p class="text-sm text-gray-500">{{ $intern['university'] }}</p>                            
                            <a href="mailto:{{ $intern['email'] }}" class="text-sm text-violet-500">{{ $intern['email'] }}</a>                            
                        </div>                                                                               
                    </div> 
                </div>
                
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal-{{ $index }}" type="button" class="text-white bg-violet-700 hover:bg-indigo-950 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm px-3 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-hide="default-modal-{{ $index }}" type="button" class="py-1 px-3 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                </div>
            </div>
        </div>
    </div>
@endforeach