<section id="register" class="py-5" style="background: #e6f4ff;">
    <div class="container">
        <div class="row align-items-center g-4">
            <!-- FORM -->
            <div class="col-md-6">
                <div class="p-4 rounded-3 shadow-sm" style="background:#ffffff;">
                    <h3 class="mb-4" style="font-family: 'Poppins', sans-serif; font-weight:700; color:#2d3748;">
                        Daftar Sekarang!
                    </h3>
                    <form action="{{ route('register.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="parent_name" class="form-label">Nama Orangtua</label>
                            <input type="text" class="form-control" id="parent_name" name="parent_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="wa_number" class="form-label">Nomor WA</label>
                            <input type="tel" class="form-control" id="wa_number" name="wa_number" required>
                        </div>
                        <div class="mb-3">
                            <label for="child_name" class="form-label">Nama Anak</label>
                            <input type="text" class="form-control" id="child_name" name="child_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Jenjang Sekolah</label>
                            <select class="form-select" id="level" name="level" required>
                                <option value="">-- Pilih Jenjang --</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA">SMA</option>
                            </select>
                        </div>
                        <button type="submit" class="btn w-100 text-white" style="background:#0077b6;">
                            Submit
                        </button>
                    </form>
                </div>
            </div>

            <!-- IMAGE -->
            <div class="col-md-6">
                <div class="rounded-3 shadow-sm overflow-hidden" style="min-height:300px;">
                    <img src="assets/images/muwashofat/basket.jfif" alt="Form Pendaftaran" class="img-fluid w-100 h-100"
                        style="object-fit:cover;">
                </div>
            </div>
        </div>
    </div>
</section>
