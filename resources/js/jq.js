$( document ).ready(function() {
$(".modalEdit").on("click",editForm)
$("#modalFormEdit").on("submit",storeData)
$(".cancelBtn").click(function(){
    $(".modal").modal("hide")
});
$("#deleteBtn").click(deleteUser)
$(".admin__buttons-delete").click(function(){
$(".edit-modal__delete").attr("data-id", $(this).attr("data-id"))
})
$(".admin__buttons-role").click(function(){
$("#role-form").attr("data-id", $(this).attr("data-id"))
})
$("#role-form").submit(roleAssign)
});

function editForm() {
var user_id = $(this).attr("data-id")
console.log(user_id)
$.ajax({
type: 'POST',
url: `/admin/${user_id}/edit`,
data: {
    _token:$("meta[name='csrf-token']").attr("content"),
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
    $("#modalFormEdit").attr("data-id", `${response["id"]}`);
},
error: function(){
    console.log("")
},
dataType: 'json',
})
}


function storeData(e) {
    e.preventDefault()
var id = $("#modalFormEdit").attr("data-id")
var name = $("#name").val();
var surname = $("#surname").val();
var fathername = $("#fathername").val();
var faculty = $("#faculty").val();
var cathedra = $("#cathedra").val();
var specialty = $("#specialty").val();
var group = $("#group").val();
var workplace = $("#workplace").val();

$.ajax({
    type: 'POST',
    url: `admin/${id}`,
    data: {
    _token:$("meta[name='csrf-token']").attr("content"),
    id: id,
    name:name,
    surname:surname,
    fathername:fathername,
    faculty:faculty,
    specialty:specialty,
    cathedra:cathedra,
    group:group,
    workplace:workplace
    },
success: function (response) {
    $('#create').modal('hide')
    $(`#row-${response["id"]} a`).text(response["name"]+" "+response["surname"])
},
error: function(data){
    console.log("error")
},
dataType: 'json',
})
}

function deleteUser() {
    var id = $(".edit-modal__delete").attr("data-id")
    $.ajax({
        type:"POST",
        url: `/admin/${id}/delete`,
        data: {
            _token:$("meta[name='csrf-token']").attr("content"),
            },
        success:function(response){
            $('#deleteModal').modal('hide')
            $(`#row-${response["id"]}`).remove()
            $(`#row-${response["id"]}`)
        },
        error:function(response){
            console.log("error")
        },
        dataType:'json',
    })
}

function roleAssign(e){
    e.preventDefault()
    var id = $(this).attr("data-id")
    var role_id = $("#role-name").val()
    $.ajax({
        type:"POST",
        url: `/admin/${id}/role`,
        data: {
            _token:$("meta[name='csrf-token']").attr("content"),
            role_id: role_id,
            user_id: id
            },
        success:function(response){
            $('#roleModal').modal('hide')
            $(`#row-${response["id"]} .admin__roles`).children( "h4" ).detach()
            response["names"].forEach(name => {
                $(`#row-${response["id"]} .admin__roles`).append(` <h4>${name}</h4>`);
            });
            console.log(response["names"])

        },
        error:function(response){
            console.log("error3")
        },
        dataType:'json',
    })

}