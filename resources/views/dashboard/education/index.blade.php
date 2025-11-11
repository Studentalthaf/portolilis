@extends('dashboard.layout')

@section('title', 'Education')
@section('page-title', 'Education')
@section('page-subtitle', 'Manage your education history')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold">Education History</h2>
        <p class="text-gray-600 dark:text-gray-400">Total: {{ $educations->count() }} entries</p>
    </div>
    <a href="{{ route('education.create') }}" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center space-x-2">
        <i class="fas fa-plus"></i>
        <span>Add New Education</span>
    </a>
</div>

@if($educations->count() > 0)
    <div class="space-y-4">
        @foreach($educations as $education)
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all p-6">
                <div class="flex items-start justify-between">
                    <div class="flex items-start space-x-4 flex-1">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-amber-600 rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-graduation-cap text-white text-2xl"></i>
                        </div>
                        
                        <div class="flex-1">
                            <div class="flex items-center space-x-3 mb-2">
                                <h3 class="font-bold text-xl">{{ $education->institusi }}</h3>
                                <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400 rounded-full text-xs font-semibold">
                                    {{ $education->tingkat }}
                                </span>
                            </div>
                            
                            <p class="text-gray-600 dark:text-gray-400 mb-2">
                                <i class="fas fa-calendar mr-2"></i>
                                {{ $education->tahun_mulai }} - {{ $education->tahun_selesai }}
                            </p>
                            
                            @if($education->keterangan)
                                <p class="text-gray-700 dark:text-gray-300">{{ $education->keterangan }}</p>
                            @endif
                            
                            <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
                                <i class="fas fa-sort-numeric-down mr-1"></i>Urutan: {{ $education->urutan }}
                            </p>
                        </div>
                    </div>
                    
                    <div class="flex space-x-2 ml-4">
                        <a href="{{ route('education.edit', $education) }}" class="px-4 py-2 bg-orange-100 dark:bg-orange-900/30 text-orange-600 dark:text-orange-400 rounded-lg hover:bg-orange-200 dark:hover:bg-orange-900/50 transition-colors">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('education.destroy', $education) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-400 rounded-lg hover:bg-red-200 dark:hover:bg-red-900/50 transition-colors">
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
        <i class="fas fa-graduation-cap text-gray-400 text-6xl mb-4"></i>
        <p class="text-gray-600 dark:text-gray-400 mb-4">No education history yet</p>
        <a href="{{ route('education.create') }}" class="inline-flex items-center space-x-2 px-6 py-3 bg-orange-500 text-white rounded-lg hover:bg-orange-600 transition-colors">
            <i class="fas fa-plus"></i>
            <span>Add Your First Education</span>
        </a>
    </div>
@endif
@endsection

