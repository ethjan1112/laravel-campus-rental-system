<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-8 md:py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">My Rentals</h1>
            <p class="text-gray-600">Track the items you've rented</p>
        </div>

        @if($rentals->isEmpty())
            <!-- Empty State -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden p-12">
                <div class="text-center">
                    <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="mt-4 text-xl font-semibold text-gray-900">No rentals yet</h3>
                    <p class="mt-2 text-gray-600 mb-8">Start browsing items available for rent.</p>
                    <a href="{{ route('home') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        Browse Items
                    </a>
                </div>
            </div>
        @else
            <!-- Rentals Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($rentals as $rental)
                    <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow overflow-hidden">
                        <!-- Item Image -->
                        <div class="relative h-48 bg-gray-200 overflow-hidden">
                            @if($rental->item->image_path)
                                <img class="w-full h-full object-cover" src="{{ asset('storage/' . $rental->item->image_path) }}" alt="{{ $rental->item->name }}">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Status Badge -->
                            <div class="absolute top-3 right-3">
                                <span class="px-3 py-1 text-xs font-semibold rounded-full 
                                    @if($rental->status === 'active')
                                        bg-green-100 text-green-800
                                    @elseif($rental->status === 'completed')
                                        bg-blue-100 text-blue-800
                                    @else
                                        bg-gray-100 text-gray-800
                                    @endif">
                                    {{ ucfirst($rental->status) }}
                                </span>
                            </div>
                        </div>

                        <!-- Details -->
                        <div class="p-5">
                            <!-- Item Name -->
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $rental->item->name }}</h3>

                            <!-- Owner -->
                            <div class="flex items-center gap-2 mb-4 pb-4 border-b border-gray-200">
                                <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center flex-shrink-0">
                                    <span class="text-xs font-semibold text-blue-600">
                                        @php
                                            $initials = collect(explode(' ', trim($rental->item->user->name)))->filter()->take(2)->map(fn ($part) => strtoupper(substr($part, 0, 1)))->implode('');
                                        @endphp
                                        {{ $initials }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">{{ $rental->item->user->name }}</p>
                                    <p class="text-xs text-gray-500">Owner</p>
                                </div>
                            </div>

                            <!-- Rental Period -->
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="bg-gray-50 rounded-lg p-3">
                                    <p class="text-xs font-medium text-gray-600 mb-1">From</p>
                                    <p class="text-sm font-semibold text-gray-900">{{ $rental->start_date->format('M d, Y') }}</p>
                                </div>
                                <div class="bg-gray-50 rounded-lg p-3">
                                    <p class="text-xs font-medium text-gray-600 mb-1">To</p>
                                    <p class="text-sm font-semibold text-gray-900">{{ $rental->end_date->format('M d, Y') }}</p>
                                </div>
                            </div>

                            <!-- Total Price -->
                            <div class="bg-blue-50 rounded-lg p-4">
                                <p class="text-xs font-medium text-gray-600 mb-1">Total Price</p>
                                <p class="text-2xl font-bold text-blue-600">₱{{ number_format($rental->total_price, 2) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($rentals->hasPages())
                <div class="mt-8">
                    {{ $rentals->links() }}
                </div>
            @endif
        @endif
    </div>
</div>
