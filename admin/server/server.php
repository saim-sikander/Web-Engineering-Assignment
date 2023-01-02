<?php
include "../../config/db.php";
//Index Start
session_start();	
if(isset($_POST["login"])){	
    $email = $_POST["email"];
    $pass  = $_POST["pass"];
    if($email=="admin@gmail.com" && $pass=="admin@gmail.com"){
        $_SESSION["isAdminLoggedIn"]=true;		
      	die("1");
    }	
    else
        echo("Invalid Email OR Password");

}//End
//Medium Start
//Add
if (isset($_POST["addMedium"])){
	$title   = $_POST["medium"];

	$insert = mysqli_query($con,"insert into medium set title='".$title."',created_at=NOW()");
	if($insert)
		die("Medium Added");
	else
		die("Error");
}//End
//View
else if (isset($_POST["viewMedium"])){
	// echo "string";
    ?>	
	<table class="table">
        <thead>  
            <th>S.NO</th>
            <th>Medium</th>
            <th>Created_at</th>
            <th>Updated_at</th> 
            <th>Action</th>                                   
        </thead>
        <tbody>
        	<?php     
            $query = mysqli_query($con,"select * from medium"); 
            $sno = 1;
            while($row=mysqli_fetch_object($query)){                       
            ?>
            <tr>
            	<input type="hidden" name="title<?=$row->id?>" value="<?=$row->title?>">
                              
            	<td><?=$sno?></td>
                <td><?=$row->title?></td>
                <td><?=$row->created_at?></td>
                <td><?=$row->updated_at?></td>	
                <td><div class='dropdown'>
	                    <button class='btn btn-light btn-block dropdown-toggle' type='button'
	                        id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true'
	                        aria-expanded='false'>
	                        Edit
	                    </button>
	                    <div class='dropdown-menu animated--fade-in'
	                        aria-labelledby='dropdownMenuButton'>
	                        <!-- <button type="button" class='dropdown-item' data-toggle='modal' data-target='#exampleModal'><i class='fas fa-edit'></i> Edit</button> -->
	                        <a class='dropdown-item' href='javascript:void(0)' onclick="editRow('<?=$row->id?>')"><i class='fas fa-edit'></i> Edit</a>
	                        <a class='dropdown-item' href='javascript:void(0)' onclick='deleteRow("<?=$row->id?>")'><i class='fas fa-trash'></i> Delete</a>
	                        <a class='dropdown-item' href='javascript:void(0)'>Approved</a>
	                    </div>
                    </div>
                </td>

            </tr>
            <?php
            $sno++;
            }
            ?>           
        </tbody>	
	<?php
}//End
//Delete
else if(isset($_POST["deleteMedium"])){
	$id  = $_POST["id"]; 
	$dlt = mysqli_query($con,"delete from medium where id='$id'");
	if ($dlt) {
		die("1");
	}
}//End
//Update
else if(isset($_POST["editMedium"])){
	$id     = $_POST["id"]; 
	$title  = $_POST["title"];

	$update = mysqli_query($con,"update medium set title='".$title."',updated_at=NOW() where id='".$id."'");
	
	if($update)
		die("1");
}//End//Medium End

