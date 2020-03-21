$(document).ready(function() {
  let base_url = $('#base_url').val();
  
  let table1 = $('#depTable').DataTable({
    columns:[
      {'data':'id'},
      {'data':'dep_type'},
      {'data':'keywords'},
      {'data':'id', render:function(data, meta, row){
        return "<button data-id='"+data+"' class='depbtn mt-2 btn btn-info btn-sm'>Edit</button>";
      }}
    ],
  });

  $.ajax({
    url: base_url+'Department/getAllDepartmentTab',
    method:'post',
    dataType: 'json',
    success: function(res){
      table1.clear();
      table1.rows.add(res).draw();
    },
    error: function(res){
      console.log('error');
    }
  });

  $('body').on('click','.depbtn', function(e){
    e.preventDefault();
    $('#editDepModal').modal('show');
    let dep_id = this.dataset.id;

    $.ajax({
      url: base_url+'Department/getDepartmentById',
      method: 'post',
      data: {dep_id: dep_id},
      dataType: 'json',
      success: function(res){
        for (var a in res) {
          $('#editDepModal .modal-body .dep_'+a).val(res[a]);
        }
      },
      error: function(xhr){
        console.log('error');
      }
    })

  })

  $('#editDepBtn').on('click', function(e){
    e.preventDefault();
    $('#editDepModal').modal('hide');
    $.ajax({
      url: base_url+'Department/updateDepartment',
      method: 'post',
      data: $('#editDepForm').serializeArray(),
      success: function(res){
        console.log('success');
      },
      error: function(res){
        console.log('error');
      }
    })
  })
});
