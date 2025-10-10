{{-- ====== المنتج: اسم/اختيار (كما هو) ====== --}}
<div class="mb-4">
  @if ($product->images)
    <h6>{{ $product->name }}</h6>
  @else
    <div class="mb-4">
      <x-form.select
        name="product_id"
        :label="__('products.parent')"
        :options="$products"
        :selected="$product->id"
        first_option="-- Choose product --"
      />
    </div>
  @endif
</div>

{{-- ====== واجهة الرفع والـ previews ====== --}}
<div class="mb-4">
  {{-- <label class="form-label d-block">{{ __('product_images.image') }}</label> --}}

  <div class="uploader card border-0 shadow-sm">
    <div class="card-body">
      <div id="drop-multi" class="uploader-drop p-4 text-center">
        <div class="fw-semibold mb-2">اسحب وافلت الصور هنا</div>
        <div class="text-muted mb-3">أو</div>
        <button type="button" class="btn btn-primary" id="pick-multi-btn">اختيار صور</button>

        {{-- بدون تغيير الاسم: path[] --}}
        <input type="file" id="images-input" name="path[]" accept="image/*" multiple class="d-none">

        {{-- متروك كما هو (غير مستخدم هنا) --}}
        <input type="hidden" name="primary_index" id="primary_index" value="">

        <div class="small text-muted mt-3">الحد: 5MB للصورة • الامتدادات: JPG/PNG/WebP</div>
      </div>

      <div class="d-flex align-items-center justify-content-between mt-3">
        <span class="badge bg-secondary" id="selected-count">0 صور</span>
        <div class="d-flex gap-2">
          <button type="button" class="btn btn-sm btn-outline-secondary" id="clear-all">تفريغ الكل</button>
        </div>
      </div>

      {{-- الجريد: هنعرض فيها القديم + الجديد --}}
      <div id="previews-grid" class="row g-3 mt-1"></div>
    </div>
  </div>

  {{-- تجهيز بيانات الصور القديمة كـ JSON للـ JS (عرض فقط) --}}
  @php
    $existingImages = ($product->images ?? collect())
      ->map(function ($img) {
          return [
            'id'  => $img->id,
            'url' => asset('storage/'.$img->path), // تأكد storage:link معمول
          ];
      })
      ->values()
      ->all();
  @endphp
  <script>window.EXISTING_IMAGES = @json($existingImages);</script>

  {{-- هنضيف remove_ids[] هنا عند حذف صورة قديمة (اختياري وآمن) --}}
  <div id="removed_ids_holder"></div>
</div>

<button type="submit" class="btn btn-primary">
  {{ $button_label ?? __('product_images.create') }}
</button>

