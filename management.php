<?php
require_once('connect.php');
session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Database project</title>
    <link rel="stylesheet" type="text/css" href="stylesbackup1.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <div class="headerx">
    <div class="logoWrapper">
      <img class="logo" src="BNN.png" border="0" />
      <div class="topnav">
        <a href="staffsignin.php">Log in</a>
        <a href="staffregister.php">Sign up</a>
        <a href="management.php">Home</a>
      </div>
    </div>
    <div class="motto">
      <h1>We provide professional laundry service</h1>
    </div>
  </div>
  <body>
    <div class="row">
    <div class="content">
<!-- if(isset($_SESSION['userStatus']) && (($_SESSION['userStatus']=="STAFF") || ($_SESSION['userStatus']=="ADMIN"))){ -->
    <?php
      if(isset($_SESSION['userStatus']) && ($_SESSION['userStatus']=="STAFF") ){
    ?>
        <div class="boxWrapper high1020">


          <div class="box1">
            <div class="profileWrapper">
              <img class="profileImg" src="person.png" border="0" />
            </div>
            <div class="pofileText">
              <?php
              echo "Hello"."&nbsp".$_SESSION['userFirstName']."&nbsp".$_SESSION['userLastName']."<br>"."<br>"."Status:".$_SESSION['userStatus'];
              ?>
              <br>
              <br>
              <a href="logout.php">Logout</a>
            </div>

          </div>

          <div class="box2">

              <div class="rightFirstRow">
                <a href="updatestatus.php">
                  <div class="updateStatusWrapper">
                    <h1>Update Status</h1>
                  </div>
                </a>
                <a href="checkoutitems.php">
                  <div class="deliveryWrapper">
                    <h1>Checkout Items </h1>
                  </div>
                </a>
              </div>
              <div class="rightSecondRow">
                <a href="regisitem.php">
                  <div class="regisItemWrapper">
                    <h1>Register Item</h1>
                  </div>
                </a>

              </div>
              <div class="rightSecondRow">
                <a href="viewhistory.php">
                  <div class="viewHistorymWrapper">
                    <h1>View History</h1>
                  </div>
                </a>

              </div>

          </div>
          <?php
            }
            elseif (isset($_SESSION['userStatus']) && ($_SESSION['userStatus']=="ADMIN")) {
          ?>
<div class="row">
        <div class="alert alert-success col-md-3 ml-4">
          <p><b><large>Total Profit Today</large></b></p>
        <hr>
         <p class="text-right"><b><large><?php 
        /*  include 'db_connect.php';*/
          $laundry = $mysqli->query("SELECT SUM(totalPrice) as amount FROM laundryService where date(dateOut)= '".date('Y-m-d')."' and date(dateIn)= '".date('Y-m-d')."'");
          echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['amount'],2) : "0.00";

           ?></large></b></p>
        </div>
        <div class="alert alert-info col-md-3 ml-4">
          <p><b><large>Total Customer Today</large></b></p>
        <hr>
          <p class="text-right"><b><large><?php 
          /*include 'db_connect.php';*/
          $laundry = $mysqli->query("SELECT count(pid) as `count` FROM laundryService where  date(dateIn)= '".date('Y-m-d')."'");
          echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['count']) : "0";

           ?></large></b></p>
        </div>
        <div class="alert alert-primary col-md-3 ml-4">
          <p><b><large>Total Claimed Laundry Today</large></b></p>
        <hr>
          <p class="text-right"><b><large><?php 
          /*include 'db_connect.php';*/
          $laundry = $mysqli->query("SELECT count(pid) as `count` FROM laundryService where date(dateOut)= '".date('Y-m-d')."' and date(dateIn)= '".date('Y-m-d')."'");
          echo $laundry->num_rows > 0 ? number_format($laundry->fetch_array()['count']) : "0";

           ?></large></b></p>
        </div>
        <div class="alert alert-warning col-md-3 ml-4">
          <p class="text-center"><a style="text-decoration: none; font-size: 1.5em" href="reports.php">Reports</a></p>
        </div>
        </div>

          <div class="boxWrapper high1320">

            <div class="box1">
              <div class="profileWrapper">
                <img class="profileImg" src="person.png" border="0" />
              </div>
              <div class="pofileText">
                <?php
                echo "Hello"."&nbsp".$_SESSION['userFirstName']."&nbsp".$_SESSION['userLastName']."<br>"."<br>"."Status:".$_SESSION['userStatus'];
                ?>
                <br>
                <br>
                <a href="logout.php">Logout</a>
              </div>

            </div>
            <div class="box2">
                <div class="rightFirstRow">
                  <a href="updatestatus.php">
                    <div class="updateStatusWrapper">
                      <h1>Update Status</h1>
                    </div>
                  </a>
                  <a href="checkoutitems.php">
                    <div class="deliveryWrapper">
                      <h1>Checkout Items </h1>
                    </div>
                  </a>
                </div>
                <div class="rightSecondRow">
                  <a href="regisitem.php">
                    <div class="regisItemWrapper">
                      <h1>Register Item</h1>
                    </div>
                  </a>

                </div>
                <!--register-->
                
                <!--register-->
                <div class="rightSecondRow">
                  <a href="viewhistory.php">
                    <div class="viewHistorymWrapper">
                      <h1>View History</h1>
                    </div>
                  </a>

                </div>
                <div class="rightSecondRow">
                  <a href="staffmanagement.php">
                    <div class="staffManagementWrapper">
                      <h1>Staff management</h1>
                    </div>
                  </a>

                </div>
                <div class="rightSecondRow">
                  <a href="membermanagement.php">
                    <div class="memberManagementWrapper">
                      <h1>Member management</h1>
                    </div>
                  </a>

                </div>


            </div>

          <?php
            }
            else{
          ?>
          <div class="" style="text-align: center;margin:200px;">
            <h1>Please login first !</h1>
            <br>
            <br>
            <a href="welcome.php">
            <h3>Go back to welcome page !</h3>
            </a>
          </div>
          <?php } ?>

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
            <li>Getrude Nyakundi</li>
            <li>Memo</li>
          </ul>

        </div>
      </div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>

</html>
