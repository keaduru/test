function editprofile(id) {
    // Modalı aç
    $('#editProfileModal').css('display', 'block');
    
    // AJAX ile mevcut verileri yükle
    $.ajax({
        url: `/test/panel/ajax/ajax-profile-get.php?id=${id}`,
        type: 'GET',
        dataType: 'json',
        success: function(profile) {
            // Mevcut verileri form alanlarına yerleştir
            $('#user_id').val(profile.id);
            $('#username').val(profile.username);
            $('#email').val(profile.email);
            $('#isim').val(profile.isim);
            $('#yetki').val(profile.yetki);
        },
        error: function() {
            Swal.fire({
                title: 'Hata!',
                text: 'Profil verileri yüklenirken bir hata oluştu.',
                icon: 'error',
                confirmButtonText: 'Tamam'
            });
        }
    });
}

$(document).ready(function() {

    function getCounts() {
        $.ajax({
            url: "/test/panel/ajax/ajax-counts.php", // PHP dosyasının yolu
            type: "GET",
            dataType: "json", // JSON formatında veri alıyoruz
            success: function(data) {
                // Aldığımız post sayısını ve toplam görüntülenmeyi tabloya yazdır
                $("#postCount p").text(data.post_count);
                $("#viewTotal p").text(data.total_views);
            },
            error: function() {
                $("#postCount p").text("Error loading data");
                $("#viewTotal p").text("Error loading data");
            }
        });
    }

    getCounts();

    
    function loadCategories() {
        $.ajax({
            url: '/test/panel/ajax/ajax-category-get.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                let tableBody = $('.category-table tbody');
                tableBody.empty(); // Tabloyu temizle
                $.each(data, function(index, category) {
                    // Admin olup olmadığını kontrol et
                    const deleteButton = (currentUserRole === 'admin') 
                        ? `<button class="btn red" onclick="deletecategory(${category.id})">Sil</button>` 
                        : ''; // Admin değilse sil butonunu boş bırak
    
                    tableBody.append(`
                        <tr>
                            <td>${category.id}</td>
                            <td class="${category.cat_color}">${category.cat_name}</td>
                            <td>${category.cat_color}</td>
                            <td>
                                <button class="btn green" onclick="editcategory(${category.id})">Düzenle</button>
                                ${deleteButton} <!-- Sil butonunu buraya ekle -->
                            </td>
                        </tr>
                    `);
                });
            },
            error: function() {
                Swal.fire({
                    title: 'Hata!',
                    text: 'Kategoriler yüklenirken bir hata oluştu.',
                    icon: 'error',
                    confirmButtonText: 'Tamam'
                });
            }
        });
    }
    

    

    // Sayfa yüklendiğinde kategorileri yükle
    loadCategories();


    $('#add-category-btn').click(function(e) {
        e.preventDefault();
    
        // Formun geçerli olup olmadığını kontrol et
        const form = document.getElementById('categoryaddForm');
        if (!form.checkValidity()) {
            form.reportValidity(); // Geçersiz alanları kullanıcıya gösterir
            return; // Form geçersizse devam etme
        }
    
        $.ajax({
            url: '/test/panel/ajax/ajax-category-add.php',
            type: 'POST',
            data: $('#categoryaddForm').serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    Swal.fire({
                        title: 'Başarılı!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Tamam'
                    }).then(() => {
                        // Kategoriler tablosunu yeniden yükle
                        loadCategories();
                        // Formu sıfırla
                        $('#categoryaddForm')[0].reset();
                        $('.category-container-editadd').hide();
                        $('.category-table-edit').show();
                        $('.page-overlay').hide();
                    });
                } else {
                    Swal.fire({
                        title: 'Hata!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Tamam'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Hata!',
                    text: 'Bir hata oluştu.',
                    icon: 'error',
                    confirmButtonText: 'Tamam'
                });
            }
        });
    });
    

    function loadPosts() {
        $.ajax({
            url: '/test/panel/ajax/ajax-posts-get.php', // Postları çektiğimiz yer
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                let tableBody = $('.post-table tbody');
                tableBody.empty(); // Tabloyu temizle
                $.each(data, function(index, post) {
                    // Admin olup olmadığını kontrol et
                    const deleteButton = (currentUserRole === 'admin') 
                        ? `<button class="btn w-100 red" onclick="deletepost(${post.id})">Sil</button>` 
                        : ''; // Admin değilse sil butonunu boş bırak
    
                    // Kullanıcı kendi yazısı ise düzenle butonunu göster
                    const editButton = (currentUserRole === 'admin' || post.author === currentUsername)
                        ? `<button class="btn w-100 green" onclick="editpost(${post.id})">Düzenle</button>`
                        : ''; // Kullanıcı kendi yazısı değilse düzenle butonunu boş bırak
    
                    tableBody.append(`
                        <tr>
                            <td>${post.id}</td>
                            <td>${post.title}</td>
                            <td>${new Date(post.post_date).toLocaleDateString()}</td>
                            <td><span class="badge ${post.category_color}">${post.category_name}</span></td>
                            <td>${post.author}</td>
                            <td>${post.view_count}</td>
                            <td><span class="badge ${post.status === 'Taslak' ? 'yellowfade' : post.status === 'Yayında' ? 'greenfade' : post.status === 'Kaldırıldı' ? 'redfade' : ''}">${post.status}</span></td>
    
                            <td>
                                ${editButton} <!-- Düzenle butonunu burada ekle -->
                                ${deleteButton} <!-- Sil butonunu burada ekle -->
                            </td>
                        </tr>
                    `);
                });
            },
            error: function() {
                Swal.fire({
                    title: 'Hata!',
                    text: 'Postlar yüklenirken bir hata oluştu.',
                    icon: 'error',
                    confirmButtonText: 'Tamam'
                });
            }
        });
    }
    
    

    // Sayfa yüklendiğinde postları yükle
    loadPosts();

    function loadAuthors() {
        $.ajax({
            url: '/test/panel/ajax/ajax-profiles-get.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                let authorSelect = $('#add-postAuthor'); // Yazar select elementini seç
                authorSelect.empty(); // Önceki değerleri temizle
    
                if (currentUserRole === 'admin') {
                    // Adminse, mevcut kullanıcıları yükle
                    $.each(data, function(index, profile) {
                        authorSelect.append(new Option(profile.username, profile.username)); // Kullanıcı adını seçeneğe ekle
                    });
                    //authorSelect.prepend('<option value="">Yazar Seçin</option>'); // Varsayılan seçenek ekle
                } else {
                    // Kullanıcı ise, kendi kullanıcı adını seç
                    authorSelect.append(new Option(currentUsername, currentUsername)); // Kullanıcı adını ekle
                    authorSelect.prop('disabled', true); // Seçenekleri devre dışı bırak
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Hata!',
                    text: 'Yazarlar yüklenirken bir hata oluştu.',
                    icon: 'error',
                    confirmButtonText: 'Tamam'
                });
            }
        });
    }

    loadAuthors();

     // Form gönderme işlemi
     $('#addPostForm').on('submit', function(e) {
        e.preventDefault();  // Formun varsayılan gönderim işlemini engelle
    
        var formData = new FormData(this);  // Form verilerini al (file dahil)
    
        // Summernote içeriğini form verilerine ekle
        var content = $('#summernoteaddpost').summernote('code');
        formData.append('add-postContent', content);  // İçeriği form verisine ekle

        // AJAX ile formu gönder
        $.ajax({
            url: '/test/panel/ajax/ajax-post-add.php',  // Verilerin gönderileceği PHP dosyası
            method: 'POST',
            data: formData,
            contentType: false,  // Dosya yüklemesi için ayarlar
            processData: false,  // Form verilerini işleme
            success: function(response) {
                var result = JSON.parse(response);  // Yanıtı JSON formatında parse et
                if (result.success) {
                    // Başarılı olduğunda yapılacak işlemler
                    Swal.fire('Başarılı!', 'Post başarıyla eklendi!', 'success');
                    $('#addPostForm')[0].reset();  // Formu sıfırla
                    $('#add-postUrl').val('');
                    $('#fileName, #fileName2, #fileName3').html('');
                    $('#summernoteaddpost').summernote('code', '');  // Summernote içeriğini temizle
                    $('.post-edit').hide();
                    $('.posteditcontainer').show();
                    $('#add-post').show();
                    $('.page-overlay').hide();
                    
                    // Tabloyu yeniden yükle
                    loadPosts();
                    getCounts();
    
                    // Form elementine kaydır
                    $('html, body').animate({
                        scrollTop: $("#add-post").offset().top
                    }, 1000);  // 1000 ms (1 saniye) süresince kaydırma yapar
                } else {
                    Swal.fire('Hata!', result.message, 'error');
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Hatası:', xhr.responseText);  // Sunucudan dönen hata mesajı
                Swal.fire('Hata!', 'Bir hata oluştu, lütfen tekrar deneyin!', 'error');
            }
        });
    });
    
    $('#editform').on('submit', function(e) {
        e.preventDefault();  // Formun varsayılan gönderim işlemini engelle

        var formData = new FormData(this);  // Formdaki verileri al

        // Summernote içeriğini form verilerine ekle
        var content = $('#summernoteeditpost').summernote('code');
        formData.append('edit-postContent',content);


        // AJAX ile formu gönder
        $.ajax({
            url: '/test/panel/ajax/ajax-post-edit.php',  // Verilerin gönderileceği PHP dosyası
            method: 'POST',
            data: formData,
            contentType: false,  // Dosya yüklemesi için ayarlar
            processData: false,  // Form verilerini işleme
            success: function(response) {
                var result = JSON.parse(response);  // Yanıtı JSON formatında parse et
                if (result.success) {
                    Swal.fire('Başarılı!', 'Post başarıyla düzenlendi!', 'success');
                    $('#editform')[0].reset();  // Formu sıfırla
                    $('#edit-postUrl').val('');
                    $('#fileName, #fileName2, #fileName3').html('');
                    $('#summernoteeditpost').summernote('code', '');  // Summernote içeriğini temizle
                    $('.post-edit').hide();
                    $('.posteditcontainer').show();
                    $('.postaddcontainer').show();
                    $('#add-post').show();

                    $('.page-overlay').hide();
                 
                    // Tabloyu yeniden yükle
                    loadPosts(); 

                            // Form elementine kaydır
                        $('html, body').animate({
                        scrollTop: $("#add-post").offset().top
                        }, 1000);  // 1000 ms (1 saniye) süresince kaydırma yapar
                        } else {
                            Swal.fire('Hata!', result.message, 'error');
                        }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Hatası:', xhr.responseText);  // Sunucudan dönen hata mesajı
                Swal.fire('Hata!', 'Bir hata oluştu, lütfen tekrar deneyin!', 'error');
            }
        });
    });

    function getSettings(){

        $.ajax({
        url: "/test/panel/ajax/ajax-settings-get.php", // PHP dosyasının yolu
        type: "GET",
        dataType: "json", // JSON formatında veri alıyoruz
        success: function(data) {
            // Dinamik form alanlarını oluşturacağımız yeri seçiyoruz
            var form = $("#social-form");
            form.empty();

            // Gelen verileri dinamik olarak input alanlarına çeviriyoruz
            $.each(data, function(index, setting) {
                // Dinamik olarak label ve input alanlarını oluştur
                var label = $('<label>').attr('for', setting.name).text(setting.name.charAt(0).toUpperCase() + setting.name.slice(1) + ' URL:');
                var input = $('<input>').attr({
                    type: 'text',
                    id: setting.name,
                    name: setting.name,
                    value: setting.url,
                    required: true,
                    readonly: currentUserRole !== 'admin'
                });

                // Oluşturulan label ve inputları forma ekle
                form.append(label);
                form.append(input);
            });

            // Son olarak submit butonunu ekle
            if (currentUserRole === 'admin') {
                form.append('<button type="submit" class="btn purple">Kaydet</button>');
            }
        },
        error: function() {
            Swal.fire('Hata!', 'Bir hata oluştu, lütfen tekrar deneyin!', 'error');
        }
    });

    }

    getSettings();

    // Formu submit ettiğinde yapılacak işlem (Opsiyonel: Bu kısım ileride ayarları güncellemek için kullanılabilir)
    $('#social-form').on('submit', function(e) {
        e.preventDefault();
        // Formdaki verileri JSON formatında topluyoruz
        var formData = {};
        $('#social-form').find('input').each(function() {
            var name = $(this).attr('name');
            var value = $(this).val();
            formData[name] = value; // Her input'un name ve value değerini topluyoruz
        });

             // AJAX ile veritabanına güncelleme isteği gönder
            $.ajax({
                url: "/test/panel/ajax/ajax-settings-update.php", // Güncelleme işlemi yapan PHP dosyası
                type: "POST",
                contentType: "application/json", // Veriyi JSON formatında gönderiyoruz
                data: JSON.stringify(formData), // JSON string olarak gönderiyoruz
                success: function(response) {
                    var result = JSON.parse(response);
                    if (result.status === 'success') {
                        Swal.fire('Başarılı',result.message,'success'); // Başarılı mesajı göster
                       
                    } else {
                        Swal.fire('Hata!',result.message,'danger'); // Hata mesajı göster
                    }
                },
                error: function() {
                    Swal.fire('Hata!', 'Bir hata oluştu, lütfen tekrar deneyin!', 'success');
                }
            });
    });




    function loadProfiles() {
        $.ajax({
            url: '/test/panel/ajax/ajax-profiles-get.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                let tableBody = $('.profile-table tbody');
                tableBody.empty(); // Tabloyu temizle
                $.each(data, function(index, profile) {
                    // Kullanıcı ID'si ve yetkisini kontrol et
                    let buttons = ''; // Butonları tutmak için boş bir değişken
    
                    if (currentUserRole === 'admin') {
                        // Eğer kullanıcı admin ise hem düzenleme hem de silme butonlarını göster
                        buttons = `
                            <td>
                                <button class="btn green w-45" onclick="editprofile(${profile.id})">Düzenle</button>
                                <button class="btn red w-45" onclick="deleteprofile(${profile.id})">Sil</button>
                            </td>`;
                    } else if (profile.id === currentUserId) {
                        // Eğer kullanıcı normal bir kullanıcı ise ve kendi profilini görüntülüyorsa yalnızca düzenleme butonunu göster
                        buttons = `
                            <td>
                                <button class="btn green w-45" onclick="editprofile(${profile.id})">Düzenle</button>
                            </td>`;
                    }
    
                    tableBody.append(`
                        <tr>
                            <td>${profile.id}</td>
                            <td>${profile.username}</td>
                            <td>${profile.email}</td>
                            <td>${profile.yetki}</td>
                            <td>${profile.isim}</td>
                            <td><img src="${profile.url}" alt="${profile.isim}" id="profiletableimg"></td>
                            ${buttons} <!-- Butonları burada ekle -->
                        </tr>
                    `);
                });
            },
            error: function() {
                Swal.fire({
                    title: 'Hata!',
                    text: 'Profiller yüklenirken bir hata oluştu.',
                    icon: 'error',
                    confirmButtonText: 'Tamam'
                });
            }
        });
    }
    
    
    
    
    
    
    loadProfiles();


    $('#add_profile').click(function() {
      
        $('#addProfileModal').css('display', 'block');
    });
    // Modal kapatma
    $('.closemodal').click(function() {
        $('#editProfileForm')[0].reset();
        $('#addProfileForm')[0].reset();
        $('#editProfileModal').css('display', 'none');
        $('#addProfileModal').css('display', 'none');
    });
    
    // Form gönderimi
    $('#editProfileForm').on('submit', function(e) {
        e.preventDefault(); // Formun normal şekilde gönderilmesini engelle

        // Form verilerini al
        let formData = new FormData(this);

        $.ajax({
            url: '/test/panel/ajax/ajax-profile-update.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                let data = JSON.parse(response); // JSON yanıtı ayrıştır

                // SweetAlert ile başarı mesajı göster
                Swal.fire({
                    title: 'Başarılı!',
                    text: 'Profil güncellendi.',
                    icon: 'success',
                    confirmButtonText: 'Tamam'
                });
                loadProfiles();
                // Sağ menüyü güncelle
                $('#profileimg').attr('src', data.url); // Yeni profil resmini güncelle
                $('#profile-name').text(data.username[0].toUpperCase() + data.username.slice(1));
                $('#dropdown-menu p.welcome').text("Hoşgeldin " + data.isim); // Hoşgeldin mesajını güncelle
                $('#dropdown-menu p.role').text("Şu An Rol'ün: " + data.yetki); // Rol'ü güncelle
                $('#dropdown-menu p.username').text("Kullanıcı Adın: " + data.username); // Kullanıcı adını güncelle
                
                // Modal içeriğini temizle
                $('#editProfileForm')[0].reset(); // Form verilerini sıfırla
                $('#editProfileModal').css('display', 'none'); // Modalı kapat
                loadProfiles();
            },
            error: function() {
                Swal.fire({
                    title: 'Hata!',
                    text: 'Bir hata oluştu. Lütfen tekrar deneyin.',
                    icon: 'error',
                    confirmButtonText: 'Tamam'
                });
            }
        });
    });

    // Kullanıcı ekleme formu gönderimi
    $('#addProfileForm').on('submit', function(e) {
        e.preventDefault(); // Formun normal şekilde gönderilmesini engelle

        // Form verilerini al
        let formData = new FormData(this);

        $.ajax({
            url: '/test/panel/ajax/ajax-profile-add.php', // Kullanıcı ekleme işlemi için PHP dosyasının yolu
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                let data = JSON.parse(response); // JSON yanıtı ayrıştır

                // SweetAlert ile başarı mesajı göster
                Swal.fire({
                    title: 'Başarılı!',
                    text: 'Kullanıcı başarıyla eklendi.',
                    icon: 'success',
                    confirmButtonText: 'Tamam'
                });

                loadProfiles(); // Profilleri tekrar yükle
                $('#addProfileModal').css('display', 'none'); // Modalı kapat
                $('#addProfileForm')[0].reset(); // Form verilerini sıfırla
            },
            error: function() {
                Swal.fire({
                    title: 'Hata!',
                    text: 'Bir hata oluştu. Lütfen tekrar deneyin.',
                    icon: 'error',
                    confirmButtonText: 'Tamam'
                });
            }
        });
    });


    
    
    

    });


    

    
    



