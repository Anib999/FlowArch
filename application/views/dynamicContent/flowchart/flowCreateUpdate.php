<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="<?= base_url('assets/css/flowchart/jquery.flowchart.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/css/flowchart/flowchart.css') ?>">
<!-- <style>
.icon_exp .fa{
font-size: 22px;
}
</style> -->
<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-graph1 icon-gradient bg-mixed-hopes">
          </i>
        </div>
        <div>Create Flowchart
          <div class="page-title-subheading">Update Flowchart.
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

  <div id="sticky" class="main-card mb-3 card">
    <div class="no-gutters row">

      <?php foreach ($operators as $operator) { ?>
        <div class="col-md-2 col-sm-4 col-4">
          <div class="draggable_operator ui-draggable ui-draggable-handle" data-nb-inputs='<?= $operator['inputs'] ?>' data-nb-outputs='<?= $operator['outputs'] ?>'  data-title="<?= $operator['title'] ?>">
            <div class="widget-content">
              <div class="widget-content-wrapper">
                <div class="widget-content-left text-center icon_exp">
                  <i class="fa <?= $operator['icons'] ?> fa-lg"></i>
                  <div class="widget-heading"><?= $operator['label'] ?></div>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php } ?>
    </div>
  </div>

  <div class="main-card mb-3 card">
    <div class="card-body">
      <?php if(!isset($_GET['id'])){ ?>
        <h5 class="card-title">Create Flowchart</h5>
        <form action="<?= base_url('FlowChart/insertFlow') ?>" method="post">
          <div id="flowDiv"></div>
          <input type="hidden" name="savedDa" value="" id="savedDa">
          <input type="submit" name="saveFlow" id="saveFlow" class="save_data btn btn-primary btn-sm" value="Create Flowchart">
        </form>
      <?php }else{ ?>
        <h5 class="card-title">Edit Flowchart</h5>
        <form action="<?= base_url('FlowChart/updateFlow') ?>" method="post">
          <div class="overflow-auto" id="flowDiv"></div>
          <input type="hidden" name="did" value="<?= $_GET['id'] ?>" id="did">
          <input type="hidden" name="savedDa" value="" id="savedDa">
          <input type="submit" name="saveFlow" id="saveFlow" class="save_data btn btn-primary btn-sm" value="Update Flowchart">
        </form>
      <?php } ?>

    </div>
  </div>

  <div id="after-click" class="main-card card">
    <div class="card-body">
      <img src="<?= base_url("assets/images/close.svg") ?>" alt="" id="closeB">
      <h5 class="card-title">Properties</h5>
      <div class="form-row">
        <div class="col-md-12">
          <div class="position-relative form-group">
            <label for="tiIdChange" class="">Id: </label>
            <input type="text" name="tiIdChange" value="" id="tiIdChange" placeholder="Id" class="form-control" readonly>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-12">
          <div class="position-relative form-group">
            <label for="tiChange" class="">Title: </label>
            <input type="text" name="tiChange" value="" id="tiChange" placeholder="Title" class="form-control">
          </div>
        </div>
      </div>
      <button type="button" class="delete_selected_button btn btn-danger btn-sm" name="button">Delete</button>
    </div>
  </div>

  <script src="<?= base_url('assets/js/flowchart/jquery.flowchart.js') ?>" charset="utf-8"></script>
  <script src="<?= base_url('assets/js/flowchart/flowChart.js') ?>" charset="utf-8"></script>
</div>
