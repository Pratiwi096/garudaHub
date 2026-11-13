<div class="form-group">
    <label for="title">Judul Proyek</label>
    <input id="title" type="text" name="title" value="{{ old('title', $project->title ?? '') }}" required>
    @error('title') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="category">Kategori</label>
    <input id="category" type="text" name="category" value="{{ old('category', $project->category ?? '') }}" required>
    @error('category') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="description">Deskripsi</label>
    <textarea id="description" name="description" rows="6" required
        style="width:100%; padding:0.65rem 0.8rem; border:1px solid var(--border-color); border-radius:6px;">{{ old('description', $project->description ?? '') }}</textarea>
    @error('description') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="budget">Anggaran (Rp)</label>
    <input id="budget" type="number" name="budget" min="0" value="{{ old('budget', $project->budget ?? '') }}" required>
    @error('budget') <p class="field-error">{{ $message }}</p> @enderror
</div>

<div class="form-group">
    <label for="bid_deadline">Batas Penawaran</label>
    <input id="bid_deadline" type="datetime-local" name="bid_deadline"
        value="{{ old('bid_deadline', isset($project) ? $project->bid_deadline->format('Y-m-d\TH:i') : '') }}" required>
    @error('bid_deadline') <p class="field-error">{{ $message }}</p> @enderror
</div>
