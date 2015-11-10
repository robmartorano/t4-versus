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
    gridster.add_widget('<li class="box" id="' + count + 'box"><input class="boxtitle" id="' + count + 'boxtitle" placeholder="title"/><textarea class="boxtext" type="text" id="' + count + 'boxtext"></textarea></li>', xSize, ySize, 1, 1);
    $('#' + count + 'boxtitle').focus();
    count++;
  });
  /*

  var gridList = $('#grid-list');

  for (var i = 0; i < gridList.length; i++) {
    gridList[i].addEventListener('click', toggleSelect, true);
  }
  function toggleSelect() {
    console.log('bubble: ' + this.id);
  }
  */
  
  $('#grid-list').on('click', 'li', function() {
    console.log($(this).id);
    //$('#' + this.id).css('border-color', '#99CCFF');
    //$('#' + this.id).css('border-width', '2px');
    //$(this).id.toggleClass('box-selected');
  })

  $('#add-list').click(function() {
    var numLines = $('#list-length').val();
    gridster.add_widget('<li class="box" id="' + count + 'box"><input class="boxlisttitle" placeholder="title" id="' + count + 'boxlisttitle"></input><ul id="' + count + 'boxlist"></ul></li>', 3, numLines/2, 1, 1);
    for (var i = 0; i < numLines; i++) {
      $('#' + count + 'boxlist').append('<li class="boxlist-li"><input class="boxlist-input" id="' + count + 'boxlisttext"/></li>');
    }
    $('#' + count + 'boxlisttitle').focus();
    count++;
  })

  
});

