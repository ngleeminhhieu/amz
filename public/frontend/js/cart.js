$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(function() {
    $('.addtocart').click(function() {
        var url = $(this).data('href');
        var id = $(this).data('id');
        var route = "'f.removeitem_post'";
        var html = "";
        var ques = "'Do you want to delete it ?'";
        $.post(url, { id: id }).done(function(data) {
            if (data.status == "success") {
                //$('#products').remove();
                toastr.success(data.msg);
                $('#count').text(data.n);
                $('#total-count').text(data.n + " ITEMS");
                $('#total-amount').text(data.totaloffcial.toLocaleString() + " VND");
                for (var k in data.cart) {
                    html += '<li id="infoProduct' + k + '">';
                    html += '<a onclick="return confirm(' + ques + ')" class="remove removeProduct" title="Remove this item" data-id="' + k + '" data-href="http://localhost:8000/client/remove-item"><i class="fa fa-remove removeProduct "></i></a>';
                    html += '<a class="cart-img" href="client/product/' + k + '"><img src="' + data.cart[k]['img'] + '"/></a>' + '<h4><a href="/client/product/' + k + '">' + data.cart[k]['nameProduct'] + '</a></h4>';
                    html += '<p class="quantity">' + data.cart[k]['quantityBuy'] + ' x <span class="amount">' + data.cart[k]['priceoffcial'].toLocaleString() + '</span></p>';
                    html += '</li>'
                }
                $('#shopping-list').html(html);
                // if (data.result == "Redirect")
                //     window.location

                $('.removeProduct').click(function() {
                    var url = $(this).data('href');
                    var id = $(this).data('id');
                    var re = '#infoProduct' + id;
                    //alert(re);
                    $.post(url, { id: id }).done(function(data) {
                        if (data.status == "success") {
                            $(re).remove();
                            toastr.success(data.msg);
                            $('#count').text(data.n);
                            $('#total-count').text(data.n + " ITEMS");
                            $('#total-amount').text(data.totaloffcial.toLocaleString() + " VND");
                        }
                    });
                });
            }
        })
    });
})

$(function() {
    $('.removeProduct').click(function() {
        var url = $(this).data('href');
        var id = $(this).data('id');
        var re = '#infoProduct' + id;
        //alert(re);
        $.post(url, { id: id }).done(function(data) {
            if (data.status == "success") {
                $(re).remove();
                toastr.success(data.msg);
                $('#count').text(data.n);
                $('#total-count').text(data.n + " ITEMS");
                $('#total-amount').text(data.totaloffcial.toLocaleString() + " VND");
                // // for (var k in data.cart) {
                // //     //console.log("ProductID" + k, data.cart[k]['nameProduct'], data.cart[k]['quantityBuy'] + "x" + data.cart[k]['priceoffcial']);
                //     html += '<li><a class="cart-img"><img src="' + data.cart[k]['img'] + '"/></a>';
                // }
                // $('#shopping-list').html(html);
                // if (data.result == "Redirect")
                //     window.location
            }
        });
    })
})