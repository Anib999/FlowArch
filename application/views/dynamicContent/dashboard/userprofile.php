<img src="<?= base_url('assets/images/mak.jpg') ?>" alt="" style="margin-right:10px;margin-left:10px">

<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <img id="propic" src="<?= base_url('assets/images/10.jpg') ?>" alt="" style="margin-top:-80px;width:100px;height:100px;border-radius:50%">
  </div>
  <!--Title-->

  <div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title">User Settings</h5>
      <input type="file" onchange="readURL(this)" name="" value="" />
    </div>
  </div>
</div>

<script src="<?= base_url('assets/js/autoclosesidebar.js') ?>" charset="utf-8"></script>
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#propic').attr('src', e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
