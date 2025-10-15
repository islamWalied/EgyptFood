<div class="mb-4">
    <x-form.input name="name" :label="__('departments.name')" :value="$department->name ?? ''" required />
</div>
<button type="submit" class="btn btn-primary">{{ $button_label ?? __('departments.create') }}</button>
