$(document).ready(function(){
  let base_url = $('#base_url').val();

  let userTable = $('#userTable').DataTable({
    columns:[
      {"data":"id"},
      {"data":"username"},
      {"data":"dep_type"},
      {"data":"",render: function(data, meta, row){
        return "<button class='btn btn-info btn-sm'>Edit</button>"
      }},
    ]
  });

  $.ajax({
    url: base_url+"Users/getAllUsers",
    method: 'post',
    dataType: 'json',
  }).done(function(res){
    userTable.clear();
    userTable.rows.add(res).draw();
  }).fail(function(res){
    console.log('error');
  })

})
