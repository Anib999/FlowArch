<link rel="stylesheet" href="<?= base_url('assets/js/tagsinput/tagsinput.css') ?>">
<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-note2 icon-gradient bg-warm-flame">
          </i>
        </div>
        <div>Add Candidates
          <div class="page-title-subheading">Add candidates that have applied for positions.
          </div>
        </div>
      </div>
      <div class="page-title-actions">
        <button type="button" data-toggle="tooltip" title="Those applied" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
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
      <h5 class="card-title">Add Candidate</h5>

      <form class="" method="post" action="<?= base_url('CandidateList/insertCandidate') ?>">
        <div class="form-row">
          <div class="col-md-4">
            <div class="position-relative form-group">
              <label for="first_name" class="">First Name</label>
              <input type="text" name="first_name" id="first_name" placeholder="First Name" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="position-relative form-group">
              <label for="middle_name" class="">Middle Name</label>
              <input type="text" name="middle_name" id="middle_name" placeholder="Middle Name" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="position-relative form-group">
              <label for="last_name" class="">Last Name</label>
              <input type="text" name="last_name" id="last_name" placeholder="Last Name" class="form-control">
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-4">
            <div class="position-relative form-group">
              <label for="age" class="">Age</label>
              <input type="text" name="age" id="age" placeholder="Age" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="position-relative form-group">
              <label for="address" class="">Address</label>
              <select class="form-control" name="address">
                <option></option>
                <?php
                foreach ($district as $key => $val) {
                  $dis = '';
                  foreach ($val as $value) {
                    $dis.= sprintf('<option value="%1$s"> %1$s </option>',ucwords($value));
                  }
                  printf('<optgroup label="%s">%s</optgroup>',ucwords($key),$dis);
                }?>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="position-relative form-group">
              <label for="gender" class="">Gender</label><br>
              <input type="radio" class="position-relative form-check form-check-inline" name="gender" value="1">Male
              <input type="radio" class="position-relative form-check form-check-inline" name="gender" value="2">Female
              <input type="radio" class="position-relative form-check form-check-inline" name="gender" value="3">Other
            </div>
          </div>
        </div>

        <div class="position-relative form-group">
          <label for="mobile_no" class="">Mobile No.</label>
          <input type="text" name="mobile_no" id="mobile_no" placeholder="Mobile No" class="form-control">
        </div>
        <div class="position-relative form-group">
          <label for="email" class="">Email</label>
          <input type="email" name="email" id="email" placeholder="abc@example.com" class="form-control">
        </div>
        <div class="position-relative form-group">
          <label for="apply_position" class="">Applied Position</label>
          <select class="form-control" name="apply_position">
            <option></option>
            <?php foreach ($jt as $keys) { ?>
              <option value="<?= $keys->job_title ?>"><?= $keys->job_title ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="position-relative form-group">
          <label for="experience" class="">Experience</label>
          <select class="form-control" name="experience">
            <option></option>
            <option value="06">0-6 months</option>
            <option value="12">1-2 years</option>
            <option value="2">2+ years</option>
          </select>
        </div>
        <div class="position-relative form-group">
          <label for="expect_salary" class="">Expected Salary</label>
          <input type="number" name="expect_salary" id="expect_salary" placeholder="Expected Salary" class="form-control">
        </div>
        <div class="position-relative form-group">
          <label for="skills" class="">Skills</label>
          <input type="text" name="skills" id="skills" placeholder="Skills" class="form-control">
        </div>
        <div class="position-relative form-group">
          <label for="skills" class="">Skills</label>
          <input type="text" data-role="tagsinput" class="form-control" name="skills" value="" placeholder="Add Skills using comma">
        </div>
        <input type="submit" class="mt-2 btn btn-primary pull-right" name="" value="Add Candidate">
      </form>
    </div>
  </div>

</div>

<script src="<?= base_url('assets/js/tagsinput/tagsinput.js') ?>" charset="utf-8"></script>
