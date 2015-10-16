var gridster;

$(function() {
  gridster = $(".gridster > ul").gridster({
      widget_margins: [10, 10],
      widget_base_dimensions: [50, 50],
      min_cols: 11,
      min_rows: 22,
      resize: {
            enabled: true
      }
  }).data('gridster');
});
$('#add-rectangle').click(function() {
	gridster.add_widget('<li></li>', 2, 2, 2, 2);
});