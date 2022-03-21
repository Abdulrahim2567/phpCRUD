$(document).ready(function(){

    $(".btn").css("border", "none")
    //$("body").css("background", 'url("img/background/mount2.jpg")').css("background-size", "cover")
    $('[data-toggle="popover"]').popover();
    $(".navbar-toggler").css("border", "none");
    let rotate = false;
    $(".navbar-toggler").on("click", ()=>{
        
        if(!rotate)
        {
            $(".navbar-toggler").css("transform", "rotate(90deg)").css("transition", ".2s ease-in-out");
            rotate = true; 
        }
        else
        {
            $(".navbar-toggler").css("transform", "rotate(0deg)").css("transition", ".2s ease-in-out");
            rotate = false;
        }
    })
    $(".link").on("click", ()=>{
            $(".home").removeClass("active").removeClass("bg-info").css("color", "black");
            $(".link").addClass("active").addClass("bg-info").css("color", "#fff");
    });
    $(".home").on("click", ()=>{
        $(".link").removeClass("active").removeClass("bg-info").css("color", "black");
        $(".home").addClass("active").addClass("bg-info").css("color", "#fff");
    });
    
    //handle modal
    $("#myModal").modal("handleUpdate");
    $("#Add-User-Modal").modal("handleUpdate");
    $("#Edit-Modal").modal("handleUpdate");
    //end
    $(".delete").hover(function () {
            // over
            $(".delete").addClass("bg-danger").css("transition", ".5s ease-in-out")
            $(".delete > span").addClass("text-light").removeClass("text-danger").css("transition", ".5s ease-in")
    
        }, function () {
            // out
            $(".delete").removeClass("bg-danger").css("transition", ".2s ease-in-out")
            $(".delete > span").addClass("text-danger").removeClass("text-light").css("transition", ".2s ease-in")
        }
    );
    $(".edit").hover(function () {
            // over
            $(".edit").addClass("bg-primary").css("transition", ".5s ease-in-out")
            $(".edit > span").addClass("text-light").removeClass("text-primary").css("transition", ".5s ease-in")
        }, function () {
            // out
            $(".edit").removeClass("bg-primary").css("transition", ".2s ease-in-out")
            $(".edit > span").addClass("text-primary").removeClass("text-light").css("transition", ".2s ease-in")
        }
    );
    $(".status").hover(function () {
            // over
            $(".status").addClass("bg-warning").css("transition", ".5s ease-in-out")
            $(".status > span").addClass("text-light").removeClass("text-warning").css("transition", ".5s ease-in")
        }, function () {
            // out
            $(".status").removeClass("bg-warning").css("transition", ".2s ease-in-out")
            $(".status > span").addClass("text-warning").removeClass("text-light").css("transition", ".2s ease-in")
        }
    );
    $("#table").DataTable({
        "select": true,
        "scrollX": false
    });
    $(".dataTables_length").addClass("bs-select");
    $.fn.dataTable.ext.classes.sPagebutton = "bg-dark";
});
function set_delete_val(valueS){
    $(".confirm-delete").val(valueS);
}
function set_status_email(value){
    $(".confirm-status").val(value);
    $.ajax({
        type:"GET",
        url: "backend/select.php",
        data: {
            email: value
        },
        dataType: "JSON",
        success: function (response) {
            for (const i of response) {
                $("#status-value").val(i.Status);
                if(i.Status === "active")
                {
                    $(".status-modal-header").html("    Deactivate Account");
                    $(".status-header").html("Deactivate this account?");
                }
                else
                {
                    $(".status-modal-header").html("    Activate Account");
                    $(".status-header").html("Activate this account?");
                }
            }
        }
    });
}
function set_edit_val(valueS){
    $(".update").val(valueS);
    $.ajax({
        type:"GET",
        url: "backend/select.php",
        data: {email: valueS},
        dataType: "JSON",
        success: function (response) {
            for (const i of response) {
                $("#e_email").val(i.Email);
                $("#e_username").val(i.Username);
                $("#phone2").val(i.Phone);
                $("#e_gender").val(i.Gender);
                $("#e_location").val(i.Location);
            }
        }
    });
    //const xmlhttp = new XMLHttpRequest;
    //xmlhttp.onload = function (){
         //console.log(this);
    //}
    //xmlhttp.open("POST", "backend/select.php?email="+valueS);
    //xmlhttp.send();
}

