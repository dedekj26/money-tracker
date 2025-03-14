<div class="bg-white shadow-sm rounded-lg overflow-hidden mb-6">
    <div class="px-4 py-3 bg-gradient-to-r from-blue-500 to-indigo-600">
        <h2 class="text-xl font-semibold text-white">Money Tracker</h2>
    </div>
    
    <nav class="flex flex-col sm:flex-row">
        <a href="{{ route('dashboard') }}" 
           class="py-3 px-4 text-center border-b sm:border-b-0 sm:border-r border-gray-200 hover:bg-gray-50 {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700 font-medium' : 'text-gray-600' }}">
            <span class="inline-block mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
            </span>
            Dashboard
        </a>
        
        <a href="{{ route('categories.index') }}" 
           class="py-3 px-4 text-center border-b sm:border-b-0 sm:border-r border-gray-200 hover:bg-gray-50 {{ request()->routeIs('categories.*') ? 'bg-indigo-50 text-indigo-700 font-medium' : 'text-gray-600' }}">
            <span class="inline-block mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                </svg>
            </span>
            Kategori
        </a>
        
        <a href="{{ route('wallets.index') }}" 
           class="py-3 px-4 text-center border-b sm:border-b-0 sm:border-r border-gray-200 hover:bg-gray-50 {{ request()->routeIs('wallets.*') ? 'bg-indigo-50 text-indigo-700 font-medium' : 'text-gray-600' }}">
            <span class="inline-block mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M4 4a2 2 0 00-2 2v1h16V6a2 2 0 00-2-2H4z" />
                    <path fill-rule="evenodd" d="M18 9H2v5a2 2 0 002 2h12a2 2 0 002-2V9zM4 13a1 1 0 011-1h1a1 1 0 110 2H5a1 1 0 01-1-1zm5-1a1 1 0 100 2h1a1 1 0 100-2H9z" clip-rule="evenodd" />
                </svg>
            </span>
            Dompet
        </a>
        
        <a href="{{ route('configurations.index') }}" 
           class="py-3 px-4 text-center hover:bg-gray-50 {{ request()->routeIs('configurations.*') ? 'bg-indigo-50 text-indigo-700 font-medium' : 'text-gray-600' }}">
            <span class="inline-block mr-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
                </svg>
            </span>
            Konfigurasi
        </a>
    </nav>
</div>
