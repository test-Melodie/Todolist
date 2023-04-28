@extends("template")
@section("title", "Ma Todo List")
@section("content")
<div class="container mt-5">
  <div class="card">
    <div class="card-body">
      <form action="{{ route('todo.save') }}" method="post" class="add">
        @csrf <!-- Ajout de l'annotation csrf -->
        <div class="input-group">
          <span class="input-group-addon" id="basic-addon1">
            <span class="oi oi-pencil"></span>
          </span>
          <input
            id="texte"
            name="texte"
            type="text"
            class="form-control"
            placeholder="Prendre une note…"
            aria-label="My new idea"
            aria-describedby="basic-addon1"
          />
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
      <ul class="list-group">
        @forelse ($todos as $todo)
        <li class="list-group-item">
          <span>{{ $todo->texte }}</span>
          <a href="/actions/done/{{$todo->id}}" class="btn btn-success">
          <i class="fas fa-check"></i> Terminé
          </a>
          <a href="/actions/delete/{{$todo->id}}" class="btn btn-danger" onclick="return confirm('voulez vous supprimer cette tâche ?')">
          <i class="fas fa-trash-alt"></i> Supprimer
          </a>
        </li>
        @empty
        <li class="list-group-item text-center">C'est vide !</li>
        @endforelse
        
      </ul>
    </div>
  </div>
</div>
@endsection