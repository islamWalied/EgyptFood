<div class="mb-4">
    <x-form.input name="name" :label="__('people.name')" :value="$person->name ?? ''" required />
</div>
<div class="mb-4">
    <x-form.input name="email" type="email" :label="__('people.email')" :value="$person->email ?? ''" required />
</div>
<div class="mb-4">
    <x-form.select name="department_id" :label="__('people.department')" :options="$departments" :selected="$person->department_id ?? null"
                   first_option="-- Choose Department --" />
</div>
<button type="submit" class="btn btn-primary">{{ $button_label ?? __('people.create') }}</button>
