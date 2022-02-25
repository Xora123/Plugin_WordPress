(function ($) {
  $(document).ready(function () {
    $("body").on("click", ".fakeButton", function () {
      $(this).hide();
      $(this).parent().find($(".textFakeButton")).show();
    });
    $("body").on("click", ".btnAnnuler", function () {
      $(this).parent().parent().find($(".fakeButton")).show();
      $(this).parent().parent().find($(".textFakeButton")).hide();
    });

    $(".texte_scan_en_cours").fadeIn().delay(5000).fadeOut();
  });

  //****************** Début Modification Ajouter par Kélian ******************/

  // Ajout de la modification du Tableau Settings avec la bibliotèque dataTable
  $("#tab").dataTable({
    serverSide: false,
    ajax: {
      type: "GET",
      url: plugin_ajax_object.ajax_url,
      dataSrc: "", // Aller sur un fichier php pour aovir une url

    },
    // Création des columns
    columns: [
      {
        data: "david_enable",
      },
      {
        data: "david_nom",
      },
      {
        data: "david_url",
      },
      {
        data: "david_cms",
      },
      {
        data: "david_site_id",
        render: function(data, type, row) {
          return `<a href="admin.php?page=enable.php${data}" class="dashicons-before dashicons-edit">Activer</a><br>
          <a href="../admin/delete.php${data}" class="dashicons-before dashicons-trash">Supprimer</a><br>`
        }
      }
    ],
    createdRow: function( row, data, dataIndex ) {
      if ( data["david_enable"] == null ) {
          $(row).addClass( 'bg-danger' );
      }
  },
    language: {
      lengthMenu: "Afficher _MENU_ éléments",
      search: "Rechercher :",
      info: "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
      paginate: {
        first: "Premier",
        last: "Dernier",
        next: "Suivant",
        previous: "Précédent",
      },
      infoEmpty: "",
      emptyTable: "",
      zeroRecords: "",
      loadingRecords: "Chargement...",
      processing: "En cours...",
    },
    pagingType: "simple_numbers",
    lengthMenu: [10, 20, 30],
    pageLength: 10,
  });

  $("#log").dataTable({
    serverSide: false,
    ajax: {
      type: "GET",
      url: plugin_ajax_object.ajax_url,
      dataSrc: "", // Aller sur un fichier php pour aovir une url

    },
    // Création des columns
    columns: [
      {
        data: "david_nom",
      },
      {
        data: "david_url",
      },
      {
        data: "david_cms",
      },
      {
        data: "david_date_heure",
      },
      {
        data: "david_email_envoye",
      },
      {
        data: "david_remarque",
      },
    
    ],
    
    language: {
      lengthMenu: "Afficher _MENU_ éléments",
      search: "Rechercher :",
      info: "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
      paginate: {
        first: "Premier",
        last: "Dernier",
        next: "Suivant",
        previous: "Précédent",
      },
      infoEmpty: "",
      emptyTable: "",
      zeroRecords: "",
      loadingRecords: "Chargement...",
      processing: "En cours...",
    },
    pagingType: "simple_numbers",
    lengthMenu: [10, 20, 30],
    pageLength: 10,
  });
})(jQuery);

//****************** Fin des Modifications Ajouter par Kélian ******************/
