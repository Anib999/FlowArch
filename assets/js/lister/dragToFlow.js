let base_url = $('#base_url').val();
let flowchart = $('#flowDiv');
let url = new URL(window.location.href);
let urlId = url.searchParams.get('dep_type');

$(document).ready(function(){
  $.ajax({
    url : base_url+'Lister/getKanbanDataDep?dep_type='+urlId,
    dataType: 'json',
    method: 'post',
    success: function(res){
      let kanData = res.kandata;
      let kanTitle = res.kantitle,
      statusOnly = {};
      kanTitle.forEach((item, i) => {
        statusOnly[item.id] = item.title;
      });
      let linkCount = 0;
      let flowJson = {"operators": {}, "links": {}};
      let missedStatus = [];

      kanData.forEach((i,index) => {
        if(!flowJson.operators.hasOwnProperty(i.status)){
          delete statusOnly[i.status];

          flowJson.operators[i.status] = {
            "properties":{
              "title": i.title,
              "inputs":{},
              "outputs":{}
            },
            "left": 51*index,
            "top": 20*index
          }
        flowJson.operators[i.status].properties.outputs['out'] = {"label":i.title};
        }
        if(i.pre_status != null){
          flowJson.links[linkCount++] = {
            "fromOperator": i.pre_status,
            "fromConnector": 'out',
            "toOperator": i.status,
            "toConnector": 'in'+i.id,
          }
        }
        flowJson.operators[i.status].properties.inputs['in'+i.id] = {"label":i.data};
        //flowJson.operators[i.status].properties.outputs['out'+i.id] = {"label":i.data};
      });

      for(let i in statusOnly){
        flowJson.operators[i] = {
          "properties":{
            "title": statusOnly[i],
            "inputs":{},
            "outputs":{}
          },
          "left": 51*i,
          "top": 20*i
        }
        flowJson.operators[i].properties.outputs['out'] = {"label":statusOnly[i]};
      }

      flowchart.flowchart({
        data: flowJson,
        linkWidth: 3,
        defaultLinkColor: '#c0c0c0',
        defaultSelectedLinkColor: '#000000',
        multipleLinksOnInput : true,
        multipleLinksOnOutput : true
      });
    },
    error: function(err){
      Swal.fire({
        icon: 'error',
        title: 'error fetching data'
      })
    }
  });

})
