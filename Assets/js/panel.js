//#region kategori edit ve delete buton eylemleri

function editcategory(id) {
  $.ajax({
      url: '/test/panel/ajax/ajax-category-get-single.php',
      type: 'POST',
      data: { id: id },
      dataType: 'json',
      success: function(category) {
          // Formu güncelle
          $('input[name="category_name_edit"]').val(category.cat_name);
          $('#color-select-edit').val(category.cat_color);
          // Edit formunu göster
          $('.category-container-editadd').show();
          $('.category-table-add').hide();
          $('#add_cat').hide();
          $('.category-table .btn.green').hide();
          $('.category-table .btn.red').hide();
          $('.category-container-editadd .category-table-edit .btn.primary').attr('onclick', `saveeditcat(${id})`);

          $('.page-overlay').show();

          $('html, body').animate({
            scrollTop: $("#categoryaddForm").offset().top - ($(window).height() / 2) + ($("#categoryaddForm").outerHeight() / 2)
        }, 500); // 500 ms içinde kaydırma işlemi gerçekleşir

      },
      error: function() {
          Swal.fire('Hata', 'Verileri getirme sırasında bir hata oluştu.', 'error');
      }
  });
}

function saveeditcat(id) {
  $.ajax({
      url: '/test/panel/ajax/ajax-category-update.php',
      type: 'POST',
      data: {
          id: id,
          category_name: $('input[name="category_name_edit"]').val(),
          category_color: $('#color-select-edit').val()
      },
      dataType: 'json',
      success: function(response) {
          Swal.fire('Başarılı', response.message, 'success');
          // Tabloyu güncelle
          updateCategoryTable();
          loadPosts();
          // Formu sıfırla ve gizle
          $('.category-container-editadd').hide();
          $('.category-table-add').show();
          $('#add_cat').show();
          $('.category-table .btn.green').show();
          $('.category-table .btn.red').show();

          $('.page-overlay').hide();


                  // Form elementine kaydır
        $('html, body').animate({
            scrollTop: $("#add_cat").offset().top
        }, 1000);  // 1000 ms (1 saniye) süresince kaydırma yapar
      },
      error: function() {
          Swal.fire('Hata', 'Güncelleme sırasında bir hata oluştu.', 'error');
      }
  });
}


function updateCategoryTable() {
  $.ajax({
      url: '/test/panel/ajax/ajax-category-get.php',
      type: 'GET',
      dataType: 'json',
      success: function(categories) {
          var tableBody = $('.category-table tbody');
          tableBody.empty(); // Mevcut tabloyu temizle

          $.each(categories, function(index, category) {
              tableBody.append(`
                  <tr>
                      <td>${category.id}</td>
                      <td class="${category.cat_color}">${category.cat_name}</td>
                      <td>${category.cat_color}</td>
                      <td>
                          <button class="btn green" onclick="editcategory(${category.id})">Düzenle</button>
                          <button class="btn red" onclick="deletecategory(${category.id})">Sil</button>
                      </td>
                  </tr>
              `);
          });

          // Kategori isimlerini seçili renk ile renklendir
          $('.category-table tbody tr').each(function() {
              var $categoryCell = $(this).find('td').eq(1);
              var colorClass = $(this).find('td').eq(2).text().trim();
              $categoryCell.addClass(colorClass);
          });
      },
      error: function() {
          Swal.fire('Hata', 'Kategoriler yüklenirken bir hata oluştu.', 'error');
      }
  });
}

function deletecategory(id) {
    Swal.fire({
        title: 'Emin misiniz?',
        text: "Bu kategoriyi silmek istediğinizden emin misiniz?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Evet, sil!',
        cancelButtonText: 'Hayır'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/test/panel/ajax/ajax-category-delete.php', // Silme işlemini gerçekleştirecek PHP dosyası
                type: 'POST',
                data: { id: id }, // Silinecek kategori ID'si
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            title: 'Başarılı!',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'Tamam'
                        }).then(() => {
                            // Tabloyu yeniden yükle
                            updateCategoryTable(); // Tabloyu yeniden yüklemek için mevcut fonksiyonunuzu çağırabilirsiniz
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
        }
    });
}


