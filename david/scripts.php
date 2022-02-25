<?php

/**
 * at_rest_init
 */

// Fonction pour charger tout les assets pour DataTable
function my_assets()
{
    if (is_admin()) {

        // Google CDN jQuery
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array(), '1.7.1', true);

        // Enregistrement des scripts
        wp_register_style('datatable-stylesheet2', 'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css');
        wp_register_style('datatable-stylesheet', 'https://cdn.datatables.net/v/zf/jq-3.6.0/jszip-2.5.0/dt-1.11.4/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/cr-1.5.5/date-1.1.2/fc-4.0.2/fh-3.2.2/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.1/sp-1.4.0/sl-1.3.4/sr-1.1.0/datatables.min.css');
        wp_register_script('datatable_pdfmake', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js');
        wp_register_script('datatable_vfs_font', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js');
        wp_register_script('datatable_js', 'https://cdn.datatables.net/v/zf/jq-3.6.0/jszip-2.5.0/dt-1.11.4/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/cr-1.5.5/date-1.1.2/fc-4.0.2/fh-3.2.2/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.1/sp-1.4.0/sl-1.3.4/sr-1.1.0/datatables.min.js');
        wp_register_script('datatable_fundation', 'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js');
        wp_register_script('datatable_button', 'https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js');

        //Mise en attente des scripts 
        wp_enqueue_script('jquery');
        wp_enqueue_style('datatable-stylesheet2', 'https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css');
        wp_enqueue_style('datatable-stylesheet', 'https://cdn.datatables.net/v/zf/jq-3.6.0/jszip-2.5.0/dt-1.11.4/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/cr-1.5.5/date-1.1.2/fc-4.0.2/fh-3.2.2/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.1/sp-1.4.0/sl-1.3.4/sr-1.1.0/datatables.min.css');
        wp_enqueue_script('datatable_pdfmake');
        wp_enqueue_script('datatable_vfs_font');
        wp_enqueue_script('datatable_js');
        wp_enqueue_script('datatable_fundation');
        wp_enqueue_script('datatable_button');
    }
}

// Fonction récuperer les datas de la table
function david_plugin_get_data()
{
    global $wpdb;
    $table_sites = $wpdb->prefix . 'david_sites';


    $data = $wpdb->get_results("SELECT * FROM $table_sites");
    wp_send_json($data);
    wp_die();
}

function david_plugin_get_log()
{
    global $wpdb;
    $table_sites = $wpdb->prefix . 'david_sites';
    $table_incidents = $wpdb->prefix . 'david_incidents';
    $requete = "SELECT *
    FROM $table_sites
    INNER JOIN $table_incidents
    WHERE $table_sites.david_site_id = $table_incidents.david_id_site
    ORDER BY $table_incidents.david_date_heure DESC";

    $incidents = $wpdb->get_results($requete);

    wp_send_json($incidents);
    wp_die();
}

add_action('wp_ajax_david-get-log', 'david_plugin_get_log');

add_action('wp_ajax_david-get-data', 'david_plugin_get_data');

add_action('admin_enqueue_scripts', 'my_assets');
