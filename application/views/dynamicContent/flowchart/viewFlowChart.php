<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?= base_url('assets/css/flowchart/jquery.flowchart.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/flowchart/flowchart.css') ?>">
<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-diamond icon-gradient bg-warm-flame">
          </i>
        </div>
        <div>View Flowchart
          <div class="page-title-subheading">Flowchart.
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
  <!--Title-->

  <div class="main-card mb-3 card">
    <div class="card-body">
      <h5 class="card-title">Flowchart
        <span class="pull-right">
          <button type="button" id="foo" name="button"><i class="fa fa-download"></i></button>
        </span>
      </h5>
      <div id="flowDiv"></div>
    </div>
  </div>

</div>

<script src="<?= base_url('assets/js/flowchart/jquery.flowchart.js') ?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/flowchart/flowChart.js') ?>" charset="utf-8"></script>
<script src="<?= base_url("assets/js/html2canvas.min.js") ?>" charset="utf-8"></script>
<script src="<?= base_url('assets/js/flowchart/flowChartDownload.js') ?>" charset="utf-8"></script>
