<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Contacts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Liste des Contacts</h1>
            <a href="{{ route('contacts.create') }}" class="btn btn-primary">Ajouter un contact</a>
        </div>

        <form action="{{ route('contacts.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Rechercher par nom..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-secondary">Rechercher</button>

                @if (request('search'))
                    <a href="{{ route('contacts.index') }}" class="btn btn-outline-secondary">X</a>
                @endif
            </div>
        </form>

        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Groupe</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->first_name }}</td>
                                <td>{{ $contact->last_name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                    <span class="badge bg-info">{{ $contact->group->name }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('contacts.edit', $contact->id) }}"
                                        class="btn btn-sm btn-warning">Modifier</a>

                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Voulez-vous vraiment supprimer ce contact ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        @if ($contacts->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">Aucun contact trouvé.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $contacts->links() }}
                </div>

                <a href="{{ route('groups.index') }}" class="mt-3 d-inline-block">← Gérer les groupes</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
