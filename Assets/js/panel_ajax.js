$(document).ready(function() {

    function loadCategories() {
        $.ajax({
            url: '/test/panel/ajax/ajax-category-get.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                let tableBody = $('.category-table tbody');
                tableBody.empty(); // Tabloyu temizle
                $.each(data, function(index, category) {
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
                        $('.category-table .btn.green').show();
                        $('.category-table .btn.red').show();
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
    


    



});

