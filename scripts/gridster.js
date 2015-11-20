var gridster;

$(function() {
  gridster = $(".gridster > ul").gridster({
      serialize_params: function ($w, wgd) {
        return {
          id: $w.prop('id'),
          style: $w.prop('style'),
          col: wgd.col,
          row: wgd.row,
          size_x: wgd.size_x,
          size_y: wgd.size_y,
        };
      },
      widget_margins: [10, 10],
      widget_base_dimensions: [53, 53],
      min_cols: 11,
      min_rows: 13,
      max_rows: 14,
      resize: {
            enabled: true
      }
  }).data('gridster');

  var count = 0;
  var current = "0box";

  $('#add-rectangle').click(function() {
    var xSize = $('#dimension-x-box').val();
    var ySize = $('#dimension-y-box').val();
    gridster.add_widget('<li class="box" id="' + count + 'box"><input class="boxtitle" id="' + count + 'boxtitle" placeholder="title"><textarea class="boxtext" type="text" id="' + count + 'boxtext"></textarea></li>', xSize, ySize, 1, 1);
    $('#' + count + 'boxtitle').focus();
    count++;
  });
  

  $('#add-list').click(function() {
    var numLines = $('#list-length').val();
    var html = '<ul id="' + count + 'boxlist">';
    var boxlisttextcount = 0;
    for (var i = 0; i < numLines; i++) {
      html +='<li class="boxlist-li"><input class="boxlist-input" id="' + boxlisttextcount + 'boxlisttext"></li>';
      boxlisttextcount++;
    }
    html += '</ul>';
    if (numLines % 2 != 0) {
      numLines++; // odd number causes fraction which causes problem with gridster
    }
    gridster.add_widget('<li class="box" id="' + count + 'box"><input class="boxlisttitle" placeholder="title" id="' + count + 'boxlisttitle">' + html + '</li>', 3, numLines/2, 1, 1);
    $('#' + count + 'boxlisttitle').focus();
    count++;
  });

  $('#delete-selected').click(function() {
    var all = $(".box-selected").map(function() {
        console.log($(this).attr('id'));
        gridster.remove_widget($(this));
    }).get();
  });

  $('#save-button').click(function() {
    var gridsterJSON = gridster.serialize();
    console.log(gridsterJSON);
    $.ajax({
      type : "POST",
      url : "saveGridster.php",
      dataType : 'json', 
      data : {
          json : JSON.stringify(gridsterJSON)
      },
      success: function(data) {
        console.log(data);
      }
    });
  });
  
});

