<?php
require './db.php';

if (isset($_POST['envoyer'])) {
    if (!empty($_POST['pseudo']) and !empty($_POST['message'])) {

        $pseudo = htmlspecialchars($_POST['pseudo']);
        $message = nl2br(htmlspecialchars($_POST['message']));

        $stm = $conn->prepare('INSERT INTO messages(pseudo, message) VALUES(?, ?)');
        $stm->execute(array($pseudo, $message));

        echo "Message envoyer avec success !";

    } else {
        echo "Completez tous les champs";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" align="center">
        <input type="text" name="pseudo" placeholder="Votre peudo"><br><br>
        <textarea name="message" id="" cols="30" rows="10"></textarea><br>
        <button type="submit" name="envoyer">Envoyer</button>
    </form><br>
    <hr>
    <section id="messages"></section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/4.0.0-beta/jquery.min.js"></script>
    <script>
        setInterval('loadMessage()', 500);

        function loadMessage() {
            $('#messages').load('load.php')
        }
    </script>
</body>

</html>