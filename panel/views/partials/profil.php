<div class="profil greenshadow p-30" id="section-profile">
    <h2>Kullanıcı Bilgileri</h2>
    <?php if ($isAdmin): ?>
        <div class="btn-cont">
            <button class="btn primary" id="add_profile"> + Yeni Kullanıcı Ekle</button>
        </div>
    <?php endif; ?>

    <table class="profile-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kullanıcı Adı</th>
                    <th>Yetki</th>
                    <th>İsim</th>
                    <th>Resim</th>
                    <th>Aksiyonlar</th>
                </tr>
            </thead>
            <tbody>

              
            </tbody>
    </table>

<!-- Profil Düzenleme Modalı -->
<div id="editProfileModal" class="modal">
    <div class="modal-content">
        <span class="closemodal">&times;</span>
        <h2>Profil Düzenle</h2>
        <form id="editProfileForm" enctype="multipart/form-data">
            <input type="hidden" name="user_id" id="user_id">

            <label for="username">Kullanıcı Adı:</label>
            <input type="text" id="username" name="username" required>

            <label for="isim">İsim:</label>
            <input type="text" id="isim" name="isim" required>

            <label for="yetki">Yetki:</label>
            <select id="yetki" name="yetki" <?php echo (!$isAdmin) ? 'disabled' : ''; ?>>
                <option value="user" <?php echo ($currentRole == 'user') ? 'selected' : ''; ?>>User</option>
                <option value="admin" <?php echo ($currentRole == 'admin') ? 'selected' : ''; ?>>Admin</option>
            </select>




            <label for="profileImage">Yeni Profil Resmi:</label>
            <input type="file" id="profileImage" name="profileImage" accept="image/jpeg,image/jpg,image/png,image/gif">

            <label for="password">Yeni Parola (isteğe bağlı):</label>
            <input type="password" id="password" name="password" placeholder="Yeni parolanızı girin">

            <button type="submit" class="btn green">Kaydet</button>
        </form>
    </div>
</div>

<!-- Kullanıcı Ekle Modalı -->
<div id="addProfileModal" class="modal">
    <div class="modal-content">
        <span class="closemodal">&times;</span>
        <h2>Kullanıcı Ekle</h2>
        <form id="addProfileForm" enctype="multipart/form-data">
            <label for="add-username">Kullanıcı Adı:</label>
            <input type="text" id="add-username" name="username" required>

            <label for="add-isim">İsim:</label>
            <input type="text" id="add-isim" name="isim" required>

            <label for="add-yetki">Yetki:</label>
            <select id="add-yetki" name="yetki" required>
                <option value="user">Kullanıcı</option>
                <option value="admin">Admin</option>
            </select>

            <label for="add-password">Şifre:</label>
            <input type="password" id="add-password" name="password" required>

            <label for="add-profileImage">Profil Resmi:</label>
            <input type="file" id="add-profileImage" name="profileImage" accept="image/jpeg, image/png">

            <button type="submit" class="btn">Kullanıcı Ekle</button>
        </form>
    </div>
</div>


</div>