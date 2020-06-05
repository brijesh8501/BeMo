$(document).on('click', '.delete-rec', function() {
    if(confirm("Are you sure want to delete this record?")){
        let data = {
            id: $(this).attr('data-id'),
            action: 'delete'
        }
        $.post("/bemo/bemo-admin/request.php", data, function(result){
            console.log(result);
            if(result === "1"){       
                $("#data-"+data.id).css('color','red');
                $("#data-"+data.id).children().eq(3).html("");
                alert("Record deleted");
            }else{
                alert("Something went wrong, try again!");
            }
        });
    }
});  