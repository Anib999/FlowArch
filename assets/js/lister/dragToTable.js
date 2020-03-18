$(document).ready(function(){
  let base_url = $('#base_url').val();

  $.ajax({
    url: base_url+'Lister/getKanbanDataDepTable',
    dataType: 'json',
    method: 'post',
  }).done(function(res){
    let kanData = res.kandata;
    let kanTitle = res.kantitle;

    let statusChecker = '';
    let tableRow = '';
    for (var resDa in kanData) {
      if(kanData[resDa].status != statusChecker){
        statusChecker = kanData[resDa].status;
        tableRow = '<tr>'+
                        '<td>'+statusChecker+'</td>'+
                        '<td>'+kanData[resDa].data+'</td>'+
                        '<td>'+kanData[resDa].job_priority+'</td>'+
                       '</tr>';
        $('.table').append(tableRow);
      }else{
        tableRow = '<tr>'+
                        '<td></td>'+
                        '<td>'+kanData[resDa].data+'</td>'+
                        '<td>'+kanData[resDa].job_priority+'</td>'+
                       '</tr>';
        $('.table').append(tableRow);
      }

    }
  }).fail(function(res){
    console.log('error');
  })

})
