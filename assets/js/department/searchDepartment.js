$(document).ready(function(){
  let base_url = $('#base_url').val();

  $('#service_type').on('blur', function(e){
    let searchKey = this.value.trim();
    if(searchKey == '' || searchKey.length < 3)return;
    $.ajax({
      url: base_url+"Department/searchDepByKeyword",
      method: 'post',
      data: {keyword: searchKey},
      dataType: 'json'
    }).done(function(res){
      $('select[name="dep_type"]').val(res.departmentId);
      //will be ok untill further notice
      getKanTitleDepInsert(res.departmentId);
    }).fail(function(xhr){

    })
  });

  $('select[name="dep_type"]').on('change',function(e){
    getKanTitleDepInsert($('select[name="dep_type"]').val());
  });

  function getKanTitleDepInsert(dep_type){
    $.ajax({
      url: base_url+"Department/getKanTitleDepInsert",
      data: {dep_type: dep_type},
      method: 'get',
      dataType: 'json',
    }).done(function(res){
      console.log(res);
      if(res != null){
        $('input[name="status"]').val(res.id);
      }else{
        $('input[name="status"]').val('');
      }
    }).fail(function(xhr){
      console.log('error');
    });
  }

})
