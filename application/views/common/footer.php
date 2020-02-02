<div class="app-wrapper-footer">
  <div class="app-footer">
    <div class="app-footer__inner">
      <div class="app-footer-left">
        <ul class="nav">
          <li class="nav-item">
            <i class="fa fa-database"></i> flowarch
          </li>
        </ul>
      </div>
      <div class="app-footer-center offset-md-4">
        <ul class="nav">
          <li class="nav-item">
            All rights reserved &copy; 2020
          </li>
        </ul>
      </div>
      <div class="app-footer-right">
        <ul class="nav">
          <li class="nav-item">
              <img src="<?= base_url('assets/images/smalllogo.png') ?>" alt="" class="" style="height:21px;">
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
<!-- <script src="<?= base_url('assets/js/autoclosesidebar.js') ?>" charset="utf-8"></script> -->
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
                <strong><label for="your_message" class="">Your message (if any): </label></strong>
                <textarea class="form-control" id="your_message" name="your_message" placeholder="Your message"></textarea>
                <p class="your_message" class="col-md-12"></p>
              </div>
            </div>
          </div>
          <label class="linkedInlink" style='display:none'>
            <?php
            $linker = $getFlow->links;
            foreach ($linker as $key => $value) {
              if($value->fromOperator == 1 && $value->toOperator == 2){ ?>
                <span class="pull-left">Click <a href="https://www.linkedin.com/" target="_blank">LinkedIn</a> to post job</span>
              <?php }
              else if($value->fromOperator == 1 && $value->toOperator == 3){ ?>
                <span class="pull-right">Click here to <a href="<?= base_url('CandidateList/viewCan') ?>"> View Candidates</a></span>
              <?php }else if($value->fromOperator == 1){
                echo 'contact the developer';
              }
            }
            ?>
          </label>
        </div>
        <div class="modal-footer">
          <button type="button" class="submit btn btn-success" name="accept" data-dismiss="modal"> <i class="pe-7s-check"></i> Accept</button>
          <button type="button" class="submit btn btn-danger" name="reject" data-dismiss="modal"> <i class="pe-7s-close-circle"></i> Reject</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Job Modal -->
