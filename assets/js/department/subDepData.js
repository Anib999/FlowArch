$(document).ready(function(){
  let base_url = $('#base_url').val();

  let subDepTable = $('#subDepTable').DataTable({
    columns:[
      {'data':'id', className:'text-center'},
      {'data':'sub_dep_name', className:'text-center'},
      {'data':'dep_name', className:'text-center'},
      {'data':'country', render: function(data, meta, row){
        return row.city+', '+data;
      }, className:'text-center'},
      {'data':'id', render: function(data, meta, row){
        return '<button class="btn btn-primary btn-sm">View</button>';
      }, className:'text-center'}
    ]
  })

  getAllSubDepartments();

  function getAllSubDepartments(){
    $.ajax({
      url: base_url+'Department/getAllSubDepartments',
      dataType: 'json',
      method: 'post',
    }).done(function(res){
      subDepTable.clear();
      subDepTable.rows.add(res).draw();
    }).fail(function(xhr){
      console.log('error');
    })
  }

  setTimeout(function(){
    $('.alert').alert('close');
  },2500);

})
