$(document).ready(function(){
  let base_url = $('#base_url').val();
  let table = $('#jobList').DataTable({
    responsive:true,
    columns:[
      {'data':'id',className:'text-center'},
      {'data':'job_title'},
      {'data':'posted_by', className:'text-center'},
      {'data':'posted_date', className:'text-center'},
      {'data':'', className:'text-center', render:function(data, meta, row){
        if(row.status == null){
          return "<div data-toggle='tooltip' title='pending...' data-placement='bottom' class='badge badge-warning'>Pending</div>";
        }else if (row.status == 1) {
          return "<div class='badge badge-success' data-toggle='tooltip' title='Accepted By: "+row.status_ar+"' data-placement='bottom'>Accepted</div>";
        }else if (row.status == 0) {
          return "<div class='badge badge-danger' data-toggle='tooltip' title='Rejected By: "+row.status_ar+"' data-placement='bottom'>Rejected</div>";
        }
      }},
      {'data':'', className:'text-center', render:function(data, meta, row){
        return "<button data-id='"+row.id+"' class='btn-wide btn btn-success btn-sm jobinfo' data-toggle='modal' data-target='#viewJobDetailModal'>Details</button>";
      }}
    ]
  });
  $.ajax({
    url: base_url+"Portal/getAllJobPost",
    data:'',
    dataType:'json',
    method:'post',
    success: function(res){
      table.clear();
      table.rows.add(res).draw();
    },
    error: function(res){
      console.log('error');
    }
  })

  let currentRow = null;

  $('body').on('click','.jobinfo',function(e){
    currentRow = $(this).parents('tr');

    let userid = $(this).data('id');
    $.ajax({
      url: base_url+"Portal/getJobPostById",
      data: {userid: userid},
      success: function(res){
        let parsedRes = JSON.parse(res);
        for (var req in parsedRes) {
          $('#viewJobDetailModal .modal-body .'+req).html(parsedRes[req]);
        }
        if(parsedRes.your_message == '' || parsedRes.your_message == null){
          $('#your_message').css('display','block');
        }else{
          $('#your_message').css('display','none');
        }

        $('#idview').val(parsedRes.id);
        if(parsedRes.status == 1){
          $('.linkedInlink').css('display','block');
          $('.submit').css('display','none');
        }else if(parsedRes.status == 0){
          $('.linkedInlink').css('display','none');
          $('.submit').css('display','none');
        }else{
          $('.linkedInlink').css('display','none');
          $('.submit').css('display','block');
        }
      },
      error: function(res){
        console.log('error');
      }
    })
  });

  $('#mesJob .submit').on('click',function(e){
    var _form = $('#mesJob');
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
    if(e.target.name=='accept'){
      data.status = 1;
    }
    $.ajax({
      url: _form[0].action,
      data: data,
      method:'post',
      dataType: 'json',
      success: function(res){
        if(res.status){
          let newRow = currentRow.find('td:nth-child(5) .badge');
          if(data.status == 1){
            newRow.attr('class','badge badge-success');
            newRow.text('Accepted');
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Job is accepted',
              showConfirmButton: false,
              timer: 1500
            })
          }else{
            newRow.attr('class','badge badge-danger');
            newRow.text('Rejected');
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: 'Job is Rejected',
              showConfirmButton: false,
              timer: 1500
            })
          }
        }
      },
      error: function(res){
        console.log('error');
      }
    })
  })

});
