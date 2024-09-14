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
                <tr>
                    <td>1</td>
                    <td>Teknoloji</td>
                    <td>icefade</td>
                    <td>
                        <button class="btn green" onclick="editcategory(1)">Düzenle</button>
                        <button class="btn red" onclick="deletecategory(1)">Sil</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kitap</td>
                    <td>greenfade</td>
                    <td>
                        <button class="btn green" onclick="editcategory(2)">Düzenle</button>
                        <button class="btn red" onclick="deletecategory(2)">Sil</button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Gündem</td>
                    <td>yellowfade</td>
                    <td>
                        <button class="btn green" onclick="editcategory(3)">Düzenle</button>
                        <button class="btn red" onclick="deletecategory(3)">Sil</button>
                    </td>
                </tr>
              
            </tbody>
        </table>
    </div>
    <div class="category-container-editadd">


      
        <!-- Kategori Tablosu -->
        <table class="category-table-add ice">
        <caption>Kategori Ekle</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori Adı</th>
                    <th>Renk</th>
                    <th>Aksiyonlar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input 
                            type="number"
                            name="quantity"
                            min="1"
                            max="100"
                            step="1"
                            class="w-100 text-center"
                        />
                    </td>
                    <td>
                        <input 
                            type="text" 
                            name="category_name" 
                            placeholder="Kategori adını girin"
                            class="w-100 text-center" />

                    </td>
                    <td>
                        <select id="color-select" name="color">
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
                        <button class="btn primary">Ekle</button>
                        <button class="btn red cik">Çık</button>
                    </td>
                </tr>
                
              
            </tbody>
        </table>

        <table class="category-table-edit greenfade">
            <caption>Kategori Düzenle</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kategori Adı</th>
                    <th>Renk</th>
                    <th>Aksiyonlar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input 
                            type="number"
                            name="quantity"
                            min="1"
                            max="100"
                            step="1"
                            class="w-100 text-center"
                        />
                    </td>
                    <td>
                        <input 
                            type="text" 
                            name="category_name" 
                            placeholder="Kategori adını girin"
                            class="w-100 text-center" />

                    </td>
                    <td>
                        <select id="color-select" name="color">
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
                        <button class="btn primary">Kaydet</button>
                        <button class="btn red cik">Çık</button>
                    </td>
                </tr>
                
              
            </tbody>
        </table>

    </div>
</div>
