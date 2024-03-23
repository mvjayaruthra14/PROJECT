<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include('admin/db_connect.php');
    ob_start();
        $query = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
         foreach ($query as $key => $value) {
          if(!is_numeric($key))
            $_SESSION['system'][$key] = $value;
        }
    ob_end_flush();
    include('header.php');

	
    ?>

    <style>
      .bg-dark {
          background-color:lightsteelblue !important;
      }
      #main-field{
        margin-top: 5rem!important;
      }
      body * {
        /*font-size: 13px ;*/
      }
      .modal-body  {
        color:rosybrown;
      }
      .fr-wrapper {
          color:white;
          background: #ffffff08;
          padding: 1em 1.5em;
          border-radius:5px;
      }

      .masthead{
        background: linear-gradient(to bottom, rgb(0 0 0 / 40%) 0%, rgb(245 242 240 / 45%) 100%), url('admin/assets/img/<?php echo $_SESSION['system']['1pic'] ?>') !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;
      }
    </style>
    <body id="page-top" class="bg-dark">
        <!-- Navigation-->
        <div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
      </div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="./"><?php echo $_SESSION['system']['name'] ?></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=home">Home</a></li>
                        <?php if(isset($_SESSION['login_id'])): ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="index.php?page=complaint_list">My Complaint List</a></li>
                        <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="admin/ajax.php?action=logout2"><?php echo "Welcome ".$_SESSION['login_name'] ?> <i class="fa fa-power-off"></i></a></li> -->
                        <div class=" dropdown mr-4">
                            <a href="#" class="text-white dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['login_name'] ?> </a>
                              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: -2.5em;">
                                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                                <a class="dropdown-item" href="admin/ajax.php?action=logout2"><i class="fa fa-power-off"></i> Logout</a>
                              </div>
                        </div>
                      <?php else: ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now">Login</a></li>
                      <?php endif; ?>
                       
                        
                     
                    </ul>
                </div>
            </div>
        </nav>
  <header class="masthead">
      <div class="container-fluid h-100">
          <div class="row h-100 align-items-center justify-content-center text-center">
              <div class="col-lg-8 align-self-end mb-4 page-title">
                <h3 class="text-white">Welcome to <?php echo $_SESSION['system']['name']; ?></h3>
                  <hr class="divider my-4" />
              <div class="row mb-2 text-left justify-content-center ">
                 <button class="btn btn-primary" type="button" id="report_crime">Report a Crime/Complaint</button>
              </div>                        
              </div>
              
          </div>
      </div>
  </header>
  <main id="main-field" class="bg-dark">
        <link rel="stylesheet" href="admin/assets/wysiwyg/css/froala_editor.css">
  <link rel="stylesheet" href="admin/assets/wysiwyg/css/froala_style.css">
<style>
    #cat-list li{
        cursor: pointer;
    }
       #cat-list li:hover {
        color: white;
        background: #007bff8f;
    }
    .prod-item p{
        margin: unset;
    }
    .bid-tag {
    position: absolute;
    right: .5em;
}
</style>
<div class="container">
    <div class="col-lg-12">
      <div class="fr-wrapper">
          <p style="text-align: center; background: transparent; position: relative;"><span style="font-size: 30px; font-family: Tahoma, Geneva, sans-serif;"><strong>Criminal law</strong></span></p><p style="text-align: center; background: transparent; position: relative;">&nbsp;The Courts are the ultimate pedestal in the Country upon which justice is delivered through the beacon of due process. The Judiciary is the third pillar of democracy. In simple terms, contempt of Court is the act of disrespecting or being defiant towards the Court of law, including the judges. It refers to any actions which defy a court's authority, cast disrespect on a court, or impede the ability of the court to perform its function.</p><p style="text-align: center; background: transparent; position: relative;"><br></p><p style="text-align: center; background: transparent; position: relative;"><img src="http://localhost/crms/admin/assets/uploads/1pic.jpg" style="width: 558px;" class="fr-fic fr-dib"></p><p style="text-align: center; background: transparent; position: relative;">&nbsp;Importance of Contempt of Court
The 1971 Contempt of Court Act was an important shift in Indian law. It built a thorough system meant to safeguard the honour and legitimacy of Indian courts. This statute lays out precise guidelines for abiding by and exhibiting respect for judicial rulings and proceedings across the nation. Citizens are expected to follow court orders under particular circumstances. When there is a hindrance or disruption brought about by non-compliance in cases that are being reviewed by the courts, these laws establish disciplinary repercussions.
It acts as a barrier for those looking for ways to hinder court proceedings and rulings. </p><p style="text-align: center; background: transparent; position: relative;"><br></p><div class="fr-img-space-wrap" style="text-align: center;"><img src="http://localhost/crms/admin/assets/uploads/pic.webp" style="width: 567px;" class="fr-fic fr-rounded fr-dib"><p class="fr-img-space-wrap2">&nbsp;</p></div><p><br>The main idea behind this initiative was the observation of abuses against the judiciary by dignitaries, citizens, lawyers, and judges. Criminal contempt, which includes speaking negatively about the court's operations outside of the courtroom and may result in punishments akin to those for unethical behaviour, is one of two ways that contempt of court can manifest.
Contrarily, civil contempt deals with defying a court's orders, such as failing to pay alimony or other financial obligations required by various laws, such as the maintenance law, or failing to comply with other financial compensations.</p><p><br></p>      </div>
    </div>
</div>
       
<script>
    
</script>        
       
</main>
        
       
  <main id="main-field" class="bg-dark">
        <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        include $page.'.php';

        ?>
  
</main>
<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
  <div id="preloader"></div>
        <footer class=" py-5 bg-dark">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0 text-white">Contact us</h2>
                        <hr class="divider my-4" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div class="text-white"><?php echo $_SESSION['system']['contact'] ?></div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a class="d-block" href="jayaruthramv14@gmail.com">ruthra@mail.com</a>
                      </div>
                </div>
            </div>
            <br>
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - <?php echo $_SESSION['system']['name'] ?> | <a href="https://in.linkedin.com/in/jayaruthra-manikandan-vani-7a32a5289" target="_blank">mvj</a></div></div>
        </footer>
        
       <?php include('footer.php') ?>
    </body>
    <script type="text/javascript">
      $('#login').click(function(){
        uni_modal("Login",'login.php')
      })
      $('.datetimepicker').datetimepicker({
          format:'Y-m-d H:i',
      })
      $('#find-car').submit(function(e){
        e.preventDefault()
        location.href = 'index.php?page=search&'+$(this).serialize()
      })
      $('#report_crime').click(function(){
        if('<?php echo !isset($_SESSION['login_id']) ? 1 : 0 ?>'==1){
          uni_modal("Login",'login.php');
          return false;
        }
          uni_modal("Report",'manage_report.php');
      })
      $('#manage_my_account').click(function(){
          uni_modal("Manage Account",'signup.php');
      })
    </script>
    <?php $conn->close() ?>

</html>
