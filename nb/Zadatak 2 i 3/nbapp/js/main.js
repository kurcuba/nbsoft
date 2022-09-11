$(document).ready(function(){
    $(document).on('click', '#submit', function(){
        let firstName = $('#tbFirstName');
        let lastName = $('#tbLastName');
        let bYear = $('#tbBYear');
        let address = $('#tbAddress');
        let city = $('#ddCity');
        let gen = $(':input[name=tbGen]:checked');
        let note = $('#note');
        let agree = $( "input[name=cbAgrree]");

        //regex

        let reName = /^[A-ZČĆŽŠĐ][a-zčćžšđ]{2,15}$/;
        let reBYear = /^(19|20)\d{2}$/;
        let reAddress = /^([A-Z]|[1-9]{1,5})[A-Za-z\d\-\.\s]+$/;

        let errorNo = 0;
    
        //Name
        if(!reName.test($(firstName).val())){
            errorNo++;
            $(firstName).addClass('error');
        }
        else{
            $(firstName).removeClass('error');
        }

        //Last Name
        if(!reName.test($(lastName).val())){
            errorNo++;
            $(lastName).addClass('error');
        }
        else{
            $(lastName).removeClass('error');
        }

        //Year
        if(!reBYear.test($(bYear).val())){
            errorNo++;
            $(bYear).addClass('error');
        }
        else{
            $(bYear).removeClass('error');
        }

        //address
        if(!reAddress.test($(address).val())){
            errorNo++;
            $(address).addClass('error');
        }
        else{
            $(address).removeClass('error');
        }

        //city
        if(($(city).val() == "0")){
            errorNo++;
            $(city).addClass('error');
        }
        else{
            $(city).removeClass('error');
        }


         //gender
         if($(gen).length == 0){
            errorNo++;
            $("#genError").text("Morate odabrati nešto od ponuđenih");
        }
        else{
            $("#genError").html("");
        }

        //agrree
        if(!$(agree).prop('checked')){
            errorNo++;
            $("#agrreeError").text("Morate prihvatiti uslove korišćenja.");
        }
        else{
            $("#agrreeError").html("");
        }

        if(errorNo == 0){
            let sendData = {
                "firstName" : $(firstName).val(),
                "lastName" : $(lastName).val(),
                "bYear" : $(bYear).val(),
                "address" : $(address).val(),
                "idCity" : $(city).val(),
                "gen" : $(gen).val(),
                "btn" : true
            };

            $.ajax({
                url: "models/form-data.php",
                method : "post",
                data : sendData,
                dataType : "json",
                success : function(result){
                   $("#answer").html(`<p class="alert alert-success"> ${result.message} </p>`);
                   
                   $("#ajaxForm").hide();
                },
                error : function(xhr){
                    if(xhr.status == 422){
                        $("#answer").html(`<p class="alert alert-warning"> Došlo je do greške prilikom obrade podatka</p>`);
                    }
                    if(xhr.status == 500){
                        $("#answer").html(`<p class="alert alert-warning"> Došlo je do greške prilikom upisa podataka u bazu!</p>`);
                    }
                }
            })
        }

    })
})