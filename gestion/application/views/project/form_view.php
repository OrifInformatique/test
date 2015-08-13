<script>
	function goback()
	{
		history.go(-1);
	}
</script>
<?php 
$title="";
$descr="";
$id=0;
$url=base_url()."projects/add";
if(isset($project))
{
	foreach($project as $row):
	
	$title=$row->title;
	$descr=$row->description;
	$id=$row->project_id;
	$url=base_url()."projects/update/".$id;
	$start_date=$row->start_date;
	$end_date=$row->end_date;
	$author_id=$row->author_user_id;
	$client_id=$row->client_id;
	$status_id=$row->status_id;
	endforeach;
}

if($id==0)
{
?>
<form method="post" action="<?php echo $url;?>">
	<input type="hidden" name=id value="<?php echo $id;?>"/>
	<input type="hidden" name="create" value="<?php echo date ('Y-m-d')?>"/>
	<input type="hidden" name="status" value="1"/>
	<input type="hidden" name="URL" value="<?php echo current_url();?>"/>
	Titre : <input type="text" name="title" value="<?php echo $title;?>"/><br/>
	Description : <br/>
	<textarea name="descr"><?php echo $descr;?></textarea><br/>
	Auteur:	
	<select name="author">
		<option selected>choisir un auteur</option>
		<?php foreach ($user as $row): ?>
		<option  value="<?php echo $row->user_id;?>"><?php echo $row->prename." ".$row->name;?></option>
		<?php endforeach;?>
	</select> <br/>
	Client:	
	<select name="client">
		<option selected>choisir un client</option>
		<?php foreach ($client as $row): ?>
		<option value="<?php echo $row->client_id;?>"><?php echo $row->name." ".$row->surname;?></option>
		<?php endforeach;?>
	</select> 
	<br/>						
	<input type="submit" value="OK"/>
</form>
<?php 
}
else
{
?>

<form method="post" action="<?php echo $url;?>">
	<input type="hidden" name=id value="<?php echo $id;?>"/>		
	<input type="hidden" name="URL" value="<?php echo current_url();?>"/>
	Titre : <input type="text" name="title" value="<?php echo $title;?>"/><br/>
	Description : <br/>
	<textarea name="descr"><?php echo $descr;?></textarea><br/>
	Auteur:	
	<select name="author">
		<?php foreach ($user as $row): ?>
		<option <?php if($author_id==$row->prename." ".$row->name){echo "selected";} ?>
		
		value="<?php echo $row->user_id;?>"><?php echo $row->prename." ".$row->name;?></option>
		<?php endforeach;?>
	</select> 
	<br/>
	Date de départ*:
	<input type="date" name="start" value="<?php echo $start_date;?>">
	<br/>
	Date de fin*:
	<input type="date" name="end" value="<?php echo $end_date;?>">	
	<br/>
	Client:	
	<select name="client">
		<?php foreach ($client as $row): ?>
		<option <?php if($client_id==$row->name." ".$row->surname){echo "selected";} ?>
		
		value="<?php echo $row->client_id;?>"><?php echo $row->name." ".$row->surname;?></option>
		<?php endforeach;?>
	</select> 	
	<br/>	
	Status:
	<select name="status">
		<?php foreach ($status as $row): ?>
		<option <?php if($status_id==$row->status){echo "selected";} ?>
		
		value="<?php echo $row->status_id;?>"><?php echo $row->status;?></option>
		<?php endforeach;?>
	</select> 	
	<br/>				
	*Les dates doivent être écrite dans ce format: AAAA-MM-JJ<br/>	
	<input type="submit" value="OK"/>
</form>
<?php 
}
?>
<button onclick="goback()">Annuler</button>