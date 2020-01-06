<div class="app-wrapper-footer">
  <div class="app-footer">
    <div class="app-footer__inner">
      <div class="app-footer-left">
        <ul class="nav">
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link">
              Footer Link 1
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link">
              Footer Link 2
            </a>
          </li>
        </ul>
      </div>
      <div class="app-footer-right">
        <ul class="nav">
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link">
              Footer Link 3
            </a>
          </li>
          <li class="nav-item">
            <a href="javascript:void(0);" class="nav-link">
              <div class="badge badge-success mr-1 ml-0">
                <small>NEW</small>
              </div>
              Footer Link 4
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
</div>

</div>
</div>
<script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>

<!-- Job Modal -->
<div class="modal fade" id="viewJobDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Job Overview</h5>
      </div>
      <form id="mesJob" action="<?= base_url('Portal/updateJ') ?>" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6" style="text-align:right;font-weight:bold;">
            <div class="row">
              <label for="job_id" class="col-md-12">Id</label>
            </div>
            <div class="row">
              <label for="job_title" class="col-md-12">Job Title</label>
            </div>
            <div class="row">
              <label for="posted_by" class="col-md-12">Posted By</label>
            </div>
            <div class="row">
              <label for="posted_date" class="col-md-12">Posted Date</label>
            </div>
            <div class="row">
              <label for="job_desc" class="col-md-12">Job Description</label>
            </div>
          </div>
          <div class="col-md-6">
            <div class="row">
              <label class="id" class="col-md-12"></label>
            </div>
            <div class="row">
              <label class="job_title" class="col-md-12"></label>
            </div>
            <div class="row">
              <label class="posted_by" class="col-md-12"></label>
            </div>
            <div class="row">
              <label class="posted_date" class="col-md-12"></label>
            </div>
            <div class="row">
              <label class="job_desc" class="col-md-12"></label>
            </div>
          </div>
        </div>

          <input type="hidden" id="idview" name="idview" value="">
          <div class="row">
            <div class="col-md-12">
              <div class="position-relative form-group">
                <label for="your_message" class="">Your message (if any): </label>
                <textarea class="form-control" name="your_message" placeholder="Your message"></textarea>
              </div>
            </div>
          </div>
          <label class="linkedInlink" style='display:none'></label>
        </div>
        <div class="modal-footer">
          <button type="button" class="submit btn btn-success" name="accept" data-dismiss="modal">Accept</button>
          <button type="button" class="submit btn btn-danger" name="reject" data-dismiss="modal">Reject</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Job Modal -->
