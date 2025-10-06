  <div class="mb-4">
      <x-form.input name="name" :label="__('categories.name')" :value="$category->name" required />
  </div>
  <div class="mb-4">
      <x-form.input type="file" name="image" :label="__('categories.image')" accept="image/*" onchange="previewImage(event)" />

      @if ($category->image)
          <img id="preview" src="{{ asset($category->image_url) }}" width="100" height="100"
              style="margin-top: 10px;">
      @else
          <img id="preview" src="#" alt="No Image Selected" style="display: none; margin-top: 10px;"
              width="100" height="100">
      @endif

  </div>
  <div class="mb-4">
      <x-form.select name="category_id" :label="__('categories.parent')" :options="$parents" :selected="$category->category_id"
          first_option="-- Choose Category --" />
  </div>

  <button type="submit" class="btn btn-primary">{{ $button_label ?? __('categories.create') }}</button>
