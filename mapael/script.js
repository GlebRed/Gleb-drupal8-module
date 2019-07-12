(function (jQuery, Drupal, drupalSettings) {
  jQuery(".mapcontainer span").html("Loading JSON data").css({"color": "blue", "font-weight": "bold"});

// We need a setTimeout (~200ms) in order to allow the UI to be refreshed for the message to be shown
  setTimeout(function () {
    // Get the data

    var api = drupalSettings.gleb_module.api;
    console.log(api);
    jQuery.getJSON(api, function (data) {
      // Success
      // This variable will hold all the plots of our map
      var plots = {};
      var plotsColors = chroma.scale("Blues");
      data = data.records;
      // Parse each elements
      jQuery.each(data, function (id, elem) {
        // Check if we have the GPS position of the element
        if (elem.fields.wgs_84) {
          // Will hold the plot information
          var plot = {};
          // Assign position
          plot.latitude = elem.fields.wgs_84[0];
          plot.longitude = elem.fields.wgs_84[1];
          // Assign some information inside the tooltip
          plot.tooltip = {
            content: "<span style='font-weight:bold;'>" +
              elem.fields.intitule_gare + " (" + elem.fields.code_postal + ")" +
              "</span>" +
              "<br/>Level " + elem.fields.niveau_de_service + " station in " + elem.fields.commune + " (" + elem.fields.departement + ")"
          };
          // Assign the background color randomize from a scale
          plot.attrs = {
            fill: plotsColors(Math.random())
          };
          // Set plot element to array
          plots[id] = plot;
        }
      });

      // Create map
      jQuery(".mapcontainer").mapael({
        map: {
          name: "france_departments",
          defaultPlot: {
            size: 10
          }
        },
        plots: plots
      });

    }).fail(function () {
      // Error
      jQuery(".mapcontainer span").html("Failed to load JSON data").css({"color": "red"});
    });
  }, 200);

})(jQuery, Drupal, drupalSettings);