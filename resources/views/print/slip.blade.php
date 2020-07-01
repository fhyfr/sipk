<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Detail Gaji Karyawan</title>
</head>

<body>
  <style>
    body {
      font-family: 'Raleway', sans-serif;
      padding: 0;
      margin: 0;
      color: #45046A;
      height: 100vh;
      min-height: 100%;
      width: 100%;
    }

    button:focus {
      box-shadow: none;
    }

    .form-group {
      margin-bottom: 0;
    }

    .content-wrapper label {
      font-weight: 700;
      font-size: 12px;
    }

    .btn-action {
      font-size: 12px;
      background-image: linear-gradient(to bottom, rgba(163, 86, 255, 0.52), rgba(115, 67, 254, 0.73));
      padding: 8px 15px;
      border-radius: 50px;
      -webkit-border-radius: 50px;
      -moz-border-radius: 50px;
      -ms-border-radius: 50px;
      -o-border-radius: 50px;
      font-weight: 500;
      color: #fff;
      border: none;
      outline: none;
    }

    .btn-action-save {
      font-size: 12px;
      padding: 10px 20px;
      margin-left: 340px;
      margin-right: 0;
    }

    .fa-trash-alt {
      margin-left: 10px;
    }

    .btn-action-view-data {
      padding: 10px 25px;
    }

    a,
    a:hover,
    a:focus {
      text-decoration: none;
    }

    .form-group-button {
      display: flex;
      justify-content: end;
      align-items: center;
    }

    .svg-inline--fa {
      margin-right: 5px;
    }

    .content-wrapper input {
      font-size: 12px;
    }

    .dropdown button,
    .dropdown .dropdown-item {
      font-size: 12px;
    }

    .dropdown button {
      border: 1px solid #45046A;
    }

    h1 {
      font-size: 20px;
      font-weight: 700;
    }

    h2 {
      font-size: 18px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    h3 {
      font-size: 12px;
      font-weight: 700;
      margin-bottom: 10px;
      padding: 2px 0;
    }

    p {
      font-size: 12px;
      font-weight: 500;
      margin-bottom: 10px;
    }

    .content-footer,
    table,
    select option {
      font-size: 12px;
    }

    /* Header Start */
    .main-header p {
      color: #fff;
      line-height: 50px;
      margin: 0;
      font-size: 16px;
      margin-top: -50px;
    }

    .main-header.fas {
      color: #fff;
    }

    .main-wrapper .main-header {
      position: fixed;
    }

    .main-wrapper .main-header a {
      display: block;
      float: left;
      height: 50px;
      font-size: 20px;
      line-height: 50px;
      text-align: center;
      width: 230px;
      padding: 0 15px;
      overflow: hidden;
      color: rgba(115, 67, 254, 0);
      color: #45046A;
      text-decoration: none;
      font-weight: 900;
    }

    .main-wrapper .main-header .navbar-box {
      display: flex;
      justify-content: end;
      margin-left: 230px;
      display: flex;
      justify-content: end;
      z-index: 9999999;
    }

    .main-wrapper .main-header .navbar {
      background-color: #45046A;
      margin-left: 230px;
      color: #fff;
      height: 50px;
      padding: 0 20px;
    }

    .main-wrapper .main-header .navbar button {
      font-size: 12px;
      font-weight: 600;
      line-height: 50px;
      padding: 0 20px;
      color: #fff;
    }

    /* Header End */

    /* Sidebar Start */
    .main-sidebar {
      position: fixed;
      background-image: linear-gradient(to bottom, rgba(163, 86, 255, 0.52), rgba(115, 67, 254, 0.73));
      top: 0;
      left: 0;
      padding-top: 50px;
      min-height: 100%;
      width: 230px;
      z-index: 810;
    }

    .main-sidebar .sidebar {
      padding: 0;
      font-size: 12px;
    }

    .main-sidebar .sidebar-header {
      font-weight: 600;
      color: #F6E6FF;
    }

    .main-header ul {
      padding: 0;
    }

    .main-sidebar .sidebar-menu {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    .main-sidebar .sidebar-header {
      padding: 5px 30px;
    }

    .main-sidebar a {
      font-weight: 500;
      padding: 0 30px;
      width: 230px;
      display: block;
      text-decoration: none;
      line-height: 45px;
      color: #45046A;
      transition: ease-in .05s;
      -webkit-transition: ease-in .05s;
      -moz-transition: ease-in .05s;
      -ms-transition: ease-in .05s;
      -o-transition: ease-in .05s;
    }

    .main-sidebar a:hover,
    .main-sidebar .active {
      background-color: #45046A;
      border-left: 5px solid #fff;
      box-sizing: border-box;
      color: #fff;
      font-weight: 500;
      cursor: pointer;
    }

    /* Sidebar End */

    /* Content Common Start */
    .content-wrapper {
      padding: 70px 20px 20px;
      margin-left: 230px;
      min-height: 100vh;
    }

    .content-wrapper.non-dashboard {
      background-color: #F6E7FF;
    }

    /* Heading Start */
    .content-wrapper.non-dashboard .heading {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .content-wrapper.non-dashboard .heading h1 {
      font-weight: 700;
      margin-bottom: 0;
      font-size: 16px;
    }

    .content-wrapper.non-dashboard a {
      color: #45046A;
    }

    /* Heading End */

    /* Data Content Start */
    .content-wrapper.non-dashboard .data-content {
      background-color: #fff;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      -ms-border-radius: 5px;
      -o-border-radius: 5px;
      padding: 20px;
    }

    .content-wrapper.non-dashboard .data-content .content-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 14px;
      font-weight: 500;
      margin-bottom: 20px;
      padding: 0;
    }

    .content-wrapper.non-dashboard .data-content .content-header.row {
      padding: 0 20px;
    }

    .content-wrapper.non-dashboard .data-content .content-header .dropshow {
      display: flex;
      align-items: center;
      flex-basis: 70%;
    }

    .content-wrapper.non-dashboard .data-content .content-header .dropshow p {
      margin-bottom: 0;
      font-weight: 500;
    }

    .content-wrapper.non-dashboard .data-content .content-header .dropshow button {
      border: 1px solid #45046A;
      padding: 0 5px;
    }

    .content-wrapper.non-dashboard .data-content .content-header .search {
      display: inline-block;
      flex-basis: 30%;
    }

    /* Data Content End */

    /* Tabel Start */
    thead {
      background-color: #45046A;
      color: #fff;
    }

    thead th,
    tbody .center {
      text-align: center;
    }

    /* Table End */

    /* Footer Content Start */
    .content-wrapper.non-dashboard .content-footer {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    /* Footer Content End */
    /* Content Common End */

    /* Content Home Start*/
    .content-wrapper.home {
      background-image: linear-gradient(to bottom, rgba(163, 86, 255, 0.52), rgba(115, 67, 254, 0.73)), url(../img/bg-dashboard.jpg);
      background-size: cover;
      background-position: center center;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      flex-direction: column;
      color: #fff;
    }

    .content-wrapper.home h1 {
      font-size: 32px;
      font-weight: 900;
    }

    .content-wrapper.home h2 {
      font-size: 28px;
      font-weight: 500;
    }

    /* Content Home End */

    /* Content Karyawan Start */
    .add-data .form-group {
      height: 90px;
      width: 450px;
      padding: 5px 0;
    }

    .add-data .form-group.form-group-button {
      display: flex;
      justify-content: end;
      align-items: flex-end;
      text-align: right;
    }

    .add-data .form-group .dropdown {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .add-data .input,
    .add-data .dropdown-toggle {
      width: 450px;
      border: 1px solid #45046A;
    }

    /* Content Karyawan End */

    /* Content Absensi Start */
    .content-wrapper.non-dashboard .filter-data {
      margin-bottom: 20px;
      background-color: #F6E7FF;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      -ms-border-radius: 5px;
      -o-border-radius: 5px;
      padding: 20px;
    }

    .content-wrapper.non-dashboard .filter-data input {
      font-size: 12px;
    }

    .content-wrapper.non-dashboard .filter-data .form-filter {
      display: flex;
      justify-content: start;
      align-items: flex-end;
    }

    .content-wrapper.non-dashboard .filter-data h2 {
      font-size: 16px;
      font-weight: 700;
    }

    .content-wrapper.non-dashboard .filter-data label {
      font-size: 12px;
      font-weight: 600;
    }

    .add-data.absensi .month-year .dropdown-toggle {
      width: 220px;
    }

    /* Comtent Absensi End */

    /* Content Gajian Start */
    .content-wrapper.non-dashboard .data-content .slip-gaji {
      background-color: #F6E7FF;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      -ms-border-radius: 5px;
      -o-border-radius: 5px;
      padding: 20px;
    }

    .content-wrapper.non-dashboard .data-content .slip-gaji .header {
      display: flex;
      justify-content: center;
      text-align: center;
      flex-direction: column;
    }

    .content-wrapper.non-dashboard .data-content .slip-gaji .content-body {
      padding: 20px 0 0;
    }

    .content-wrapper.non-dashboard .data-content .slip-gaji .content-body .data-karyawan,
    .content-wrapper.non-dashboard .data-content .slip-gaji .content-body .detail-fee {
      display: flex;
      justify-content: center;
    }

    .content-wrapper.non-dashboard .data-content .slip-gaji .content-body .data-karyawan .left,
    .content-wrapper.non-dashboard .data-content .slip-gaji .content-body .data-karyawan .right {
      flex-basis: 50%;
      display: flex;
    }

    .content-wrapper.non-dashboard .data-content .slip-gaji .content-body .data-karyawan .left .label,
    .content-wrapper.non-dashboard .data-content .slip-gaji .content-body .data-karyawan .right .label {
      flex-basis: 30%;
    }

    .content-wrapper.non-dashboard .detail-fee .pendapatan {
      flex-basis: 50%;
      padding: 20px;
      background-color: #FFE1E1;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      -ms-border-radius: 5px;
      -o-border-radius: 5px;
      margin-right: 10px;
    }

    .content-wrapper.non-dashboard .detail-fee .potongan {
      flex-basis: 50%;
      padding: 20px;
      background-color: #E1E8FF;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      -ms-border-radius: 5px;
      -o-border-radius: 5px;
      margin-left: 10px;
    }

    .content-wrapper.non-dashboard .total-fee {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding: 20px 0 0;
    }

    .content-wrapper.non-dashboard .total-fee+p {
      margin: 20px 0;
    }

    .content-wrapper.non-dashboard .total-fee .owner {
      margin-bottom: 0;
    }

    /* Content Gajian End */

    /* Content Laporan Start */
    .content-wrapper.non-dashboard.laporan .filter-data .form-filter {
      display: flex;
      justify-content: start;
    }

    .content-wrapper.non-dashboard .filter-data .form-filter .form-group {
      margin-right: 20px;
    }

    /* Content Laporan End */

    /* Content Pengaturan Gaji Start */
    .content-wrapper.non-dashboard .data-content.set-payment {
      background-color: rgba(115, 67, 254, 0);
      padding: 0;
    }

    .content-wrapper.non-dashboard .data-content.set-payment .gaji-pokok {
      background-color: #fff;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      -ms-border-radius: 5px;
      -o-border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .content-wrapper.non-dashboard .data-content.set-payment .plus-minus {
      display: flex;
    }

    .content-wrapper.non-dashboard .data-content.set-payment .plus-minus .pendapatan,
    .content-wrapper.non-dashboard .data-content.set-payment .plus-minus .potongan {
      flex-basis: 50%;
      padding: 20px;
      border-radius: 5px;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      -ms-border-radius: 5px;
      -o-border-radius: 5px;
      background-color: #fff;
    }

    .content-wrapper.non-dashboard .data-content.set-payment .plus-minus .pendapatan {
      margin-right: 10px;
    }

    .content-wrapper.non-dashboard .data-content.set-payment .plus-minus .potongan {
      margin-left: 10px;
    }

    .content-wrapper.non-dashboard .data-content.set-payment .plus-minus .form-group {
      margin: 15px 0;
    }

    .content-wrapper.non-dashboard .data-content.set-payment .plus-minus label {
      padding: 0;
    }

    .content-wrapper.non-dashboard .data-content.set-payment .plus-minus button {
      margin: 10px 0 0;
    }

    .content-wrapper.non-dashboard .data-content.add-gaji-pokok {
      width: 500px;
    }

    .content-wrapper.non-dashboard .data-content.add-gaji-pokok button {
      margin-left: 0;
    }

    .content-wrapper.non-dashboard .data-content.add-gaji-pokok .form-group {
      height: 75px;
    }

    /* Content Pengaturan Gaji End */

    /* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- */

    @media (max-width: 575.98px) {
      h1 {
        font-size: 18px;
        font-weight: 700;
      }

      h2 {
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 0;
      }

      h3 {
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 10px;
        padding: 2px 0;
      }

      .content-wrapper label {
        font-size: 12px;
      }

      .btn-action {
        padding: 8px 15px;
      }

      .btn-action-save {
        padding: 10px 20px;
        margin-left: 0;
      }

      .btn-action-view-data {
        margin-top: 20px;
        padding: 10px 25px;
      }

      /* Header Start */
      .main-header p {
        color: #fff;
        line-height: 50px;
        margin: 0;
        font-size: 16px;
        padding: 0 0 0 20px;
      }

      .main-header #close-sidebar-button {
        visibility: hidden;
      }

      .main-header.fas {
        color: #fff;
      }

      .main-wrapper .main-header {
        position: fixed;
        display: flex;
        justify-content: space-between;
        background-color: #45046A;
      }

      .main-wrapper .main-header a {
        margin-left: -100px;
        line-height: 50px;
        height: 50px;
        font-size: 16px;
        text-align: left;
        width: 150px;
        padding: 0;
        color: #fff;
        font-weight: 700;
      }

      .main-wrapper .main-header .navbar-box {
        display: flex;
        justify-content: end;
        margin-left: 0;
        display: flex;
        justify-content: end;
        z-index: 9999999;
      }

      .main-wrapper .main-header .navbar {
        background-color: #45046A;
        margin-left: 0;
        color: #fff;
        height: 50px;
        padding: 0 20px;
      }

      .main-wrapper .main-header .navbar-box {
        display: flex;
        justify-content: end;
        margin-left: 0;
        display: flex;
        justify-content: end;
        z-index: 9999999;
      }

      .main-wrapper .main-header .navbar button {
        font-size: 12px;
        font-weight: 600;
        line-height: 50px;
        padding: 0 0 0 20px;
        color: #fff;
      }

      /* Header End */

      /* Content Common Start */
      .content-wrapper {
        padding: 70px 20px 20px;
        margin-left: 0;
        min-height: 100vh;
      }

      .content-wrapper.non-dashboard {
        background-color: #F6E7FF;
      }

      /* Content Common End */

      /* Heading Start */
      .content-wrapper.non-dashboard .heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
      }

      .content-wrapper.non-dashboard .heading h1 {
        font-weight: 700;
        margin-bottom: 0;
        font-size: 16px;
      }

      .content-wrapper.non-dashboard a {
        color: #45046A;
      }

      /* Heading End */

      /* Content Home Start*/
      .content-wrapper.home {
        text-align: center;
      }

      .content-wrapper.home h1 {
        font-size: 20px;
      }

      .content-wrapper.home h2 {
        font-size: 16px;
      }

      /* Content Home End */

      /* Content Karyawan Start */
      .add-data .form-group {
        height: 70px;
        width: 280px;
        padding: 5px 0;
      }

      .add-data .form-group.form-group-button {
        display: flex;
        justify-content: end;
        align-items: flex-end;
        text-align: right;
      }

      .add-data .form-group .dropdown {
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .add-data .input,
      .add-data .dropdown-toggle {
        width: 280px;
        border: 1px solid #45046A;
      }

      /* Content Karyawan End */

      /* Data Content Start */
      .content-wrapper.non-dashboard .data-content {
        background-color: #fff;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
        padding: 20px;
      }

      .content-wrapper.non-dashboard .data-content .content-header {
        display: flex;
        flex-direction: column-reverse;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
        font-weight: 500;
        margin: 10px 0;
      }

      .content-wrapper.non-dashboard .data-content .content-header.row {
        flex-direction: row;
        padding: 0;
      }

      .content-wrapper.non-dashboard .data-content .content-header .dropshow {
        display: flex;
        align-items: center;
        flex-basis: 70%;
      }

      .content-wrapper.non-dashboard .data-content .content-header .dropshow p {
        margin-bottom: 0;
        font-weight: 500;
      }

      .content-wrapper.non-dashboard .data-content .content-header.row .form-control {
        padding: 5px 0;
      }

      .content-wrapper.non-dashboard .data-content .content-header .dropshow button {
        border: 1px solid #45046A;
        padding: 0 5px;
      }

      .content-wrapper.non-dashboard .data-content .content-header.row .action .btn-action.btn-add,
      .content-wrapper.non-dashboard .data-content .content-header.row .btn-action.btn-print {
        width: 25px;
        height: 25px;
        overflow: hidden;
        font-size: 16px;
        padding: 1px 0 0 3px;
        background-image: linear-gradient(to bottom, rgba(163, 86, 255, 0), rgba(115, 67, 254, 0));
      }

      .content-wrapper.non-dashboard .data-content .content-header .search {
        display: inline-block;
        flex-basis: 50%;
        margin-bottom: 10px;
      }

      /* Data Content End */

      /* Tabel Start */
      thead {
        background-color: #45046A;
        color: #fff;
      }

      thead th,
      tbody .center {
        text-align: center;
      }

      /* Table End */

      /* Footer Content Start */
      .content-wrapper.non-dashboard .content-footer {
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        align-items: center;
      }

      /* Footer Content End */

      /* Sidebar Start */
      .main-sidebar {
        background-image: linear-gradient(to bottom, rgba(163, 86, 255, 7), rgba(115, 67, 254, 7));
      }

      .main-sidebar,
      .sidebar,
      .sidebar-menu {
        transform: translateX(-230px);
        -webkit-transform: translateX(-230px);
        -moz-transform: translateX(-230px);
        -ms-transform: translateX(-230px);
        -o-transform: translateX(-230px);
      }

      /* Sidebar End */

      /* Content Absensi Start */
      .content-wrapper.non-dashboard .filter-data .form-filter {
        display: flex;
        justify-content: start;
        flex-wrap: wrap;
      }

      /* Content Absensi End */

      /* Content Gajian Start */
      .content-wrapper.non-dashboard .data-content .slip-gaji {
        background-color: rgba(115, 67, 254, 0);
        padding: 0;
      }

      .content-wrapper.non-dashboard .data-content .slip-gaji .header {
        display: flex;
        justify-content: center;
        text-align: center;
        flex-direction: column;
        padding: 20px 0 0;
      }

      .content-wrapper.non-dashboard .data-content .slip-gaji .content-body {
        padding: 20px 0 0;
      }

      .content-wrapper.non-dashboard .data-content .slip-gaji .content-body .data-karyawan,
      .content-wrapper.non-dashboard .data-content .slip-gaji .content-body .detail-fee {
        display: block;
      }

      .content-wrapper.non-dashboard .data-content .slip-gaji .content-body .data-karyawan {
        background-color: rgba(115, 67, 254, .5);
        padding: 20px;
        border-radius: 5px;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        -ms-border-radius: 5px;
        -o-border-radius: 5px;
      }

      .content-wrapper.non-dashboard .data-content .slip-gaji .content-body .data-karyawan .left .label,
      .content-wrapper.non-dashboard .data-content .slip-gaji .content-body .data-karyawan .right .label {
        flex-basis: 50%;
      }

      .content-wrapper.non-dashboard .detail-fee .pendapatan,
      .content-wrapper.non-dashboard .detail-fee .potongan {
        background-color: rgba(115, 67, 254, 0);
        padding: 0;
      }

      .content-wrapper.non-dashboard .total-fee {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 20px 0 0;
      }

      .content-wrapper.non-dashboard .total-fee+p {
        margin: 20px 0;
      }

      .content-wrapper.non-dashboard .total-fee .owner {
        margin-bottom: 0;
      }

      .content-wrapper.non-dashboard .data-content.add-gaji-pokok {
        width: 320px;
      }

      .content-wrapper.non-dashboard .data-content.set-payment .plus-minus {
        display: block;
      }

      .content-wrapper.non-dashboard .data-content.set-payment .plus-minus .pendapatan {
        margin-right: 0;
      }

      .content-wrapper.non-dashboard .data-content.set-payment .plus-minus .potongan {
        margin: 20px 0 0;
      }

      .content-wrapper.non-dashboard .data-content.set-payment .plus-minus .form-group {
        margin: 15px 0;
      }

      /* Content Gajian End */
    }
  </style>
  <!-- Content Start -->
  <div class="content-wrapper non-dashboard">
    <div class="heading">
    </div>
    <div class="data-content">
      <div class="content-header row">
      </div>
      <div class="slip-gaji">
        <div class="header">
          <h2 class="pb-2">Slip Gaji Karyawan</h2>
          <br>
          <h2 class="brand-name">PT. Gajian</h2>
        </div>
        <div class="content-body">
          <div class="data-karyawan">
            <div class="left">
              <div class="label">
                <h3>No. Slip</h3>
                <h3>NIK</h3>
                <h3>Nama Karyawan</h3>
                <h3>Jabatan</h3>
              </div>
              <div class="value">
                <p>: <span>1</span></p>
                <p>: <span>13224</span></p>
                <p>: <span>Alex</span></p>
                <p>: <span>Kepala Gudang</span></p>
              </div>
            </div>
            <div class="right">
              <div class="label">
                <h3>Tanggal Cetak</h3>
              </div>
              <div class="value">
                <p>: <span>Rabu, 2 Juni 2020</span></p>
              </div>
            </div>
          </div>
          <hr>
          <div class="detail-fee">
            <div class="pendapatan">
              <h3>Rincian Pendapatan</h3>
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Gaji Pokok</td>
                    <td>=</td>
                    <td>Rp 1.500.000,-</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Tunjangan</td>
                    <td>=</td>
                    <td>Rp 1.000.000,-</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Uang Makan</td>
                    <td>=</td>
                    <td>Rp 945.000,-</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Uang Lembur</td>
                    <td>=</td>
                    <td>Rp 150.000,-</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Insentif</td>
                    <td>=</td>
                    <td>Rp 250.000,-</td>
                  </tr>
                  <tr style="font-weight: 800;">
                    <th scope="row">6</th>
                    <td>Total</td>
                    <td>=</td>
                    <td>Rp 3.845.000,-</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="potongan">
              <h3>Potongan</h3>
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Kasbon</td>
                    <td>=</td>
                    <td>- Rp 300.000,-</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Alfa</td>
                    <td>=</td>
                    <td>- Rp 200.000,-</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Izin</td>
                    <td>=</td>
                    <td>- Rp 100.000,-</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Sakit</td>
                    <td>=</td>
                    <td>- Rp 150.000,-</td>
                  </tr>
                  <tr style="font-weight: 800;">
                    <th scope="row">5</th>
                    <td>Total</td>
                    <td>=</td>
                    <td>Rp 750.000,-</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="total-fee">
            <h3>Total yang dibayarkan <strong>Rp 3.345.000,-</strong></h3>
            <p><em>Mengetahui,</em></p>
            <h3 class="owner">Pimpinan Perusahaan</h3>
            <p>Ir. Alex Andro Purnomo, SE.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Content End -->
  </div>

  <!-- Optional JavaScript Start-->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://use.fontawesome.com/releases/v5.13.1/js/all.js" data-auto-replace-svg="nest"></script>
  <script src="/assets/js/sidebar-mobile.js"></script>
  <!-- Optional Javascript End -->
</body>

</html>