//Singer Start
//Add
else if (isset($_POST["addSinger"])) {
	$medium_id = $_POST["medium_id"];
	$name      = $_POST["name"];
	$desc      = $_POST["desc"];

	$photo     = $_FILES["photo"]["name"];	
	$extension = explode(".",$photo);
	$filename  = rand()."-shaz.".$extension[1];

	move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/".$filename);

	$insert = mysqli_query($con,"insert into singers set medium_id='".$medium_id."',name='".$name."',photo='".$filename."',description='".$desc."',created_at=NOW()");
	if($insert)
		die("Singer Added");
	else
		die("UnSuccessful");
}//End
//View
else if (isset($_POST["viewSinger"])){
	$id = $_POST["id"];
    ?>	
	<table class="table">
        <thead>  
            <th>S.NO</th>
            <th>Name</th>
            <th>Photo</th>
            <th>Description</th>
            <th>Created_at</th>
            <th>Updated_at</th> 
            <th>Action</th>                                   
        </thead>
        <tbody>
        	<?php     
            $query = mysqli_query($con,"select * from singers where medium_id='$id'"); 
            $sno = 1;
            while($row=mysqli_fetch_object($query)){                       
            ?>
            <tr>
            	<input type="hidden" name="medium_id<?=$row->id?>" value="<?=$row->medium_id?>">
            	<input type="hidden" name="name<?=$row->id?>" value="<?=$row->name?>">
                <input type="hidden" name="photo<?=$row->id?>" value="<?=$row->photo?>">
                <input type="hidden" name="desc<?=$row->id?>" value="<?=$row->description?>">
                
            	<td><?=$sno?></td>
                <td><?=$row->name?></td>
                <td><?=$row->photo?></td>
                <td><?=$row->description?></td>
                <td><?=$row->created_at?></td>
                <td><?=$row->updated_at?></td>	
                <td><div class='dropdown'>
	                    <button class='btn btn-light btn-block dropdown-toggle' type='button'
	                        id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true'
	                        aria-expanded='false'>
	                        Edit
	                    </button>
	                    <div class='dropdown-menu animated--fade-in'
	                        aria-labelledby='dropdownMenuButton'>
	                        <!-- <button type="button" class='dropdown-item' data-toggle='modal' data-target='#exampleModal'><i class='fas fa-edit'></i> Edit</button> -->
	                        <a class='dropdown-item' href='javascript:void(0)' onclick="editRow('<?=$row->id?>')"><i class='fas fa-edit'></i> Edit</a>
	                        <a class='dropdown-item' href='javascript:void(0)' onclick='deleteRow("<?=$row->id?>")'><i class='fas fa-trash'></i> Delete</a>
	                        <a class='dropdown-item' href='javascript:void(0)'>Approved</a>
	                    </div>
                    </div>
                </td>

            </tr>
            <?php
            $sno++;
            }
            ?>           
        </tbody>	
	<?php
}//End
//Delete
else if(isset($_POST["deleteSinger"])){
	$id  = $_POST["id"]; 
	$dlt = mysqli_query($con,"delete from singers where id='$id'");
	if ($dlt) {
		die("1");
	}
}//End
//Update
else if(isset($_POST["editSinger"])){
	$id        = $_POST["id"]; 
	$medium_id = $_POST["medium_id"];
	$name      = $_POST["name"];
	$desc      = $_POST["desc"];

	$photo     = $_FILES["photo"]["name"];	
	$extension = explode(".",$photo);
	$filename  = rand()."-shaz.".$extension[1];

	move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/".$filename);

	$update = mysqli_query($con,"update singers set medium_id='".$medium_id."',name='".$name."',photo='".$filename."',description='".$desc."',updated_at=NOW() where id='".$id."'");
	if($update)
		die("Singer Updated Successfully");
	else
		die("UnSuccessful");
}//End//Singer End

else if(isset($_POST["getSingers"])){
	$medium_id = $_POST["medium_id"];

	$query = mysqli_query($con,"select id,name from singers where medium_id='$medium_id'"); 
	echo '<option value="">Select Singer</option>';
	while($rows=mysqli_fetch_object($query)){  
		echo "<option value='".$rows->id."'>".$rows->name."</option>";
	}
}//end

else if(isset($_POST["getAlbums"])){
	$singer_id = $_POST["singer_id"];

	$query = mysqli_query($con,"select id,title from albums where singer_id='$singer_id'"); 
	echo '<option value="">Select Album</option>';
	while($rows=mysqli_fetch_object($query)){  
		echo "<option value='".$rows->id."'>".$rows->title."</option>";
	}
}//End

