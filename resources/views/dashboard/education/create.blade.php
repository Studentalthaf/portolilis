@extends('dashboard.layout')

@section('title', 'Create Education')
@section('page-title', 'Add New Education')
@section('page-subtitle', 'Create a new education entry')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <form action="{{ route('education.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Institusi -->
            <div>
                <label for="institusi" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-school text-orange-500 mr-2"></i>Nama Institusi * 
                </label>
                <input type="text" name="institusi" id="institusi" value="{{ old('institusi') }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="Universitas Pembangunan Nasional Veteran Jawa Timur">
            </div>

            <!-- Tingkat -->
            <div>
                <label for="tingkat" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-layer-group text-amber-500 mr-2"></i>Tingkat Pendidikan * 
                </label>
                <select name="tingkat" id="tingkat" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">
                    <option value="">Pilih Tingkat</option>
                    <option value="SD" {{ old('tingkat') == 'SD' ? 'selected' : '' }}>SD</option>
                    <option value="SMP" {{ old('tingkat') == 'SMP' ? 'selected' : '' }}>SMP</option>
                    <option value="SMA" {{ old('tingkat') == 'SMA' ? 'selected' : '' }}>SMA</option>
                    <option value="Universitas" {{ old('tingkat') == 'Universitas' ? 'selected' : '' }}>Universitas</option>
                </select>
            </div>

            <!-- Tahun Mulai -->
            <div>
                <label for="tahun_mulai" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-calendar-alt text-blue-500 mr-2"></i>Tahun Mulai * 
                </label>
                <input type="text" name="tahun_mulai" id="tahun_mulai" value="{{ old('tahun_mulai') }}" required maxlength="4"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="2020">
            </div>

            <!-- Tahun Selesai -->
            <div>
                <label for="tahun_selesai" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-calendar-check text-green-500 mr-2"></i>Tahun Selesai * 
                </label>
                <input type="text" name="tahun_selesai" id="tahun_selesai" value="{{ old('tahun_selesai') }}" required maxlength="4"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="2024">
            </div>

            <!-- Keterangan -->
            <div>
                <label for="keterangan" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-info-circle text-purple-500 mr-2"></i>Keterangan
                </label>
                <textarea name="keterangan" id="keterangan" rows="3"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="Jurusan, prestasi, atau informasi tambahan...">{{ old('keterangan') }}</textarea>
            </div>

            <!-- Urutan -->
            <div>
                <label for="urutan" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-sort-numeric-down text-red-500 mr-2"></i>Urutan * 
                </label>
                <input type="number" name="urutan" id="urutan" value="{{ old('urutan', 0) }}" required min="0"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100"
                    placeholder="0">
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Urutan untuk sorting (0 = paling atas)</p>
            </div>

            <!-- Buttons -->
            <div class="flex space-x-4 pt-4">
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all">
                    <i class="fas fa-save mr-2"></i>Save Education
                </button>
                <a href="{{ route('education.index') }}" class="flex-1 px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors text-center">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

