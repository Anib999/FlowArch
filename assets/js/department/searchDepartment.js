$(document).ready(function(){
  let base_url = $('#base_url').val();
  $('#service_type').on('blur', function(e){
    let searchKey = this.value.trim();
    if(searchKey == '' || searchKey.length < 3)return;
    $.ajax({
      url: base_url+"Department/searchDepByKeyword",
      method: 'post',
      data: {keyword: searchKey},
      dataType: 'json',
      success: function(res){
        $('select[name="dep_type"]').val(res.departmentId);
      }
    })
  })

})
