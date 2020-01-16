<link rel="stylesheet" href="<?= base_url('assets/css/datatables/jquery.dataTables.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/datatables/responsive.dataTables.min.css') ?>">
<!--MainInner-->
<div class="app-main__inner">
  <!--Title Start-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-home icon-gradient bg-mean-fruit">
          </i>
        </div>
        <div>Dashboard
          <div class="page-title-subheading">This is dashboard.
          </div>
        </div>
      </div>
      <div class="page-title-actions">
        <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
          <i class="fa fa-star"></i>
        </button>
        <div class="d-inline-block dropdown">
          <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
            <span class="btn-icon-wrapper pr-2 opacity-7">
              <i class="fa fa-business-time fa-w-20"></i>
            </span>
            Buttons
          </button>
          <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a href="javascript:void(0);" class="nav-link">
                  <i class="nav-link-icon lnr-inbox"></i>
                  <span>
                    Inbox
                  </span>
                  <div class="ml-auto badge badge-pill badge-secondary">86</div>
                </a>
              </li>
              <li class="nav-item">
                <a href="javascript:void(0);" class="nav-link">
                  <i class="nav-link-icon lnr-book"></i>
                  <span>
                    Book
                  </span>
                  <div class="ml-auto badge badge-pill badge-danger">5</div>
                </a>
              </li>
              <li class="nav-item">
                <a href="javascript:void(0);" class="nav-link">
                  <i class="nav-link-icon lnr-picture"></i>
                  <span>
                    Picture
                  </span>
                </a>
              </li>
              <li class="nav-item">
                <a disabled href="javascript:void(0);" class="nav-link disabled">
                  <i class="nav-link-icon lnr-file-empty"></i>
                  <span>
                    File Disabled
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Title End-->

  <div class="row">
    <div class="col-lg-6 col-xl-4">
      <div class="card mb-3 widget-content bg-night-fade">
        <div class="widget-content-wrapper text-white">
          <div class="widget-content-left">
            <div class="widget-heading">Total Job Listings</div>
            <div class="widget-subheading">Listed Jobs</div>
          </div>
          <div class="widget-content-right">
            <div class="widget-numbers text-white"><span>1896</span></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-xl-4">
      <div class="card mb-3 widget-content bg-arielle-smile">
        <div class="widget-content-wrapper text-white">
          <div class="widget-content-left">
            <div class="widget-heading">Employees</div>
            <div class="widget-subheading">Total Employees</div>
          </div>
          <div class="widget-content-right">
            <div class="widget-numbers text-white"><span>568</span></div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-xl-4">
      <div class="card mb-3 widget-content bg-happy-green">
        <div class="widget-content-wrapper text-white">
          <div class="widget-content-left">
            <div class="widget-heading">Accepted Jobs</div>
            <div class="widget-subheading">People Interested</div>
          </div>
          <div class="widget-content-right">
            <div class="widget-numbers text-dark"><span>46%</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="main-card mb-3 card">
        <div class="card-header">Job Listings
          <div class="btn-actions-pane-right">
            <div role="group" class="btn-group-sm btn-group">
              <button class="active btn btn-focus">This Week</button>
              <button class="btn btn-focus">Overall</button>
            </div>
          </div>
        </div>
        <div class="card-body">
          <table id="jobList" style="width:100%" class="align-middle mb-0 table table-borderless table-striped table-hover">
            <thead>
              <tr>
                <th class="text-center">Id</th>
                <th>Job Name</th>
                <th class="text-center">Posted By</th>
                <th class="text-center">Posted Date</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
<!--MainIneer-->
<script src="<?= base_url('assets/js/datatables/jquery.dataTables.min.js') ?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/datatables/dataTables.responsive.min.js') ?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/portal/jobDatatable.js') ?>" charset="utf-8"></script>
