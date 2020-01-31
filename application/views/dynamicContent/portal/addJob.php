<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-id icon-gradient bg-warm-flame">
          </i>
        </div>
        <div>Post Job
          <div class="page-title-subheading">Post a job.
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
      <h5 class="card-title">Post Job</h5>
      <form class="" method="post" action="<?= base_url('Portal/insertJ') ?>">
        <div class="form-row">
          <div class="col-md-6">
            <div class="position-relative form-group">
              <label for="job_title" class="">Job Title</label>
              <input name="job_title" id="job_title" placeholder="Job Title" type="text" class="form-control" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="position-relative form-group">
              <label for="job_type" class="">Job Type</label>
              <select class="form-control" name="">
                 <option value="" disabled selected>Select your option</option>
                <option value="1">Full Time</option>
                <option value="2">Part Time</option>
                <option value="3">Intership</option>
                <option value="4">Freelancer</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="position-relative form-group">
              <label for="job_email" class="">Email</label>
              <input name="job_email" id="job_email" placeholder="abc@example.com" type="email" class="form-control" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="position-relative form-group">
              <label for="job_location" class="">Location</label>
              <input name="job_location" id="job_location" placeholder="Full Location" type="text" class="form-control" required>
            </div>
          </div>
          <div class="col-md-12">
            <div class="position-relative form-group">
              <label for="job_desc" class="">Job Description</label>
              <textarea class="form-control" name="job_desc" placeholder="Job Description"></textarea>
            </div>
          </div>
        </div>
        <input class="mt-2 btn btn-primary pull-right" type="submit" name="" value="Post Job">
      </form>

    </div>
  </div>

</div>
