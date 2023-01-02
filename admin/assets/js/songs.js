$(function () {
	$(".addSong").on("submit",function(e){
		e.preventDefault();
		formdata = new FormData(this);
		formdata.append("addSongs",true)
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

		localStorage.setItem("singer_id",$(this).val())

		$.ajax({
			url:"server/server.php",
			type:"POST",
			data:{
				singer_id:$(this).val(),
				getAlbums:true
			},
			success:function(response)
			{
				$(".albums").html(response)
			}
		});
	})

	$(".albums").on("change",function(){
		id = $(this).val();
		viewSongs(id)
	})

	$(".editSongs").on("submit",function(e){
		e.preventDefault();
		formdata = new FormData(this);
		formdata.append("editSongs",true)
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

function viewSongs(){
	$.ajax({
		url:"server/server.php",
		type:"post",
		data:{
			id:id,
			viewSongs:true
			},
		success:function(response)
		{
			$(".viewSong").html(response)
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
			data:"deleteSongs=true&id="+id,
			success:function(response)
			{
				if(response==1){
					alert("Your Song is Deleted!")
					window.location.reload()
				}
			}
		})
	}
}//End

function editRow(id){

	medium_id       = localStorage.getItem("medium_id")
	singer_id       = localStorage.getItem("singer_id")

	album_id   = $("input[name='album_id"+id+"']").val()
	title      = $("input[name='title"+id+"']").val()
	file       = $("input[name='file"+id+"']").val()

	$("input[name='id']").val(id)
	$(".select-medium-id").val(medium_id)
	$(".singers").val(singer_id)
	$("select[name='album_id']").val(album_id)
	$("input[name='title']").val(title)
	
	$("input[name='oldfile']").val(file)

	$('#exampleModal').modal('show')
			
}//END

function closeModel(){
	$('#exampleModal').modal('hide')

}