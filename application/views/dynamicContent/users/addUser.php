<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-add-user icon-gradient bg-warm-flame">
          </i>
        </div>
        <div>Add Users
          <div class="page-title-subheading">Add users
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
  <?= $this->session->flashdata('success')!= null?'<div class="alert alert-success">'.$this->session->flashdata('success').'</div>':'' ?>
  <?= $this->session->flashdata('error')!= null?'<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>':'' ?>
  <div class="col-md-12">
    <div class="main-card mb-3 card">
      <div class="card-body">
        <h5 class="card-title">Add User</h5>

        <form class="" method="post" action="<?= base_url('Users/insertUser') ?>">
          <div class="form-row">
            <div class="col-md-6">
              <div class="position-relative form-group">
                <label for="username" class="">Username</label>
                <input name="username" id="username" placeholder="Username" type="text" class="form-control" required>
                  <?= form_error('username'); ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="position-relative form-group">
                <label for="password" class="">Password</label>
                <input name="password" id="password" placeholder="Password" type="password" class="form-control" required>
                <?= form_error('password'); ?>
              </div>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6">
              <div class="position-relative form-group">
                <label for="dep-type" class="">Department Type</label>
                <select class="form-control" name="dep-type" required>
                  <option value=" ">Select Department</option>
                  <?php
                  foreach ($depType as $k) {
                    if($k->id != 47){
                      printf("<option value='%d'>%s</option>",$k->id,$k->dep_type);
                    }
                  }
                  ?>
                </select>
                <?= form_error('dep-type'); ?>
              </div>
            </div>
          </div>
          <input class="mt-2 btn btn-primary pull-right" type="submit" name="" value="Sign Up">
        </form>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="main-card mb-3 card">
        <div class="card-body overflow-auto"><h5 class="card-title">Department Table</h5>
          <table id="userTable" class="mb-0 table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Department</th>
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
<script src="<?= base_url('assets/js/user/userDatatable.js') ?>" charset="utf-8"></script>
