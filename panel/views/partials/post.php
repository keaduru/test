<div class="posts greenshadow p-30">

    <h2>İçerikler</h2>

    <div class="btn-cont">
        <button class="btn primary" id="add-post"> + İçerik Ekle</button>
    </div>

    <div id="sirala">
        <select id="sort-by">
            <option value="id">ID'ye Göre Sırala</option>
            <option value="baslik">Başlığa Göre Sırala</option>
            <option value="tarih">Tarihe Göre Sırala</option>
            <option value="kategori">Kategoriye Göre Sırala</option>
            <option value="view">Görüntülenmeye Göre Sırala</option>
        </select>
        <select id="sort-order">
            <option value="artan">Artan</option>
            <option value="azalan">Azalan</option>

        </select>
    </div>

<!-- views/post_list.php -->
<table class="post-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Başlık</th>
            <th>Tarih</th>
            <th>Kategori</th>
            <th style="display:none">Kategori Renk</th>
            <th style="display:none">Meta Tag</th>
            <th>Yazar</th>
            <th>Görüntülenme</th>
            <th>Durum</th>
            <th>Aksiyon</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

    


</div>

<div class="post-edit greenshadow p-30">

    <div class="posteditcontainer">
        <h2>İçerik Düzenle</h2>
        <form id="editform" enctype="multipart/form-data">
            <input type="hidden" id="edit-postId" name="edit-postId">

            <label for="edit-postTitle">Başlık:</label>
            <input type="text" id="edit-postTitle" name="edit-postTitle" required>

            <label for="edit-postDate">Tarih:</label>
            <input type="date" id="edit-postDate" name="edit-postDate" required>

            <label for="edit-postCategory">Kategori:</label>
            <select type="text" id="edit-postCategory" name="edit-postCategory" required>

            </select>

            <label for="edit-postMeta">Meta Tag:</label>
            <input type="text" id="edit-postMeta" name="edit-postMeta" required>

            <label for="edit-postAuthor">Yazar:</label>
            <input type="text" id="edit-postAuthor" name="edit-postAuthor" required>

            <label for="edit-postStatus">Durum:</label>
            <select id="edit-postStatus" name="edit-postStatus" required>
                <option value="Yayında">Yayında</option>
                <option value="Taslak">Taslak</option>
                <option value="Kaldırıldı">Kaldırıldı</option>
            </select>



            <label for="edit-postURLread">Resim URL:</label>
            <input type="text" id="edit-postURLread" name="edit-postURLread" readonly>

            <label for="edit-postUrl" class="btn green">Resim Değiştir</label>
            <div id="fileName3"></div>
            <input type="file" id="edit-postUrl" name="edit-postUrl" style="display:none">  
            
            <label for="edit-postimg">Resim Önzilemesi (varsa):</label>
            <img id="edit-postimg" src="" alt="">


            
            <label for="edit-postVideoUrl">Video URL:</label>
            <input type="text" id="edit-postVideoUrl" name="edit-postVideoUrl">

            <label for="edit-postvideo">Video Önizlemesi (varsa):</label>
            <iframe id="edit-postvideo" width="100%" height="400" src="" 
                    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                    >
            </iframe>
            
            <div id="summernoteeditpost"></div>


            



            <button type="submit" class="btn green">Kaydet</button>
            <button type="button" class="btn red" onclick="closepostForm()">Çık</button>
        </form>
    </div>

    <div class="postaddcontainer">
        <h2>İçerik Ekle</h2>

        <form id="addPostForm" enctype="multipart/form-data">
                <label for="add-postTitle">Başlık:</label>
                <input type="text" id="add-postTitle" name="add-postTitle" required>

                <label for="add-postDate">Tarih:</label>
                <input type="date" id="add-postDate" name="add-postDate" required>

                <label for="add-postCategory">Kategori:</label>
                <select id="add-postCategory" name="add-postCategory" required>
          
                </select>
                
                <input type="hidden" id="categoryId" name="categoryId">

                <label for="add-postMeta">Meta:</label>
                <input type="text" id="add-postMeta" name="add-postMeta">

                <label for="add-postAuthor">Yazar:</label>
                <input type="text" id="add-postAuthor" name="add-postAuthor" required>

                <label for="add-postStatus">Durum:</label>
                <select id="add-postStatus" name="add-postStatus" required>
                    <option value="Yayında">Yayında</option>
                    <option value="Taslak">Taslak</option>
                    <option value="Kaldırıldı">Kaldırıldı</option>
                </select>

                <label for="add-postUrl" class="btn green">Resim Ekle</label>
                <div id="fileName2"></div>
                <input type="file" id="add-postUrl" name="add-postUrl" style="display:none">

                <label for="add-postVideoUrl">Video URL: </label>
                <input type="text" id="add-postVideoUrl" name="add-postVideoUrl">



                <div id="summernoteaddpost"></div>

                <button type="submit" class="btn primary">Ekle</button>
                <button type="button" class="btn red" onclick="closepostForm()">Çık</button>
            </form>








    </div>

</div>

