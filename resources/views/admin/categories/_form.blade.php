<div class="cat-form-field">
    <label class="cat-form-label" for="name">Name</label>
    <input class="cat-form-input" type="text" id="name" name="name"
           value="{{ old('name', $category->name ?? '') }}" required>
    @error('name') <p class="cat-form-error">{{ $message }}</p> @enderror
</div>

<div class="cat-form-field">
    <label class="cat-form-label" for="slug">Slug <span class="cat-form-hint">(leave blank to generate from name)</span></label>
    <input class="cat-form-input" type="text" id="slug" name="slug"
           value="{{ old('slug', $category->slug ?? '') }}">
    @error('slug') <p class="cat-form-error">{{ $message }}</p> @enderror
</div>

<div class="cat-form-row">
    <div class="cat-form-field">
        <label class="cat-form-label" for="icon">Icon (emoji)</label>
        <input class="cat-form-input" type="text" id="icon" name="icon"
               value="{{ old('icon', $category->icon ?? '') }}">
        @error('icon') <p class="cat-form-error">{{ $message }}</p> @enderror
    </div>
    <div class="cat-form-field">
        <label class="cat-form-label" for="sort_order">Sort order</label>
        <input class="cat-form-input" type="number" min="0" id="sort_order" name="sort_order"
               value="{{ old('sort_order', $category->sort_order ?? 0) }}">
        @error('sort_order') <p class="cat-form-error">{{ $message }}</p> @enderror
    </div>
</div>

<label class="cat-form-check">
    <input type="checkbox" name="is_active" value="1"
           {{ old('is_active', $category->is_active ?? true) ? 'checked' : '' }}>
    <span>Active (visible on the public site)</span>
</label>