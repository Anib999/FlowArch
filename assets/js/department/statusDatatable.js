$(document).ready(function(){
  let base_url = $('#base_url').val();

  let statusTable = $('#statusTable').DataTable({

  });

  $.ajax({
    url: base_url+"Department/getKanTitleDepWithId",
    dataType: 'json',
    data: {dep_type: 1},
    method: 'post'
  }).done(function(res){
    console.log(res);
  }).fail(function(xhr){
    console.log('error');
  })
})
