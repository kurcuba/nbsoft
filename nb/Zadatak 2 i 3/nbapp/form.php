<?php
include "views/head.php";
include "views/nav.php";
?>
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto py-1">
            <form id="ajaxForm">
                <div class="form-group">
                    <label for="">Ime</label>
                    <input type="text" id="tbFirstName" class="form-control" />
                </div>
                <div class="form-group mt-3">
                    <label for="">Prezime</label>
                    <input type="text" id="tbLastName" class="form-control" />
                </div>
                <div class="form-group mt-3">
                    <label for="">Godina rođenja</label>
                    <input type="text"  id="tbBYear" class="form-control" />
                </div>
                <div class="form-group mt-3">
                    <label for="">Adresa</label>
                    <input type="text"  id="tbAddress" class="form-control" />
                </div>
                <div class="form-group mt-3">
                    <label for="">Grad</label>
                    <select id="ddCity" class="form-control">
                        <option value="0">Izaberite</option>
                        <option value="1"> Beograd</option>
                        <option value="2">Novi Sad</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                <label for="">Pol</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tbGen"  value="M" >
                        <label class="form-check-label" for="exampleRadios1">
                            Muški
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tbGen"  value="Z" >
                        <label class="form-check-label" for="exampleRadios1">
                            Ženski
                        </label>
                    </div>
                    <span id="genError" class="error-text"></span>
                </div>
                <div class="form-group mt-3">
                    <label for="">Napomena</label>
                    <textarea id="note" class="form-control" name="taNote" rows="4" cols="50"></textarea>
                </div>
                <div class="form-group mt-3">
                    <input class="form-check-input" type="checkbox" name="cbAgrree"  value="1" >
                    <label class="form-check-label" for="exampleRadios1">
                        Slažem se sa uslovima korišćenja.
                    </label><br/>
                    <span id="agrreeError" class="error-text"></span>
                </div>

                <input type="button" value="Pošalji" id="submit" class="mt-3 btn btn-primary">
                
            </form>

            <div id="answer"></div>
        </div>
    </div>
</div>

<?php include "views/footer.php"; ?>