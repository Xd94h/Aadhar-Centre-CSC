<?php
checkSession();
?>

<!doctype html>
<html lang="en" class="color-sidebar sidebarcolor5 color-header headercolor3">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="<?php  ahkweb('logo');  ?>" type="image/png" />
    <!--plugins-->
    <link href="../template/ahkweb/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="../template/ahkweb/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../template/ahkweb/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../template/ahkweb/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="../template/ahkweb/assets/css/pace.min.css" rel="stylesheet" />
    <script src="../template/ahkweb/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="../template/ahkweb/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="../template/ahkweb/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../template/ahkweb/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="../template/ahkweb/assets/css/app.css" rel="stylesheet">
    <link href="../template/ahkweb/assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->

    <link rel="stylesheet" href="../template/ahkweb/assets/css/dark-theme.css" />
    <link rel="stylesheet" href="../template/ahkweb/assets/css/semi-dark.css" />
    <link rel="stylesheet" href="../template/ahkweb/assets/css/header-colors.css" />
    <title>Welcome TO  - <?php ahkweb('webname'); ?></title>
</head>
<!--Design byboxikart WORLD TEAM // https://BOXIKART.COM -->
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.62/jquery.inputmask.bundle.js"></script>
    <!--wrapper-->
    <div class="wrapper">
        <!--Design byboxikart WORLD TEAM // https://BOXIKART.COM -->
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="<?php echo ahkweb('logo');  ?>" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text"><?php ahkweb('webname'); ?></h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li
                <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                    <a href="index.php">
                         <div class="parent-icon"><img src="https://www.klipfolio.com/sites/default/files/integrations/Adobe-SiteCatalyst.png" width="40ox" style="border-radius:3px;">
                        </div>
                        <div class="menu-title" style="color:yellow">Dashboard</div>
                    </a>
                    <!-- <ul>
						<li> <a href="index.php"><i class="bx bx-right-arrow-alt"></i>Default</a>
						</li>
						<li> <a href="dashboard-eCommerce.html"><i class="bx bx-right-arrow-alt"></i>eCommerce</a>
						</li>
						<li> <a href="dashboard-analytics.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
						</li>
						<li> <a href="dashboard-digital-marketing.html"><i class="bx bx-right-arrow-alt"></i>Digital Marketing</a>
						</li>
						<li> <a href="dashboard-human-resources.html"><i class="bx bx-right-arrow-alt"></i>Human Resources</a>
						</li>
					</ul> -->
                </li>

                
                <!-- User management -->
                 <?php if(checkAdmin($udata['type']) == true){ ?>
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src='https://BOXIKART.COM/admin/images/585e4bd7cb11b227491c3397.png'width="50x" style="border-radius:2px;">
                        </div>
                        <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>User Management</div></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="users.php"><i class="bx bx-right-arrow-alt"></i>All Users</a>
                        </li>
                        
                       
                        <li> <a href="adduser.php"><i class="bx bx-right-arrow-alt"></i>Add New</a>
                        <li> <a href="qrpay_pending.php"><i class="bx bx-right-arrow-alt"></i>QR pending <sup style="color:red;">NEW</sup></a>
                        <li> <a href="PendingManualUsers.php"><i class="bx bx-right-arrow-alt"></i>Manual user pending <sup style="color:red;">NEW</sup></a>
                        <li> <a href="BalanceTransfer.php"><i class="bx bx-right-arrow-alt"></i>Balance Transfer <sup style="color:red;">Added</sup></a>
                        </li>
                       

                    </ul>
                </li>
                 <?php } ?>
                <!-- User Management END -->
                <!-- User management -->
                 <?php if($udata['type'] == "distributor" || $udata['type'] == "super_dist" ){ ?>
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><i class="bx bx-user"></i>
                        </div>
                        <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>User Management</div></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="adduser.php"><i class="bx bx-right-arrow-alt"></i>Add New</a></li>
                        <li> <a href="myusers.php"><i class="bx bx-right-arrow-alt"></i>My User List</a></li>
                    </ul>
                </li>
                 <?php } ?>
                <!-- User Management END -->
                <!-- Refer and Earn-->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" width="50ox" style="border-radius:3px;">
                        </div>
                        <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>JO JOIN RAHEGA US KA ID ACTIVE RAHEGA</div></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="https://wa.me/9770346480"><i class="bx bx-right-arrow-alt"></i>JOIN FAST</a>
                        </li>
                        <!--<li> <a href="instant_pan_list.php"><i class="bx bx-right-arrow-alt"></i>PAN LIST</a>-->
                        <!--</li>-->
                    </ul>
                </li>
            
                <!-- Refer and Earn -->
                <!-- FULL HD RC PDF -->
                <li>
                     <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://cdni.iconscout.com/illustration/premium/preview/driving-license-5266729-4397188.png" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger">INSTANT RC</span>FULL HD RC PDF</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="rc_get.php"><i class="bx bx-right-arrow-alt"></i>SERVER 1</a>
                        </li>
                        <li> <a href="Rc_pdf_2.php"><i class="bx bx-right-arrow-alt"></i>SERVER 2</a>
                        </li>
                        <li> <a href="rc_get_list.php"><i class="bx bx-right-arrow-alt"></i> Print List</a>
                        </li>
                        </ul>
                </li>                 
                <!-- Refer and Earn -->
                <!-- FULL HD DL PDF APPLY -->
                
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://cdni.iconscout.com/illustration/premium/preview/driving-license-5266729-4397188.png" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger">INSTANT</span>FULL HD DL PDF</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="DL_Instant_Hkb.php"><i class="bx bx-right-arrow-alt"></i>APPLY</a>
                        </li>
                        <li> <a href="DL_Instant_Hkb_list.php"><i class="bx bx-right-arrow-alt"></i> Print List</a>
                        </li>
                        </ul>
                </li>                
                <!-- Refer and Earn -->
                <!-- JOB CARD APPLY -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://egov.eletsonline.com/wp-content/uploads/2018/08/election-commission-of-india-logo-324FF87C0E-seeklogo.com_.png" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger">INSTANT</span>VOTER TO MOBILE LINK</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="vote_mob_link.php"><i class="bx bx-right-arrow-alt"></i>APPLY</a>
                        </li>
                        <li> <a href="vote_mob_link_list.php"><i class="bx bx-right-arrow-alt"></i> Print List</a>
                        </li>
                        </ul>
                </li>  
                 <!-- PAN MANUAL CARD APPLY  END -->
                 <!-- PAN PDF -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://egov.eletsonline.com/wp-content/uploads/2018/08/election-commission-of-india-logo-324FF87C0E-seeklogo.com_.png" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger">INSTANT</span>VOTER PDF HD</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="vot_org_instant.php"><i class="bx bx-right-arrow-alt"></i> Server 1</a>
                        </li>
                        <li> <a href="vot_org_instant_P.php"><i class="bx bx-right-arrow-alt"></i> Server 2</a>
                        </li>
                        </ul>
                </li>                 
                <!-- Refer and Earn -->
                <!-- JOB CARD APPLY -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://housing.com/news/wp-content/uploads/2023/03/How-does-NREGA-job-card-look-like-01.png" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger">INSTANT</span>JOB CARD</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="Job_Card_hkb.php"><i class="bx bx-right-arrow-alt"></i>APPLY</a>
                        </li>
                        <li> <a href="Job_Card_hkb_list.php"><i class="bx bx-right-arrow-alt"></i> Print List</a>
                        </li>
                        </ul>
                </li>                
                <!-- Refer and Earn -->
                <!-- Search PAN no -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://static.wixstatic.com/media/c33dfa_33ee57f752f343058c54051a71aba137~mv2.png/v1/fill/w_614,h_386,al_c,lg_1,q_85,enc_auto/c33dfa_33ee57f752f343058c54051a71aba137~mv2.png" width="50ox" style="border-radius:3px;">
                        </div>
                       <div class="menu-title" style="color:yellow"><span class="badge bg-danger">INSTANT</span>PAN DETAILS</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    </a>
                    <ul>
                        <li> <a href="pan_details_verify.php"><i class="bx bx-right-arrow-alt"></i>FIND</a>
                        </li>
                        <!--<li> <a href="instant_pan_list.php"><i class="bx bx-right-arrow-alt"></i>PAN LIST</a>-->
                        <!--</li>-->
                    </ul>
                </li>
                <!-- Search Pan No END -->
                <!-- Search PAN no -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://static.wixstatic.com/media/c33dfa_33ee57f752f343058c54051a71aba137~mv2.png/v1/fill/w_614,h_386,al_c,lg_1,q_85,enc_auto/c33dfa_33ee57f752f343058c54051a71aba137~mv2.png" width="50ox" style="border-radius:3px;">
                        </div>
                       <div class="menu-title" style="color:yellow"><span class="badge bg-danger">INSTANT</span>INSTANT PAN FIND</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="instant_pan.php"><i class="bx bx-right-arrow-alt"></i>NEW APPLY</a>
                        </li>
                        <li> <a href="instant_pan_list.php"><i class="bx bx-right-arrow-alt"></i>PAN LIST</a>
                        </li>
                        <?php
						if(checkAdmin($udata['type']) == true){
							?>
                        <li> <a href="instant_pan_list_admin.php"><i class="bx bx-right-arrow-alt"></i>List For
                                Admin</a>
                        </li>
                        <?php
						}
						?>

                    </ul>
                </li>
            
                <!-- Search Pan No END -->
                <!-- PAN MANUAL CARD APPLY PDF -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://static.wixstatic.com/media/c33dfa_33ee57f752f343058c54051a71aba137~mv2.png/v1/fill/w_614,h_386,al_c,lg_1,q_85,enc_auto/c33dfa_33ee57f752f343058c54051a71aba137~mv2.png" width="50ox" style="border-radius:4px;">
                        </div>
                        <div class="menu-title" style="color:yellow"><span class="badge bg-danger">INSTANT</span>PAN MANUAL</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="pan_manual.php"><i class="bx bx-right-arrow-alt"></i> PAN MANUAL</a>
                        </li>
                        <li> <a href="pan_manual_list.php"><i class="bx bx-right-arrow-alt"></i> Print List</a>
                        </li>
                        </ul>
                </li>
                        
                 <!-- PAN MANUAL CARD APPLY  END -->
                 <!-- AADHAR MANUAL CARD APPLY PDF -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://uidai.gov.in/images/langPage/Page-1.svg" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>Aaadhar Advance Fully</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="aadhar_advance_print.php"><i class="bx bx-right-arrow-alt"></i> Server-1</a>
                        </li>
                        <li> <a href="hkb_advance_print.php"><i class="bx bx-right-arrow-alt"></i> Server-2</a>
                        </li>
                        <li> <a href="aadhar_advance_2.php"><i class="bx bx-right-arrow-alt"></i> Server-3</a>
                        </li>
                        <li> <a href="test.php"><i class="bx bx-right-arrow-alt"></i> Server-4</a>
                        </li>
                        <li> <a href="aadhar_advance_list.php"><i class="bx bx-right-arrow-alt"></i> Print List</a>
                        </li>
                        </ul>
                </li>
                 <!-- AADHAR MANUAL CARD APPLY  END -->
              <!-- AADHAR MANUAL CARD APPLY PDF -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://uidai.gov.in/images/langPage/Page-1.svg" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>AADHAAR MANUAL</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="aadharmanual.php"><i class="bx bx-right-arrow-alt"></i>NEW PRINT</a>
                        </li>
                        <li> <a href="aadharmanual_list.php"><i class="bx bx-right-arrow-alt"></i> Manual List</a>
                        </li>
                        </ul>
                </li>
                <!-- Search Pan No END -->
                <!-- AADHAR NO TO PAN PDF -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://uidai.gov.in/images/langPage/Page-1.svg" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>MATCHING DUPLICATE TO AADHAAR NUMBER </div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></a><span class="badge bg-light text-dark">WORK OFF</span> 
                    </a>
                    <ul>
                        <li> <a href="eid_to_aadhaar_no.php"><i class="bx bx-right-arrow-alt"></i>New Apply</a>
                        </li>
                        <li> <a href="eid_to_addhaar_no_list.php"><i class="bx bx-right-arrow-alt"></i>List</a>
                        </li>
                        <?php
						if(checkAdmin($udata['type']) == true){
							?>
                        <li> <a href="eid_toaadhaar_no_admin_list.php"><i class="bx bx-right-arrow-alt"></i>List For
                                Admin</a>
                          </li>
                        <?php
						}
						?>

                    </ul>
                </li>
                <!-- MATCHING DUPLICATE to Aadhaar Number -->
                <!-- EID TO AADHAAR NO FREE -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://uidai.gov.in/images/langPage/Page-1.svg" width="50ox" style="border-radius:3px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger">INSTANT</span>EID TO AADHAAR NO </div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="generated_h.php"><i class="bx bx-right-arrow-alt"></i>SERVER 1</a>
                        </li>
                        <li> <a href="generated_instant.php"><i class="bx bx-right-arrow-alt"></i>SERVER 2</a>
                        </li>
                        <li> <a href="generated_h_list.php"><i class="bx bx-right-arrow-alt"></i> Manual List</a>
                        </li>
                        </ul>
                </li>
                
                 
                 <!-- EID TO AADHAAR NO END -->
                 <!-- AADHAR NO TO PAN PDF -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://uidai.gov.in/images/langPage/Page-1.svg" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>EID TO AADHAR PDF</div><sup style="color:white;">NEW</sup></a><span class="badge bg-light text-dark">WORK OFF(Coming Soon)</span>
                    </a>
                    <ul>
                        <li> <a href="eid_to_aadhaar_pdf.php"><i class="bx bx-right-arrow-alt"></i>New Apply</a>
                        </li>
                        <li> <a href="eid_to_addhaar_list.php"><i class="bx bx-right-arrow-alt"></i>List</a>
                        </li>
                        <?php
						if(checkAdmin($udata['type']) == true){
							?>
                        <li> <a href="eid_toaadhaar_pdf_admin_list.php"><i class="bx bx-right-arrow-alt"></i>List For
                                Admin</a>
                          </li>
                        <?php
						}
						?>

                    </ul>
                </li>                 
                
                <!-- EID TO AADHAAR NO END -->
                <!-- BIOMETIC ISSUE TO AADHAAR NO -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://d1sr9z1pdl3mb7.cloudfront.net/wp-content/uploads/2018/04/13145226/aadhaar-fingerprint.jpeg" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>BIOMETIC ISSUE TO AADHAAR NO</div><sup style="color:white;">NEW</sup></a><span class="badge bg-light text-dark">WORK OFF(Coming Soon)</span>
                    </a>
                    <ul>
                        <li> <a href="biometric_issues_aadhaar_no.php"><i class="bx bx-right-arrow-alt"></i>New Apply</a>
                        </li>
                        <li> <a href="biometric_issues_aadhaar_no_list.php"><i class="bx bx-right-arrow-alt"></i>List</a>
                        </li>
                        <?php
						if(checkAdmin($udata['type']) == true){
							?>
                        <li> <a href="biometric_issues_aadhaar_no_admin_list.php"><i class="bx bx-right-arrow-alt"></i>List For
                                Admin</a>
                          </li>
                        <?php
						}
						?>

                    </ul>
                </li>      
               <!-- User Management END -->
                <!-- AADHAR NO TO PAN PDF -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://uidai.gov.in/images/langPage/Page-1.svg" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>NAME & MOBILE NO SE AADHAAR NO</div><sup style="color:white;">NEW</sup></a><span class="badge bg-light text-dark">Start Service  </span>
                    </a>
                    <ul>
                        <li> <a href="name_to_aadhaar_no.php"><i class="bx bx-right-arrow-alt"></i>New Apply</a>
                        </li>
                        <li> <a href="name_to_aadhaar_no_list.php"><i class="bx bx-right-arrow-alt"></i>List</a>
                        </li>
                        <?php
						if(checkAdmin($udata['type']) == true){
							?>
                        <li> <a href="name_to_aadhaar_no_admin_list.php"><i class="bx bx-right-arrow-alt"></i>List For
                                Admin</a>
                          </li>
                        <?php
						}
						?>

                    </ul>
                </li>

                 <!-- AADHAR LIMIT CROSS -->
                 <!--SMART RATION CARD PDF -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://uidai.gov.in/images/langPage/Page-1.svg" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>RATION CARD TO AADHAAR NO</div><sup style="color:white;">NEW</sup></a><span class="badge bg-light text-dark">20 MINT ME </span>  
                    </a>
                    <ul>
                        <li> <a href="rasan_to_aadhar_pdf.php"><i class="bx bx-right-arrow-alt"></i>New Apply</a>
                        </li>
                        <li> <a href="rasan_to_aadhar_no_list.php"><i class="bx bx-right-arrow-alt"></i>List</a>
                        </li>
                        <?php
						if(checkAdmin($udata['type']) == true){
							?>
                        <li> <a href="rasan_to_aadhar_no_admin_list.php"><i class="bx bx-right-arrow-alt"></i>List For
                                Admin</a>
                          </li>
                        <?php
						}
						?>

                    </ul>
                </li>                
                 <!-- AADHAR MANUAL CARD APPLY  END -->
                 <!-- PAN MANUAL CARD APPLY PDF -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://d3lzcn6mbbadaf.cloudfront.net/media/details/ECf_7OHWIzA.jpg" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>VOTER ADVANCE </div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="voter_adv_hkb.php"><i class="bx bx-right-arrow-alt"></i>NEW  APPLY</a>
                        </li>
                        <li> <a href="voter_adv_hkb_list.php"><i class="bx bx-right-arrow-alt"></i> Print List</a>
                        </li>
                        </ul>
                </li>
                 <!-- AADHAR MANUAL CARD APPLY  END -->
                 <!-- AAYUSHMAN CARD -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://upload.wikimedia.org/wikipedia/en/1/1a/Ayushman_Bharat_logo.png" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger">INSTANT</span>AAYUSHMAN PRINT HD </div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="aaayushmanprint.php"><i class="bx bx-right-arrow-alt"></i>SERVER-1</a>
                        </li>
                        <li> <a href="aaayushmancard_find.php"><i class="bx bx-right-arrow-alt"></i>SERVER-2</a>
                        </li>
                        <li> <a href="downlord1.php"><i class="bx bx-right-arrow-alt"></i> Print List</a>
                        </li>
                        </ul>
                </li>                
                
                <!-- Apply Epic Number to Pdf  END -->
                <!-- PAN MANUAL CARD APPLY PDF -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://tnepds.co.in/wp-content/uploads/2022/11/Driving-Licence-Download-Kaise-Kare-%E0%A4%98%E0%A4%B0-%E0%A4%AC%E0%A5%88%E0%A4%A0%E0%A5%87-%E0%A4%9A%E0%A5%81%E0%A4%9F%E0%A4%95%E0%A4%BF%E0%A4%AF%E0%A5%8B-%E0%A4%AE%E0%A5%87%E0%A4%82-%E0%A4%A1%E0%A4%BE%E0%A4%89%E0%A4%A8%E0%A4%B2%E0%A5%8B%E0%A4%A1.jpg" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>DRIVING LICENSE PDF</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>
                    </a>
                    <ul>
                        <li> <a href="dl_print.php"><i class="bx bx-right-arrow-alt"></i>New Print<sup style="color:red;">NEW</sup></a>
                        </li>
                        <li> <a href="dllist.php"><i class="bx bx-right-arrow-alt"></i>List</a>
                        </li>
                        
                        </li>
                        <?php
						
						?>


                    </ul>
                </li>
               
                         
                
                 <!-- EID TO AADHAAR NO END -->
                <!-- DL NUMBER FIND INSTANT -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://cdni.iconscout.com/illustration/premium/preview/driving-license-5266729-4397188.png" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>DL NUMBER FIND</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1> 
                    </a>
                    <ul>
                        <li> <a href="dl_no_find_instant.php"><i class="bx bx-right-arrow-alt"></i>New Apply<sup style="color:red;">NEW</sup></a>
                        </li>
                        <li> <a href="dl_no_find_list.php"><i class="bx bx-right-arrow-alt"></i>List</a>
                        </li>
                        <?php
						if(checkAdmin($udata['type']) == true){
							?>
                        <li> <a href="dl_no_find_admin_list.php"><i class="bx bx-right-arrow-alt"></i>List For
                                Admin</a>
                        </li>
                        <?php
						}
						?>

                    </ul>
                </li>
                <li>                    
                <!-- EID TO AADHAAR END -->
                <!-- NAME TO AADHAAR START -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://cdni.iconscout.com/illustration/premium/preview/driving-license-5266729-4397188.png" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger">INSTANT</span>LEARNING PASS</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    <ul>
                        <li> <a href="bapply.php"><i class="bx bx-right-arrow-alt"></i>New Apply<sup style="color:red;">NEW</sup></a>
                        </li>
                        <li> <a href="b_list.php"><i class="bx bx-right-arrow-alt"></i>List</a>
                        </li>
                        <?php
						if(checkAdmin($udata['type']) == true){
							?>
                        <li> <a href="b_list_admin.php"><i class="bx bx-right-arrow-alt"></i>List For
                                Admin</a>
                        </li>
                        <?php
						}
						?>

                    </ul>
                </li>
                <li>
                <!-- EID TO AADHAAR END -->
                <!-- INSTANT RASAN CARD PDF -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://pradhanmantrivikasyojana.in/wp-content/uploads/2018/01/Maharashtra-Smart-Ration-Card.png" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>RASAN CARD PDF</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>
                    </a>
                    <ul>
                        <li> <a href="Ration_Pdf_hkb.php"><i class="bx bx-right-arrow-alt"></i>New Apply</a>
                        </li>
                        <li> <a href="Ration_Pdf_hkb_list.php"><i class="bx bx-right-arrow-alt"></i>List</a>
                        </li>
                        
                        </li>
                        <?php
						
						?>


                    </ul>
                </li>
                              
               
               <!-- User Management END -->
                <!-- EID TO ADDHAAR NO START -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://pradhanmantrivikasyojana.in/wp-content/uploads/2018/01/Maharashtra-Smart-Ration-Card.png" width="50ox" style="border-radius:4px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>AADHAR NO TO RASAN CARD</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>
                    </a>
                    <ul>
                        <li> <a href="aadhaar_pdf.php"><i class="bx bx-right-arrow-alt"></i>New Apply</a>
                        </li>
                        <li> <a href="aadhaar_pdf_list.php"><i class="bx bx-right-arrow-alt"></i>List</a>
                        </li>
                        <?php
						if(checkAdmin($udata['type']) == true){
							?>
                        <li> <a href="aadhaar_pdf_admin_list.php"><i class="bx bx-right-arrow-alt"></i>List For
                                Admin</a>
                        </li>
                        <?php
						}
						?>

                    </ul>
                </li>
            
                
                <!-- Refer and Earn -->
                  <!-- Refer and Earn-->
                
                <li
                <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                    <a href="wa.php" class="">
                        
                       <div class="parent-icon"><img src="data:image/png;base64,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" class="card-img-top" alt="..." style="width:50px;height:35px;">
                        </div>
                <div class="menu-title" style="color:yellow">HOSTING YAHA SE NEW WEBSITE KE LIYE</div>
                    </a>
                   
                </li>
                 <li>
                <!-- Refer and Earn -->
                  <!-- Refer and Earn-->
                
                <li
                <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                    <a href="youtube.php" class="">
                        
                       <div class="parent-icon"><img src="https://www.pngall.com/wp-content/uploads/11/World-Wide-Web-Address.png" class="card-img-top" alt="..." style="width:50px;height:35px;">
                        </div>
                <div class="menu-title" style="color:yellow">NEW WEBSITE BANBANA HAI</div>
                    </a>
                   
                </li>
                 <li>                                      
                
                <!-- Apply Birth/Death Certificate  END -->
                <!-- Wallet management START -->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://BOXIKART.COM/admin/images/Screenshot 2024-01-14 225748.png" width="50ox" style="border-radius:3px;">
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>Wallet Management</div>
                    </a>
                    <ul>
                        <li> <a href="wallet.php"><i class="bx bx-right-arrow-alt"></i>Add balance</a>
                        </li>
                        <li> <a href="wallet_history.php"><i class="bx bx-right-arrow-alt"></i>Wallet History</a>
                        </li>
                        
                    </ul>
                </li>
                <!-- Wallet Management END -->
                <!-- Settings -->
                <?php if(checkAdmin($udata['type']) == true){
				    ?>
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><i class="bx bx-cog"></i>
                        </div>
                         <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>Website Settings</div>
                    </a>
                    <ul>
                        <li> <a href="settings.php"><i class="bx bx-right-arrow-alt"></i>Website Details</a>
                        </li>
                        <li> <a href="pricing.php"><i class="bx bx-right-arrow-alt"></i>Pricing</a>
                        </li>
                        <li> <a href="SetComission.php"><i class="bx bx-right-arrow-alt"></i>Set Comission</a>
                        </li>
                        <li> <a href="notifications.php"><i class="bx bx-right-arrow-alt"></i>Notifications</a></li>
                        <li> <a href="LogoUpdate.php"><i class="bx bx-right-arrow-alt"></i>Update Logo</a></li>
                        
                    
                       

                    </ul>
                </li>
                 <?php } ?>
                <!-- Settings -->
                <!-- Refer and Earn-->
                <li>
                    <a href="javascript:void(0)" style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(56,3,69,1) 12%, rgba(130,8,115,1) 48%, rgba(221,13,171,1) 100%, rgba(150,77,198,1) 100%, rgba(0,212,255,1) 100%);" !important;"="">
                        <div class="parent-icon"><img src="https://static.wixstatic.com/media/c33dfa_33ee57f752f343058c54051a71aba137~mv2.png/v1/fill/w_614,h_386,al_c,lg_1,q_85,enc_auto/c33dfa_33ee57f752f343058c54051a71aba137~mv2.png" width="50ox" style="border-radius:3px;">
                        </div>
                       <div class="menu-title" style="color:yellow"><span class="badge bg-danger"></span>Refer and Earn 5₹</div><img src="https://media3.giphy.com/media/xMf5hkKDphtZrgG0zb/giphy.gif?cid=ecf05e47o7rba4nxset7mlh8k6xr38zox69brwu7n5kxjej8&ep=v1_gifs_related&rid=giphy.gif&ct=g" alt="Girl in a jacket" width="50" height="20"></sup></h1>  
                    </a>
                    </a>
                    <ul>
                        <li> <a href="Refer and Earn 5₹"><i class="bx bx-right-arrow-alt"></i>EARN MONEY</a>
                        </li>
                <!-- Refer and Earn -->
               <!-- Content Shifted to sidebarextra.php -->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                   <?php
                   if(isset($_GET['gettoAdmin']) && $_GET['session'] == 'true'){
                    loginAsAdmin();
                   }
                   
                        if(isset($_SESSION['adminasuser'])== true && $_SESSION['adminusername']!=NULL){
                                ?>
                                <!-- <form action="" method="POST"> -->
                                    <div class="search-bar flex-grow-1">
                                        <div class="position-relative search-bar-box">
                                            <a href="?gettoAdmin=1&session=true" type="submit" class="btn btn-success">Go Back to Admin Panel</a>
                                        </div>
                                    </div>
                                <!-- </form> -->
                               
                           
                                <?php 
                            }else{
                                ?>
                                <div class="search-bar flex-grow-1">

                            <div class="position-relative search-bar-box">
                                <input type="text" class="form-control search-control" placeholder="Type to search...">
                                <span class="position-absolute top-50 search-show translate-middle-y"><i
                                        class='bx bx-search'></i></span>

                                <span class="position-absolute top-50 search-close translate-middle-y"><i
                                        class='bx bx-x'></i></span>

                            </div>

                            </div>
                                <?php
                            }
                   ?>
                    <div style="margin-right:12px;" class="text-success">
                        <style>
                        #time {
                            color: white;
                            font-size: 18px;
                            font-family: "Times New Roman", Times, serif;
                        }
                        </style>
                        <a id="time"></a>
                        <script>
                        var timeDisplay = document.getElementById("time");

                        function refreshTime() {
                            var dateString = new Date().toLocaleString("en-IN", {
                                timeZone: "Asia/Kolkata"
                            });
                            var formattedString = dateString.replace(", ", " - ");
                            timeDisplay.innerHTML = formattedString;
                        }

                        setInterval(refreshTime, 1000);
                        </script>
                    </div>
                    <a class="btn btn-warning" href="wallet.php">Wallet: <?php 
                    if($udata['balance']==NULL){
                        echo "₹". "0";
                    }else{
                        echo "₹". $udata['balance'];

                    }
                    ?></a>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <!-- <li class="nav-item mobile-search-icon">
								<a class="nav-link" href="#">	<i class='bx bx-search'></i>
								</a>
							</li> -->
                            <!-- <li class="nav-item dropdown dropdown-large">
								<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
								</a>
								<div class="dropdown-menu dropdown-menu-end">
									<div class="row row-cols-3 g-3 p-3">
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-cosmic text-white"><i class='bx bx-group'></i>
											</div>
											<div class="app-title">Teams</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-burning text-white"><i class='bx bx-atom'></i>
											</div>
											<div class="app-title">Projects</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-lush text-white"><i class='bx bx-shield'></i>
											</div>
											<div class="app-title">Tasks</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-kyoto text-dark"><i class='bx bx-notification'></i>
											</div>
											<div class="app-title">Feeds</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-blues text-dark"><i class='bx bx-file'></i>
											</div>
											<div class="app-title">Files</div>
										</div>
										<div class="col text-center">
											<div class="app-box mx-auto bg-gradient-moonlit text-white"><i class='bx bx-filter-alt'></i>
											</div>
											<div class="app-title">Alerts</div>
										</div>
									</div>
								</div>
							</li> -->
                             <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                        class="alert-count">7</span>
                                    <i class='bx bx-bell'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i
                                                        class="bx bx-group"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Customers<span
                                                            class="msg-time float-end">14 Sec
                                                            ago</span></h6>
                                                    <p class="msg-info">5 new user registered</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i
                                                        class="bx bx-cart-alt"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Orders <span class="msg-time float-end">2
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">You have recived new orders</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i
                                                        class="bx bx-file"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">The pdf files generated</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i
                                                        class="bx bx-send"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Time Response <span
                                                            class="msg-time float-end">28 min
                                                            ago</span></h6>
                                                    <p class="msg-info">5.1 min avarage time response</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-info text-info"><i
                                                        class="bx bx-home-circle"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Product Approved <span
                                                            class="msg-time float-end">2 hrs ago</span></h6>
                                                    <p class="msg-info">Your new product has approved</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i
                                                        class="bx bx-message-detail"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Comments <span class="msg-time float-end">4
                                                            hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">New customer comments recived</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i
                                                        class='bx bx-check-square'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Your item is shipped <span
                                                            class="msg-time float-end">5 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">Successfully shipped your item</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i
                                                        class='bx bx-user-pin'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New 24 authors<span
                                                            class="msg-time float-end">1 day
                                                            ago</span></h6>
                                                    <p class="msg-info">24 new authors joined last week</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i
                                                        class='bx bx-door-open'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Defense Alerts <span
                                                            class="msg-time float-end">2 weeks
                                                            ago</span></h6>
                                                    <p class="msg-info">45% less alerts last 4 weeks</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Notifications</div>
                                    </a>
                                </div>
                            </li> 
                            
                            <li class="nav-item dropdown dropdown-large">
                                  <?php
                if(checkAdmin($udata['type']) == true){
                    ?>
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                        class="alert-count"><?=  $query_noforadmin;?></span>
                                    <i class='bx bx-comment'></i>
                                </a>
                           
                <?php
                }else{
                    ?>
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                        class="alert-count"><?=  $query_foruser;?></span>
                                    <i class='bx bx-comment'></i>
                                </a>
                                <?php
                }
                ?>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Messages</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-message-list">
                                        <?php
