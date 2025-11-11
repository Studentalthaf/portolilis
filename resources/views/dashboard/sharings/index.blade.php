@extends('dashboard.layout')

@section('title', 'Sharing')
@section('page-title', 'Sharing')
@section('page-subtitle', 'Manage your sharing posts')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold">Sharing Posts List</h2>
        <p class="text-gray-600 dark:text-gray-400">Total: {{ $sharings->count() }} posts</p>
    </div>
    <a href="{{ route('sharings.create') }}" class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center space-x-2">
        <i class="fas fa-plus"></i>
        <span>Add New Post</span>
    </a>
</div>

@if($sharings->count() > 0)
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($sharings as $sharing)
            <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all">
                @if($sharing->foto)
                    <div class="h-48 bg-gray-200 dark:bg-gray-700 overflow-hidden">
                        <img src="{{ asset('storage/'.$sharing->foto) }}" alt="{{ $sharing->judul }}" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="h-48 bg-gradient-to-br from-green-500 to-emerald-600 flex items-center justify-center">
                        <i class="fas fa-share-alt text-white text-6xl"></i>
                    </div>
                @endif
                
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-bold text-xl">{{ $sharing->judul }}</h3>
                        <span class="px-3 py-1 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-full text-xs font-semibold">
                            {{ $sharing->kategori }}
                        </span>
                    </div>
                    
                    <p class="text-gray-700 dark:text-gray-300 mb-4 line-clamp-3">{{ $sharing->deskripsi }}</p>
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('sharings.edit', $sharing) }}" class="flex-1 px-4 py-2 bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400 rounded-lg hover:bg-green-200 dark:hover:bg-green-900/50 transition-colors text-center">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('sharings.destroy', $sharing) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full px-4 py-2 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-200 dark:hover:bg-red-900/50 transition-colors">
                                <i class="fas fa-trash mr-1"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="text-center py-12 bg-white dark:bg-gray-800 rounded-2xl">
        <i class="fas fa-share-alt text-gray-400 text-6xl mb-4"></i>
        <p class="text-gray-600 dark:text-gray-400 mb-4">No sharing posts yet</p>
        <a href="{{ route('sharings.create') }}" class="inline-flex items-center space-x-2 px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600 transition-colors">
            <i class="fas fa-plus"></i>
            <span>Add Your First Post</span>
        </a>
    </div>
@endif
@endsection