@push('styles')
<style>
  .uploader-drop{border:2px dashed #cfd6dd;border-radius:.75rem;background:#f9fafb}
  .thumb-card{position:relative}
  .thumb-box{border:1px solid #e5e7eb;border-radius:.75rem;overflow:hidden;background:#fff}
  .thumb-img{width:100%;height:160px;object-fit:cover;display:block}
  .thumb-meta{padding:.5rem .75rem;display:flex;align-items:center;justify-content:space-between;gap:.5rem}
  .thumb-name{font-size:.9rem;max-width:60%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
  .thumb-size{font-size:.8rem;color:#6b7280}
  .thumb-actions{display:flex;align-items:center;gap:.5rem}
  .thumb-close{
    position:absolute;top:.45rem;right:.45rem;width:28px;height:28px;line-height:26px;
    border-radius:50%;border:1px solid #e5e7eb;background:#fff;color:#111;text-align:center;
    font-weight:700;cursor:pointer;box-shadow:0 1px 2px rgba(0,0,0,.06)
  }
  .uploader-drop.dragover{background:#eef6ff;border-color:#93c5fd}
</style>
@endpush

@push('scripts')
<script>
(() => {
  // عناصر الواجهة
  const input    = document.getElementById('images-input');   // name="path[]"
  const drop     = document.getElementById('drop-multi');
  const pickBtn  = document.getElementById('pick-multi-btn');
  const grid     = document.getElementById('previews-grid');
  const countEl  = document.getElementById('selected-count');
  const clearBtn = document.getElementById('clear-all');
  const removedHolder = document.getElementById('removed_ids_holder');

  // هندير الملفات الجديدة فقط عبر DataTransfer
  const filesDT = new DataTransfer();
  const MAX_MB = 5;
  const VALID  = ['image/jpeg','image/png','image/webp','image/jpg'];

  // 1) اعرض الصور القديمة (عرض فقط) بنفس شكل كروت المعاينة
  if (Array.isArray(window.EXISTING_IMAGES)) {
    window.EXISTING_IMAGES.forEach((it) => {
      if (!it || !it.url) return;
      const col  = document.createElement('div');
      col.className   = 'col-12 col-sm-6 col-md-4 col-lg-3 thumb-card';
      col.dataset.type = 'existing';
      col.dataset.id   = it.id ?? '';

      const close = document.createElement('button');
      close.type = 'button';
      close.className = 'thumb-close';
      close.setAttribute('aria-label', 'Remove image');
      close.innerHTML = '&times;';
      close.addEventListener('click', () => {
        // علِّم للحذف (اختياري وآمن)
        if (it.id) {
          const hidden = document.createElement('input');
          hidden.type  = 'hidden';
          hidden.name  = 'remove_ids[]';
          hidden.value = it.id;
          removedHolder.appendChild(hidden);
        }
        col.remove();
      });

      const box  = document.createElement('div'); box.className = 'thumb-box';
      const img  = document.createElement('img'); img.className = 'thumb-img';
      img.alt = 'existing'; img.src = it.url;

      const meta = document.createElement('div'); meta.className = 'thumb-meta';
      const left = document.createElement('div');
      const name = document.createElement('div'); name.className = 'thumb-name'; name.textContent = 'صورة محفوظة';
      const size = document.createElement('div'); size.className = 'thumb-size'; size.textContent = 'عرض فقط';
      left.appendChild(name); left.appendChild(size);
      meta.appendChild(left);

      box.appendChild(img); box.appendChild(meta);
      col.appendChild(close); col.appendChild(box);
      grid.appendChild(col);
    });
  }

  // 2) اختيار ملفات جديدة (زر + دراج & دروب)
  pickBtn?.addEventListener('click', () => input.click());
  input.addEventListener('change', (e) => addFiles(e.target.files));

  ['dragenter','dragover'].forEach(ev =>
    drop.addEventListener(ev, (e)=>{ e.preventDefault(); e.stopPropagation(); drop.classList.add('dragover'); })
  );
  ['dragleave','drop'].forEach(ev =>
    drop.addEventListener(ev, (e)=>{ e.preventDefault(); e.stopPropagation(); drop.classList.remove('dragover'); })
  );
  drop.addEventListener('drop', (e) => addFiles(e.dataTransfer.files));

  function addFiles(list){
    if (!list || !list.length) return;

    [...list].forEach(file => {
      if (!VALID.includes(file.type)) return warn('صيغة غير مدعومة (JPG/PNG/WebP)');
      if (file.size > MAX_MB * 1024 * 1024) return warn('الحجم الأقصى ' + MAX_MB + 'MB');
      filesDT.items.add(file);
      renderNewThumb(file, filesDT.files.length - 1);
    });

    input.files = filesDT.files;
    updateCount();
  }

  function renderNewThumb(file, index){
    const col = document.createElement('div');
    col.className = 'col-12 col-sm-6 col-md-4 col-lg-3 thumb-card';
    col.dataset.index = index;
    col.dataset.type  = 'new';

    const close = document.createElement('button');
    close.type = 'button';
    close.className = 'thumb-close';
    close.setAttribute('aria-label', 'Remove image');
    close.innerHTML = '&times;';
    close.addEventListener('click', () => removeNewThumb(col));

    const box = document.createElement('div'); box.className = 'thumb-box';
    const img = document.createElement('img'); img.className = 'thumb-img';
    img.alt = file.name; img.src = URL.createObjectURL(file);

    const meta = document.createElement('div'); meta.className = 'thumb-meta';
    const left = document.createElement('div');
    const name = document.createElement('div'); name.className = 'thumb-name'; name.textContent = file.name;
    const size = document.createElement('div'); size.className = 'thumb-size'; size.textContent = formatBytes(file.size);
    left.appendChild(name); left.appendChild(size);
    meta.appendChild(left);

    box.appendChild(img); box.appendChild(meta);
    col.appendChild(close); col.appendChild(box);
    grid.appendChild(col);
  }

  function removeNewThumb(card){
    const idx = getIndex(card);
    // أعد بناء DataTransfer بدون الملف المحذوف
    const tmp = new DataTransfer();
    [...filesDT.files].forEach((f, i) => { if (i !== idx) tmp.items.add(f); });
    filesDT.items.clear();
    [...tmp.files].forEach(f => filesDT.items.add(f));
    input.files = filesDT.files;

    // امسح من الواجهة وفهرِس الباقي
    card.remove();
    let i = 0;
    [...grid.children].forEach(child => {
      if (child.dataset.type === 'new') child.dataset.index = i++;
    });

    updateCount();
  }

  // 3) تفريغ “الجديدة” فقط (سيب القديمة)
  clearBtn.addEventListener('click', () => {
    filesDT.items.clear();
    input.files = filesDT.files;
    [...grid.children].forEach(c => { if (c.dataset && c.dataset.type === 'new') c.remove(); });
    updateCount();
  });

  // أدوات مساعدة
  function updateCount(){
    const n = filesDT.files.length;
    countEl.textContent = n + ' صورة';
  }
  function getIndex(card){ return parseInt(card.dataset.index, 10); }
  function formatBytes(bytes){
    if (bytes === 0) return '0 B';
    const k = 1024, sizes = ['B','KB','MB','GB','TB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return (bytes / Math.pow(k, i)).toFixed(2) + ' ' + sizes[i];
  }
  function warn(msg){ alert(msg); }
})();
</script>
@endpush
