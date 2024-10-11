<hr><br>
            <nav>
                
                
                <div class="left-menu">
                    
                    <div id="bar">
                        
                        <i class="fa-solid fa-bars fa-xl"></i>
                        
                        
                    </div>
                    
                    <div id="slide-menu">
                        <i id="close-menu" class="fas fa-times"></i>
                    </div>
                    
                    
                    <div class="logo">
                        <i class="fa-solid fa-share-nodes fa-xl"></i>    
                        <div class="markname">
                            <span><a href="AnaSayfa">LogoRitmik</a></span>
                            <div class="line"></div> 
                        </div>
                        
                        
                    </div>
                    
                    
                    
                    
                        <div id="menu">
                            
                            
                            
                            <ul>
                                <li data-target="#section-categories">Kategoriler</li>
                                <li data-target="#section-icerikler">İçerikler</li>
                                <li data-target="#section-socialmedia">Sosyal Medya</li>
                                <li data-target="#section-profile">Kullanıcılar</li>
                            </ul>
                            
                        </div>
                        <div id="butons">

                        </div>
                    
                
                
                        <div class="right-menu">
                            <div id="profile-container">
                                <img src="<?php echo($_SESSION['url']) ?>" alt="" id="profileimg">
                                <p id="profile-name"><?php echo(ucfirst($_SESSION['username'])) ?></p>
                                <div id="dropdown-menu" class="dropdown" style="display: none;">
                                    <p class="welcome">Hoşgeldin <?php echo(ucfirst($_SESSION['isim'])) ?></p>
                                    <p class="role">Şu An Rol'ün: <?php echo($_SESSION['yetki']) ?></p>
                                    <p class="username">Kullanıcı Adın: <?php echo($_SESSION['username']) ?></p>
                                    <form method="post">
                                        <button type="submit" name="logout" class="btn red">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                
            </nav>
            <hr><br>
            <div id="arrowup">
                <i class="fa-solid fa-circle-arrow-up fa-2xl"></i>
            </div>