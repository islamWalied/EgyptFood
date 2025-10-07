  <div class="mb-4">
      <x-form.input name="name" :label="__('products.name')" :value="$product->name" required />
  </div>
  <div class="mb-4">
      <x-form.input type="file" name="image" :label="__('products.image')" accept="image/*" onchange="previewImage(event)" />

      @if ($product->image)
          <img id="preview" src="{{ $product->image_url }}" width="100" height="100"
              style="margin-top: 10px;">
      @else
          <img id="preview" src="#" alt="No Image Selected" style="display: none; margin-top: 10px;"
              width="100" height="100">
      @endif

  </div>
  <div class="mb-4">
      <x-form.select name="category_id" :label="__('categories.parent')" :options="$categories" :selected="$product->category_id"
          first_option="-- Choose product --" />
  </div>

  <div class="mb-4">
      <x-form.textarea name="description" :label="__('products.description')" :value="$product->description" />
  </div>

  <button type="submit" class="btn btn-primary">{{ $button_label ?? __('products.create') }}</button>
