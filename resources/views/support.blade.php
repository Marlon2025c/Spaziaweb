<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Support</title>
    <style>
        p {
            margin-top: 5px;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            color: white;
        }

        body {
            background-color: #101015;
            font-family: Arial, sans-serif;
        }

        .form-container {
            background-color: #14141b;
            padding: 40px;
            border-radius: 8px;
            max-width: 600px;
            margin: 0 auto;
        }

        .form-title {
            color: white;
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .form-label {
            color: white;
            margin-bottom: 8px;
        }

        .form-input,
        .form-textarea,
        .form-submit {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #2b2b36;
            border: 1px solid #444;
            border-radius: 4px;
            color: white;
            font-size: 1rem;
        }

        .form-submit {
            background-color: #737373;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .form-submit:hover {
            background-color: #575757;
        }

        .form-textarea {
            height: 150px;
            resize: none;
        }

        .form-footer {
            color: white;
            font-size: 0.875rem;
            text-align: center;
        }

        .custom-section {
            padding: 6rem 0;
        }
    </style>
</head>

<body>

    <div class="custom-section">
        <div class="form-container">
            <h1 class="form-title">Formulaire de Support</h1>
            <form action="#" method="POST">
                <label for="name" class="form-label">Pseudo :</label>
                <input type="text" id="name" name="name" class="form-input" placeholder="Votre nom" required>


                <label for="message" class="form-label">Message :</label>
                <textarea id="message" name="message" class="form-textarea" placeholder="Décrivez votre problème ou question"
                    required></textarea>

                <button type="submit" class="form-submit">Envoyer</button>
            </form>
            <p class="form-footer">Nous ferons de notre mieux pour vous répondre dans les plus brefs délais.</p>
        </div>
    </div>

</body>

</html>
