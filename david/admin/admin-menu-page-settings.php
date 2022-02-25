<?php

// ****************** Début Modification Ajouter par Kélian ******************/

$siteUrl = plugin_dir_url(__FILE__);

wp_enqueue_style('david_css', $siteUrl . '../css/style.css');

wp_enqueue_script('david_admin', $siteUrl . '../js/admin-script.js', null, true);

wp_localize_script( 'david_admin', 'plugin_ajax_object',['ajax_url' => admin_url( 'admin-ajax.php?action=david-get-data' ) ] );  



// ****************** Fin Modification Ajouter par Kélian ******************/

// Activer ou désactiver les paramètres 
if (isset($_POST['submit_settings'])){
    
    if (isset($_POST['mail'])) {
        update_option('mail',1);  
    } else{
        update_option( 'mail', 0 ); 
    }
    
    if (isset($_POST['module'])){
        update_option('module' ,1);  
    } else{
        update_option( 'module', 0 ); 
    }
    
    if (isset($_POST['destinataire_mail'])){
       update_option('destinataire_mail',$_POST['destinataire_mail']);
    }
}

$destinataire_mail=get_option('destinataire_mail','');

$mail= get_option('mail', 0);
$module= get_option('module', 0);

// Tableau récapitulatif des sites à scanner
global $wpdb;

$table_sites = $wpdb->prefix . 'david_sites'; 

// Ajouter un site à scanner
if (isset($_REQUEST['david_nom'], $_REQUEST['david_url'], $_REQUEST['david_cms'])){
    $david_nom = $_REQUEST['david_nom'];
    $david_url = $_REQUEST['david_url'];
    $david_cms = $_REQUEST['david_cms'];
    $etat = function_scan_url_entry($david_url);
    if ( $etat != "succes") {
        add_action( 'admin_notices_error', 'sample_admin_notice__error' );
        do_action('admin_notices_error');
    }
    else {
        $data = array('david_nom' => $david_nom, 'david_url' => $david_url, 'david_cms' => $david_cms);
        $wpdb->insert($table_sites,$data);
        add_action( 'admin_notices_sucess', 'sample_admin_notice__sucess' );
        do_action('admin_notices_sucess');
    }
}

if (isset($_POST['SubmitReScan'])){
    $hostname=home_url();
    exec("wget -b -qO- ".$hostname."/?cron_david=1 &> /dev/null");
    $message_scan_manuel='<div class="texte_scan_en_cours">Scan en cours... Veuilllez rafraichier votre page dans 2 minutes.</div>';
}

if (isset($_POST['david_site_id']) && isset($_POST['desactiver_site'])){
    $david_site_id = $_POST['david_site_id'];
    $wpdb->update( $table_sites, array('david_enable' => 0), array( 'david_site_id' => $david_site_id ) );
}

if (isset($_POST['david_site_id']) && isset($_POST['activer_site'])){
    $david_site_id = $_POST['david_site_id'];
   $wpdb->update( $table_sites, array('david_enable' => 1), array( 'david_site_id' => $david_site_id ) );
}


// Supprimer un site
if (isset($_POST['david_site_id']) && isset($_POST['supprimer_site'])) {
    $david_site_id = $_POST['david_site_id'];
    $wpdb->delete( $table_sites, array( 'david_site_id' => $david_site_id ) );
}

$requete = "SELECT * FROM `$table_sites`;";
$sites = $wpdb->get_results($requete, ARRAY_A);

require_once('settings-form.php');
