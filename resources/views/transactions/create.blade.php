<x-app-layout>
    <x-slot name="header">
        Tambah Transaksi
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- User Navigation -->
            @include('components.user-navigation')
            
            <div class="mt-8 mb-6">
                <h2 class="text-xl md:text-2xl font-bold text-gray-800">Tambah Transaksi Baru</h2>
                <p class="mt-2 text-gray-600">Masukkan detail transaksi keuangan Anda</p>
            </div>

            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="px-6 py-6 sm:px-8">
                    @if ($errors->any())
                        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg">
                            <strong class="font-medium">Oops! Ada beberapa masalah:</strong>
                            <ul class="mt-3 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('transactions.store') }}">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Description -->
                            <div class="col-span-1 md:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Transaksi</label>
                                <input type="text" name="description" id="description" value="{{ old('description') }}" class="mt-1 py-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm border-gray-300 rounded-md text-base" required>
                            </div>

                            <!-- Category -->
                            <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                                <select id="category_id" name="category_id" class="mt-1 py-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm border-gray-300 rounded-md text-base" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }} ({{ $category->type === 'in' ? 'Pemasukan' : 'Pengeluaran' }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Wallet -->
                            <div>
                                <label for="wallet_id" class="block text-sm font-medium text-gray-700">Dompet</label>
                                <select id="wallet_id" name="wallet_id" class="mt-1 py-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm border-gray-300 rounded-md text-base" required>
                                    <option value="">-- Pilih Dompet --</option>
                                    @foreach($wallets as $wallet)
                                        <option value="{{ $wallet->id }}" {{ old('wallet_id') == $wallet->id ? 'selected' : '' }}>
                                            {{ $wallet->name }} (Rp {{ number_format($wallet->balance, 0, ',', '.') }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Amount -->
                            <div>
                                <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah (Rp)</label>
                                <input type="number" name="amount" id="amount" value="{{ old('amount') }}" min="1" class="mt-1 py-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm border-gray-300 rounded-md text-base" required>
                            </div>

                            <!-- Date -->
                            <div>
                                <label for="date" class="block text-sm font-medium text-gray-700">Tanggal Transaksi</label>
                                <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}" class="mt-1 py-3 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm border-gray-300 rounded-md text-base" required>
                            </div>
                        </div>

                        <div class="mt-8 flex flex-col sm:flex-row justify-end space-y-4 sm:space-y-0 sm:space-x-4">
                            <a href="{{ route('transactions.index') }}" class="w-full sm:w-auto py-3 px-6 border border-gray-300 rounded-md shadow-sm text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Batal
                            </a>
                            <button type="submit" class="w-full sm:w-auto py-3 px-6 bg-gradient-to-r from-indigo-600 to-purple-600 border border-transparent rounded-md shadow-sm text-base font-medium text-white hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Simpan Transaksi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
