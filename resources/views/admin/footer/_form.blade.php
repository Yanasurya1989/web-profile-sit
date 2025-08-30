<div class="mb-3">
    <label>Logo</label>
    <input type="file" name="logo" class="form-control">
    @if (!empty($footer->logo))
        <img src="{{ asset('storage/' . $footer->logo) }}" width="80" class="mt-2">
    @endif
</div>

<div class="mb-3">
    <label>Nama Sekolah</label>
    <input type="text" name="school_name" class="form-control"
        value="{{ old('school_name', $footer->school_name ?? '') }}">
</div>

<div class="mb-3">
    <label>Alamat</label>
    <textarea name="address" class="form-control">{{ old('address', $footer->address ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Telepon</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $footer->phone ?? '') }}">
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $footer->email ?? '') }}">
</div>

@php
    // Siapkan defaultNav untuk field navigation
    $defaultNav = old('navigation');
    if ($defaultNav === null && isset($footer)) {
        if (is_array($footer->navigation)) {
            $defaultNav = implode(', ', $footer->navigation);
        } else {
            $decoded = json_decode($footer->navigation, true);
            $defaultNav = is_array($decoded) ? implode(', ', $decoded) : $footer->navigation ?? '';
        }
    }
@endphp

<div class="mb-3">
    <label>Menu Navigasi (pisahkan dengan koma)</label>
    <input type="text" name="navigation" class="form-control" value="{{ $defaultNav }}">
    <small class="text-muted">Contoh: Beranda, Program, Tentang Kami</small>
</div>

<div class="mb-3">
    <label>Embed Map (iframe)</label>
    <textarea name="map_embed" class="form-control" rows="3">{{ old('map_embed', $footer->map_embed ?? '') }}</textarea>
</div>
