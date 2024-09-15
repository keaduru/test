<div class="profil greenshadow p-30">
    <h2>Kullanıcı Bilgileri</h2>

<form id="profil-form">
        <label for="user-name">Kullanıcı Adı:</label>
        <input type="text" id="user-name" name="user-name" required>
        
        <label for="password">Parola:</label>
        <input type="password" id="password" name="password" placeholder="*******" required>
        
        <h3>Profil Resmi</h3>
        <div class="profilresmidiv greenshadow">

            <img src="/test/Assets/images/profile/orman.jpeg" alt="LogoritmikAdmin">
            <div id="fileName"></div>
            <label for="profilresmi" class="btn red" id="profilresmibtn">Profil Resmini Değiştir</label>
            <input type="file" id="profilresmi" name="profilresmi" style="display:none;">
        </div>

        
        <button type="submit" class="btn purple">Kaydet</button>
    </form>

</div>