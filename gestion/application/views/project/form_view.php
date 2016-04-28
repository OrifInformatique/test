<?php 
$url=base_url()."projects/add";
if(isset($project))
{
	foreach($project as $row):
	
	$title = $row->title;
	$descr = $row->description;
	$id = $row->project_id;
	$start_date = $row->start_date;
	$end_date = $row->end_date;
	$author_id = $row->author_id;
	$client_id = $row->client_id;
	$status_id = $row->status_id;
	
	endforeach;
}
else
{
	$title = '';
	$descr = '';
	$id = '';
	$start_date = '';
	$end_date = '';
	$author_id = '';
	$client_id = '';
	$status_id = '';
}

echo form_open('', array('role' => 'form')); ?>
  <input type="hidden" name="id" value="<?php echo $id; ?>" />		
  <input type="hidden" name="URL" value="<?php echo current_url(); ?>" />

  <!-- &#8239; correspond à l'espace fine insécable, utilisée devant les "doubles" ponctuations -->

  <div class="form-group">
    <label for="title">Titre&#8239;:</label>
	
    <input
      type  = "text"
      id    = "title"
      name  = "title"
      class = "form-control"
      value = "<?php echo $title; ?>"
	/>
  </div>
  
  <div class="form-group">
    <label for="descr">Description&#8239;:</label>
    <textarea id="descr" name="descr" class="form-control"><?php echo $descr; ?></textarea>
  </div>
  
  <div class="form-group">
    <label for="author">Auteur&#8239;:</label>
    <select id="author" name="author" class="form-control">
<?php foreach ($author as $row): ?>
      <option <?php if($author_id==$row->first_name." ".$row->last_name){echo 'selected';} ?>

      value="<?php echo $row->author_id; ?>"><?php echo $row->first_name . ' ' . $row->last_name; ?></option>
<?php endforeach;?>
    </select>
  </div>
  
  <div class="form-group">
    <label for="start">Date de départ&#8239;:</label>
	
    <input
      class       = "form-control"
      id          = "start"
      name        = "start"
      placeholder = "AAAA-MM-JJ"
      type        = "date"
      value       = "<?php echo $start_date; ?>"
    />
  </div>
  
  <div class="form-group">
    <label for="end">Date de fin&#8239;:</label>
	
    <input
      class       = "form-control"
      id          = "end"
      name        = "end"
      placeholder = "AAAA-MM-JJ"
      type        = "date"
      value       = "<?php echo $end_date; ?>"
    />	
  </div>
  
  <div class="form-group">
    <label for="client">Client&#8239;:</label>
    <select name="client" id="client" class="form-control">
      <?php foreach ($client as $row): ?>
      <option <?php if($client_id==$row->first_name." ".$row->last_name){echo "selected";} ?>

      value="<?php echo $row->client_id; ?>"><?php echo $row->first_name." ".$row->last_name; ?></option> 
	  <?php endforeach; ?>
    </select> 	
  </div>
  
  <div class="form-group">
	<label for="status">Status&#8239;:</label>
	<select name="status" id="status" class="form-control">
		<?php foreach ($status as $row): ?>
		<option <?php if($status_id == $row->status) {echo "selected";} ?>
		
		value="<?php echo $row->status_id; ?>"><?php echo $row->status; ?></option>
		<?php endforeach; ?>
	</select>
  </div>
  
  <div class="btn-group">
    <input type="submit" class="btn btn-success" value="Enregistrer" />
    <a role="button" class="btn btn-danger" href="<?php echo site_url(); ?>">Annuler</a>
  </div>
</form>