//Album Start
//Add
else if (isset($_POST["addAlbum"])) {
	$singer_id = $_POST["singer_id"];
	$title     = $_POST["title"];
	$launch    = $_POST["launch"];
	$prod      = $_POST["prod"];
	$desc      = $_POST["desc"];

	$poster    = $_FILES["poster"]["name"];	
	$extension = explode(".",$poster);
	$filename  = rand()."-poster.".$extension[1];

	move_uploaded_file($_FILES["poster"]["tmp_name"],"../uploads/".$filename);

	$insert = mysqli_query($con,"insert into albums set singer_id='".$singer_id."',title='".$title."',production='".$prod."',launch_date='".$launch."',poster='".$filename."',description='".$desc."',created_at=NOW()");
	if($insert)
		die("Album Added");
	else
		die("UnSuccessful");
}//End
//View
else if (isset($_POST["viewAlbum"])){
	$id = $_POST["id"];
    ?>	
	<table class="table">
        <thead>  
            <th>S.NO</th>
            <th>Title</th>
            <th>Production</th>
            <th>Launch_Date</th>
            <th>Description</th>
            <th>Created_at</th>
            <th>Updated_at</th> 
            <th>Action</th>                                   
        </thead>
        <tbody>
        	<?php     
            $query = mysqli_query($con,"select * from albums where singer_id='$id'"); 
            $sno = 1;
            while($row=mysqli_fetch_object($query)){                       
            ?>
            <tr>
            	<input type="hidden" name="singer_id<?=$row->id?>" value="<?=$row->singer_id?>">
            	<input type="hidden" name="title<?=$row->id?>" value="<?=$row->title?>">
            	<input type="hidden" name="poster<?=$row->id?>" value="<?=$row->poster?>">
       			<input type="hidden" name="launch<?=$row->id?>" value="<?=$row->launch_date?>">
       			<input type="hidden" name="prod<?=$row->id?>" value="<?=$row->production?>">
       			<input type="hidden" name="desc<?=$row->id?>" value="<?=$row->description?>">
       
            	<td><?=$sno?></td>
            	<td><?=$row->title?></td>
            	<td><?=$row->production?></td>
            	<td><?=$row->launch_date?></td>
                <td><?=$row->description?></td>
                <td><?=$row->created_at?></td>
                <td><?=$row->updated_at?></td>	
                <td><div class='dropdown'>
	                    <button class='btn btn-light btn-block dropdown-toggle' type='button'
	                        id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true'
	                        aria-expanded='false'>
	                        Edit
	                    </button>
	                    <div class='dropdown-menu animated--fade-in'
	                        aria-labelledby='dropdownMenuButton'>
	                        <!-- <button type="button" class='dropdown-item' data-toggle='modal' data-target='#exampleModal'><i class='fas fa-edit'></i> Edit</button> -->
	                        <a class='dropdown-item' href='javascript:void(0)' onclick="editRow('<?=$row->id?>')"><i class='fas fa-edit'></i> Edit</a>
	                        <a class='dropdown-item' href='javascript:void(0)' onclick='deleteRow("<?=$row->id?>")'><i class='fas fa-trash'></i> Delete</a>
	                        <a class='dropdown-item' href='javascript:void(0)'>Approved</a>
	                    </div>
                    </div>
                </td>

            </tr>
            <?php
            $sno++;
            }
            ?>           
        </tbody>	
	<?php
}//End
//Delete
else if(isset($_POST["deleteAlbum"])){
	$id  = $_POST["id"]; 
	$dlt = mysqli_query($con,"delete from albums where id='$id'");
	if ($dlt) {
		die("1");
	}
}//End
//Update
else if(isset($_POST["editAlbum"])){
	$id        = $_POST["id"]; 
	$singer_id = $_POST["singer_id"];
	$title     = $_POST["title"];
	$launch    = $_POST["launch"];
	$prod      = $_POST["prod"];
	$desc      = $_POST["desc"];

	$poster    = $_FILES["poster"]["name"];	
	$extension = explode(".",$poster);
	$filename  = rand()."-poster.".$extension[1];

	move_uploaded_file($_FILES["poster"]["tmp_name"],"../uploads/".$filename);

	$update = mysqli_query($con,"update albums set singer_id='".$singer_id."',title='".$title."',production='".$prod."',launch_date='".$launch."',poster='".$filename."',description='".$desc."',updated_at=NOW() where id='".$id."'");
	if($update)
		die("Album Updated Successfully");
	else
		die("UnSuccessful");
}//End//Album End

