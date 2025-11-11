@extends('dashboard.layout')

@section('title', 'Projects')
@section('page-title', 'Projects')
@section('page-subtitle', 'Manage your projects')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold">Projects List</h2>
        <p class="text-gray-600 dark:text-gray-400">Total: {{ $projects->count() }} projects</p>
    </div>
    <a href="{{ route('projects.create') }}" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center space-x-2">
        <i class="fas fa-plus"></i>
        <span>Add New Project</span>
    </a>
</div>

@if($projects->count() > 0)
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($projects as $project)
            <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all">
                @if($project->dokumentasi)
                    <div class="h-48 bg-gray-200 dark:bg-gray-700 overflow-hidden">
                        <img src="{{ asset('storage/'.$project->dokumentasi) }}" alt="{{ $project->judul }}" class="w-full h-full object-cover">
                    </div>
                @else
                    <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                        <i class="fas fa-project-diagram text-white text-6xl"></i>
                    </div>
                @endif
                
                <div class="p-6">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="font-bold text-xl">{{ $project->judul }}</h3>
                        <span class="px-3 py-1 {{ $project->status == 'completed' ? 'bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400' : 'bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 dark:text-yellow-400' }} rounded-full text-xs font-semibold">
                            {{ ucfirst($project->status) }}
                        </span>
                    </div>
                    
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                        <i class="fas fa-calendar mr-2"></i>{{ $project->durasi }}
                    </p>
                    
                    <p class="text-gray-700 dark:text-gray-300 mb-4 line-clamp-3">{{ $project->deskripsi }}</p>
                    
                    @if($project->tech_stack)
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach($project->tech_stack as $tech)
                                <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-full text-xs">{{ $tech }}</span>
                            @endforeach
                        </div>
                    @endif
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('projects.edit', $project) }}" class="flex-1 px-4 py-2 bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 rounded-lg hover:bg-blue-200 dark:hover:bg-blue-900/50 transition-colors text-center">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="flex-1">
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
        <i class="fas fa-folder-open text-gray-400 text-6xl mb-4"></i>
        <p class="text-gray-600 dark:text-gray-400 mb-4">No projects yet</p>
        <a href="{{ route('projects.create') }}" class="inline-flex items-center space-x-2 px-6 py-3 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
            <i class="fas fa-plus"></i>
            <span>Add Your First Project</span>
        </a>
    </div>
@endif
@endsection

