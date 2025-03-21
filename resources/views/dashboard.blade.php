<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- User Navigation -->
            @include('components.user-navigation')
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6">
                <div class="p-6 sm:p-8 md:p-10">
                    <h3 class="text-lg md:text-xl font-medium text-gray-900 mb-4 md:mb-6">Selamat Datang di Money Tracker</h3>
                    <p class="text-gray-600 mb-6">
                        Aplikasi ini membantu Anda melacak pemasukan dan pengeluaran dengan mudah.
                    </p>
                    
                    <!-- Charts Section -->
                    <div class="mt-8 mb-10">
                        <h4 class="text-base md:text-lg font-medium text-gray-900 mb-6">Ringkasan Transaksi Anda</h4>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Monthly Income & Expense Chart -->
                            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                                <div class="px-5 py-6 sm:p-6">
                                    <h5 class="text-sm font-semibold text-gray-800 mb-4">Pemasukan & Pengeluaran 6 Bulan Terakhir</h5>
                                    <div id="monthlyChart" class="w-full h-64 md:h-80"></div>
                                </div>
                            </div>
                            
                            <!-- Category Breakdown Chart -->
                            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                                <div class="px-5 py-6 sm:p-6">
                                    <h5 class="text-sm font-semibold text-gray-800 mb-4">Distribusi Transaksi per Kategori</h5>
                                    <div id="categoryChart" class="w-full h-64 md:h-80"></div>
                                </div>
                            </div>
                            
                            <!-- Wallet Summary Chart -->
                            <div class="bg-white overflow-hidden shadow-lg rounded-lg md:col-span-2">
                                <div class="px-5 py-6 sm:p-6">
                                    <h5 class="text-sm font-semibold text-gray-800 mb-4">Ringkasan Transaksi per Dompet</h5>
                                    <div id="walletChart" class="w-full h-64 md:h-80"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        <!-- Category Card -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-5 py-6 sm:p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-indigo-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">
                                                Kategori
                                            </dt>
                                            <dd>
                                                <div class="text-lg font-medium text-gray-900">
                                                    Atur kategori transaksi Anda
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-5 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{ route('categories.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        Kelola Kategori <span aria-hidden="true">&rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Wallet Card -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-5 py-6 sm:p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">
                                                Dompet
                                            </dt>
                                            <dd>
                                                <div class="text-lg font-medium text-gray-900">
                                                    Atur sumber dana Anda
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-5 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{ route('wallets.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        Kelola Dompet <span aria-hidden="true">&rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Configuration Card -->
                        <div class="bg-white overflow-hidden shadow rounded-lg">
                            <div class="px-5 py-6 sm:p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-5 w-0 flex-1">
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 truncate">
                                                Konfigurasi
                                            </dt>
                                            <dd>
                                                <div class="text-lg font-medium text-gray-900">
                                                    Atur periode laporan
                                                </div>
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-5 py-4 sm:px-6">
                                <div class="text-sm">
                                    <a href="{{ route('configurations.index') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                        Kelola Konfigurasi <span aria-hidden="true">&rarr;</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @push('scripts')
    <!-- Include Apache eCharts -->
    <script src="https://cdn.jsdelivr.net/npm/echarts@5.4.1/dist/echarts.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data dari controller
            const months = @json($months);
            const incomeValues = @json($incomeValues);
            const expenseValues = @json($expenseValues);
            const transactionsByCategory = @json($transactionsByCategory);
            const walletData = @json($walletData);
            
            // Inisialisasi chart bulanan
            const monthlyChart = echarts.init(document.getElementById('monthlyChart'));
            
            const monthlyOption = {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    },
                    formatter: function(params) {
                        let tooltip = params[0].name + '<br/>';
                        params.forEach(param => {
                            tooltip += `${param.seriesName}: Rp ${param.value.toLocaleString('id-ID')}<br/>`;
                        });
                        return tooltip;
                    }
                },
                legend: {
                    data: ['Pemasukan', 'Pengeluaran'],
                    top: 'bottom'
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '15%',
                    top: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'category',
                    data: months
                },
                yAxis: {
                    type: 'value',
                    axisLabel: {
                        formatter: function(value) {
                            if (value >= 1000000) {
                                return (value / 1000000).toFixed(1) + ' JT';
                            } else if (value >= 1000) {
                                return (value / 1000).toFixed(0) + ' RB';
                            }
                            return value;
                        }
                    }
                },
                series: [
                    {
                        name: 'Pemasukan',
                        type: 'bar',
                        stack: 'total',
                        emphasis: {
                            focus: 'series'
                        },
                        data: incomeValues,
                        itemStyle: {
                            color: '#10B981'
                        }
                    },
                    {
                        name: 'Pengeluaran',
                        type: 'bar',
                        stack: 'total',
                        emphasis: {
                            focus: 'series'
                        },
                        data: expenseValues,
                        itemStyle: {
                            color: '#EF4444'
                        }
                    }
                ]
            };
            
            monthlyChart.setOption(monthlyOption);
            
            // Inisialisasi chart kategori (pie chart)
            const categoryChart = echarts.init(document.getElementById('categoryChart'));
            
            // Prepare data untuk pie chart
            const pieData = [];
            const incomeCategories = [];
            const expenseCategories = [];
            
            transactionsByCategory.forEach(cat => {
                const item = {
                    name: cat.category_name,
                    value: cat.total_amount,
                    itemStyle: {
                        color: cat.type === 'in' ? '#10B981' : '#EF4444'
                    }
                };
                
                pieData.push(item);
                
                if (cat.type === 'in') {
                    incomeCategories.push(item);
                } else {
                    expenseCategories.push(item);
                }
            });
            
            const categoryOption = {
                tooltip: {
                    trigger: 'item',
                    formatter: function(params) {
                        return `${params.name}: Rp ${params.value.toLocaleString('id-ID')} (${params.percent}%)`;
                    }
                },
                legend: {
                    type: 'scroll',
                    orient: 'vertical',
                    right: 10,
                    top: 20,
                    bottom: 20,
                    formatter: function(name) {
                        // Potong nama kategori jika terlalu panjang
                        if (name.length > 15) {
                            return name.substring(0, 12) + '...';
                        }
                        return name;
                    }
                },
                series: [
                    {
                        name: 'Kategori',
                        type: 'pie',
                        radius: ['40%', '70%'],
                        avoidLabelOverlap: false,
                        itemStyle: {
                            borderRadius: 4,
                            borderColor: '#fff',
                            borderWidth: 2
                        },
                        label: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            label: {
                                show: true,
                                fontSize: '14',
                                fontWeight: 'bold'
                            }
                        },
                        labelLine: {
                            show: false
                        },
                        data: pieData
                    }
                ]
            };
            
            categoryChart.setOption(categoryOption);
            
            // Inisialisasi chart dompet (bar chart)
            const walletChart = echarts.init(document.getElementById('walletChart'));
            
            // Prepare data untuk wallet chart
            const walletNames = Object.keys(walletData);
            const walletIncome = [];
            const walletExpense = [];
            
            walletNames.forEach(wallet => {
                walletIncome.push(walletData[wallet].in || 0);
                walletExpense.push(walletData[wallet].out || 0);
            });
            
            const walletOption = {
                tooltip: {
                    trigger: 'axis',
                    axisPointer: {
                        type: 'shadow'
                    },
                    formatter: function(params) {
                        let tooltip = params[0].name + '<br/>';
                        params.forEach(param => {
                            tooltip += `${param.seriesName}: Rp ${param.value.toLocaleString('id-ID')}<br/>`;
                        });
                        return tooltip;
                    }
                },
                legend: {
                    data: ['Pemasukan', 'Pengeluaran']
                },
                grid: {
                    left: '3%',
                    right: '4%',
                    bottom: '3%',
                    containLabel: true
                },
                xAxis: {
                    type: 'value',
                    axisLabel: {
                        formatter: function(value) {
                            if (value >= 1000000) {
                                return (value / 1000000).toFixed(1) + ' JT';
                            } else if (value >= 1000) {
                                return (value / 1000).toFixed(0) + ' RB';
                            }
                            return value;
                        }
                    }
                },
                yAxis: {
                    type: 'category',
                    data: walletNames,
                    axisLabel: {
                        formatter: function(value) {
                            // Potong nama dompet jika terlalu panjang
                            if (value.length > 10) {
                                return value.substring(0, 7) + '...';
                            }
                            return value;
                        }
                    }
                },
                series: [
                    {
                        name: 'Pemasukan',
                        type: 'bar',
                        stack: 'total',
                        label: {
                            show: true,
                            position: 'insideRight',
                            formatter: function(params) {
                                if (params.value === 0) return '';
                                if (params.value >= 1000000) {
                                    return (params.value / 1000000).toFixed(1) + ' JT';
                                } else if (params.value >= 1000) {
                                    return (params.value / 1000).toFixed(0) + ' RB';
                                }
                                return params.value;
                            }
                        },
                        emphasis: {
                            focus: 'series'
                        },
                        data: walletIncome,
                        itemStyle: {
                            color: '#10B981'
                        }
                    },
                    {
                        name: 'Pengeluaran',
                        type: 'bar',
                        stack: 'total',
                        label: {
                            show: true,
                            position: 'insideRight',
                            formatter: function(params) {
                                if (params.value === 0) return '';
                                if (params.value >= 1000000) {
                                    return (params.value / 1000000).toFixed(1) + ' JT';
                                } else if (params.value >= 1000) {
                                    return (params.value / 1000).toFixed(0) + ' RB';
                                }
                                return params.value;
                            }
                        },
                        emphasis: {
                            focus: 'series'
                        },
                        data: walletExpense,
                        itemStyle: {
                            color: '#EF4444'
                        }
                    }
                ]
            };
            
            walletChart.setOption(walletOption);
            
            // Responsive chart
            window.addEventListener('resize', function() {
                monthlyChart.resize();
                categoryChart.resize();
                walletChart.resize();
            });
        });
    </script>
    @endpush
</x-app-layout>
