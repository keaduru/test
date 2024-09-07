<!DOCTYPE html>
<html lang="tr">
<?php require "views/contents/head.php"?>

<body class="medium-font">



    <div class="body-container">

        <div class="main-container">
            <div class="top-container">
                <div class="left-top">
                    <ul>
                        <li class="orangedarkfade"><a href="panel/login.php">Yönetici Paneli</a></li>
                        <li class="orangedarkfade"> Hakkımızda </li>
                        
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
            <div class="content-container">
        
                <h3 class="bordershadow">Son Eklenenler ve Dikkat Çekenler</h3>
                    <div class="card-main-container">
                    <div class="w-50 cards">
                        <div class="card-container-big" data-image="Assets/images/selale.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="new">
                                <i class="fa-solid fa-fire-flame-curved">
                                </i>
                                NEW
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                        
                        
                            </div>
                        </div>
                        </div>
                        
                    <div class="w-50 cards">
                            <div class="card-container-md" data-image="Assets/images/orman.jpeg">
                                <span><i class="fa-regular fa-eye">123</i></span>
                                <a href="#" class="badge green">Teknoloji</a>
                                <div class="favori">
                                    <i class="fa-solid fa-fire-flame-curved"></i>
                                    </div>
                                    <div class="card">
                                        
                                        <div class="title">
                                            <h2>DURU AKSOY</h2>
                                        </div>
                                        <div class="card-content">
                                            <p>Seni çok seviyorum!!</p>
                                        </div>
                                        <div class="bilgi">
                                            <ul>
                                                <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                                <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                                <li><i class="fa-regular fa-clock"></i>30dk</li>
                                                <li><i class="fa-regular fa-eye"></i>123</li>
                                            </ul>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                        
                                <div class="card-container-sm" data-image="Assets/images/pnrm.jpeg">
                                    <span><i class="fa-regular fa-eye">123</i></span>
                                    <a href="#" class="badge green">Teknoloji</a>
                                    <div class="favori">
                                        <i class="fa-solid fa-fire-flame-curved"></i>
                                    </div>
                                    <div class="card">
                                        
                                        <div class="title">
                                            <h2>DURU AKSOY</h2>
                                        </div>
                                        <div class="card-content">
                                            <p>Seni çok seviyorum!!</p>
                                        </div>
                                        <div class="bilgi">
                                            <ul>
                                                <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                                <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                                <li><i class="fa-regular fa-clock"></i>30dk</li>
                                                <li><i class="fa-regular fa-eye"></i>123</li>
                                            </ul>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <div class="card-container-sm" data-image="Assets/images/dodo.jpeg">
                                    <span><i class="fa-regular fa-eye">123</i></span>
                                    <a href="#" class="badge green">Teknoloji</a>
                                    <div class="favori">
                                        <i class="fa-solid fa-fire-flame-curved"></i>
                                    </div>
                                    <div class="card">
                                        
                                        <div class="title">
                                            <h2>DURU AKSOY</h2>
                                        </div>
                                        <div class="card-content">
                                            <p>Seni çok seviyorum!!</p>
                                        </div>
                                        <div class="bilgi">
                                            <ul>
                                                <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                                <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                                <li><i class="fa-regular fa-clock"></i>30dk</li>
                                                <li><i class="fa-regular fa-eye"></i>123</li>
                                            </ul>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                    </div>
                </div class="card-main-container">
                        
                
                        
                        
                
                
                </div>
                
                
                
            </div>
            <hr>
           <div class="mid-container">
                
                 <div id="content-slider">

                    <div class="w-100 cards">
                        <div class="card-container-main" data-image="Assets/images/orman.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                                </div>
                                <div class="card">
                                    
                                    <div class="title">
                                        <h2>DURU AKSOY</h2>
                                    </div>
                                    <div class="card-content">
                                        <p>Seni çok seviyorum!!</p>
                                    </div>
                                    <div class="bilgi">
                                        <ul>
                                            <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                            <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                            <li><i class="fa-regular fa-clock"></i>30dk</li>
                                            <li><i class="fa-regular fa-eye"></i>123</li>
                                        </ul>
                                    </div>
                                    
                                    
                                </div>
                        </div>
                
                        <div class="card-container-main" data-image="Assets/images/pnrm.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="card-container-main" data-image="Assets/images/dodo.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="card-container-main" data-image="Assets/images/dodo.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="card-container-main" data-image="Assets/images/dodo.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="card-container-main " data-image="Assets/images/dodo.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="card-container-main hidden" data-image="Assets/images/dodo.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="card-container-main hidden" data-image="Assets/images/dodo.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="card-container-main hidden" data-image="Assets/images/dodo.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="card-container-main hidden" data-image="Assets/images/dodo.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="card-container-main hidden" data-image="Assets/images/selale.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="card-container-main hidden" data-image="Assets/images/orman.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div>
                        <div class="card-container-main hidden" data-image="Assets/images/orman.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div> 
                        <div class="card-container-main hidden" data-image="Assets/images/selale.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div>                        
                        <div class="card-container-main hidden" data-image="Assets/images/pnrm.jpeg">
                            <span><i class="fa-regular fa-eye">123</i></span>
                            <a href="#" class="badge green">Teknoloji</a>
                            <div class="favori">
                                <i class="fa-solid fa-fire-flame-curved"></i>
                            </div>
                            <div class="card">
                                
                                <div class="title">
                                    <h2>DURU AKSOY</h2>
                                </div>
                                <div class="card-content">
                                    <p>Seni çok seviyorum!!</p>
                                </div>
                                <div class="bilgi">
                                    <ul>
                                        <li data-url="find/"><i class="fa-regular fa-pen-to-square"></i> Kenan Aksoy</li>
                                        <li><i class="fa-regular fa-calendar-days"></i> 05/05/2020</li>
                                        <li><i class="fa-regular fa-clock"></i>30dk</li>
                                        <li><i class="fa-regular fa-eye"></i>123</li>
                                    </ul>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>

                    <div class="loadmore">
                        <button class="btn primary" id="load-more-btn">Daha Fazla Göster</button>
                        <button class="btn ice" id="load-less-btn">Daha Az Göster</button>
                    </div>

           

                 </div>

                 <div id="sidebar">

                    <div class="sidebar-categories">
                        <h4>Öne Çıkan Konular</h4>
                        <hr>
                        <br>

                        <ul>
                            <li class="badge md primaryfade">Teknoloji</li>
                            <li class="badge md purplefade">Güncel Konular</li>
                            <li class="badge md pinkfade">Kitap</li>

                            
                        </ul>

                    </div>

                    <div class="sidebar-newcont">

                        <h4>Öne Çıkan İçerikler</h4>


                        <div class="newcont">
                            <div class="newcontimg">
                                <img src="Assets/images/orman.jpeg" alt="" srcset="">
                                
                            </div>
                            <div class="newconttitle">    
                                <h6>İş ajansının artıları ve eksileri</h6>
                                <p>
                                    <i class="fa-regular fa-calendar-days fa-2xs">05/05/2020</i> 
                                </p>
                            </div>
                        
                        </div>
                        <div class="newcont">
                            <div class="newcontimg">
                                <img src="Assets/images/denizmanzara.jpeg" alt="" srcset="">
                                
                            </div>
                            <div class="newconttitle">    
                                <h6>İş ajansının artıları ve eksileri</h6>
                                <p>
                                    <i class="fa-regular fa-calendar-days fa-2xs">05/05/2020</i> 
                                </p>
                            </div>
                        
                        </div>


                    </div>

                    <div class="advertisement">

                    </div>


                 </div>

                 
           </div>
           <hr>

            
        
        
        
        
        
        </div>


    </div>

    <div class="advertisement">

    </div>





</body>

</html>