function closepostForm(){
  Swal.fire({
      title: 'Emin misiniz?',
      text: "İşlem iptal edilsin mi?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Evet, sil!',
      cancelButtonText: 'Hayır'
    }).then((result) => {
      if (result.isConfirmed) {
        // "Evet" butonuna tıklanmışsa inputları temizle
        $('#addform').find('input, textarea, select').val('');
        $('#editform').find('input, textarea, select').val('');
        $('#add-postUrl').val('');
        $('#edit-postUrl').val('');
        $('#fileName, #fileName2, #fileName3').html('');
        $('.post-edit').hide();
        $('.postaddcontainer').show();
        $('.posteditcontainer').show();
        
        $('.page-overlay').hide();

        $('.btn').show();

        $('html, body').animate({
            scrollTop: $("#add-post").offset().top
        }, 1000);  // 1000 ms (1 saniye) süresince kaydırma yapar

      }
    });
}

function editpost(postId) {
    // AJAX isteği ile post verilerini getir
    $.ajax({
      url: '/test/panel/ajax/ajax-post-get.php', // Post verilerini alacağın endpoint
      type: 'POST',
      data: { id: postId }, // İlgili postun ID'si
      success: function(response) {
        const data = JSON.parse(response);
        //console.log(data);
        
        if (data.status === 'success') {
          // Form alanlarını doldur
          $('#edit-postId').val(data.post.id);
          $('#edit-postTitle').val(data.post.title);
          const date = data.post.created_at.split(' ')[0]; // "2024-09-19" kısmını al
          $('#edit-postDate').val(date);
          $('#edit-postCategory').val(data.post.category_id);
          $('#edit-postMeta').val(data.post.metatag);
          $('#edit-postAuthor').val(data.post.author);
          $('#edit-postStatus').val(data.post.status);
          $('#edit-postURLread').val(data.post.url);
          $('#edit-postimg').attr('src', data.post.url);
          if (data.post.VideoUrl) {
            $('#edit-postVideoUrl').val(data.post.VideoUrl);
            const embedURL = data.post.VideoUrl.replace("watch?v=", "embed/") //.replace("youtube", "youtube-nocookie");
            $('#edit-postvideo').attr('src', embedURL);
        }
        
          $('#summernoteeditpost').summernote('code', data.post.content); // Summernote içeriğini ayarla

  
          // Formu göster
          $('.post-edit').show();
          $('.postaddcontainer').hide();
          $('#add-post').hide();
          $('.post-table .btn.green').hide();
          $('.post-table .btn.red').hide();

          $('.page-overlay').show();

          $('html, body').animate({
            scrollTop: $(".posteditcontainer").offset().top
        }, 1000);  // 1000 ms (1 saniye) süresince kaydırma yapar

        } else {
          Swal.fire('Hata!', data.message, 'error');
        }
      },
      error: function() {
        Swal.fire('Hata!', 'Bir hata oluştu.', 'error');
      }
    });
  }
  

