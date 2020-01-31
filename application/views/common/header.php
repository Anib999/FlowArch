<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Languag Example 1 Example 1e" content="en">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title><?= $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
  <meta name="description" content="">
  <meta name="msapplication-tap-highlight" content="no">
  <link rel="icon" href="<?= base_url('assets/images/smalllogo2.png') ?>">
  <link href="<?= base_url('assets/css/main.css') ?>" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  <script src="<?= base_url('assets/js/jquery/jquery-3.4.1.min.js') ?>"></script>
  <script src="<?= base_url('assets/js/sweetalert/sweetalert2@9.js') ?>"></script>
  <style media="screen">
  .closed-sidebar:not(.closed-sidebar-mobile) .smalllogo {
    display: none;
  }
  /* .btn-group-xs > .btn, .btn-xs {
    padding: .25rem .4rem;
    font-size: .875rem;
    line-height: .5;
    border-radius: .2rem;
  } */
  </style>
</head>
<body>
  <input type="text" id="base_url" name="" value="<?= base_url() ?>" style="display:none;">
  <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

    <div class="app-header header-shadow">
      <div class="app-header__logo">
        <!-- <div class="logo-src"></div> -->
        <a href="<?= base_url('Dashboard/index') ?>"><img src="<?= base_url('assets/images/smalllogo.png') ?>" alt="" class="smalllogo" style="height:25px;width:120px;"></a>
        <div class="header__pane ml-auto">
          <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <div class="app-header__mobile-menu">
        <div>
          <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
      <div class="app-header__menu">
        <span>
          <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
              <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
          </button>
        </span>
      </div>
      <div class="app-header__content">
        <div class="app-header-left">
          <div class="search-wrapper">
            <div class="input-holder">
              <input type="text" class="search-input" placeholder="Type to search">
              <button class="search-icon"><span></span></button>
            </div>
            <button class="close"></button>
          </div>
          <?php if($this->session->userdata('dep_type') == 1 || $this->session->userdata('dep_type') == 2){ ?>
            <ul class="header-menu nav">
              <li class="nav-item">
                <a href="javascript:void(0);" class="nav-link">
                  <i class="nav-link-icon fa fa-database"> </i>
                  Statistics
                </a>
              </li>
              <li class="btn-group nav-item">
                <a href="<?= base_url('Dashboard/projectReview') ?>" class="nav-link">
                  <i class="nav-link-icon fa fa-edit"></i>
                  Projects
                </a>
              </li>
              <li class="dropdown nav-item">
                <a href="<?= base_url('Dashboard/settings') ?>" class="nav-link">
                  <i class="nav-link-icon fa fa-cog"></i>
                  Settings
                </a>
              </li>
            </ul>
          <?php } ?>
        </div>
        <div class="app-header-right">
          <div class="header-btn-lg pr-0">
            <div class="widget-content p-0">
              <div class="widget-content-wrapper">
                <div class="widget-content-left">
                  <div class="btn-group">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                      <img width="42" class="rounded-circle" src="<?= base_url('assets/images/10.jpg') ?>" alt="">
                      <i class="fa fa-angle-down ml-2 opacity-8"></i>
                    </a>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                      <a href="<?= base_url('Dashboard/userProfile') ?>" style="text-decoration:none;"><button type="button" tabindex="0" class="dropdown-item">User Account</button></a>
                      <a href="<?= base_url('Dashboard/settings') ?>" style="text-decoration:none;"><button type="button" tabindex="0" class="dropdown-item">Settings</button></a>
                      <h6 tabindex="-1" class="dropdown-header">Header</h6>
                      <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                      <div tabindex="-1" class="dropdown-divider"></div>
                      <a href="<?= base_url('Login/logout') ?>" style="text-decoration:none;"><button type="button" tabindex="0" class="dropdown-item">Logout</button></a>
                    </div>
                  </div>
                </div>
                <div class="widget-content-left  ml-3 header-user-info">
                  <div class="widget-heading">
                    <?= $this->session->userdata('username') ?>
                  </div>
                  <div class="widget-subheading">
                    <?php
                    if($this->session->userdata('dep_type') == 1){
                      echo 'IT Department';
                    }elseif ($this->session->userdata('dep_type') == 2) {
                      echo 'HR Department';
                    }elseif($this->session->userdata('dep_type') == 3){
                      echo 'Legal Department';
                    }
                    ?>
                  </div>
                </div>
                <div class="widget-content-right header-user-info ml-3">
                  <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                    <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="scrollbar-container">
    </div>

    <div class="app-main">
      <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
          <div class="logo-src"></div>
          <div class="header__pane ml-auto">
            <div>
              <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
              </button>
            </div>
          </div>
        </div>
        <div class="app-header__mobile-menu">
          <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
        <div class="app-header__menu">
          <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
              <span class="btn-icon-wrapper">
                <i class="fa fa-ellipsis-v fa-w-6"></i>
              </span>
            </button>
          </span>
        </div>    <div class="scrollbar-sidebar">
          <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
              <li class="app-sidebar__heading">Home</li>
              <li>
                <a href="<?= base_url('Dashboard/index') ?>" class="<?php if(isset($activeclass)){ echo $activeclass; } ?>">
                  <i class="metismenu-icon pe-7s-home"></i>
                  Dashboard
                </a>
              </li>
              <li class="app-sidebar__heading">Users</li>
              <li class="<?php if(isset($activedep)){
                echo $activedep;
              } elseif (isset($activejob)){
                echo $activejob;
              } elseif (isset($activeview)){
                echo $activeview;
              } ?>">
              <a href="#">
                <i class="metismenu-icon pe-7s-notebook"></i>
                Post
                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
              </a>
              <ul>
                <li>
                  <a href="<?= base_url('Department/addDepartment') ?>" class="<?php if(isset($activedep)){ echo $activedep; } ?>">
                    <i class="metismenu-icon"></i>
                    Add Department
                  </a>
                </li>
                <li>
                  <a href="">
                    <i class="metismenu-icon"></i>
                    Post Departmentwise Job
                  </a>
                </li>
                <li>
                  <a href="<?= base_url('Portal/addJob') ?>" class="<?php if(isset($activejob)){ echo $activejob; } ?>">
                    <i class="metismenu-icon"></i>
                    Post Job
                  </a>
                </li>
                <li>
                  <a href="<?= base_url('Portal/viewJob') ?>" class="<?php if(isset($activeview)){ echo $activeview; } ?>">
                    <i class="metismenu-icon"></i>
                    View Job
                  </a>
                </li>
              </ul>
            </li>
            <li class="app-sidebar__heading">Candidates Listings</li>
            <li>
              <a href="#">
                <i class="metismenu-icon pe-7s-users"></i>
                Candidates
                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
              </a>
              <ul>
                <li>
                  <a href="<?= base_url('CandidateList/viewCan') ?>">
                    <i class="metismenu-icon"></i>
                    View Candidates
                  </a>
                </li>
                <li>
                  <a href="<?= base_url('CandidateList/sortCan') ?>">
                    <i class="metismenu-icon"></i>
                    SortList Candidates
                  </a>
                </li>
                <li>
                  <a href="<?= base_url('CandidateList/interCan') ?>">
                    <i class="metismenu-icon"></i>
                    Interview
                  </a>
                </li>
              </ul>
            </li>
            <li class="app-sidebar__heading">Candidates Filtering</li>
            <li>
              <a href="#">
                <i class="metismenu-icon pe-7s-news-paper"></i>
                Offerings
                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
              </a>
              <ul>
                <li>
                  <a href="<?= base_url('OfferCandidates/offerCan') ?>">
                    <i class="metismenu-icon"></i>
                    Offer Candidates
                  </a>
                </li>
                <li>
                  <a href="<?= base_url('OfferCandidates/offerLet') ?>">
                    <i class="metismenu-icon"></i>
                    Offer Letter
                  </a>
                </li>
                <li>
                  <a href="<?= base_url('OfferCandidates/onboCan') ?>">
                    <i class="metismenu-icon"></i>
                    Onboard Candidates
                  </a>
                </li>
              </ul>
            </li>
            <li class="app-sidebar__heading">Status Checker</li>
            <li>
              <a href="#">
                <i class="metismenu-icon pe-7s-news-paper"></i>
                Check Status
                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
              </a>
              <ul>
                <li>
                  <a href="<?= base_url('Lister/drag') ?>">
                    <i class="metismenu-icon"></i>
                    View/Update Status
                  </a>
                </li>
              </ul>
            </li>
            <li class="app-sidebar__heading">Flow Charts</li>
            <li>
              <a href="#">
                <i class="metismenu-icon pe-7s-graph3"></i>
                Flowchart Basics
                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
              </a>
              <ul>
                <li>
                  <a href="<?= base_url('FlowChart/flowCreateView') ?>">
                    <i class="metismenu-icon"></i>
                    Create/View FlowChart
                  </a>
                </li>
                <li>
                  <a href="<?= base_url('FlowChart/viewFlows') ?>">
                    <i class="metismenu-icon"></i>
                    View Flows
                  </a>
                </li>
              </ul>
            </li>
            <li class="app-sidebar__heading">About Us</li>
            <li>
              <a href="#">
                <i class="metismenu-icon pe-7s-help1"></i>
                Help
                <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
              </a>
              <ul>
                <li>
                  <a href="<?= base_url('Dashboard/help') ?>">
                    <i class="metismenu-icon"></i>
                    About Us
                  </a>
                </li>
                <li>
                  <a href="<?= base_url('Dashboard/help') ?>">
                    <i class="metismenu-icon"></i>
                    Help
                  </a>
                </li>
                <li>
                  <a href="<?= base_url('Dashboard/help') ?>">
                    <i class="metismenu-icon"></i>
                    User Manual
                  </a>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </div>
    </div>
    <div class="app-main__outer">
