<div class="mb-3">
    <label class="form-label">Subtitle</label>
    <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $about->subtitle ?? '') }}"
        required>
</div>

<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $about->title ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Short Description</label>
    <textarea name="short_desc" class="form-control" rows="3" required>{{ old('short_desc', $about->short_desc ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Long Description</label>
    <textarea name="long_desc" class="form-control" rows="5">{{ old('long_desc', $about->long_desc ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Media Type</label>
    <select name="media_type" class="form-control" required>
        <option value="image" {{ old('media_type', $about->media_type ?? '') == 'image' ? 'selected' : '' }}>Image
        </option>
        <option value="video" {{ old('media_type', $about->media_type ?? '') == 'video' ? 'selected' : '' }}>Video
        </option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Media Path</label>
    <input type="text" name="media_path" class="form-control"
        value="{{ old('media_path', $about->media_path ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-control">
        <option value="1" {{ old('status', $about->status ?? 1) == 1 ? 'selected' : '' }}>Aktif</option>
        <option value="0" {{ old('status', $about->status ?? 1) == 0 ? 'selected' : '' }}>Nonaktif</option>
    </select>
</div>
