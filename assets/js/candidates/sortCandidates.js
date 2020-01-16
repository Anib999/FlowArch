$(document).ready(function(){
  let base_url = $('#base_url').val();
  let tableS = $('#sortTab').DataTable({
    columns:[
      {'data':'id'},
      {'data':'sort_listed'},
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
