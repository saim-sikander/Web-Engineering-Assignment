$(function () {
	//Add
	$(".addMedium").on("submit",function(e){
		e.preventDefault();
		$.ajax({
			url:"server/server.php",
			type:"post",
			data:$(this).serialize()+"&addMedium=true",
			success:function(response)
			{
				alert(response)
				// swal("Good job!", "Medium is Added!", "success")
				$("input[type='text']").val("");
			}
		})
	})
	//View
	$("#view-tab").on("click",function(){
    	$.ajax({
			url:"server/server.php",
			type:"post",
			data:"viewMedium=true",
			success:function(response)
			{
				$(".viewMedium").html(response)
				//alert(response)
			}
		})
    })
	//Edit
    $(".editMedium").on("submit",function(e){
		e.preventDefault();
		$.ajax({
			url:"server/server.php",
			type:"post",
			data:$(this).serialize()+"&editMedium=true",
			success:function(modify)
			{
				if (modify == 1){
					alert("Your Medium is Updated!")
					window.location.reload()
				}	
				else
					alert("Try Again!")
			}
			
		})
	})
})

function closeModel(){
	$('#exampleModal').modal('hide')
}

//Delete Function
function deleteRow(id){

	if(confirm("Do you really want to delete this Row?")!=false){

		$.ajax({
			url:"server/server.php",
			type:"post",
			data:"deleteMedium=true&id="+id,
			success:function(response)
			{
				if(response==1){
					alert("Your Medium is Deleted!")
					window.location.reload()
				}
			}
		})
	}
}//End


function editRow(id){
	title = $("input[name='title"+id+"']").val()
	
	$("input[name='id']").val(id)
	$("input[name='title']").val(title)

	$('#exampleModal').modal('show')
			
}
