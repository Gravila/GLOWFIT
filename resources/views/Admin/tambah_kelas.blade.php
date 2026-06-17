<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card shadow-sm border-0" style="max-width: 600px; margin: auto;">
        <div class="card-body p-4">
            <h4 class="mb-4 text-primary">Tambah Jadwal Baru</h4>
            <form action="{{ route('admin.kelas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Pilih Kelas</label>
                    <select name="kelas_gym_id" class="form-select" required>
                        @foreach(\App\Models\KelasGym::all() as $kg)
                            <option value="{{ $kg->id }}">{{ $kg->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Hari</label>
                    <input type="text" name="hari" class="form-control" placeholder="Contoh: Senin" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Mulai</label>
                        <input type="time" name="jam_mulai" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Selesai</label>
                        <input type="time" name="jam_selesai" class="form-control" required>
                    </div>
                </div>
                <div class="d-grid mt-3">
                    <button type="submit" class="btn-maroon">Simpan Jadwal</button>
                </div>
            </form>
        </div>
    </div>
</div>