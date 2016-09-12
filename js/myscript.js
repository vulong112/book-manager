$(document).ready(function () {
    $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
    $("#book-menu").click(function (e) {
        e.preventDefault();
         readRecordsBook();

    });

    $("#author-menu").click(function (e) {
        e.preventDefault();
        readRecordsAuthor();
    })

    $("ul.category-menu li a").click(function () {
        var cate_id = $(this).attr("data-def");
        readRecordsCategory(cate_id);
    });

    // Admin
    $('#book-admin').click(function (e) {
        e.preventDefault();
        readRecordsBookManager();
    });

    $('#author-admin').click(function (e) {
        e.preventDefault();
        readRecordsAuthorManager();
    });
    
    $("#category-admin").click(function (e) {
        e.preventDefault();
        readRecordsCategoryManager();
    });


});


function readRecordsBook() {
    $.get("ajax/readRecordsBook.php",function (data,status) {
        $('.bookrecords-content').siblings().hide();
        $(".bookrecords-content").show();
        // $('#book-admin-content').hide();
        $(".bookrecords-content").html(data);
    });
}

function readRecordsAuthor() {
    $.get("ajax/readRecordsAuthor.php",function (data,status) {
        $('.bookrecords-content').siblings().hide();
        $(".bookrecords-content").show();
        $(".bookrecords-content").html(data);
    });
}

function readRecordsCategory(id) {
    $.get("ajax/readRecordsCategory.php",{cate_id: id},function (data,status) {
        $('.bookrecords-content').siblings().hide();
        $(".bookrecords-content").show();
        $(".bookrecords-content").html(data);
    });
}

// Admin Function

function readRecordsBookManager() {
    $.get("ajax/readRecordsBookManager.php",{},function (data,status) {
        $('#book-admin-content').siblings().hide();
        $('#book-admin-content').show();
        $('#book-manager').html(data);
    })
}

function readRecordsAuthorManager() {
    $.get("ajax/readRecordsAuthorManager.php",{},function (data,status) {
        $('#author-admin-content').siblings().hide();
        $("#author-admin-content").show();
        $("#author-manager").html(data);
    });
}

function getBookDetail(id) {
    $('#hidden-book-id').val(id);
    $.post("ajax/getBookDetail.php",{id: id}, function (data,status) {
        var book = JSON.parse(data);
        $("#update-book-id").val(book.book_id);
        $("#update-book-name").val(book.book_name);
        $("#update-category-id").val(book.category_id);
        $("#update-author-id").val(book.author_id);
        $("#update-published-year").val(book.published_year);
    });
    $("#update-book-modal").modal('show');
}

function getAuthorDetail(id) {
    $("#hidden-author-id").val(id);
    $.post("ajax/getAuthorDetail.php",{id: id},function (data,status) {
        var author = JSON.parse(data);

        $("#update-full-name").val(author.fullname);

        $("#update-email").val(author.email);
        $("#update-phone-number").val(author.phonenumber);
        $("#update-birthday").val(author.birthday);
        $("#update-address").val(author.address);
    });
    $("#update-author-modal").modal("show");
}

function updateBookDetail() {
    var book_id = $("#update-book-id").val();
    var book_name = $("#update-book-name").val();
    var category_id = $("#update-category-id").val();
    var author_id = $("#update-author-id").val();
    var published_year = $("#update-published-year").val();

    $.post("ajax/updateBookDetail.php",
        {
            bi : book_id,
            bn : book_name,
            ci : category_id,
            ai : author_id,
            py : published_year
        },
        function(data, status) {
            $("#update-book-modal").modal('hide');
            readRecordsBookManager();
        }
        );
}

function readRecordsCategoryManager() {
    $.get("ajax/readRecordsCategoryManager.php",{},function (data,status) {
        $('#category-admin-content').siblings().hide();
        $('#category-admin-content').show();
        $('#category-manager').html(data);
    })
}

