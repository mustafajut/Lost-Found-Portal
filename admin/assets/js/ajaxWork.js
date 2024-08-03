
// Show lost products
function showProductItems(){  
    $.ajax({
        url:"./adminView/viewLostProducts.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

//Show Found Products
function showProductSizes(){  
    $.ajax({
        url:"./adminView/viewFoundProducts.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showCategory(){  
    $.ajax({
        url:"./adminView/viewCategories.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
function showCustomers(){
    $.ajax({
        url:"./adminView/viewUsers.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function showOrders(){
    $.ajax({
        url:"./adminView/viewAllClaims.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

function ChangeOrderStatus(id){
    $.ajax({
       url:"./controller/updateOrderStatus.php",
       method:"post",
       data:{record:id},
       success:function(data){
           alert('Order Status updated successfully');
           $('form').trigger('reset');
           showOrders();
       }
   });
}

// add product data
// function addItems(){
//     var p_name=$('#litemName').val();
//     var p_desc=$('#lItemDescription').val();
//     var p_price=$('#Contact').val();
//     var category=$('#category').val();
//     var upload=$('#upload').val();
//     var file=$('#file')[0].files[0];

//     var fd = new FormData();
//     fd.append('litemName', p_name);
//     fd.append('lItemDescription', p_desc);
//     fd.append('Contact', p_price);
//     fd.append('category', category);
//     fd.append('file', file);
//     fd.append('upload', upload);
//     $.ajax({
//         url:"./controller/addItemController.php",
//         method:"post",
//         data:fd,
//         processData: false,
//         contentType: false,
//         success: function(data){
//             alert('Product Added successfully.');
//             $('form').trigger('reset');
//             showProductItems();
//         }
//     });
// }

//add product data
function addItems(){
    var p_name=$('#litemName').val();
    var p_price=$('#p_price').val();
    var p_desc=$('#p_price').val();
    var category=$('#category').val();
    var upload=$('#upload').val();
    var file=$('#file')[0].files[0];

    var fd = new FormData();
    fd.append('litemName', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('file', file);
    fd.append('upload', upload);
    $.ajax({
        url:"./controller/addItemController.php",
        method:"post",
        data:fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Product Added successfully.');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}


//edit lost data
function itemEditForm(id){
    $.ajax({
        url:"./adminView/editItemForm.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

//update lost product after submit
function updateItems(){
    var product_id = $('#litemId').val();
    var p_name = $('#litemName').val();
    var p_desc = $('#lItemDescription').val();
    var p_price = $('#Contact').val();
    var category = $('#categoryId').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('litemId', product_id);
    fd.append('litemName', p_name);
    fd.append('lItemDescription', p_desc);
    fd.append('Contact', p_price);
    fd.append('categoryId', category);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);
   
    $.ajax({
      url:'./controller/updateItemController.php',
      method:'post',
      data:fd,
      processData: false,
      contentType: false,
      success: function(data){
        alert('Data Update Success.');
        $('form').trigger('reset');
        showProductItems();
      }
    });
}

//edit Found data
function fitemEditForm(id){
    $.ajax({
        url:"./adminView/editfoundform.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


//update found product after submit
function updateItem() {
    var product_id = $('#fitemId').val();
    var p_name = $('#fitemName').val();
    var p_desc = $('#fItemDescription').val();
    var p_price = $('#Contact').val();
    var category = $('#category').val(); // Corrected ID
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('fitemId', product_id);
    fd.append('fitemName', p_name);
    fd.append('fItemDescription', p_desc);
    fd.append('Contact', p_price);
    fd.append('ficategory', category);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);

    $.ajax({
        url: './controller/updatefoundItemController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function (data) {
            alert('Data Update Success.');
            $('form').trigger('reset');
            // showProductItems();
        },
        error: function (xhr, status, error) {
            alert("An error occurred: " + error);
        }
    });
}


// function updateItem(){
//     var product_id = $('#fitemId').val();
//     var p_name = $('#fitemName').val();
//     var p_desc = $('#fItemDescription').val();
//     var p_price = $('#Contact').val();
//     var category = $('#ficategory').val();
//     var existingImage = $('#existingImage').val();
//     var newImage = $('#newImage')[0].files[0];
//     var fd = new FormData();
//     fd.append('fitemId', product_id);
//     fd.append('fitemName', p_name);
//     fd.append('fItemDescription', p_desc);
//     fd.append('Contact', p_price);
//     fd.append('ficategory', category);
//     fd.append('existingImage', existingImage);
//     fd.append('newImage', newImage);
   
//     $.ajax({
//       url:'./controller/updatefoundItemController.php',
//       method:'post',
//       data:fd,
//       processData: false,
//       contentType: false,
//       success: function(data){
//         alert('Data Update Success.');
//         $('form').trigger('reset');
//         // showProductItems();
//       }
//     });
// }



//delete lost data
function itemDelete(id){
    $.ajax({
        url:"./controller/deleteItemController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Items Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}
//delete found data
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

//delete category data
function categoryDelete(id){
    $.ajax({
        url:"./controller/catDeleteController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showCategory();
        }
    });
}
//delete User data
function userDelete(id){
    $.ajax({
        url:"./controller/deleteUsercontroller.php",
        method:"post",
        data:{record:id},
        success:function(data){
            alert('User Successfully deleted');
            $('form').trigger('reset');
            showCustomers();
        }
    });
}

//edit user data
function updateUser(){
    var u_id = $('Id').val();
    var u_name = $('Username').val();
    var u_email = $('Email').val();
    var u_phone = $('Phone').val();

    var fd = new FormData();
    fd.append('Id', u_id);
    fd.append('Username', u_name);
    fd.append('Email', u_email);
    fd.append('Phone', u_phone);

    $.ajax({
        url: './controller/updateUserController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data){
            alert('Data Update Success.');
            // Optionally, you can reload the page or update specific elements
            reloadPage();
            updateUserDataInUI();
        }
    });
}




function search(id){
    $.ajax({
        url:"./controller/searchController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('.eachCategoryProducts').html(data);
        }
    });
}


function quantityPlus(id){ 
    $.ajax({
        url:"./controller/addQuantityController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('form').trigger('reset');
            showMyCart();
        }
    });
}
function quantityMinus(id){
    $.ajax({
        url:"./controller/subQuantityController.php",
        method:"post",
        data:{record:id},
        success:function(data){
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function checkout(){
    $.ajax({
        url:"./view/viewCheckout.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}