setInterval(()=>{
    $.ajax({
        type:"GET",
        url: "backend/count.php",
        success: function (response) {
           $(".num_users").html(response);
        }
    });
}, 800);


setInterval(()=>{
    $.ajax({
        type:"GET",
        url: "backend/count_status.php",
        success: function (response) {
           $(".num_users_inactive").html(response);
        }
    });
}, 800);

$(".update").on("click", ()=>{
    $(".msg-modal").removeClass("bg-danger").addClass("bg-primary")
    $(".popup-message").html("Account updated!")
    setTimeout(()=>{
        $(".trigger-message-modal").trigger("click");
    }, 500);
});
function dismiss_message()
{
    setTimeout(()=>{
        $("#Message-Modal").modal('hide');
    }, 2000);
}

//trigger first click for the show buttons
($(".show")).each(function (i, e) {
    // element == this
    $(this).trigger("click")
});

//for the telInput
let input = document.querySelector("#phone");
let input2 = document.querySelector("#phone2");
var num1 = window.intlTelInput(input, {
    // allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    //dropdownContainer: document.body,
    // excludeCountries: ["us"],
    // formatOnDisplay: false,
    // geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //     var countryCode = (resp && resp.country) ? resp.country : "";
    //     callback(countryCode);
    //   });
    // },
    hiddenInput: "full_number",
    initialCountry: "cm",
    // localizedCountries: { 'de': 'Deutschland' },
    nationalMode: false,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    //placeholderNumberType: "MOBILE",
    // preferredCountries: ['cn', 'jp'],
    separateDialCode: true,
    utilsScript: "phone/build/js/utils.js",
});
var num2 = window.intlTelInput(input2, {
    // allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    // dropdownContainer: document.body,
    // excludeCountries: ["us"],
    // formatOnDisplay: false,
    // geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
    //     var countryCode = (resp && resp.country) ? resp.country : "";
    //     callback(countryCode);
    //   });
    // },
    hiddenInput: "full_number",
    initialCountry: "cm",
    // localizedCountries: { 'de': 'Deutschland' },
    nationalMode: true,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
    //placeholderNumberType: "MOBILE",
    // preferredCountries: ['cn', 'jp'],
    separateDialCode: true,
    utilsScript: "phone/build/js/utils.js",
});
 $(".userform").submit(function () { 
    var full_number = num1.getNumber(intlTelInputUtils.numberFormat.E164);
    $("#phone").val(full_number);
});
$(".editform").submit(function () { 
    var full_number = num2.getNumber(intlTelInputUtils.numberFormat.E164);
    $("#phone2").val(full_number);
});

function validateEmail($email) 
{ 
    var emailReg = /^([\w-\.]+@([\w]+\.){1,2}[\w]{2,3})?$/; 
    return emailReg.test( $email ); 
}
function validatePhone($phone)
{
    var phoneReg = /^\+237+/;
    var phoneRegx = /^\+234+/;
    var camRegx = /^\+2376[25-9]\d{7}$/
    var nigRegx = /^\+234(703)?(706)?(803)?(802)?\d{7}$/
    if(phoneReg.test($phone)){
        //for cameroon numbers
        return camRegx.test($phone);
    }
    else{
        //for others
        if(phoneRegx.test($phone)){
            //for nigerian numbers
            return nigRegx.test($phone);
        }
    }
}
function validateCard($card)
{
    var visaRegx = /^4\d{12}(?:\d{3})?$/
    var masterRegx = /^5[1-5]\d{14}|^(222[1-9]|22[3-9]\\d|2[3-6]\\d{2}|27[0-1]\\d|2720)\d{12}$/
    if(visaRegx.test($card))
        return visaRegx.test($card)
    else
        return masterRegx.test($card)
}
$(".userform").on("submit", ()=>{
    if(!validateEmail($("#email").val()))
    {
        $("#email").focus();
        $(".email-error").addClass("text-danger").html("<em class = 'bi bi-exclamation-triangle'></em> This Email is invalid");
        return false;
    }
    else{
        $(".email-error").html("");
    }
    if(!validatePhone($("#phone").val()))
    {
        $("#phone").focus();
        $(".number-error").css("visibility", "visible").addClass("text-danger").html("<em class = 'bi bi-exclamation-triangle'></em> This number is invalid");
        return false;
    }
    else{
        $(".number-error").css("visibility", "hidden");
    }
    if(!validateCard($(".cardnumber").val()))
    {
        $(".cardnumber").focus();
        $(".card-error").css("visibility", "visible").addClass("text-danger").html("<em class = 'bi bi-exclamation-triangle'></em> Invalid credit card number");
        return false;
    }
    else{
        $(".card-error").css("visibility", "visible");
    }
})

