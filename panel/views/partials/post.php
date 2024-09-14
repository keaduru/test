<div class="posts greenshadow p-30">


        <div class="btn-cont">
                    <button class="btn primary" id="add-post"> + İçerik Ekle</button>
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
                            <td>Genel bir konu başlığı</td>
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
                            <td>Genel bir konu başlığı</td>
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
                            <td>Genel bir konu başlığı</td>
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

            <label for="postColor">Kategori Renk:</label>
            <select id="postColor" name="color">
                            <option value="orangedarkfade">orangedarkfade</option>
                            <option value="primaryfade">primaryfade</option>
                            <option value="icefade">icefade</option>
                            <option value="grayfade">grayfade</option>
                            <option value="gray-textfade">gray-textfade</option>
                            <option value="redfade">redfade</option>
                            <option value="greenfade">greenfade</option>
                            <option value="bluefade">bluefade</option>
                            <option value="indigofade">indigofade</option>
                            <option value="purplefade">purplefade</option>
                            <option value="pinkfade">pinkfade</option>
                            <option value="orangefade">orangefade</option>
                            <option value="yellowfade">yellowfade</option>
                        </select>

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

</div>
