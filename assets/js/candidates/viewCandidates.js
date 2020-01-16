$(document).ready(function(){
  let base_url = $("#base_url").val();
  let tableC = $('#viewCandi').DataTable({
    columns:[
      {'data':'id',className:'text-center'},
      {'data':'first_name',className:'text-center'},
      {'data':'skills',className:'text-center'},
      {'data':'email',className:'text-center'},
      {'data':'apply_position',className:'text-center'},
      {'data':'experience',className:'text-center', render: function(data, meta, row){
        if(data == 06){
          return '0-6 months';
        }else if (data == 12) {
          return '1-2 years';
        }else if (data == 2){
          return '2+ years';
        }
      }},
      {'data':'expect_salary',className:'text-center'},
      {'data':'sort_listed',className:'text-center',render: function(data, meta, row){
        if(data == 0){
          return '<button data-vals="1" data-id="'+row.id+'" class="btn btn-success caninfo"><i class="fa fa-plus-square"></i> Add to SortList</button>';
        }else{
          return '<button data-vals="0" data-id="'+row.id+'" class="btn btn-danger"><i class="pe-7s-check"></i> Added to SortList</button>';
        }
      }}
    ]
  })
  $.ajax({
    url: base_url+"CandidateList/getAllCandidate",
    method: 'post',
    dataType: 'json',
    success: function(res){
      tableC.clear();
      tableC.rows.add(res).draw();
    },
    error: function(res){
      console.log('error');
    }
  });
  let currentRow = null;

  $('body').on('click','.caninfo', function(e){
    currentRow = $(this).parents('tr');
    let canid =  $(this).data('id');
    $.ajax({
      url: base_url+'CandidateList/updateCandidate',
      data: {canid: canid},
      method: 'post',
      dataType: 'json',
      success: function(res){
        let newRow = currentRow.find('td:nth-child(8) .caninfo');
        if(res.status == true){
          newRow.addClass('btn-danger').removeClass('btn-success caninfo');
          newRow.html('<i class="pe-7s-check"></i> Added to SortList');
        }
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Candidate Sortlisted',
          showConfirmButton: false,
          timer: 1500
        })
      },
      error: function(res){
        Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'Sortlisting failed',
          showConfirmButton: false,
          timer: 1500
        })
      }
    })

  })

})
