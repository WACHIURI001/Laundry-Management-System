<?php
require_once('connect.php');
session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Laundry project</title>
    <link rel="stylesheet" type="text/css" href="stylesbackup1.css">

   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
  <div class="headerx">
    <div class="logoWrapper">
      <img class="logo" src="kwetu.jpeg" border="0" />
      <div class="topnav">
        <a href="staffsignin.php">Log in</a>
        <a href="staffregister.php">Sign up</a>
        <a href="management.php">Home</a>
      </div>
    </div>
    <div class="motto">
      <h1>Laundry Financial Report</h1>
    </div>
  </div>
  <body>
    <?php
 /*include 'db_connect.php'; */
 $d1 = (isset($_GET['d1']) ? date("Y-m-d",strtotime($_GET['d1'])) : date("Y-m-d")) ;
 $d2 = (isset($_GET['d2']) ? date("Y-m-d",strtotime($_GET['d2'])) : date("Y-m-d")) ;
 $data = $d1 == $d2 ? $d1 : $d1. ' - ' . $d2;
 ?>
<div class="container-fluid">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="" class="control-label">Date From</label>
              <input type="date" class="form-control" name="d1" id="d1" value="<?php echo date("Y-m-d",strtotime($d1)) ?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="" class="control-label">Date To</label>
              <input type="date" class="form-control" name="d2" id="d2" value="<?php echo date("Y-m-d",strtotime($d2)) ?>">
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="" class="control-label">&nbsp;</label>
              <button class="btn-block btn-primary btn-sm" type="button" id="filter">Filter</button>
            </div>
          </div>
          <div class="col-md-2">
            <div class="form-group">
              <label for="" class="control-label">&nbsp;</label>
              <button class="btn-block btn-primary btn-sm" type="button" id="print"><i class="fa fa-print"></i> Print</button>
            </div>
          </div>

        </div>
        <hr>
        <div class="row" id="print-data">
          <div style="width:100%">
          <p class="text-center">
            <large><b>Laundry Management System Report</b></large>
          </p>
          <p class="text-center">
            <large><b><?php echo $data ?></b></large>
          </p>
          </div>


          <table class='table table-bordered'>
            <thead>
              <tr>
                <th>Date</th>
                <th>Customer Name</th>
                <th>Total Amount</th>
              </tr>
            </thead>
            <tbody>
              <?php
                
                $total = 0;
                $qry = $mysqli->query("SELECT * FROM laundryservice join member on laundryservice.memberId = member.memberId where serviceStatus = 'F' and date(dateIn) between '$d1' and '$d2' ");
                while($row=$qry->fetch_assoc()):
                  $total += $row['totalPrice'];
              ?>
              <tr>
                <td><?php echo date("M d, Y",strtotime($row['dateIn'])) ?></td>
                <td><?php echo ucwords($row['firstName']) ?> <?php echo ucwords($row['lastName']) ?></td>
                <td class='text-right'><?php echo number_format($row['totalPrice'],2) ?></td>
              </tr>
              <?php endwhile; ?>
            </tbody>
            <tfoot>
              <tr>
                <td class="text-right" colspan="2">Total</td>
                <td class="text-right"><?php echo number_format($total,2) ?></td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    
  </div>
</div>

    

  <footer>
    <div class="footerContent">
      <div class="logoWrapper">
        <img class="logo" src="BNN.png" border="0" />
      </div>
      <div class="leftFooter">
        <h1 id="followUs">Follow us . . </h1>
        <div class="iconWrapper">
          <a href="https://www.facebook.com/">
            <img class="socialIcon" src="facebook.png" border="0" />
          </a>
          <a href="https://www.instagram.com/">
            <img class="socialIcon" src="ig.png" border="0" />
          </a>
          <a href="https://twitter.com/">
            <img class="socialIcon" src="twitter.png" border="0" />
          </a>
        </div>
      </div>
      <div class="rightFooter">
        <div class="memberCredit">
          <h1>Created by</h1>
        </div>
        <div class="nameList">
          <ul id="name">
            <li>Eunice Njuguna</li>
            <li>Memo</li>
            <li>Getty</li>
          </ul>

        </div>
      </div>
    </div>
  </footer>
 <style>
  #print-data p {
        display: none;
      }
</style>
<noscript>
  <style>
      #div{
        width:100%;
      }
      table {
        border-collapse: collapse;
        width:100% !important;
      }
      tr,th,td{
        border:1px solid black;
      }
      .text-right{
        text-align: right
      }
      .text-right{
        text-align: center
      }
      p{
        margin:unset;
      }
      #div p {
        display: block;
      }
      p.text-center {
          text-align: -webkit-center;
      }
      
      
  </style>
</noscript> 
<script>
 /* $('#filter').click(function(){
    location.replace('reports.php&d1='+$('#d1').val()+'&d2='+$('#d2').val())
  })*/

$('#filter').click(function(){
    var startDate = $('#d1').val();
    var endDate = $('#d2').val();
    var url = 'reports.php?d1=' + startDate + '&d2=' + endDate;
    location.replace(url);
});

  $('#print').click(function(){
    var newWin = document.open('','_blank','height=500,width=600');
    var _html = $('#print-data').clone();
    var ns = $('noscript').clone();
    newWin.document.write(ns.html())
    newWin.document.write(_html.html())
    newWin.document.close()
    newWin.print()
    setTimeout(function(){
      newWin.close()
    },1500)
  })
</script>
  </body>

</html>
