<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="fa fa-send icon-gradient bg-warm-flame">
          </i>
        </div>
        <div>Send Email
          <div class="page-title-subheading">Send Email to Sortlisted Candidates.
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Title-->

  <div class="main-card mb-3 card">
    <form class="" method="post" action="<?= base_url('EmailController/send') ?>" enctype="multipart/form-data">
      <div class="card-body">
        <h5 class="card-title">
          <button class="btn btn-outline-secondary"> <i class="fa fa-send"></i> Send</button>
        </h5>
        <div class="position-relative row form-group">
          <label for="to" class="col-sm-1 col-form-label">To</label>
          <div class="col-sm-10">
            <input name="to" id="to" placeholder="To Recipient" type="email" class="form-control">
          </div>
        </div>
        <div class="position-relative row form-group">
          <label for="subject" class="col-sm-1 col-form-label">Subject</label>
          <div class="col-sm-10">
            <input name="subject" id="subject" placeholder="Subject" type="text" class="form-control">
          </div>
        </div>
        <div class="position-relative row form-group">
          <div class="col-sm-12">
            <textarea name="message" id="message" class="form-control">

            </textarea>
          </div>
        </div>
      </div>
    </form>
  </div>

</div>
<script>
CKEDITOR.replace('message');
</script>
