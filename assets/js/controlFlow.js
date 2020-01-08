$(document).ready(function(){
  let base_url = $('#base_url').val();
  if(window.location.hash != ''){
    window.history.pushState('','',window.location.href.split('#')[0]);
  }
  $.ajax({
    url: base_url+'CandidateList/getFlowByLastId',
    data: '',
    dataType: 'JSON',
    success: function(res){
      let parsedRes = JSON.parse(res);
      let resOpe = parsedRes.operators;
      let resLink = parsedRes.links;

      console.log(resLink);

    },
    error: function(res){
      console.log('error');
    }
  })
})
