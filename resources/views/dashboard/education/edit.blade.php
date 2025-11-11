@extends('dashboard.layout')

@section('title', 'Edit Education')
@section('page-title', 'Edit Education')
@section('page-subtitle', 'Update education information')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
        <form action="{{ route('education.update', $education) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Institusi -->
            <div>
                <label for="institusi" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-school text-orange-500 mr-2"></i>Nama Institusi * 
                </label>
                <input type="text" name="institusi" id="institusi" value="{{ old('institusi', $education->institusi) }}" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">
            </div>

            <!-- Tingkat -->
            <div>
                <label for="tingkat" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-layer-group text-amber-500 mr-2"></i>Tingkat Pendidikan * 
                </label>
                <select name="tingkat" id="tingkat" required
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-amber-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">
                    <option value="SD" {{ old('tingkat', $education->tingkat) == 'SD' ? 'selected' : '' }}>SD</option>
                    <option value="SMP" {{ old('tingkat', $education->tingkat) == 'SMP' ? 'selected' : '' }}>SMP</option>
                    <option value="SMA" {{ old('tingkat', $education->tingkat) == 'SMA' ? 'selected' : '' }}>SMA</option>
                    <option value="Universitas" {{ old('tingkat', $education->tingkat) == 'Universitas' ? 'selected' : '' }}>Universitas</option>
                </select>
            </div>

            <!-- Tahun Mulai -->
            <div>
                <label for="tahun_mulai" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-calendar-alt text-blue-500 mr-2"></i>Tahun Mulai * 
                </label>
                <input type="text" name="tahun_mulai" id="tahun_mulai" value="{{ old('tahun_mulai', $education->tahun_mulai) }}" required maxlength="4"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">
            </div>

            <!-- Tahun Selesai -->
            <div>
                <label for="tahun_selesai" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-calendar-check text-green-500 mr-2"></i>Tahun Selesai * 
                </label>
                <input type="text" name="tahun_selesai" id="tahun_selesai" value="{{ old('tahun_selesai', $education->tahun_selesai) }}" required maxlength="4"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">
            </div>

            <!-- Keterangan -->
            <div>
                <label for="keterangan" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-info-circle text-purple-500 mr-2"></i>Keterangan
                </label>
                <textarea name="keterangan" id="keterangan" rows="3"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">{{ old('keterangan', $education->keterangan) }}</textarea>
            </div>

            <!-- Urutan -->
            <div>
                <label for="urutan" class="block text-sm font-semibold mb-2">
                    <i class="fas fa-sort-numeric-down text-red-500 mr-2"></i>Urutan * 
                </label>
                <input type="number" name="urutan" id="urutan" value="{{ old('urutan', $education->urutan) }}" required min="0"
                    class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl focus:ring-2 focus:ring-red-500 focus:border-transparent transition-all text-gray-900 dark:text-gray-100">
                <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">Urutan untuk sorting (0 = paling atas)</p>
            </div>

            <!-- Buttons -->
            <div class="flex space-x-4 pt-4">
                <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-orange-500 to-amber-600 hover:from-orange-600 hover:to-amber-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all">
                    <i class="fas fa-save mr-2"></i>Update Education
                </button>
                <a href="{{ route('education.index') }}" class="flex-1 px-6 py-3 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors text-center">
                    <i class="fas fa-times mr-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

