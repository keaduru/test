$(document).ready(function(){


//#region font size and margin
    function adjustFontSize() {
        $('body').removeClass('small-font medium-font large-font');
        $('input[name="fontSize"]').prop('checked',false);
        var screenWidth = $(window).width();

        if (screenWidth < 600) {
            $('body').addClass('small-font');
            $('input[name="fontSize"][value="small"]').prop('checked', true);
            $('.body-container').css('margin','10px 20px');
            $('.footer-container').css('margin','10px 0px');
            $('#menu').hide();
            $('#bar').show();
        } else if (screenWidth >= 600 && screenWidth < 900) {
            $('body').addClass('medium-font');
            $('input[name="fontSize"][value="medium"]').prop('checked', true);
            $('.body-container').css('margin','10px 70px');
            $('.footer-container').css('margin','10px 0px');
            $('#menu').hide();
            $('#bar').show();
        } else if (screenWidth >= 900 && screenWidth < 1300) {
            $('body').addClass('medium-font');
            $('input[name="fontSize"][value="medium"]').prop('checked', true);
            $('.body-container').css('margin','10px 70px');
            $('.footer-container').css('margin','10px 70px');
            $('#menu').show();
            $('#bar').hide();
        } 
        
        
        else if (screenWidth >= 1300) {
            $('body').addClass('large-font');
            $('input[name="fontSize"][value="large"]').prop('checked', true);
            $('.body-container').css('margin','10px 13.601%');
            $('.footer-container').css('margin','10px 13.601%');
            $('#menu').show();
            $('#bar').hide();
        }
    }

    // İlk yüklemede font boyutunu ayarla
    adjustFontSize();

    // Pencere yeniden boyutlandırıldığında font boyutunu yeniden ayarla
    $(window).resize(function() {
        adjustFontSize();
        //console.log($(window).width());
    });

    $('input[name="fontSize"]').change(function() {
        $('body').removeClass('small-font medium-font large-font');
        
        if (this.value === 'small') {
            $('body').addClass('small-font');
        } else if (this.value === 'medium') {
            $('body').addClass('medium-font');
        } else if (this.value === 'large') {
            $('body').addClass('large-font');
        }
    });

    //#endregion

//#region dark-light mode
    // Temayı kontrol et ve yükle
    function loadTheme() {
        var savedTheme = sessionStorage.getItem('theme'); // localStorage yerine sessionStorage kullanıyoruz
        var currentDate = new Date();
        var hours = currentDate.getHours();

        // Eğer daha önce bir tema kaydedildiyse, onu kullan
        if (savedTheme) {
            $('body').removeClass('light-mode dark-mode').addClass(savedTheme);
        } else {
            // Eğer tema kaydedilmemişse, saat dilimine göre tema ayarla
            if (hours > 19 || hours < 8) {
                $('body').addClass('dark-mode');
            } else {
                $('body').addClass('light-mode');
            }
        }
    }

    loadTheme();

    // Tema seçimini kaydet ve uygula
    $("#themecolor").on("click", function() {
        var $body = $('body');
        var bodyClasses = $body.attr('class').split(' ');
        var newTheme;

        if (bodyClasses.includes('light-mode')) {
            // light-mode'dan dark-mode'a geç
            $body.removeClass('light-mode').addClass('dark-mode');
            newTheme = 'dark-mode';
        } else {
            // dark-mode'dan light-mode'a geç
            $body.removeClass('dark-mode').addClass('light-mode');
            newTheme = 'light-mode';
        }

        // Yeni temayı sessionStorage'a kaydet
        sessionStorage.setItem('theme', newTheme);
    });



//#endregion
$('.line').css('width', '100%');

 


//#region slide menü

var menuContent = $("#menu").html();
console.log(menuContent);
$("#slide-menu").append(menuContent);
$("#slide-menu li").addClass('btn purple');

$("#bar").on("click", function() {
    var $menu = $("#slide-menu");
    if ($menu.css('left') === '-350px') {
        $menu.css('left', '0');
    } else {
        $menu.css('left', '-350px');
    }
});
$("#close-menu").on("click", function() {
    var $menu = $("#slide-menu");
    if ($menu.css('left') === '-350px') {
        $menu.css('left', '0');
    } else {
        $menu.css('left', '-350px');
    }
});

$(document).on("click", function(e) {
    if (!$(e.target).closest("#slide-menu, #bar").length) {
        $("#slide-menu").css("left", "-250px");
    }
});

//#endregion 


//#region arrow up
$('#arrowup').hide();

// Sayfanın kaydırma olayı gerçekleştiğinde
$(window).scroll(function() {
    // Sayfanın kaydırma mesafesini al
    var scrollTop = $(window).scrollTop();

    // 300 pikseldan fazla kaydırılmışsa #arrowup'u göster
    if (scrollTop > 300) {
        $('#arrowup').fadeIn(1000);
    } else {
        $('#arrowup').fadeOut(1000);
    }
});

// #arrowup tıklandığında sayfayı yukarı kaydır
$('#arrowup').click(function() {
    $('html, body').animate({ scrollTop: 0 }, 600);
});


//#endregion

//#region arama butonu sakla göster

    $('#ara').on('click', function(e) {
        e.stopPropagation(); // Tıklamayı durdurur, aksi takdirde dış tıklama olayını tetikler
        $('#ara_input').toggle();
    });

    $(document).on('click', function(e) {
        // Eğer tıklama #ara veya #ara_input içinde değilse
        if (!$(e.target).closest('#ara').length && !$(e.target).closest('#ara_input').length) {
            $('#ara_input').hide();
        }
    });

    // #ara_input içine tıklama olayını da durdur
    $('#ara_input').on('click', function(e) {
        e.stopPropagation();
    });
    
    //#endregion


//#region cardlardaki 4 sınıf için arka plan görsellerini ayarla
$('.card-container-big, .card-container-sm, .card-container-md, .card-container-main').each(function() {
    var $this = $(this);
    var imageUrl = $this.data('image');
    $this.css('background-image', 'url(' + imageUrl + ')');
});
//#endregion




//#region daha fazla -daha az göster

            const $loadMoreBtn = $('#load-more-btn');
            const $loadLessBtn = $('#load-less-btn');
            $loadLessBtn.hide();
            const $cards = $('.card-container-main.hidden');
            let currentIndex = 0;
            const loadAmount = 6;

            $loadMoreBtn.on('click', function() {
                for (let i = 0; i < loadAmount; i++) {
                    if (currentIndex < $cards.length) {
                        $($cards[currentIndex]).removeClass('hidden');
                        currentIndex++;
                    } else {
                        // Eğer daha fazla kart yoksa butonu gizle
                        $loadMoreBtn.hide();
                        $loadLessBtn.show();

                        break;
                    }
                }

                
            });

            $loadLessBtn.on('click', function() {
                // Gösterilen kartları yeniden gizle
                $('.card-container-main').slice(loadAmount).addClass('hidden');
                currentIndex = 0; // İlk gösterilen miktara dön
            
                // Butonları güncelle
                $loadMoreBtn.show();
                $loadLessBtn.hide();
            });


//#endregion



});