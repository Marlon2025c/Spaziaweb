<!-- resources/views/create.blade.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un article</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #101015;
            color: white;
            font-family: Arial, sans-serif;
        }

        .form-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            margin: 50px auto;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            background-color: #222;
            border: 1px solid #444;
            color: white;
            border-radius: 5px;
        }

        input[type="file"] {
            padding: 10px;
            background-color: #222;
            border: 1px solid #444;
            color: white;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #737373;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2>Créer un article</h2>
        <form ethod="POST" enctype="multipart/form-data">
            @csrf

            <!-- Image Upload -->
            <div class="form-group">
                <label for="image">Image :</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>

            <!-- Tag Selection -->
            <div class="form-group">
                <label for="tag">Tag :</label>
                <select id="tag" name="tag" required>
                    <option value="journal">Journal</option>
                    <option value="update">Update</option>
                    <option value="live">Live</option>
                    <!-- Ajoute d'autres tags si nécessaire -->
                </select>
            </div>

            <!-- Title -->
            <div class="form-group">
                <label for="title">Titre :</label>
                <input type="text" id="title" name="title" placeholder="Entrez un titre" required>
            </div>

            <!-- Date -->
            <div class="form-group">
                <label for="date">Date :</label>
                <input type="text" id="date" name="date" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"
                    readonly>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description :</label>
                <textarea id="description" name="description" rows="4" placeholder="Entrez une description" required></textarea>
            </div>

            <button type="submit">Soumettre</button>
        </form>
    </div>

</body>

</html>
