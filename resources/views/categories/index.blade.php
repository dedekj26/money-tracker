<x-app-layout>
    <x-slot name="header">
        Kategori
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- User Navigation -->
            @include('components.user-navigation')
            
            <div class="mt-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800">Daftar Kategori</h2>
                <a href="{{ route('categories.create') }}" class="inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:from-indigo-700 hover:to-purple-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Tambah Kategori
                </a>
            </div>

            @if($categories->isEmpty())
                <div class="mt-8 bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="p-8 flex items-center justify-center">
                        <div class="text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">Belum ada kategori</h3>
                            <p class="mt-2 text-sm text-gray-500 max-w-md mx-auto">
                                Mulai dengan menambahkan kategori untuk transaksi keuangan Anda.
                            </p>
                            <div class="mt-8">
                                <a href="{{ route('categories.create') }}" class="inline-flex items-center px-5 py-2.5 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                                    </svg>
                                    Tambah Kategori Pertama
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    @foreach($categories as $category)
                        <div class="bg-white overflow-hidden shadow-lg rounded-lg hover:shadow-xl transition-shadow duration-300">
                            <div class="px-6 py-6 sm:px-8 border-b border-gray-200">
                                <div class="flex items-center justify-between">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        {{ $category->name }}
                                    </h3>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $category->type === 'in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $category->type === 'in' ? 'Pemasukan' : 'Pengeluaran' }}
                                    </span>
                                </div>
                            </div>
                            <div class="px-6 py-5 sm:px-8 flex justify-end space-x-4">
                                <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-900 transition-colors duration-200 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 transition-colors duration-200 flex items-center" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
