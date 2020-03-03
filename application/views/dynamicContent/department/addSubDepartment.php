<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-pen icon-gradient bg-warm-flame">
          </i>
        </div>
        <div>Department
          <div class="page-title-subheading">Add Sub-Department
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
  <?= $this->session->flashdata('success')!= null?'<div class="alert alert-success fade show">'.$this->session->flashdata('success').'</div>':'' ?>
  <?= $this->session->flashdata('error')!= null?'<div class="alert alert-danger fade show">'.$this->session->flashdata('error').'</div>':'' ?>
  <div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">Add Sub-Department</h5>

      <form class="" action="<?= base_url('Department/createSubDepartment') ?>" method="post">
        <div class="form-row">
          <div class="col-md-6">
            <div class="position-relative form-group">
              <label for="">Sub-Department</label>
              <input type="text" name="sub_dep_name" class="form-control" value="" placeholder="Sub Department Name" required>
              <?= form_error('sub_dep_name'); ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="postion-relative form-group">
              <label for="">Department</label>
              <select class="form-control" name="dep_type">
                <option value=" ">Select Department</option>
                <?php
                foreach ($depType as $k) {
                  if($k->id != 47)
                    printf("<option value='%d'>%s</option>",$k->id,$k->dep_type);
                }
                ?>
              </select>
              <?= form_error('dep_type'); ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="position-relative form-group">
              <label for="">Country</label>
              <input type="text" name="country" class="form-control" value="" placeholder="Country" required>
              <?= form_error('country'); ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="position-relative form-group">
              <label for="">City</label>
              <input type="text" name="city" class="form-control" value="" placeholder="City" required>
              <?= form_error('city'); ?>
            </div>
          </div>
        </div>

        <input type="submit" name="" class="mt-2 btn btn-primary pull-right" value="Add Sub-Department">
      </form>

    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="main-card mb-3 card">
        <div class="card-body overflow-auto"><h5 class="card-title">Department Table</h5>
          <table id="subDepTable" class="mb-0 table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Sub Department Name</th>
                <th>Parent Department</th>
                <th>Address</th>
                <th>Options</th>
              </tr>
            </thead>

          </table>
        </div>
      </div>
    </div>
  </div>

</div>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?= base_url('assets/js/department/subDepData.js') ?>" charset="utf-8"></script>
