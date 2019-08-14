<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"> <span> Disbursement Management System</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo $userRow['u_path']   ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $userRow['name']; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Dashboard <span class="fa fa-chevron-down"></span></a>
                  </li>

                  <li><a href="add_supplier.php"><i class="fa fa-edit"></i> Add Supplier  <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="add_product.php"><i class="fa fa-edit"></i> Add Product  <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="add_order.php"><i class="fa fa-edit"></i> New order  <span class="fa fa-chevron-down"></span></a>
                  </li>
                  
                  <li><a href="orders_information.php"><i class="fa fa-desktop"></i> Orders details <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="suppliers_information.php"><i class="fa fa-desktop"></i> Supplier details <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="products_information.php"><i class="fa fa-desktop"></i> Products details <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="users_information.php"><i class="fa fa-desktop"></i> Users details <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a href="logout.php"><i class="fa fa-desktop"></i>Log out <span class="fa fa-chevron-down"></span></a>
                  </li>
                </ul> 
              </div>

            </div>
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $userRow['u_path']   ?>" alt=""><?php echo $userRow['u_first']; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="logout.php?logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->