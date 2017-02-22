$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();

     function confirmDelete(e) {
        swal({
            title: "Are you sure?",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Delete",
            closeOnConfirm: false
        },
        function(){
            e.submit();
        });
    }
     
});