$(function () {
	$(".addAlbum").on("submit",function(e){
		e.preventDefault();
		formdata = new FormData(this);
		formdata.append("addAlbum",true)
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
		
		localStorage.setItem("medium_id",$(this).val())
		$.ajax({
			url:"server/server.php",
			type:"POST",
			data:{
				medium_id:$(this).val(),
				getSingers:true
			},
			success:function(response)
			{
				$(".singers").html(response)
			}
		});
	})

	$(".singers").on("change",function(){
		id = $(this).val();
		viewAlbum(id)
	})

	$(".editAlbum").on("submit",function(e){
		e.preventDefault();
		formdata = new FormData(this);
		formdata.append("editAlbum",true)
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

function viewAlbum(id){
	$.ajax({
			url:"server/server.php",
			type:"post",
			data:{
				id:id,
				viewAlbum:true
			},
			success:function(response)
			{
				$(".viewAlbum").html(response)
				//alert(response)
			}
		})
}

//Delete Function
function deleteRow(id){

	if(confirm("Do you really want to delete this Row?")!=false){

		$.ajax({
			url:"server/server.php",
			type:"post",
			data:"deleteAlbum=true&id="+id,
			success:function(response)
			{
				if(response==1){
					alert("Your Album is Deleted!")
					window.location.reload()
				}
			}
		})
	}
}//End

function editRow(id){

	medium_id       = localStorage.getItem("medium_id")
	
	$(".select-medium-id").val(medium_id)

	title       = $("input[name='title"+id+"']").val()
	poster      = $("input[name='poster"+id+"']").val()
	launch      = $("input[name='launch"+id+"']").val()
	prod        = $("input[name='prod"+id+"']").val()
	desc        = $("input[name='desc"+id+"']").val()
	singer_id   = $("input[name='singer_id"+id+"']").val()

	$("input[name='id']").val(id)
	$("select[name='singer_id']").val(singer_id)
	$("input[name='title']").val(title)
	$("input[name='launch']").val(launch)
	$("input[name='prod']").val(prod)
	$("textarea[name='desc']").val(desc)

	$(".profile-img").attr("src","uploads/"+poster)	
	$("input[name='oldimage']").val(poster)

	$('#exampleModal').modal('show')
			
}//END

function closeModel(){
	$('#exampleModal').modal('hide')

}