<div class="app-main__inner">
  <!--Title-->
  <div class="app-page-title">
    <div class="page-title-wrapper">
      <div class="page-title-heading">
        <div class="page-title-icon">
          <i class="pe-7s-id icon-gradient bg-warm-flame">
          </i>
        </div>
        <div>Offer Candidates
          <div class="page-title-subheading">Offer Candidates.
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

  <div class="col-lg-6">
    <nav class="" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="active breadcrumb-item" aria-current="page">Offer Candidates</li>
        <?php
        $linker = $getFlow->links;
        foreach ($linker as $key => $value) {
          if($value->fromOperator == 6 && $value->toOperator == 7){ ?>
            <li class="breadcrumb-item"><a href="<?= base_url('OfferCandidates/offerLet') ?>">Offer Letter</a></li>
          <?php }
          if($value->fromOperator == 6 && $value->toOperator != 7){
            echo 'update data';
          }
        }
        ?>
      </ol>
    </nav>
  </div>

  <div class="main-card mb-3 card">
    <div class="card-body">
      <h5 class="card-title">Candidates Listings</h5>


    </div>
  </div>

</div>
