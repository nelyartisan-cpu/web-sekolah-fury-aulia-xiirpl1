@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-3">
    <label for="nama_ekstrakurikuler" class="form-label">Nama Ekstrakurikuler</label>
    <input type="text"
           name="nama_ekstrakurikuler"
           id="nama_ekstrakurikuler"
           class="form-control"
           value="{{ old('nama_ekstrakurikuler', $ekstrakurikuler->nama_ekstrakurikuler ?? '') }}"
           required>
</div>

<div class="mb-3">
    <label for="guru_id" class="form-label">Pembina (Guru)</label>
    <select name="guru_id" id="guru_id" class="form-control" required>
        <option value="">-- Pilih Guru --</option>
        @foreach ($gurus as $guru)
            <option value="{{ $guru->id }}"
                {{ old('guru_id', $ekstrakurikuler->guru_id ?? '') == $guru->id ? 'selected' : '' }}>
                {{ $guru->nama_guru }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea name="deskripsi"
              id="deskripsi"
              class="form-control"
              rows="4">{{ old('deskripsi', $ekstrakurikuler->deskripsi ?? '') }}</textarea>
</div>