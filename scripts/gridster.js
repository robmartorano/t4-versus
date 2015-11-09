var gridster;

$(function() {
  gridster = $(".gridster > ul").gridster({
      serialize_params: function ($w, wgd) {
        return {
          id: $w.prop('id'),
          col: wgd.col,
          row: wgd.row,
          size_x: wgd.size_x,
          size_y: wgd.size_y,
        };
      },
      widget_margins: [10, 10],
      widget_base_dimensions: [53, 53],
      min_cols: 11,
      min_rows: 22,
      resize: {
            enabled: true
      }
  }).data('gridster');

  var count = 0;
  var current = "0box";

  $('#add-rectangle').click(function() {
    var xSize = $('#dimension-x-box').val();
    var ySize = $('#dimension-y-box').val();
    gridster.add_widget('<li class="box" id="' + count + 'box"></li>', xSize, ySize, 1, 1);
    count++;

    $('.box').click(function() {
      console.log(this.id);
      $('#' + this.id).css('border-color', '#99CCFF');
      $('#' + this.id).css('border-width', '2px');
    });
  });

  $('#add-list').click(function() {
    
  })

  
});

