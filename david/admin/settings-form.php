<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kalam:wght@700&display=swap" rel="stylesheet">

<h1>⚙️ PARAMETRES</h1>
<div class="big_wrap">
<div class='parametres'>
    <div class='activer'>
        <h4>Activer ou désactiver les paramètres suivants :</h4>
        <form action="" method="POST" class='wrap'>

            <div class='block'>
                <label for="module"><input type="checkbox" name="module" id="module" value="1" <?php checked($module, 1); ?>>Activer le Module </label>
            </div>

            <div class='block'>
                <label for="mail"><input type="checkbox" name="mail" id="mail" value="1" <?php checked($mail, 1); ?>>Envoyer les mails</label>
            </div>

            <div class='block'>
                <label for="destinataire_mail" style="display:block">Destinataires des mails d'alertes (séparé par un virgule)</label>
                <input type="text" name="destinataire_mail" id="destinataire_mail" value="<?php echo get_option('destinataire_mail', ''); ?>" style="width:90%" />
            </div>


            <div class="submit_settings">
                <input type="submit" name="submit_settings" value="enregistrer" class="button" style="margin-top:10px;">
            </div>
        </form>
    </div>
</div>

<!--  CREATE -->
<div class='create'>
    <h4>Ajouter un site à scanner</h4>
    <form action="" method="POST" class='wrap'>
        <div style="display:inline-block;">
            <label for="david_nom">Nom du site</label>
            <input type="text" name="david_nom" id="david_nom" minlength="3" maxlength="30" required>
        </div>
        <div style="display:inline-block;">
            <label for="david_url">URL</label>
            <input type="text" name="david_url" id="david_url" placeholder="https://www.nom_du_site.fr" minlength="3" maxlength="80" required>
        </div>
        <div style="display:inline-block;">
            <label for="david_cms" class="david_label">CMS</label>
            <select name="david_cms" id="david_cms">
                <option value='wordpress'>WORDPRESS</option>
                <option value='prestashop'>PRESTASHOP</option>
            </select>
        </div>
        <div class="submit_sites">
            <input type="submit" value="enregistrer" class="button" id="enregistrer" style="margin-top:10px;">
        </div>
    </form>
    <div>
        <hr style="margin-top: 20px; width: 50%;">
        <h4>Dernier scan</h4>
        <p class="dernieres-requete"><?php echo get_option('last_request', ''); ?></p>
    </div>
    <form action="#" method="post">
        <input type="submit" name="SubmitReScan" class="button" value="Lancer un scan manuel" />
        <?php echo $message_scan_manuel; ?>
    </form>

</div>
</div>

<!-- ****************** Début Modification Ajouter par Kélian ******************/ -->
<!-- TABLEAU RECAP SITES BDD -->
<div class="clear"></div>
<div>
    Nombre de sites enregistrés : <?php echo count($sites); ?>
</div>

<div>
<table class="table" id="tab">
    <thead>
        <tr>
            <th style="width:30px;">Actif</th>
            <th>Nom</th>
            <th>URL</th>
            <th>CMS</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>

</div>

<!-- ****************** Fin Modification Ajouter par Kélian ******************/ -->