function updateAuthorDetail() {
    $("#update-author-modal span").remove();

    var regemail = new RegExp('[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$');
    var regfullname = new RegExp('^[a-zA-Z\s]+$');
    var regaddress = new RegExp('^[a-zA-Z0-9]');


    var ai = $("#hidden-author-id").val();
    var fn = $("#update-full-name").val();
    var em = $("#update-email").val();
    var pn = $("#update-phone-number").val();
    var bd = $("#update-birthday").val();
    var ad = $("#update-address").val();

    if(!regfullname.test(fn) || !regemail.test(em) || !regaddress.test(ad)){

        if(!regfullname.test(fn)) $("#update-full-name").after("<span style='color: red'>Invalidate</span>");
        if(!regemail.test(em)) $("#update-email").after("<span style='color: red'>Invalidate</span>");
        // if(!regphonenumber.test(phonenumber)) $("#add-phone-number").after("<span style='color: red'>Invalidate</span>");
        if(!regaddress.test(ad)) $("#update-address").after("<span style='color: red'>Invalidate</span>");
        return;
    }

    
    $.post("ajax/updateAuthorDetail.php",{
        ai : ai,
        fn : fn,
        em : em,
        pn : pn,
        bd : bd,
        ad : ad
    },function () {
        $("#update-author-modal").modal("hide");
        readRecordsAuthorManager();
    });
    
}

function addRecordsBook() {
    var book_id = $("#book_id").val();
    var book_name = $("#book_name").val();
    var category_id = $("#category_id").val();
    var author_id = $("#author_id").val();
    var published_year = $("#published_year").val();

    $.post("ajax/addRecordsBook.php",
        {
            book_id : book_id,
            book_name : book_name,
            category_id : category_id,
            author_id : author_id,
            published_year : published_year,
        },function (data,status) {
            $("#add_new_record_modal_book").modal("hide");
            readRecordsBookManager();
            $("#book_id").val("");
            $("#book_name").val("");
            $("#category_id").val("");
            $("#author_id").val("");
            $("#published_year").val("");
        })
}

function addRecordsAuthor() {
    $("#add_new_record_modal_author span").remove("span");

    var regid = new RegExp('^[0-9]+$');
    var regemail = new RegExp('[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$');
    var regfullname = new RegExp('^[a-zA-Z\s]+$');
    var regaddress = new RegExp('^[a-zA-Z0-9]');
    // var regphonenumber = new RegExp('?([0-9]{3})\?([ .-]?)([0-9]{3})\2([0-9]{4})');

    var email = $("#add-email").val();
    var fullname = $("#add-full-name").val();
    var author_id = $("#add-author-id").val();
    var phonenumber = $("#add-phone-number").val();

    var birthday = $("#add-birthday").val();
    var address = $("#add-address").val();

    if(!regid.test(author_id) || !regfullname.test(fullname) || !regemail.test(email) || !regaddress.test(address)){
        if (!regid.test(author_id)) $("#add-author-id").after("<span style='color: red'>Invalidate</span>");
        if(!regfullname.test(fullname)) $("#add-full-name").after("<span style='color: red'>Invalidate</span>");
        if(!regemail.test(email)) $("#add-email").after("<span style='color: red'>Invalidate</span>");
        // if(!regphonenumber.test(phonenumber)) $("#add-phone-number").after("<span style='color: red'>Invalidate</span>");
        if(!regaddress.test(address)) $("#add-address").after("<span style='color: red'>Invalidate</span>");
        return;
    }

    $.post("ajax/addRecordsAuthor.php",{
            ai : author_id,
            fn : fullname,
            em : email,
            pn : phonenumber,
            bd : birthday,
            ad : address
        },function (data,status) {
            $("#add_new_record_modal_author").modal("hide");
            readRecordsAuthorManager();
            $("#add-author-id").val("");
            $("#add-full-name").val("");
            $("#add-email").val("");
            $("#add-phone-number").val("");
            $("#add-birthday").val("");
            $("#add-address").val("");
    })


}

function deleteRecordsBook(book_id) {
    var conf = confirm('Are you sure?');
    if(conf==true){
        $.post("ajax/deleteRecordsBook.php",
            {
                book_id : book_id
            },function (data,status) {
                readRecordsBookManager();
            });

    }

}

function deleteRecordsAuthor(author_id) {
    var conf = confirm('Are you sure?');
    if(conf==true){
        $.post("ajax/deleteRecordsAuthor.php",
            {
                author_id : author_id
            },function (data,status) {
                readRecordsAuthorManager();
            });

    }
}