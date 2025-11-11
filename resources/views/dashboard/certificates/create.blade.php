@extends('dashboard.layout')

@section('title', 'Create Certificate')
@section('page-title', 'Add New Certificate')
@section('page-subtitle', 'Create a new certificate entry')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <form action="{{ route('certificates.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Judul -->
            <div>
                <label for="judul" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-heading text-purple-500 mr-2"></i>Judul Sertifikat * 
                </label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="Laravel Certification">
            </div>

            <!-- Penerbit -->
            <div>
                <label for="penerbit" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-building text-pink-500 mr-2"></i>Penerbit * 
                </label>
                <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit') }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="Laravel Academy">
            </div>

            <!-- Tanggal Perolehan -->
            <div>
                <label for="tanggal_perolehan" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-calendar text-blue-500 mr-2"></i>Tanggal Perolehan * 
                </label>
                <input type="date" name="tanggal_perolehan" id="tanggal_perolehan" value="{{ old('tanggal_perolehan') }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">
            </div>

            <!-- Certificate ID -->
            <div>
                <label for="certificate_id" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-id-card text-green-500 mr-2"></i>Certificate ID
                </label>
                <input type="text" name="certificate_id" id="certificate_id" value="{{ old('certificate_id') }}"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="CERT-2024-001">
            </div>

            <!-- Bukti Sertifikat (PDF) -->
            <div>
                <label for="bukti_sertifikat" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-file-pdf text-red-500 mr-2"></i>Bukti Sertifikat (PDF)
                </label>
                <input type="file" name="bukti_sertifikat" id="bukti_sertifikat" accept=".pdf"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Max: 5MB, PDF only</p>
            </div>

            <!-- Buttons -->
            <div class="flex space-x-4 pt-4">
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all">
                    <i class="fas fa-save mr-2"></i>Save Certificate
                </button>
                <a href="{{ route('certificates.index') }}" class="flex-1 px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors text-center">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

