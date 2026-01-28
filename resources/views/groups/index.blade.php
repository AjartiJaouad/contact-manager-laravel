<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Groupes - Mercury</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Gestion des Groupes</h1>

        <div class="card mb-4">
            <div class="card-header">Ajouter un nouveau groupe</div>
            <div class="card-body">
                <form action="/groups" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="name" class="form-control" placeholder="Nom du groupe" required>
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Liste des groupes</div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom du groupe</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($groups as $group)
                            <tr>
                                <td>{{ $group->id }}</td>
                                <td>{{ $group->name }}</td>
                                <td>
                                    <a href="{{ route('groups.edit', $group->id) }}"
                                        class="btn btn-sm btn-warning">Modifier</a>






                                    <form action="{{ route('groups.destroy', $group->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE') <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce groupe ?')">
                                            Supprimer
                                        </button>
                                    </form>









                                </td>
                            </tr>
                        @endforeach

                        @if ($groups->isEmpty())
                            <tr>
                                <td colspan="3" class="text-center">Aucun groupe pour le moment</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
