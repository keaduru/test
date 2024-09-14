//#region kategori edit ve delete buton eylemleri

function editcategory(x) {
    $('.category-container-editadd').show();
    $('.category-table-add').hide();
    $('#add_cat').hide();
    $('.category-table .btn.green').hide();
    $('.category-table .btn.red').hide();

    
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



    

    // Kategori isimlerini seçili renk ile renklendir.
    $('.category-table tbody tr').each(function() {
        // Kategori isminin yer aldığı <td> elemanını seç
        var $categoryCell = $(this).find('td').eq(1);
        
        // Renk bilgisini almak için 3. <td> elemanını seç
        var colorClass = $(this).find('td').eq(2).text().trim();
        
        // Renk sınıfını kategori isminin yer aldığı <td>'ye ekle
        $categoryCell.addClass(colorClass);
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