@extends('dashboard.layout')

@section('title', 'Edit Certificate')
@section('page-title', 'Edit Certificate')
@section('page-subtitle', 'Update certificate information')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <form action="{{ route('certificates.update', $certificate) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div>
                <label for="judul" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-heading text-purple-500 mr-2"></i>Judul Sertifikat * 
                </label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $certificate->judul) }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">
            </div>

            <!-- Penerbit -->
            <div>
                <label for="penerbit" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-building text-pink-500 mr-2"></i>Penerbit * 
                </label>
                <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit', $certificate->penerbit) }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">
            </div>

            <!-- Tanggal Perolehan -->
            <div>
                <label for="tanggal_perolehan" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-calendar text-blue-500 mr-2"></i>Tanggal Perolehan * 
                </label>
                <input type="date" name="tanggal_perolehan" id="tanggal_perolehan" value="{{ old('tanggal_perolehan', $certificate->tanggal_perolehan) }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">
            </div>

            <!-- Certificate ID -->
            <div>
                <label for="certificate_id" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-id-card text-green-500 mr-2"></i>Certificate ID
                </label>
                <input type="text" name="certificate_id" id="certificate_id" value="{{ old('certificate_id', $certificate->certificate_id) }}"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">
            </div>

            <!-- Current PDF -->
            @if($certificate->bukti_sertifikat)
                <div>
                    <label class="block text-sm font-semibold mb-2">Current PDF</label>
                    <a href="{{ asset('storage/'.$certificate->bukti_sertifikat) }}" target="_blank" class="inline-flex items-center space-x-2 px-4 py-2 bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 rounded-lg hover:bg-purple-200 dark:hover:bg-purple-900/50 transition-colors">
                        <i class="fas fa-file-pdf"></i>
                        <span>View Current PDF</span>
                    </a>
                </div>
            @endif

            <!-- Bukti Sertifikat (PDF) -->
            <div>
                <label for="bukti_sertifikat" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-file-pdf text-red-500 mr-2"></i>Bukti Sertifikat (PDF) - Leave empty to keep current
                </label>
                <input type="file" name="bukti_sertifikat" id="bukti_sertifikat" accept=".pdf"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
            </div>

            <!-- Buttons -->
            <div class="flex space-x-4 pt-4">
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-600 hover:from-purple-600 hover:to-pink-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all">
                    <i class="fas fa-save mr-2"></i>Update Certificate
                </button>
                <a href="{{ route('certificates.index') }}" class="flex-1 px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors text-center">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

