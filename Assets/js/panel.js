//#region kategori edit ve delete buton eylemleri

function editcategory(id) {
  $.ajax({
      url: '/test/panel/ajax/ajax-category-get-single.php',
      type: 'POST',
      data: { id: id },
      dataType: 'json',
      success: function(category) {
          // Formu güncelle
          $('input[name="category_name"]').val(category.cat_name);
          $('#color-select-edit').val(category.cat_color);

          // Edit formunu göster
          $('.category-container-editadd').show();
          $('.category-table-add').hide();
          $('#add_cat').hide();
          $('.category-table .btn.green').hide();
          $('.category-table .btn.red').hide();
          $('.category-container-editadd .btn.primary').attr('onclick', `saveeditcat(${id})`);

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
          category_name: $('input[name="category_name"]').val(),
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




function deletecategory(x) {
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
                'Kategori silindi.',
                'success'
              );
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

    $('.cik').click(function(){
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
              $('.category-container-editadd').find('input, textarea, select').val('');
              $('.category-container-editadd').hide();
              $('.category-table-add').show();
              $('.category-table-edit').show();
              $('.btn').show();

            }
          });
    })

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
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['paragraph']],

        ['view', [ 'codeview', 'help']]
      ],


    });

    $('#summernoteaddpost').summernote({
      tabsize: 2,
      height: 300,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'underline', 'clear']],
        ['color', ['color']],
        ['para', ['paragraph']],

        ['view', [ 'codeview', 'help']]
      ],


    });



})