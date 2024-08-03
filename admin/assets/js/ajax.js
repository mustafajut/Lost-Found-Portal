function fitemDelete(id){
    $.ajax({
        url:"./controller/deletefouItemController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Items Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

// function updateUser(){
//     var u_id = $('#Id').val();
//     var u_name = $('#Username').val();
//     var u_email = $('#Email').val();
//     var u_phone = $('#Phone').val();

//     var fd = new FormData();
//     fd.append('Id', u_id);
//     fd.append('Username', u_name);
//     fd.append('Email', u_email);
//     fd.append('Phone', u_phone);

//     $.ajax({
//         url: './controller/updateUserController.php',
//         method: 'post',
//         data: fd,
//         processData: false,
//         contentType: false,
//         success: function(data){
//             alert('Data Update Success.');
//             // Optionally, you can reload the page or update specific elements
//             // reloadPage();
//             // updateUserDataInUI();
//         }
//     });
// }
