<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin Page</title>
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="shortcut icon" href="assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href=""><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href=""><img src="assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="assets/images/faces/face1.jpg" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="font-weight-medium mb-2">admin</span>
                <span class="font-weight-normal">Admin Access</span>
              </div>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Dropdowns</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">

                
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/typography.php">Typography</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
                  <a class="nav-link" href="buku-tamu">
                    <i class="mdi mdi-book-open-page-variant menu-icon"></i>
                    <span class="menu-title">Buku Tamu Data</span>
                  </a>
                </li>
          <li class="nav-item">
                  <a class="nav-link" href="data-siswa">
                    <i class="mdi mdi-account-card-details menu-icon"></i>
                    <span class="menu-title">data siswa</span>
                  </a>
                </li>
          <li class="nav-item">
                  <a class="nav-link" href="data-guru">
                    <i class="mdi mdi-account-multiple menu-icon"></i>
                    <span class="menu-title">
                    data guru & staff
                    </span>
                  </a>
                </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/forms">
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Forms</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/charts">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/tables/">
              <i class="mdi mdi-table-large menu-icon"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <span class="nav-link" href="#">
              <span class="menu-title">Docs</span>
            </span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="documentation">
              <i class="mdi mdi-file-document-box menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
          <li class="nav-item sidebar-actions">
            <div class="nav-link">
              <div class="mt-4">
                <div class="border-none">
                  <p class="text-black">Notification</p>
                </div>
                <ul class="mt-4 pl-0">
                  <a href="logout"><li>Sign Out</li></a>
                </ul>
              </div>
            </div>
          </li>
        </ul>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles light"></div>
            <div class="tiles dark"></div>
          </div>
        </div>
        <nav class="navbar col-lg-12 col-12 p-lg-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
            <a class="navbar-brand brand-logo-mini align-self-center d-lg-none" href=""><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            <button class="navbar-toggler navbar-toggler align-self-center mr-2" type="button" data-toggle="minimize">
              <i class="mdi mdi-menu"></i>
            </button>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-bell-outline"></i>
                  <span class="count count-varient1">7</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="notificationDropdown">
                  <h6 class="p-3 mb-0">Notifications</h6>
                  <a class="dropdown-item preview-item">
                  </a>
                  <div class="dropdown-divider"></div>
                  <p class="p-3 mb-0">View all activities</p>
                </div>
              </li>
              <li class="nav-item dropdown d-none d-sm-flex">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown">
                  <i class="mdi mdi-email-outline"></i>
                  <span class="count count-varient2">5</span>
                </a>
                <div class="dropdown-menu navbar-dropdown navbar-dropdown-large preview-list" aria-labelledby="messageDropdown">
                  <h6 class="p-3 mb-0">Messages</h6>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-success">Request</span>
                      <p class="text-small text-muted ellipsis mb-0"> Suport needed for user123 </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-warning">Invoices</span>
                      <p class="text-small text-muted ellipsis mb-0"> Invoice for order is mailed </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow">
                      <span class="badge badge-pill badge-danger">Projects</span>
                      <p class="text-small text-muted ellipsis mb-0"> New project will start tomorrow </p>
                    </div>
                    <p class="text-small text-muted align-self-start"> 4:10 PM </p>
                  </a>
                  <h6 class="p-3 mb-0">See all activity</h6>
                </div>
              </li>
              <li class="nav-item nav-search border-0 ml-1 ml-md-3 ml-lg-5 d-none d-md-flex">
                <form class="nav-link form-inline mt-2 mt-md-0">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" />
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                  </div>
                </form>
              </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right ml-lg-auto">
              <li class="nav-item dropdown d-none d-xl-flex border-0">
              <li class="nav-item nav-profile dropdown border-0">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown">
                  <img class="nav-profile-img mr-2" alt="" src="assets/images/faces/face1.jpg" />
                  <span class="profile-name">Admin Access</span>
                </a>
                <div class="dropdown-menu navbar-dropdown w-100" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="logout">
                    <i class="mdi mdi-logout mr-2 text-primary"></i> Sign Out </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <div class="page-header flex-wrap">
              <h3 class="mb-0"> Hi, welcome back! <span class="pl-0 h6 pl-sm-2 text-muted d-inline-block">Your web analytics dashboard template.</span>
              </h3>
              <div class="d-flex">
                <button type="button" class="btn btn-sm bg-white btn-icon-text border">
                  <i class="mdi mdi-email btn-icon-prepend"></i> Email </button>
                <button type="button" class="btn btn-sm bg-white btn-icon-text border ml-3">
                  <i class="mdi mdi-printer btn-icon-prepend"></i> Print </button>
                <button onclick="window.location.href='../'"type="button" class="btn btn-sm ml-3 btn-success"> Back to Homepage </button>
              </div>
            </div>
            <div class="row">

            </div>
            <div class="row">
              <div class="col-xl-8 grid-margin stretch-card">
                <div class="card card-calender">
                  <div class="card-body">
                    <div class="row pt-4">
                      <div class="col-sm-6">
                        <h1 class="text-white">2023</h1>
                        <h5 class="text-white">Jakarta, Indonesia Cuaca</h5>
                        <h5 class="text-white pt-2 m-0">Presipitasi: 24%</h5>
                        <h5 class="text-white m-0">Kelembapan: 77%</h5>
                        <h5 class="text-white m-0">Angin: 13 km/h</h5>
                      </div>
                      <div class="col-sm-6 text-sm-right pt-3 pt-sm-0">
                        <h3 class="text-white">Sebagian berawan</h3>
                        <p class="text-white m-0">Jakarta, Indonesia</p>
                        <h3 class="text-white m-0">29°C</h3>
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-sm-12">
                        <ul class="d-flex pl-0 overflow-auto">
                          <li class="weakly-weather-item text-white font-weight-medium text-center active">
                            <p class="mb-0">TODAY</p>
                            <i class="mdi mdi-weather-cloudy"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">MON</p>
                            <i class="mdi mdi-weather-hail"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">TUE</p>
                            <i class="mdi mdi-weather-cloudy"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">WED</p>
                            <i class="mdi mdi-weather-fog"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">THU</p>
                            <i class="mdi mdi-weather-hail"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">FRI</p>
                            <i class="mdi mdi-weather-cloudy"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">SAT</p>
                            <i class="mdi mdi-weather-hail"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                          <li class="weakly-weather-item text-white font-weight-medium text-center">
                            <p class="mb-0">SUN</p>
                            <i class="mdi mdi-weather-cloudy"></i>
                            <p class="mb-0">21<span class="symbol">°c</span></p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 grid-margin stretch-card">
                <!--activity-->
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">
                      <span class="d-flex justify-content-between">
                        <span>Activity</span>
                        <span class="dropdown dropleft d-block">
                          <span id="dropdownMenuButton1" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span><i class="mdi mdi-dots-horizontal"></i></span>
                          </span>
                          <span class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item" href="#">Contact</a>
                            <a class="dropdown-item" href="#">Helpdesk</a>
                            <a class="dropdown-item" href="#">Chat with us</a>
                          </span>
                        </span>
                      </span>
                    </h4>
                    <ul class="gradient-bullet-list border-bottom">
                      <li>
                        <h6 class="mb-0"> It's awesome when we find a new solution </h6>
                        <p class="text-muted">2h ago</p>
                      </li>
                      <li>
                        <h6 class="mb-0">Report has been updated</h6>
                        <p class="text-muted">
                          <span>2h ago</span>
                          <span class="d-inline-block">
                            <span class="d-flex d-inline-block">
                              <img class="ml-1" src="assets/images/faces/face1.jpg" alt="" />
                              <img class="ml-1" src="assets/images/faces/face10.jpg" alt="" />
                              <img class="ml-1" src="assets/images/faces/face14.jpg" alt="" />
                            </span>
                          </span>
                        </p>
                      </li>
                      <li>
                        <h6 class="mb-0"> Analytics dashboard has been created#Slack </h6>
                        <p class="text-muted">2h ago</p>
                      </li>
                      <li>
                        <h6 class="mb-0"> It's awesome when we find a new solution </h6>
                        <p class="text-muted">2h ago</p>
                      </li>
                    </ul>
                    <a class="text-black mt-3 mb-0 d-block h6" href="#">View all <i class="mdi mdi-chevron-right"></i></a>
                  </div>
                </div>
                <!--activity ends-->
              </div>
            </div>
            <div class="row">
              <div class="col-xl-4 col-md-6 grid-margin stretch-card">
                <div class="card card-invoice">
                  <div class="card-body">
                    <h4 class="card-title pb-3">Pending invoices</h4>
                    <div class="list-card">
                      <div class="row align-items-center">
                        <div class="col-7 col-sm-8">
                          <div class="row align-items-center">
                            <div class="col-sm-4">
                              <img src="assets/images/faces/face2.jpg" alt="" />
                            </div>
                            <div class="col-sm-8 pr-0 pl-sm-0">
                              <span>06 Jan 2019</span>
                              <h6 class="mb-1 mb-sm-0">Isabel Cross</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-5 col-sm-4">
                          <div class="d-flex pt-1 align-items-center">
                            <div class="reload-outer bg-info">
                              <i class="mdi mdi-reload"></i>
                            </div>
                            <div class="dropdown dropleft pl-1 pt-3">
                              <div id="dropdownMenuButton2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <p><i class="mdi mdi-dots-vertical"></i></p>
                              </div>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="#">Sales</a>
                                <a class="dropdown-item" href="#">Track Invoice</a>
                                <a class="dropdown-item" href="#">Payment History</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="list-card">
                      <div class="row align-items-center">
                        <div class="col-7 col-sm-8">
                          <div class="row align-items-center">
                            <div class="col-sm-4">
                              <img src="assets/images/faces/face3.jpg" alt="" />
                            </div>
                            <div class="col-sm-8 pr-0 pl-sm-0">
                              <span>18 Mar 2019</span>
                              <h6 class="mb-1 mb-sm-0">Carrie Parker</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-5 col-sm-4">
                          <div class="d-flex pt-1 align-items-center">
                            <div class="reload-outer bg-primary">
                              <i class="mdi mdi-reload"></i>
                            </div>
                            <div class="dropdown dropleft pl-1 pt-3">
                              <div id="dropdownMenuButton3" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <p><i class="mdi mdi-dots-vertical"></i></p>
                              </div>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <a class="dropdown-item" href="#">Sales</a>
                                <a class="dropdown-item" href="#">Track Invoice</a>
                                <a class="dropdown-item" href="#">Payment History</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="list-card">
                      <div class="row align-items-center">
                        <div class="col-7 col-sm-8">
                          <div class="row align-items-center">
                            <div class="col-sm-4">
                              <img src="assets/images/faces/face11.jpg" alt="" />
                            </div>
                            <div class="col-sm-8 pr-0 pl-sm-0">
                              <span>10 Apr 2019</span>
                              <h6 class="mb-1 mb-sm-0">Don Bennett</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-5 col-sm-4">
                          <div class="d-flex pt-1 align-items-center">
                            <div class="reload-outer bg-warning">
                              <i class="mdi mdi-reload"></i>
                            </div>
                            <div class="dropdown dropleft pl-1 pt-3">
                              <div id="dropdownMenuButton4" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <p><i class="mdi mdi-dots-vertical"></i></p>
                              </div>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <a class="dropdown-item" href="#">Sales</a>
                                <a class="dropdown-item" href="#">Track Invoice</a>
                                <a class="dropdown-item" href="#">Payment History</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="list-card">
                      <div class="row align-items-center">
                        <div class="col-7 col-sm-8">
                          <div class="row align-items-center">
                            <div class="col-sm-4">
                              <img src="assets/images/faces/face3.jpg" alt="" />
                            </div>
                            <div class="col-sm-8 pr-0 pl-sm-0">
                              <span>18 Mar 2019</span>
                              <h6 class="mb-1 mb-sm-0">Carrie Parker</h6>
                            </div>
                          </div>
                        </div>
                        <div class="col-5 col-sm-4">
                          <div class="d-flex pt-1 align-items-center">
                            <div class="reload-outer bg-info">
                              <i class="mdi mdi-reload"></i>
                            </div>
                            <div class="dropdown dropleft pl-1 pt-3">
                              <div id="dropdownMenuButton5" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <p><i class="mdi mdi-dots-vertical"></i></p>
                              </div>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                                <a class="dropdown-item" href="#">Sales</a>
                                <a class="dropdown-item" href="#">Track Invoice</a>
                                <a class="dropdown-item" href="#">Payment History</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6 grid-margin stretch-card">
                <!--datepicker-->
                <div class="card">
                  <div class="card-body">
                    <div id="inline-datepicker" class="datepicker table-responsive"></div>
                  </div>
                </div>
                <!--datepicker ends-->
              </div>
              <div class="col-xl-4 col-md-6 stretch-card grid-margin stretch-card">
                <!--browser stats-->
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Browser stats</h4>
                    <div class="row py-2">
                      <div class="col-sm-12">
                        <div class="d-flex justify-content-between pb-3 border-bottom">
                          <div>
                            <img class="mr-2" src="assets/images/browser-logo/opera-logo.png" alt="" />
                            <span class="p">opera mini</span>
                          </div>
                          <p class="mb-0">23%</p>
                        </div>
                      </div>
                    </div>
                    <div class="row py-2">
                      <div class="col-sm-12">
                        <div class="d-flex justify-content-between pb-3 border-bottom">
                          <div>
                            <img class="mr-2" src="assets/images/browser-logo/safari-logo.png" alt="" />
                            <span class="p">Safari</span>
                          </div>
                          <p class="mb-0">07%</p>
                        </div>
                      </div>
                    </div>
                    <div class="row py-2">
                      <div class="col-sm-12">
                        <div class="d-flex justify-content-between pb-3 border-bottom">
                          <div>
                            <img class="mr-2" src="assets/images/browser-logo/chrome-logo.png" alt="" />
                            <span class="p">Chrome</span>
                          </div>
                          <p class="mb-0">33%</p>
                        </div>
                      </div>
                    </div>
                    <div class="row py-2">
                      <div class="col-sm-12">
                        <div class="d-flex justify-content-between pb-3 border-bottom">
                          <div>
                            <img class="mr-2" src="assets/images/browser-logo/firefox-logo.png" alt="" />
                            <span class="p">Firefox</span>
                          </div>
                          <p class="mb-0">17%</p>
                        </div>
                      </div>
                    </div>
                    <div class="row py-2">
                      <div class="col-sm-12">
                        <div class="d-flex justify-content-between">
                          <div>
                            <img class="mr-2" src="assets/images/browser-logo/explorer-logo.png" alt="" />
                            <span class="p">Explorer</span>
                          </div>
                          <p class="mb-0">05%</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--browser stats ends-->
              </div>
            </div>
          </div>
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap dashboard template</a> from Bootstrapdash.com</span>
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>