$(document).ready(function(){
  let base_url = $('#base_url').val();
  let tableS = $('#sortTab').DataTable({
    columns:[
      {'data':'id',className:'text-center'},
      {'data':'first_name',className:'text-center'},
      {'data':'email',className:'text-center'},
      {'data':'apply_position',className:'text-center'},
      {'data':'experience',className:'text-center',render:function(data,meta,row){
        if(data == 06){
          return '0-6 months';
        }else if (data == 12) {
          return '1-2 years';
        }else if (data == 2){
          return '2+ years';
        }
      }},
      {'data':'sort_listed',className:'text-center',render:function(data, meta, row){
        if(data != 0){
          return '<button data-id="'+row.id+'" class="btn btn-danger btn-sm"><i class="pe-7s-check"></i> SortListed</button>'+
          '<a href="'+base_url+'EmailController/index?id='+row.id+'" target="_blank"><button class="btn btn-info btn-sm"><i class="fa fa-envelope"></i> Send Mail</button></a>';

        }else{
          return '';
        }
      }},
    ],

  });

  $.ajax({
    url: base_url+"CandidateList/getCandidateSort",
    dataType: 'json',
    method: 'post',
    success: function(res){
      tableS.clear().rows.add(res).draw();
    },
    error: function(res){
      console.log('error');
    }
  })

})
