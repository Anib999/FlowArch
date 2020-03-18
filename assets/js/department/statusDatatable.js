$(document).ready(function(){
  let base_url = $('#base_url').val();

  let statusTable = $('#statusTable').DataTable({
    columns:[
      {'data':'id',className:'text-center'},
      {'data':'title',className:'text-center'},
      {'data':'dep_type',className:'text-center'},
      {'data':'id',className:'text-center',render: function(data, meta, row){
        return '<button class="btn btn-primary btn-sm">Edit</button>'
      }},
    ]
  });

  $.ajax({
    url: base_url+"Department/getKanTitleDepWithId",
    dataType: 'json',
    method: 'post'
  }).done(function(res){
    statusTable.clear();
    statusTable.rows.add(res).draw();
  }).fail(function(xhr){
    console.log('error');
  })
})