//update account via ajax
let allEmails = document.querySelectorAll('.email');
let allPhones = document.querySelectorAll('.phone');
let allLocations = document.querySelectorAll('.location');
let allGenders = document.querySelectorAll('.gender');
let allUsernames = document.querySelectorAll('.username');
let allTableRows = document.querySelectorAll(".table-row")

console.log("display name => "+ $(".display-name").html())

$(".update").on("click", (e)=>{
    e.preventDefault;
    $.ajax({
        type: "POST",
        data: {
            email: $(".update").val(),
            phone: $("#phone2").val(),
            location: $("#e_location").val(),
            username: $("#e_username").val(),
            gender: $("#e_gender").val()
        },
        url: "backend/new_update.php",
        dataType: "JSON",
        success: function (response) {
            for (const i of response) {
                allEmails.forEach((element, index) => {
                    if(element.innerHTML === i.Email){
                        allPhones[index].innerHTML = i.Phone
                        allLocations[index].innerHTML = i.Location
                        allGenders[index].innerHTML = i.Gender
                        allUsernames[index].innerHTML = i.Username
                        $.ajax({
                            type: "GET",
                            url: "backend/update_list.php",
                            data: {
                                email: i.Email,
                                indexValue: index
                            },
                            dataType: "JSON",
                            success: function (Response) {
                                console.log(Response);
                            }
                        });
                    }
                })
            }
        }
    });
})

setInterval(()=>{
    $.ajax({
        type:"GET",
        url: "backend/update_table.php",
        dataType: "JSON",
        success: function (response) {
            for (const i of response) {
                console.log(response);
                allPhones[i.Index].innerHTML = i.Phone
                allLocations[i.Index].innerHTML = i.Location
                allGenders[i.Index].innerHTML = i.Gender
                allUsernames[i.Index].innerHTML = i.Username
            }
        }
    });
}, 1000);

//delete account via ajax
$(".confirm-delete").on("click", (e)=>{
    e.preventDefault;
    $.ajax({
        type: "POST",
        url: "backend/delete_data.php",
        data: {
            email: $(".confirm-delete").val()
        },
        success: function (response) {
            if(response === "true")
            {
                $(".msg-modal").removeClass("bg-danger").addClass("bg-primary")
                $(".popup-message").html("Account deleted!")
                setTimeout(()=>{
                    $(".trigger-message-modal").trigger("click");
                }, 500);
                allTableRows.forEach((element, index)=>{
                    if(element.children[1].textContent == $(".confirm-delete").val())
                    {
                        element.remove()
                    }
                })
            }

        }
    });
})

//check if user exists on create user attempt
$(".create-user").on("hover", (e)=>{
    $.ajax({
        type: "POST",
        url: "backend/check_user.php",
        data: {
            email: $("#email").val()
        },
        success: function (response) {
            console.log(response)
            if(response === "true")
            {
                $(".popup-message").html("Failed to add user, account with this email already exist!")
                $(".msg-modal").removeClass("bg-primary").addClass("bg-danger")
                setTimeout(()=>{
                    $(".trigger-message-modal").trigger("click");
                }, 500);
            }
            else if (response === "false")
            {
                $(".msg-modal").removeClass("bg-danger").addClass("bg-primary")
                $(".popup-message").html("User successfully added!")
                setTimeout(()=>{
                    $(".trigger-message-modal").trigger("click");
                }, 500);
            }
            else{
                $(".msg-modal").removeClass("bg-primary").addClass("bg-danger")
                $(".popup-message").html("Error, counldn't connect!")
                setTimeout(()=>{
                    $(".trigger-message-modal").trigger("click");
                }, 500);
            }
        }
    });
})
