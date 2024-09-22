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
          // Formu sıfırla ve gizle
          $('.category-container-editadd').hide();
          $('.category-table-add').show();
          $('#add_cat').show();
          $('.category-table .btn.green').show();
          $('.category-table .btn.red').show();
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
        $('.post-edit').hide();
        $('.postaddcontainer').show();
        $('.posteditcontainer').show();

        $('.btn').show();

      }
    });
}

function editpost(x){

    $('.post-edit').show();
    $('.postaddcontainer').hide();
    $('#add-post').hide();
    $('.post-table .btn.green').hide();
    $('.post-table .btn.red').hide();

}

function deletepost(x) {
  Swal.fire({
      title: 'Emin misiniz?',
      text: "Kategori Kalıcı Olarak Silinsin mi?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Evet, sil!',
      cancelButtonText: 'Hayır, silme.'
    }).then((result) => {
      if (result.isConfirmed) {

          Swal.fire(
              'Silindi!',
              'İçerik silindi.',
              'success'
            );
      }

  
});
}

//#endregion

$(document).ready(function(){

  $('.post-table').find('spanyayın').addClass("badge");
  $('.post-table').find('spanyayın').each(function() {
    var spanText = $(this).text().trim(); // Span içindeki metni al ve boşlukları temizle

    // Değerine göre class ekle
    if (spanText === 'Yayında') {
        $(this).addClass('greenfade');
    } else if (spanText === 'Taslak') {
        $(this).addClass('yellowfade');
    } else if (spanText === 'Kaldırıldı') {
        $(this).addClass('redfade');
    }
});

    //#region  Kategori işlemleri

    $('.category-container-editadd').hide();

    $('#add_cat').click(function() {
        $('.category-container-editadd').show();
        $('.category-table-edit').hide();
        $('.category-table .btn.green').hide();
        $('.category-table .btn.red').hide();
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
                
                // Görünürlük ayarlarını yap
                $('.category-container-editadd').hide();
                $('.category-table-add').show();
                $('.category-table-edit').show();
                $('.btn').show(); // Tüm butonları göster
            }
        });
    });

    $('.post-table').find('spankategori').addClass("badge");    
    $('.post-table tbody tr').each(function() {
      // Kategori isminin yer aldığı <spankategori> elemanını seç
      var $categorySpan = $(this).find('spankategori');
      
      // Renk bilgisini almak için 5. <td> elemanını seç
      var colorClass = $(this).find('td').eq(4).text().trim();
      
      // Renk sınıfını kategori isminin yer aldığı <spankategori>'ye ekle
      $categorySpan.addClass(colorClass);
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
    });

    $('#sort-by').change(function() {
      var criteria = $(this).val();
      var rows = $('table.post-table tbody tr').get();

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
              A = $(a).find('spankategori').text().toUpperCase();
              B = $(b).find('spankategori').text().toUpperCase();
          }
          return (A < B) ? -1 : (A > B) ? 1 : 0;
      });

      $.each(rows, function(index, row) {
          $('table.post-table tbody').append(row);
      });
  });

    

    



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
                var categorySelect = $('#add-postCategory');  // Kategori dropdown alanı
                
                categorySelect.empty();  // Önce dropdown'ı temizle

                // Gelen kategorileri dropdown'a ekle
                categories.forEach(function(category) {
                    categorySelect.append('<option value="' + category.id + '" data-color="' + category.cat_color + '">' + category.cat_name + '</option>');
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

        // Form gönderme işlemi
        $('#addPostForm').on('submit', function(e) {
            e.preventDefault();  // Formun varsayılan gönderim işlemini engelle

            var formData = $(this).serialize();  // Formdaki verileri al

            // Summernote içeriğini form verilerine ekle
            var content = $('#summernoteaddpost').summernote('code');
            
            formData += '&add-postContent=' + encodeURIComponent(content);  // İçeriği form verisine ekle

            // Form verilerini console.log ile yazdır (debugging için)
            console.log('Gönderilen veriler:', formData);

            // AJAX ile formu gönder
            $.ajax({
                url: '/test/panel/ajax/ajax-add-post.php',  // Verilerin gönderileceği PHP dosyası
                method: 'POST',
                data: formData,
                success: function(response) {
                    var result = JSON.parse(response);  // Yanıtı JSON formatında parse et
                    if (result.success) {
                        Swal.fire('Başarılı!', 'Post başarıyla eklendi!', 'success');
                        $('#addPostForm')[0].reset();  // Formu sıfırla
                        $('#summernoteaddpost').summernote('code', '');  // Summernote içeriğini temizle
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


    
    



})