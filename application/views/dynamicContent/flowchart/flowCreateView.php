<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-graph1 icon-gradient bg-mixed-hopes">
          </i>
        </div>
        <div>Luniva Flow
          <div class="page-title-subheading">Design your flows.
          </div>
        </div>
      </div>
      <div class="page-title-actions">
        <a href="<?= base_url('FlowChart/flowCreateUpdate') ?>">
          <button type="button" data-toggle="tooltip" title="create new chart" data-placement="bottom" class="btn-shadow mr-2 btn btn-dark">
            Create New FlowChart
          </button>
        </a>
        <div class="d-inline-block">
          <a href="<?= base_url('FlowChart/viewFlows') ?>" target="_blank">
            <button type="button" data-toggle="tooltip" title="View created flowviews" data-placement="bottom" class="btn-shadow btn btn-info">
              View Flows
            </button>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--Title-->

  <div class="row">
    <div class="col-md-12">
      <div class="main-card mb-3 card">
        <div class="card-header">FlowCharts</div>
        <div class="card-body">
          <table class="table table-striped table-bordered" id='flowList'>
            <thead>
              <th>Id</th>
              <th>Created Date</th>
              <th>Modified Date</th>
              <th>Options</th>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?= base_url('assets/js/flowchart/viewFlowDatatable.js') ?>" charset="utf-8"></script>
