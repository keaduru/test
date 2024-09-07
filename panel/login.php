<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../Style/style.css">
    <script src="../Assets/jqery/jquery.js"></script>
    <script src="js/app.js"></script>
    <link rel="stylesheet" href="../Assets/fontawasome/css/all.min.css">


    <title>Kullanıcı Paneli Giriş Sayfası</title>
</head>
<body>


    <div class="body-container">

        <div class="main-container">
            <div class="top-container">
                <div class="left-top">
                    <ul>

                    <li class="btn orangedark"><a href="../index.php">LogoRitmik.com'a Geri Dön</a></li>

                        
                    </ul>
                </div>
                
                <div class="right-top">
                    <div id="themecolor">
                        <i class="fa-solid fa-circle-half-stroke fa-lg" style="color: #dc831c;"></i>      
                    </div>
                    <div class="fontbtn">
                        <input type="radio" id="option1" name="fontSize" value="small" class="radio-btn">
                        <label for="option1" class="radio-label">A-</label>
                        
                        <input type="radio" id="option2" name="fontSize" value="medium" class="radio-btn" checked>
                        <label for="option2" class="radio-label">A</label>
                        
                        <input type="radio" id="option3" name="fontSize" value="large" class="radio-btn">
                        <label for="option3" class="radio-label">A+</label>
                    </div>
                    <div id="brands">
                        <i class="fa-brands fa-square-facebook fa-lg"></i>
                        <i class="fa-brands fa-square-twitter fa-lg "></i>
                        <i class="fa-brands fa-square-youtube fa-lg"></i>
                    </div>
                </div>
                
            </div>
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
                            <li >Ana Sayfa</li>
                            <li >Yazılar</li>
                            <li >Medya</li>
                            <li >İletişim</li>
                        </ul>
                        
                    </div>
                    <div id="butons">
                        
                        <buton href="" class="btn red">Abone Ol</buton>
                        <a id="ara"><i class="fa-solid fa-magnifying-glass"></i>
                            <div id="ara_input">
                                <form id="ara_form" action="post">
                                    <input id="input_text" type="search" placeholder="ARANACAK KELİME">
                                    <input id="input_buton" type="button" value="ARA">
                                </form>
                            </div>
                            
                        </a>
                        
                        
                    </div>
                </div>
                
                
                
                
                <div class="right-menu">
                    
                </div>
                
            </nav>
            <hr><br>
            <div id="arrowup">
                <i class="fa-solid fa-circle-arrow-up fa-2xl"></i>
            </div>

            <hr>
           <div class="mid-container">
                
                 <div id="content-slider">




           

                 </div>

                 <div id="sidebar">

                

                 </div>

                 
           </div>
           <hr>

            
        
        
        
        
        
        </div>


    </div>

</body>
</html>