//Songs Start
//Add
else if (isset($_POST["addSongs"])) {
	$album_id  = $_POST["album_id"];
	$title     = $_POST["title"];

	$file     = $_FILES["file"]["name"];	
	$extension = explode(".",$file);
	$filename  = rand()."-song.".$extension[1];

	$file_type = $extension[1];

	move_uploaded_file($_FILES["file"]["tmp_name"],"../uploads/".$filename);

	$insert = mysqli_query($con,"insert into songs set album_id='".$album_id."',title='".$title."',file='".$filename."',file_type='".$file_type."',created_at=NOW()");
	if($insert)
		die("Song Added");
	else
		die("UnSuccessful");
}//End
//View
else if (isset($_POST["viewSongs"])){
	$id = $_POST["id"];
    ?>	
	<table class="table">
        <thead>  
            <th>S.NO</th>
            <th>Title</th>
            <th>File</th>
            <th>File_Type</th>
            <th>Created_at</th>
            <th>Updated_at</th> 
            <th>Action</th>                                   
        </thead>
        <tbody>
        	<?php     
            $query = mysqli_query($con,"select * from songs where album_id='$id'"); 
            $sno = 1;
            while($row=mysqli_fetch_object($query)){                       
            ?>
            <tr>
            	<input type="hidden" name="album_id<?=$row->id?>" value="<?=$row->album_id?>">
            	<input type="hidden" name="title<?=$row->id?>" value="<?=$row->title?>">
            	<input type="hidden" name="file<?=$row->id?>" value="<?=$row->file?>">
            	
            	<td><?=$sno?></td>
            	<td><?=$row->title?></td>
            	<td><?=$row->file?></td>
            	<td><?=$row->file_type?></td>
                <td><?=$row->created_at?></td>
                <td><?=$row->updated_at?></td>	
                <td><div class='dropdown'>
	                    <button class='btn btn-light btn-block dropdown-toggle' type='button'
	                        id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true'
	                        aria-expanded='false'>
	                        Edit
	                    </button>
	                    <div class='dropdown-menu animated--fade-in'
	                        aria-labelledby='dropdownMenuButton'>
	                        <a class='dropdown-item' href='javascript:void(0)' onclick="editRow('<?=$row->id?>')"><i class='fas fa-edit'></i> Edit</a>
	                        <a class='dropdown-item' href='javascript:void(0)' onclick='deleteRow("<?=$row->id?>")'><i class='fas fa-trash'></i> Delete</a>
	                        <a class='dropdown-item' href='javascript:void(0)'>Approved</a>
	                    </div>
                    </div>
                </td>

            </tr>
            <?php
            $sno++;
            }
            ?>           
        </tbody>	
	<?php
}//End
//Delete
else if(isset($_POST["deleteSongs"])){
	$id  = $_POST["id"]; 
	$dlt = mysqli_query($con,"delete from songs where id='$id'");
	if ($dlt) {
		die("1");
	}
}//End
//Update
else if(isset($_POST["editSongs"])){
	$id        = $_POST["id"]; 
	$album_id  = $_POST["album_id"];
	$title     = $_POST["title"];

	$file     = $_FILES["file"]["name"];	
	$extension = explode(".",$file);
	$filename  = rand()."-song.".$extension[1];

	$file_type = $extension[1];

	move_uploaded_file($_FILES["file"]["tmp_name"],"../uploads/".$filename);

	$update = mysqli_query($con,"update songs set album_id='".$album_id."',title='".$title."',file='".$filename."',file_type='".$file_type."',updated_at=NOW() where id='".$id."'");
	if($update)
		die("Song Updated Successfully!");
	else
		die("UnSuccessful");
}//End//Songs End
?>
