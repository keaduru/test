<!-- <div class="posts greenshadow p-30">

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
                    </select>
                </div>

        <table class="post-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Başlık</th>
                            <th>Tarih</th>
                            <th>Kategori</th>
                            <th style="display:none">Kategori Renk</th>
                            <th>Yazar</th>
                            <th>Durum</th>
                            <th>Aksiyon</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>aGenel bir konu başlığı</td>
                            <td>22.01.2024</td>
                            <td><spankategori>Teknoloji</spankategori></td>
                            <td style="display:none">icefade</td>
                            <td>Admin</td>
                            <td><spanyayın>Yayında</spanyayın></td>
                            <td>
                                <button class="btn green" onclick="editpost(1)">Düzenle</button>
                                <button class="btn red" onclick="deletepost(1)">Sil</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>cGenel bir konu başlığı</td>
                            <td>22.02.2024</td>
                            <td><spankategori>Kitap</spankategori></td>
                            <td style="display:none">greenfade</td>
                            <td>Admin</td>
                            <td><spanyayın>Taslak</spanyayın></td>
                            <td>
                                <button class="btn green" onclick="editpost(2)">Düzenle</button>
                                <button class="btn red" onclick="deletepost(2)">Sil</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>bGenel bir konu başlığı</td>
                            <td>22.02.2024</td>
                            <td><spankategori>Gündem</spankategori></td>
                            <td style="display:none">yellowfade</td>
                            <td>Admin</td>
                            <td><spanyayın>Kaldırıldı</spanyayın></td>
                            <td>
                                <button class="btn green" onclick="editpost(3)">Düzenle</button>
                                <button class="btn red" onclick="deletepost(3)">Sil</button>
                            </td>
                        </tr>
                    
                    </tbody>
        </table>




</div>

<div class="post-edit greenshadow p-30">

    <div class="posteditcontainer">
        <h2>İçerik Düzenle</h2>
        <form id="editform">
            <input type="hidden" id="postId" name="postId">

            <label for="postTitle">Başlık:</label>
            <input type="text" id="postTitle" name="postTitle" required>

            <label for="postDate">Tarih:</label>
            <input type="date" id="postDate" name="postDate" required>

            <label for="postCategory">Kategori:</label>
            <input type="text" id="postCategory" name="postCategory" required>

            <label for="postMeta">Meta Tag:</label>
            <input type="text" id="postMeta" name="postMeta" required>


            <label for="postAuthor">Yazar:</label>
            <input type="text" id="postAuthor" name="postAuthor" required>

            <label for="postStatus">Durum:</label>
            <select id="postStatus" name="postStatus" required>
                <option value="Yayında">Yayında</option>
                <option value="Taslak">Taslak</option>
                <option value="Kaldırıldı">Kaldırıldı</option>
            </select>

            <div id="summernoteeditpost"></div>

            <button type="submit" class="btn green">Kaydet</button>
            <button type="button" class="btn red" onclick="closepostForm()">Çık</button>
        </form>
    </div>

    <div class="postaddcontainer">
        <h2>İçerik Ekle</h2>
        <form id="addform">
            <label for="postId">ID:</label>
            <input id="postId" name="postId">

            <label for="postTitle">Başlık:</label>
            <input type="text" id="postTitle" name="postTitle" required>

            <label for="postDate">Tarih:</label>
            <input type="date" id="postDate" name="postDate" required>

            <label for="postCategory">Kategori:</label>
            <select type="text" id="postCategory" name="postCategory" required>
                <option value="kitap">kitap</option>
                <option value="teknoloji">teknoloji</option>
                <option value="gündem">gündem</option>
            </select>

            <label for="postAuthor">Yazar:</label>
            <input type="text" id="postAuthor" name="postAuthor" required>

            <label for="postStatus">Durum:</label>
            <select id="postStatus" name="postStatus" required>
                <option value="Yayında">Yayında</option>
                <option value="Taslak">Taslak</option>
                <option value="Kaldırıldı">Kaldırıldı</option>
            </select>

            <div id="summernoteaddpost"></div>

            <button type="submit" class="btn primary">Ekle</button>
            <button type="button" class="btn red" onclick="closepostForm()">Çık</button>
        </form>
    </div>

</div> -->

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
            <th>Yazar</th>
            <th>Durum</th>
            <th>Aksiyon</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= htmlspecialchars($post['id']) ?></td>
                <td><?= htmlspecialchars($post['title']) ?></td>
                <td><?= date('d.m.Y', strtotime($post['post_date'])) ?></td>
                <td><spankategori><?= htmlspecialchars($post['category_name']) ?></spankategori></td>
                <td style="display:none"><?= htmlspecialchars($post['category_color']) ?></td>
                <td><?= htmlspecialchars($post['author']) ?></td>
                <td>
                    <spanyayın>
                        <?php
                        switch ($post['status']) {
                            case 'published':
                                echo 'Yayında';
                                break;
                            case 'draft':
                                echo 'Taslak';
                                break;
                            case 'removed':
                                echo 'Kaldırıldı';
                                break;
                            default:
                                echo 'Bilinmiyor';
                        }
                        ?>
                    </spanyayın>
                </td>
                <td>
                    <button class="btn green" onclick="editPost(<?= $post['id'] ?>)">Düzenle</button>
                    <button class="btn red" onclick="deletePost(<?= $post['id'] ?>)">Sil</button>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

    


</div>

<div class="post-edit greenshadow p-30">

    <div class="posteditcontainer">
        <h2>İçerik Düzenle</h2>
        <form id="editform">
            <input type="hidden" id="edit-postId" name="edit-postId">

            <label for="edit-postTitle">Başlık:</label>
            <input type="text" id="edit-postTitle" name="edit-postTitle" required>

            <label for="edit-postDate">Tarih:</label>
            <input type="date" id="edit-postDate" name="edit-postDate" required>

            <label for="edit-postCategory">Kategori:</label>
            <input type="text" id="edit-postCategory" name="edit-postCategory" required>

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

            <div id="summernoteeditpost"></div>

            <button type="submit" class="btn green">Kaydet</button>
            <button type="button" class="btn red" onclick="closepostForm()">Çık</button>
        </form>
    </div>

    <div class="postaddcontainer">
        <h2>İçerik Ekle</h2>

        <form id="addPostForm">
                <label for="add-postTitle">Başlık:</label>
                <input type="text" id="add-postTitle" name="add-postTitle" required>

                <label for="add-postDate">Tarih:</label>
                <input type="date" id="add-postDate" name="add-postDate" required>

                <label for="add-postCategory">Kategori:</label>
                <select id="add-postCategory" name="add-postCategory" required>
          
                </select>
                
                <input type="hidden" id="categoryId" name="categoryId">

                <label for="add-postAuthor">Yazar:</label>
                <input type="text" id="add-postAuthor" name="add-postAuthor" required>

                <label for="add-postStatus">Durum:</label>
                <select id="add-postStatus" name="add-postStatus" required>
                    <option value="Yayında">Yayında</option>
                    <option value="Taslak">Taslak</option>
                    <option value="Kaldırıldı">Kaldırıldı</option>
                </select>

                <div id="summernoteaddpost"></div>

                <button type="submit" class="btn primary">Ekle</button>
                <button type="button" class="btn red" onclick="closepostForm()">Çık</button>
            </form>








    </div>

</div>

