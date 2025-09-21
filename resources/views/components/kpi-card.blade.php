@props([
  'title' => null,
  'value' => null,
  'icon'  => null,
])

<div class="col-12 col-sm-6 col-lg-3">
  <div class="card shadow-sm mb-3">
    <div class="card-body d-flex align-items-center">
      @if($icon)<i class="{{ $icon }} me-3 fs-3"></i>@endif
      <div>
        <div class="text-muted small">{{ $title ?? '—' }}</div>
        <div class="h4 mb-0">{{ $value ?? '0' }}</div>
      </div>
    </div>
  </div>
</div>
