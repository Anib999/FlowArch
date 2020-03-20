$(document).ready(function(){
  let base_url = $('#base_url').val();

  $.ajax({
    url: base_url+'Lister/getKanbanDataDepTable',
    dataType: 'json',
    method: 'post',
  }).done(function(res){
    let kanData = res.kandata;

    let statusChecker = '';
    let tableRow = '';
    for (var resDa in kanData) {
      let dateSpliter = kanData[resDa].date_of_completion.split(' ');
      //if(kanData[resDa].status != statusChecker){
        statusChecker = kanData[resDa].status;
        tableRow = '<tr>'+
                      '<td class="text-center">'+kanData[resDa].data+'</td>'+
                      '<td class="text-center"><span class="badge badge-pill '+kanData[resDa].job_priority+'">'+kanData[resDa].job_priority+'</span></td>'+
                      '<td class="text-center">'+dateSpliter[0]+'</td>'+
                      '<td class="text-center">'+statusChecker+'</td>'+
                      '</tr>';
        $('.table tbody').append(tableRow);
      //}
      // else{
      //   tableRow = '<tr>'+
      //                 '<td>'+kanData[resDa].data+'</td>'+
      //                 '<td>'+kanData[resDa].job_priority+'</td>'+
      //                 '<td>'+dateSpliter[0]+'</td>'+
      //                 '<td></td>'+
      //                 '</tr>';
      //   $('.table tbody').append(tableRow);
      // }

    }
  }).fail(function(res){
    console.log('error');
  })

})
