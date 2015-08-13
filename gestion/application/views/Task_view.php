<?php $this->load->helper('url');?>
<html>
<head>
<link rel="stylesheet" type="text/css" media="screen"
		href="http://localhost/Gestion/css/gestion.css"/>
<title>Tâche</title>
</head>
<body>
	<table>
		<tr>
			<th>Titre</th>
			<th>Description</th>
			<th>Date de création</th>
			<th>Auteur</th>
			<th>Date de démarrage</th>
			<th>Status</th>
			<th>Temps alloués</th>
			<th>Date de fin</th>
			<th>Date de validation</th>			
			<th>Temps éstimé</th>
			<th>Temps éffectué</th>
		</tr>
		<tr>
		<?php foreach ($task as $row):?>
			<td><?php echo $row->title;?></td>
			<td><?php echo $row->description;?></td>
			<td><?php echo $row->create_date;?></td>
			<td><?php echo $row->author_user_id;?></td>
			<td><?php echo $row->start_date;?></td>
			<td><?php echo $row->status_id;?></td>	
			<td><?php echo $row->time_allowed;?></td>
			<td><?php echo $row->end_date;?></td>
			<td><?php echo $row->validation_date;?></td>
			<td><?php echo $row->time_estimate;?></td>
			<td><?php echo $row->time_real;?></td>
			
		<?php endforeach;?>
		</tr>
	</table>	
	<br/>	
	<table>
		<tr>
			<th>Commentaire</th>
			<th>Auteur</th>
			<th>Date de création</th>
		</tr>		
		<?php foreach ($comment as $row):?>
		<tr>
			<td><?php echo $row->text;?></td>
			<td><?php echo $row->author;?></td>
			<td><?php echo $row->date;?></td>
			<td>
				<form method="post" action="<?php echo base_url(); ?>Comment/Delete">
				<input type="hidden" name="id" value="<?php echo $row->comment_id;?>"/>
				<input type="hidden" name="typeId" value="<?php echo $this->uri->segment(3);?>"/>
				<input type="hidden" name="type" value="<?php echo $this->uri->segment(1);?>"/>
				<input type="submit" value="Delete"/>
				</form>
			</td>	
		</tr>	
		<?php endforeach;?>		
	</table> 
	
		<br/>	
	
		<form method="post" action="<?php echo base_url(); ?>Comment/News">			
				<input type="hidden" name="date" value="<?php echo date ('Y-m-d')?>"/>
				<input type="hidden" name="id" value="<?php echo $this->uri->segment(3);?>"/>
				<input type="hidden" name="type" value="<?php echo $this->uri->segment(1);?>"/>
				Commentaire : <br/>
				<textarea name="descr" required></textarea><br/>
				Auteur:
				<select name="author">
				<?php foreach ($user as $row): ?>
					  <option value="<?php echo $row->user_id?>"><?php echo $row->prename." ".$row->name?></option>
				<?php endforeach;?>
				</select> <br/>								
				<input type="submit" value="OK"/>
			</form>
</body>
</html>