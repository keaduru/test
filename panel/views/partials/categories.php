<div class="categories">
    <div class="category-container">
        <h2>Kategoriler</h2>

        <div class="btn-cont">
            <button class="btn primary" id="add_cat"> + Yeni Kategori Ekle</button>
        </div>

        <!-- Kategori Tablosu -->
        <table class="category-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori Adı</th>
                    <th>Renk</th>
                    <th>Aksiyonlar</th>
                </tr>
            </thead>
            <tbody>

              
            </tbody>
        </table>
    </div>
    <div class="category-container-editadd">


      
        <form id="categoryaddForm">
            <table class="category-table-add ice">
                <caption>Kategori Ekle</caption>
                <thead>
                    <tr>
                        <th>Kategori Adı</th>
                        <th>Renk</th>
                        <th>Aksiyonlar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input 
                                type="text" 
                                name="category_name_add" 
                                placeholder="Kategori adını girin"
                                class="w-100 text-center" />
                        </td>
                        <td>
                            <select id="color-select-add" name="category_color">
                                <option value="orangedarkfade">orangedarkfade</option>
                                <option value="primaryfade">primaryfade</option>
                                <option value="icefade">icefade</option>
                                <option value="grayfade">grayfade</option>
                                <option value="gray-textfade">gray-textfade</option>
                                <option value="redfade" selected>redfade</option>
                                <option value="greenfade">greenfade</option>
                                <option value="bluefade">bluefade</option>
                                <option value="indigofade">indigofade</option>
                                <option value="purplefade">purplefade</option>
                                <option value="pinkfade">pinkfade</option>
                                <option value="orangefade">orangefade</option>
                                <option value="yellowfade">yellowfade</option>
                            </select>
                        </td>
                        <td>
                            <button type="submit" class="btn primary" id="add-category-btn">Ekle</button>
                            <button class="btn red cik" type="button">İptal</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        

        <table class="category-table-edit greenfade">
            <caption>Kategori Düzenle</caption>
            <thead>
                <tr>
                    <th>Kategori Adı</th>
                    <th>Renk</th>
                    <th>Aksiyonlar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input 
                            type="text" 
                            name="category_name_edit" 
                            placeholder="Kategori adını girin"
                            class="w-100 text-center" />

                    </td>
                    <td>
                        <select id="color-select-edit" name="color">
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
                    </td>
                    <td>
                        <button class="btn primary">Kaydet</button>
                        <button class="btn red cik">Çık</button>
                    </td>
                </tr>
                
              
            </tbody>
        </table>

    </div>
</div>
