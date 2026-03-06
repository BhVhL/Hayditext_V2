<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title??"" ?></title>
</head>
<body>
    <main>
        <section>
            <h2>Ajouter un projet</h2>
            <form action="" method="post">
                <label for="name">Nom du projet</label>
                <input type="text" id="name" name="name" placeholder="Article sur les élections présidentielles">
                <hr>
                <button type="submit" name="submit">Ajouter</button>
            </form>
            <p><?= $data["error"] ?? "" ?></p>
            <p><?= $data["valid"] ?? "" ?></p>
        </section>
        <a href="/">Back to home</a>
    </main>
</body>
</html>