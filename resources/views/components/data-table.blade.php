{{-- resources/views/components/data-table.blade.php --}}
@props([
  'headers' => [],           // ['Col A','Col B', ...] o [['text'=>'Col A','class'=>'w-25'], ...]
  'empty'   => null,         // Texto para estado vacío (opcional)
])

<div class="table-responsive">
  <table {{ $attributes->merge(['class' => 'table table-striped table-hover align-middle mb-0']) }}>
    <thead class="table-light">
      <tr>
        @foreach($headers as $h)
          @php
            $label = is_array($h) ? ($h['text'] ?? '') : $h;
            $thCls = is_array($h) ? ($h['class'] ?? '') : '';
          @endphp
          <th scope="col" class="{{ $thCls }}">{{ $label }}</th>
        @endforeach
      </tr>
    </thead>

    <tbody>
      @if(trim($slot) === '' && $empty)
        <tr>
          <td colspan="{{ max(1, count($headers)) }}" class="text-center text-muted p-3">
            {{ $empty }}
          </td>
        </tr>
      @else
        {{ $slot }}
      @endif
    </tbody>
  </table>
</div>
