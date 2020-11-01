$( document ).ready(function() {
$(".modalEdit").on("click",editForm);
$("#xuy").on("click",storeData);
});

function editForm() {
var user_id = $(this).data("id")
$.ajax({
type: 'GET',
url: `admin/${user_id}/edit`,
data: {
    user: user_id,
},
success: function (response) {
    $("#name").val(response["name"])
    $("#surname").val(response["surname"])
    $("#fathername").val(response["fathername"])
    $("#faculty").val(response["faculty"])
    $("#cathedra").val(response["cathedra"])
    $("#specialty").val(response["specialty"])
    $("#workplace").val(response["workplace"])
    $("#group").val(response["group"])
    $("#modelFormEdit").attr("data-id", `${response["id"]}`);
},
error: function(){

},
dataType: 'json',
})
}


function storeData() {
var CSRF_TOKEN = $("meta[name='csrf-token']").attr("content")    
var user_id = $("#modelFormEdit").data("id")
var name = $("#name").val()
var surname = $("#surname").val()
var fathername = $("#fathername").val()
var faculty = $("#faculty").val()
var cathedra = $("#cathedra").val()
var specialty = $("#specialty").val()
var group = $("#group").val()
var workplace = $("#workplace").val()

$.ajax({
    headers: { 'X-HTTP-Method-Override': 'PATCH' },
    type: 'PATCH',

url: `/admin/${user_id}`,
data: {
    _token:CSRF_TOKEN,
    _method:"PATCH",
    name:name,
    surname:surname,
    fathername: fathername,
    faculty:faculty,
    cathedra:cathedra,
    specialty:specialty,
    group:group,
    workplace:workplace,
},
success: function (response) {
   console.log("xuyt")
},
error: function(data){
    console.log(data)
},
dataType: 'json',
})
}
