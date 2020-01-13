$(document).ready(function(){
  let base_url = $('#base_url').val();
  let table4 = $('#viewOwnJob').DataTable({
    columns: [
      {'data':'id',className:'text-center'},
      {'data':'job_title'},
      {'data':'posted_by', className:'text-center'},
      {'data':'posted_date', className:'text-center'},
      {'data':'status_ar', className:'text-center', render:function(data, meta, row){
        if(row.status == null){
          return "<div data-toggle='tooltip' title='pending...' data-placement='bottom' class='badge badge-warning'>Pending</div>";
        }else if (row.status == 1) {
          return "<div class='badge badge-success' data-toggle='tooltip' title='Accepted By: "+data+"' data-placement='bottom'>Accepted</div>";
        }else if (row.status == 0) {
          return "<div class='badge badge-danger' data-toggle='tooltip' title='Rejected By: "+data+"' data-placement='bottom'>Rejected</div>";
        }
      }},
    ],
    language:{
      'emptyTable': "You have not posted any jobs yet"
    }
  });

  $.ajax({
    url: base_url+"Portal/getJobByPostedId",
    data:'',
    dataType: 'json',
    method: 'post',
    success: function(res){
      table4.clear();
      table4.rows.add(res).draw();
    },
    error: function(res){
      console.log('error while fetching data');
    }
  })
})
