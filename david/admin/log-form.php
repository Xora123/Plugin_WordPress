<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&display=swap" rel="stylesheet">

<h1>🆘 HISTORIQUE DES INCIDENTS</h1>
<!-- TABLEAU RECAP LOGS BDD -->
<form action="#" method="post" class="log-form">
    <?php echo $message_delete; ?>
    <input type="submit" name="SubmitDeleteLog" class="button" value="Effacer tous les Logs"/>
</form>
<table id="log">
    <thead>
        <tr>
        <th>Site</th>
        <th>URL</th>
        <th>CMS</th>
        <th>Date & Heure</th>
        <th>Email envoyé</th>
        <th>Remarque</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>