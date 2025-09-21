@props([
  'show' => null,     // URL o route() para ver
  'edit' => null,     // URL o route() para editar
  'delete' => null,   // URL o route() para eliminar (action del form)
  'method' => 'DELETE',
  'confirm' => '¿Seguro que deseas eliminar este registro?',
])

<div class="btn-group" role="group">
  @if($show)
    <a href="{{ $show }}" class="btn btn-sm btn-outline-secondary">Ver</a>
  @endif

  @if($edit)
    <a href="{{ $edit }}" class="btn btn-sm btn-outline-primary">Editar</a>
  @endif

  @if($delete)
    <form action="{{ $delete }}" method="POST" class="d-inline"
          onsubmit="return confirm(@js($confirm));">
      @csrf
      @method($method)
      <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
    </form>
  @endif
</div>
