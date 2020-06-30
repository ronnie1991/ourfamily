
 <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="profile"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                    <li><a href="#><i class="mdi-action-settings"></i> Settings</a>
                                    </li>                                    
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                                    </li>
                                    <li><a href="logout"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?= $singelMbrDtls['name']?>  <i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal"><?= $TreeSlNo?></p>
                            </div>
                        </div>
                    </li>
                    <li class="bold"><a href="dashboard" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                    </li>
                    <?php if($split2!='K') { ?>
                   
                     <li class="li-hover"><p class="ultra-small margin more-text">For Joining New Member</p></li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-av-recent-actors"></i> Register Of Parent Mbr</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="add_new_parent_mbr">Enroll new member</a>
                                        </li>  
                                        </li>                                        
                                    </ul>
                                </div>
                            </li>
                            
                        </ul>
                    </li>  
                    <?php } ?>


                    <li class="li-hover"><p class="ultra-small margin more-text">Tree Level</p></li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-av-recent-actors"></i> All Tree Member</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="all_tree_member">View All Tree Member </a>
                                        </li>  
                                        </li>                                        
                                    </ul>
                                </div>
                            </li>
                            
                        </ul>
                    </li>
                     <li class="li-hover"><p class="ultra-small margin more-text">Donation Amount</p></li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-av-recent-actors"></i> Disbrusment of Donation</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="list_donation_disbrusment">All Disbrusment </a>
                                        </li>  
                                        </li>                                        
                                    </ul>
                                </div>
                            </li>
                            
                        </ul>
                    </li>
                    <li class="li-hover"><p class="ultra-small margin more-text">Wallet</p></li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-av-recent-actors"></i> Wallet Account</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="list_wallet">Review Wallet </a>
                                        </li>  
                                        </li>                                        
                                    </ul>
                                </div>
                            </li>
                            
                        </ul>
                    </li>
                             
                    
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->