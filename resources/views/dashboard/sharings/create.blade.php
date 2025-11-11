@extends('dashboard.layout')

@section('title', 'Create Sharing')
@section('page-title', 'Add New Sharing Post')
@section('page-subtitle', 'Create a new sharing post')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <form action="{{ route('sharings.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Judul -->
            <div>
                <label for="judul" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-heading text-green-500 mr-2"></i>Judul Konten * 
                </label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="Tips Belajar Laravel">
            </div>

            <!-- Kategori -->
            <div>
                <label for="kategori" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-tag text-emerald-500 mr-2"></i>Kategori * 
                </label>
                <select name="kategori" id="kategori" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">
                    <option value="">Pilih Kategori</option>
                    <option value="Tutorial" {{ old('kategori') == 'Tutorial' ? 'selected' : '' }}>Tutorial</option>
                    <option value="Tips" {{ old('kategori') == 'Tips' ? 'selected' : '' }}>Tips</option>
                    <option value="Informasi" {{ old('kategori') == 'Informasi' ? 'selected' : '' }}>Informasi</option>
                    <option value="Rekomendasi" {{ old('kategori') == 'Rekomendasi' ? 'selected' : '' }}>Rekomendasi</option>
                </select>
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-align-left text-blue-500 mr-2"></i>Deskripsi * 
                </label>
                <textarea name="deskripsi" id="deskripsi" rows="6" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="Write your content description...">{{ old('deskripsi') }}</textarea>
            </div>

            <!-- Foto -->
            <div>
                <label for="foto" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-image text-pink-500 mr-2"></i>Foto/File Pendukung
                </label>
                <input type="file" name="foto" id="foto" accept="image/*"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100">
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Max: 2MB, JPG, PNG</p>
            </div>

            <!-- Buttons -->
            <div class="flex space-x-4 pt-4">
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all">
                    <i class="fas fa-save mr-2"></i>Save Post
                </button>
                <a href="{{ route('sharings.index') }}" class="flex-1 px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors text-center">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

