<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Modifier le contact</h1>

        <div class="card mt-4">
            <div class="card-body">
                <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Prénom</label>
                            <input type="text" name="first_name" class="form-control"
                                value="{{ $contact->first_name }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nom</label>
                            <input type="text" name="last_name" class="form-control"
                                value="{{ $contact->last_name }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $contact->email }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Téléphone</label>
                        <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Groupe</label>
                        <select name="group_id" class="form-select" required>
                            @foreach ($groups as $group)
                                <option value="{{ $group->id }}"
                                    {{ $contact->group_id == $group->id ? 'selected' : '' }}>
                                    {{ $group->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-warning">Mettre à jour</button>
                    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
