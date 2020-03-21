$(document).ready(function(){
  let base_url = $('#base_url').val();

  let viewPend = $('#viewPend').DataTable({
    columns: [
      {'data':'id'},
      {'data':'data'},
      {'data':'job_status', render: function(data, meta, row){
        if(data == null){
          return '<span class="badge badge-warning">pending</span>';
        }else if (data == 0) {
          return '<span class="badge badge-danger">rejected</span>'
        }else{
          data;
        }
      }},
      {'data':'id',render: function(data, meta ,row){
        return '<button data-id="'+data+'" class="btn btn-success btn-sm dep_job_info" data-toggle="modal" data-target="#editJobDepModal">Details</button>'
      }}
    ]
  })

  getKanbanDataDep();

  function getKanbanDataDep(){
    $.ajax({
      url: base_url+'Department/getKanbanDataDep',
      method: 'post',
      dataType: 'json'
    }).done(function(res){
      viewPend.clear();
      viewPend.rows.add(res).draw();
    }).fail(function(res){
      console.log('error');
    })
  }

  currentRow = null;
  $('body').on('click','.dep_job_info',function(e){
    currentRow = $(this).parents('tr');
    $.ajax({
      url: base_url+'Department/getKanbanDataId',
      method: 'post',
      data : {dep_id: this.dataset.id},
      dataType: 'json'
    }).done(function(res){
      for (var resDa in res) {
        if (res.hasOwnProperty(resDa)) {
          $('#editJobDepModal .modal-body .dep_'+resDa).val(res[resDa]);
        }
      }
    }).fail(function(res){
      console.log('error');
    })
  });

  $('.job_bu').on('click',function(e){
    e.preventDefault();
    var _form = $('#editJobDepForm');
    var data = {};
    var formValid = true;
    $('select,input,textarea',_form).each(function(){
      if(!this.checkValidity()){
        formValid = false;
      }
      data[this.name] = this.value;
    });
    if(!formValid){
      return;
    }

    data['status'] = 0;
    if(e.target.name=='acc_job'){
      data.status = 1;
    }
    $.ajax({
      url: base_url+'Department/updateKanbanData',
      data: data,
      method: 'post',
      dataType:'json',
    }).done(function(res){
      if(res.job_status){
        let newRow = currentRow.find('td:nth-child(3) .badge');
        if(data.status == 1){
          newRow.attr('class','badge badge-success');
          newRow.text('accepted');
          Swal.fire({
            icon:'success',
            title: 'Job Accepted',
            showConfirmButton: false,
            timer: 1500
          });
          getKanbanDataDep();
        }else{
          newRow.attr('class','badge badge-danger');
          newRow.text('rejected');
          Swal.fire({
            icon:'error',
            title: 'Job Rejected',
            showConfirmButton: false,
            timer: 1500
          });
        }
      }
    }).fail(function(res){
      console.log('error');
    })
    setTimeout(function(e){
      $('body').css('padding-right','');
    },2500);

  })

})
