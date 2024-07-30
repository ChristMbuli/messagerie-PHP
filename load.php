<?php
require './db.php';

$req = $conn->query('SELECT * FROM messages');

while ($message = $req->fetch()) { ?>
<div class="message">
    <h4>Pseudo: <?= $message['pseudo'] ?></h4>
    <p>Message: <?= $message['message'] ?></p>
</div>
<?php } ?>