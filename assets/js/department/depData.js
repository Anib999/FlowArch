$(document).ready(function() {
  let base_url = $('#base_url').val();

  let table = $('#userTable').DataTable({
    columns:[
      {'data':'id'},
      {'data':'username'},
      {'data':'dep_type',render:function(data, meta, row){
        if(data == 1){
          return 'IT Department'
        }else if (data == 2) {
          return 'HR Department'
        }else{
          return 'Legal Department'
        }
      }},
      {'data':'', render:function(data, meta, row){
        return "<button class='mt-2 btn btn-info btn-sm'>Edit</button>";
      }}
    ],
  });

  $.ajax({
    url: base_url+'Department/getAllDep',
    method:'post',
    dataType: 'json',
    success: function(res){
      table.clear();
      table.rows.add(res).draw();
    },
    error: function(res){
      console.log('error');
    }
  });

});
