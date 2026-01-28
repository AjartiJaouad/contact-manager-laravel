<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le groupe</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Modifier le groupe</h1>

        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('groups.update', $group->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-3">
                        <label class="form-label">Nom du groupe</label>
                        <input type="text" name="name" class="form-control" value="{{ $group->name }}" required>
                    </div>

                    <button type="submit" class="btn btn-success">Mettre à jour</button>
                    <a href="{{ route('groups.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
