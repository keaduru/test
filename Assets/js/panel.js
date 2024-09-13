//#region kategori edit ve delete buton eylemleri

function editcategory(x) {
    $('.category-container-editadd').show();
    $('.category-table-add').hide();
    $('#add_cat').hide();

    
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
                'Tüm içerikler silindi.',
                'success'
              );
        }

    
});
}

//#endregion

$(document).ready(function(){

    //#region  Kategori işlemleri

    $('.category-container-editadd').hide();

    $('#add_cat').click(function() {
        $('.category-container-editadd').show();
        $('.category-table-edit').hide();
        $('.category-table .btn.green').hide();
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

    //#endregion

})