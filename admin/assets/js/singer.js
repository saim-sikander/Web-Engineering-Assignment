$(function () {
	$(".addSinger").on("submit",function(e){
		e.preventDefault();
		formdata = new FormData(this);
		formdata.append("addSinger",true)
		$.ajax({
			url:"server/server.php",
			type:"POST",
			data:formdata,
			processData:false,
			contentType:false,
			cache:false,
			success:function(response)
			{
				alert(response)
			}
		});
	})

	$(".select-medium-id").on("change",function(){
		id = $(this).val();
		viewSinger(id)
	})

	$(".editSinger").on("submit",function(e){
		e.preventDefault();
		formdata = new FormData(this);
		formdata.append("editSinger",true)
		$.ajax({
			url:"server/server.php",
			type:"POST",
			data:formdata,
			processData:false,
			contentType:false,
			cache:false,
			success:function(response)
			{
				alert(response)
				window.location.reload()
			}
		});	
	})
})	

function viewSinger(id){
	// alert(id)
	$.ajax({
		url:"server/server.php",
		type:"post",
		data:{
			id:id,
			viewSinger:true
			},
		success:function(response)
		{
			$(".viewSinger").html(response)
			//alert(response)
		}
	});
}

//Delete Function
function deleteRow(id){

	if(confirm("Do you really want to delete this Row?")!=false){

		$.ajax({
			url:"server/server.php",
			type:"post",
			data:"deleteSinger=true&id="+id,
			success:function(response)
			{
				if(response==1){
					alert("Your Singer is Deleted!")
					window.location.reload()
				}
			}
		})
	}
}//End

function editRow(id){
	name       = $("input[name='name"+id+"']").val()
	photo      = $("input[name='photo"+id+"']").val()
	desc       = $("input[name='desc"+id+"']").val()
	medium_id  = $("input[name='medium_id"+id+"']").val()
	
	$("input[name='id']").val(id)
	$("select[name='medium_id']").val(medium_id)
	$("input[name='name']").val(name)
	$("textarea[name='desc']").val(desc)

	$(".profile-img").attr("src","uploads/"+photo)	
	$("input[name='oldimage']").val(photo)

	$('#exampleModal').modal('show')
			
}//END

function closeModel(){
	$('#exampleModal').modal('hide')

}