function deletepost(postId) {
    Swal.fire({
      title: 'Emin misiniz?',
      text: "Post Kalıcı Olarak Silinsin mi?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Evet, sil!',
      cancelButtonText: 'Hayır, silme.'
    }).then((result) => {
      if (result.isConfirmed) {
        // AJAX isteği
        $.ajax({
          url: '/test/panel/ajax/ajax-post-delete.php', // Silme endpoint'i
          type: 'POST',
          data: { id: postId }, // Silinecek postun ID'si
          success: function(response) {
            const data = JSON.parse(response); // JSON yanıtını parse et
            if (data.status === 'success') {
              Swal.fire(
                'Silindi!',
                'İçerik silindi.',
                'success'
              );
              // Post tablosunu güncelle
              loadPosts(); // Postları yeniden yükle
            } else {
              Swal.fire(
                'Hata!',
                data.message, // Hata mesajını göster
                'error'
              );
            }
          },
          error: function() {
            Swal.fire(
              'Hata!',
              'Bir hata oluştu.',
              'error'
            );
          }
        });
      }
    });
  }

  function loadPosts() {
    $.ajax({
        url: '/test/panel/ajax/ajax-posts-get.php', // Postları çektiğimiz yer
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            let tableBody = $('.post-table tbody');
            tableBody.empty(); // Tabloyu temizle
            $.each(data, function(index, post) {
                tableBody.append(`
                    <tr>
                        <td>${post.id}</td>
                        <td>${post.title}</td>
                        <td>${new Date(post.post_date).toLocaleDateString()}</td>
                        <td><span class="badge ${post.category_color}">${post.category_name}</span></td>
                        <td>${post.author}</td>
                        <td>${post.view_count}</td>
                        <td><spanyayın class="badge ${post.status === 'Taslak' ? 'yellowfade' : post.status === 'Yayında' ? 'greenfade' : post.status === 'Kaldırıldı' ? 'redfade' : ''}">${post.status}</spanyayın></td>


                        <td>
                            <button class="btn green" onclick="editpost(${post.id})">Düzenle</button>
                            <button class="btn red" onclick="deletepost(${post.id})">Sil</button>
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
  
  
//#endregion

$(document).ready(function(){


    //#region  Kategori işlemleri

    $('.category-container-editadd').hide();

    $('#add_cat').click(function() {
        // .category-container-editadd div'ini göster
        $('.category-container-editadd').show();
        
        // Diğer öğeleri gizle
        $('.category-table-edit').hide();
        $('.category-table .btn.green').hide();
        $('.category-table .btn.red').hide();
    
        // Sayfanın geri kalanını yarı saydam hale getiren overlay'i göster
        $('.page-overlay').show();
    
        // Form elementine kaydır
        $('html, body').animate({
            scrollTop: $("#categoryaddForm").offset().top - ($(window).height() / 2) + ($("#categoryaddForm").outerHeight() / 2)
        }, 500); // 500 ms içinde kaydırma işlemi gerçekleşir
    });
    
    

      $('.cik').click(function() {
        
        Swal.fire({
            title: 'Emin misiniz?',
            text: "İşlem iptal edilsin mi?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Evet, iptal et!',
            cancelButtonText: 'Hayır'
        }).then((result) => {
            if (result.isConfirmed) {
                // "Evet" butonuna tıklanmışsa inputları temizle
                $('.category-container-editadd').find('input, textarea, select').val('');
                $('#add-postUrl').val('');
                $('#edit-postUrl').val('');
                $('#fileName, #fileName2, #fileName3').html('');
                $('.page-overlay').hide();
                // Görünürlük ayarlarını yap
                $('.category-container-editadd').hide();
                $('.category-table-add').show();
                $('.category-table-edit').show();
                $('.btn').show(); // Tüm butonları göster

                $('html, body').animate({
                    scrollTop: $("#add_cat").offset().top
                }, 500); // 500 ms içinde kaydırma işlemi gerçekleşir
            }
        });
    });

    //#endregion

    //#region post işlemleri

    $('.post-edit').hide();

    $('#add-post').click(function() {
        $('.post-edit').show();
        $('.posteditcontainer').hide();
        $('.post-table .btn.green').hide();
        $('.post-table .btn.red').hide();
        $('#add-post').hide();

        $('.page-overlay').show();

    
        // Form elementine kaydır
        $('html, body').animate({
            scrollTop: $("#addPostForm").offset().top
        }, 1000);  // 1000 ms (1 saniye) süresince kaydırma yapar
    });
    


    // Sıralama fonksiyonunu bir yere alalım ki hem #sort-by hem de #sort-order tetikleyebilsin
    function sortTable() {
        var criteria = $('#sort-by').val();
        var rows = $('table.post-table tbody tr').get();
        var desc = $('#sort-order').val();

        rows.sort(function(a, b) {
            var A, B;

            if (criteria == 'id') {
                A = parseInt($(a).find('td:eq(0)').text());
                B = parseInt($(b).find('td:eq(0)').text());
            } else if (criteria == 'baslik') {
                A = $(a).find('td:eq(1)').text().toUpperCase();
                B = $(b).find('td:eq(1)').text().toUpperCase();
            } else if (criteria == 'tarih') {
                A = new Date($(a).find('td:eq(2)').text().split('.').reverse().join('-'));
                B = new Date($(b).find('td:eq(2)').text().split('.').reverse().join('-'));
            } else if (criteria == 'kategori') {
                A = $(a).find('span').text().toUpperCase();
                B = $(b).find('span').text().toUpperCase();
            } else if (criteria == 'view') {
                A = parseInt($(a).find('td:eq(5)').text());
                B = parseInt($(b).find('td:eq(5)').text());
            }

            // Sıralama yönü
            if (desc == "artan") {
                return (A < B) ? -1 : (A > B) ? 1 : 0;
            } else if (desc == "azalan") {
                return (A > B) ? -1 : (A < B) ? 1 : 0;
            }
        });

        $.each(rows, function(index, row) {
            $('table.post-table tbody').append(row);
        });
    }

        // Hem #sort-by hem de #sort-order değiştiğinde sıralama yapılmalı
        $('#sort-by').change(sortTable);
        $('#sort-order').change(sortTable);


    

    



    //#endregion

    //#region profil işlemleri
   
    $('#profilresmibtn').click(function(event) {
      event.preventDefault(); // Dosya seçicinin hemen açılmasını engeller
  
      Swal.fire({
          title: 'Emin misiniz?',
          text: "Seçim yapıp kaydettiğinizde mevcut resim kalıcı olarak silinecektir!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Evet, silinebilir!',
          cancelButtonText: 'Hayır'
      }).then((result) => {
          if (result.isConfirmed) {
              // "Evet" butonuna tıklanmışsa dosya seçici inputu tetikle
              $('#profilresmi').click();
          }
      });
  });
  



  $('#profilresmi').change(function() {
      var fileInput = $(this)[0];
      var fileName = '';
      var fileSize = '';
      var fileError = '';
  
      if (fileInput.files.length > 0) {
          var file = fileInput.files[0];
          fileName = file.name;
          fileSize = file.size / 1024 / 1024; // MB cinsinden boyut
  
          // Dosya türü ve boyutunu kontrol et
          var allowedExtensions = ['jpeg', 'jpg', 'svg'];
          var fileExtension = fileName.split('.').pop().toLowerCase();
  
          if (fileSize > 10) {
              fileError = 'Dosya boyutu 10 MB\'dan büyük olamaz.';
          } else if (!allowedExtensions.includes(fileExtension)) {
              fileError = 'Yalnızca .jpeg, .jpg, ve .svg uzantılı dosyalar seçilebilir.';
          } else {
              fileError = ''; // Hata yok
          }
  
          if (fileError) {
              $('#fileName').text(fileError);
              // Dosya seçimini temizle
              $(this).val('');
          } else {
              $('#fileName').text('Seçilen dosya: ' + fileName + ' (Boyut: ' + fileSize.toFixed(2) + ' MB)');
          }
      } else {
          $('#fileName').text('No file chosen');
      }
  });

  $('#add-postUrl').change(function() {
    var fileInput = $(this)[0];
    var fileName = '';
    var fileSize = '';
    var fileError = '';

    if (fileInput.files.length > 0) {
        var file = fileInput.files[0];
        fileName = file.name;
        fileSize = file.size / 1024 / 1024; // MB cinsinden boyut

        // Dosya türü ve boyutunu kontrol et
        var allowedExtensions = ['jpeg', 'jpg', 'svg'];
        var fileExtension = fileName.split('.').pop().toLowerCase();

        if (fileSize > 10) {
            fileError = 'Dosya boyutu 10 MB\'dan büyük olamaz.';
        } else if (!allowedExtensions.includes(fileExtension)) {
            fileError = 'Yalnızca .jpeg, .jpg, ve .svg uzantılı dosyalar seçilebilir.';
        } else {
            fileError = ''; // Hata yok
        }

        if (fileError) {
            $('#fileName2').text(fileError);
            // Dosya seçimini temizle
            $(this).val('');
        } else {
            $('#fileName2').text('Seçilen dosya: ' + fileName + ' (Boyut: ' + fileSize.toFixed(2) + ' MB)');
        }
    } else {
        $('#fileName2').text('No file chosen');
    }
});

$('#edit-postUrl').change(function() {
    var fileInput = $(this)[0];
    var fileName = '';
    var fileSize = '';
    var fileError = '';

    if (fileInput.files.length > 0) {
        var file = fileInput.files[0];
        fileName = file.name;
        fileSize = file.size / 1024 / 1024; // MB cinsinden boyut

        // Dosya türü ve boyutunu kontrol et
        var allowedExtensions = ['jpeg', 'jpg', 'svg'];
        var fileExtension = fileName.split('.').pop().toLowerCase();

        if (fileSize > 10) {
            fileError = 'Dosya boyutu 10 MB\'dan büyük olamaz.';
        } else if (!allowedExtensions.includes(fileExtension)) {
            fileError = 'Yalnızca .jpeg, .jpg, ve .svg uzantılı dosyalar seçilebilir.';
        } else {
            fileError = ''; // Hata yok
        }

        if (fileError) {
            $('#fileName3').text(fileError);
            // Dosya seçimini temizle
            $(this).val('');
        } else {
            $('#fileName3').text('Seçilen dosya: ' + fileName + ' (Boyut: ' + fileSize.toFixed(2) + ' MB)');
        }
    } else {
        $('#fileName3').text('No file chosen');
    }
});
  
      


    //#endregion

    
    

    $('#summernoteeditpost').summernote({
        tabsize: 2,
        height: 300,
        callbacks: {
            onInit: function() {
                $('#foreColorPicker').attr('id', 'foreColorPicker1');
                $('#backColorPicker').attr('id', 'backColorPicker1');
            }
        },
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['paragraph']],
            ['view', [ 'codeview', 'help']]
        ]
    });
    
    $('#summernoteaddpost').summernote({
        tabsize: 2,
        height: 300,
        callbacks: {
            onInit: function() {
                $('#foreColorPicker').attr('id', 'foreColorPicker2');
                $('#backColorPicker').attr('id', 'backColorPicker2');
                
            }
        },
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['paragraph']],
            ['view', [ 'codeview', 'help']]
        ]
    });

        // Kategorileri getirme işlemi
        $.ajax({
            url: '/test/panel/ajax/ajax-get-categories.php',  // Kategori verilerini çeken PHP dosyası
            method: 'GET',
            success: function(response) {
                var categories = JSON.parse(response);  // JSON veriyi parse et
                var categorySelectadd = $('#add-postCategory');  // Kategori dropdown alanı
                var categorySelectedit = $('#edit-postCategory');  // Kategori dropdown alanı
                
                categorySelectadd.empty();  // Önce dropdown'ı temizle
                categorySelectedit.empty();  // Önce dropdown'ı temizle

                console.log("merhaba");

                // Gelen kategorileri dropdown'a ekle
                categories.forEach(function(category,index) {
                    categorySelectadd.append('<option value="' + category.id + '" data-color="' + category.cat_color + '">' + category.cat_name + '</option>');
                    categorySelectedit.append('<option value="' + category.id + '" data-color="' + category.cat_color + '">' + category.cat_name + '</option>');
                    if (index === 0) {
                        $('#categoryId').val(category.id);
                    }
                });
        
            },
            error: function(xhr, status, error) {
                console.error('Kategoriler alınamadı:', xhr);
            }
        });

        // Kategori seçimi değiştiğinde ID'yi gizli inputa yaz
            $('#add-postCategory').on('change', function() {
                var selectedCategoryId = $(this).val();
                $('#categoryId').val(selectedCategoryId);
                //console.log('Seçilen Kategori ID:', selectedCategoryId);  // Debugging için
            });

       


    





})