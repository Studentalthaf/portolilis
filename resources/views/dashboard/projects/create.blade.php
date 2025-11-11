@extends('dashboard.layout')

@section('title', 'Create Project')
@section('page-title', 'Add New Project')
@section('page-subtitle', 'Create a new project entry')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Judul -->
            <div>
                <label for="judul" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-heading text-blue-500 mr-2"></i>Judul Project *
                </label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="E-Commerce Website">
            </div>

            <!-- Durasi -->
            <div>
                <label for="durasi" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-calendar text-purple-500 mr-2"></i>Durasi *
                </label>
                <input type="text" name="durasi" id="durasi" value="{{ old('durasi') }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="3 Bulan (Jan - Mar 2024)">
            </div>

            <!-- Deskripsi -->
            <div>
                <label for="deskripsi" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-align-left text-green-500 mr-2"></i>Deskripsi *
                </label>
                <textarea name="deskripsi" id="deskripsi" rows="4" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="Describe your project...">{{ old('deskripsi') }}</textarea>
            </div>

            <!-- Dokumentasi -->
            <div>
                <label for="dokumentasi" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-image text-pink-500 mr-2"></i>Dokumentasi (Image)
                </label>
                <input type="file" name="dokumentasi" id="dokumentasi" accept="image/*"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Max: 2MB, JPG, PNG</p>
            </div>

            <!-- Tech Stack -->
            <div>
                <label for="tech_stack" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-code text-orange-500 mr-2"></i>Tech Stack
                </label>
                <input type="text" name="tech_stack" id="tech_stack" value="{{ old('tech_stack') }}"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="Laravel, Vue.js, MySQL (separate with commas)">
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Pisahkan dengan koma</p>
            </div>

            <!-- Status -->
            <div>
                <label for="status" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-check-circle text-emerald-500 mr-2"></i>Status *
                </label>
                <select name="status" id="status" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-emerald-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">
                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex space-x-4 pt-4">
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 hover:from-blue-600 hover:to-purple-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all">
                    <i class="fas fa-save mr-2"></i>Save Project
                </button>
                <a href="{{ route('projects.index') }}" class="flex-1 px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors text-center">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