$res = mysqli_query($ahk_conn,"SELECT * FROM contact  WHERE email='".$udata['email']."'");
if(mysqli_num_rows($res)>0){
    $x=0;
    while($mdata = mysqli_fetch_assoc($res)){
        $x ++;
        ?>
                                        <div class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                               <p class="msg-info"><?= $mdata['reply'];?></p>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name"<?php $mdata['mess'];?>  <span
                                                            class="msg-time float-end"><?php $mdata['date'];?> </span></h6>
                                                    <p class="msg-info"><?= $mdata['reply'];?></p>
                                                </div>
                                            </div>
                                        </div>
                                     
                                        <?php
       
    }
}
?>
                                    
                                        
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li> 
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../template/ahkweb/assets/images/avatars/avatar-2.png" class="user-img"
                                alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0"><?php  echo $udata['name'];  ?></p>
                                <p class="designattion mb-0">ADHIKARI</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.php"><i
                                        class="bx bx-user"></i><span>Profile</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-cog"></i><span>Settings</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class='bx bx-home-circle'></i><span>Dashboard</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class='bx bx-dollar-circle'></i><span>Earnings</span></a>
                            </li>
                            <li><a class="dropdown-item" href="javascript:;"><i
                                        class='bx bx-download'></i><span>Downloads</span></a>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li><a class="dropdown-item" href="../includes/logout.php"><i
                                        class='bx bx-log-out-circle'></i><span>Logout</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
<script language="JavaScript">
//Disable right mouse click Script

var message="Lore Le Lo Madharchod";

function clickIE4(){
if (event.button==2){
alert(message);
return false;
 }
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("alert(message);return false")

</script>

<script>
$('#exampleModal').modal('show');
</script>            
        </header>