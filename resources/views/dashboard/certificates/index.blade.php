@extends('dashboard.layout')

@section('title', 'Certificates')
@section('page-title', 'Certificates')
@section('page-subtitle', 'Manage your certificates')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold">Certificates List</h2>
        <p class="text-gray-600 dark:text-gray-400">Total: {{ $certificates->count() }} certificates</p>
    </div>
    <a href="{{ route('certificates.create') }}" class="px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all flex items-center space-x-2">
        <i class="fas fa-plus"></i>
        <span>Add New Certificate</span>
    </a>
</div>

@if($certificates->count() > 0)
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($certificates as $certificate)
            <div class="bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all">
                <div class="h-48 bg-gradient-to-br from-purple-500 to-pink-600 flex items-center justify-center">
                    <i class="fas fa-certificate text-white text-6xl"></i>
                </div>
                
                <div class="p-6">
                    <div class="mb-2">
                        <h3 class="font-bold text-xl mb-1">{{ $certificate->judul }}</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            <i class="fas fa-building mr-2"></i>{{ $certificate->penerbit }}
                        </p>
                    </div>
                    
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-3">
                        <i class="fas fa-calendar mr-2"></i>{{ \Carbon\Carbon::parse($certificate->tanggal_perolehan)->format('d M Y') }}
                    </p>
                    
                    @if($certificate->certificate_id)
                        <p class="text-xs text-gray-500 dark:text-gray-400 mb-4">
                            <i class="fas fa-id-card mr-2"></i>ID: {{ $certificate->certificate_id }}
                        </p>
                    @endif
                    
                    @if($certificate->bukti_sertifikat)
                        <div class="mb-4">
                            <a href="{{ asset('storage/'.$certificate->bukti_sertifikat) }}" target="_blank" class="inline-flex items-center space-x-2 px-3 py-2 bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 rounded-lg hover:bg-purple-200 dark:hover:bg-purple-900/50 transition-colors">
                                <i class="fas fa-file-pdf"></i>
                                <span class="text-sm">View PDF</span>
                            </a>
                        </div>
                    @endif
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('certificates.edit', $certificate) }}" class="flex-1 px-4 py-2 bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 rounded-lg hover:bg-purple-200 dark:hover:bg-purple-900/50 transition-colors text-center">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </a>
                        <form action="{{ route('certificates.destroy', $certificate) }}" method="POST" onsubmit="return confirm('Are you sure?')" class="flex-1">
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
        <i class="fas fa-certificate text-gray-400 text-6xl mb-4"></i>
        <p class="text-gray-600 dark:text-gray-400 mb-4">No certificates yet</p>
        <a href="{{ route('certificates.create') }}" class="inline-flex items-center space-x-2 px-6 py-3 bg-purple-500 text-white rounded-lg hover:bg-purple-600 transition-colors">
            <i class="fas fa-plus"></i>
            <span>Add Your First Certificate</span>
        </a>
    </div>
@endif
@endsection

