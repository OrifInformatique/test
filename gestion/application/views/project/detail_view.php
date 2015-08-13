<?php $this->load->helper('url');?>
<html>
	<head>
	
	<link rel="stylesheet" type="text/css" media="screen"
	href="http://localhost/gestion/css/gestion.css" />
	
		<title>Projet</title>
		<!-- 
		<script>
			function Edition()
			{				
				var x = document.getElementById("Edit").style.display;
				
				if(x=="none")
				{
					document.getElementById("Edit").style.display = "inline";
					x = document.getElementById("Edit").style.display;
				}
				else
				{
					document.getElementById("Edit").style.display="none";
				}
			}
		</script> -->
	</head>
	<body>
		<h3>Projet</h3>
		<table>
			<tr>
				<th>Titre</th>
				<th>Description</th>
				<th>Date de création</th>
				<th>Auteur</th>
				<th>Date de démarrage</th>
				<th>Date de fin</th>
				<th>Client</th>
				<th>Status</th>
			</tr>
			<?php foreach ($project as $row):?>
			<tr>			
				<td><?php echo $row->title;?></td>
				<td><?php echo $row->description;?></td>
				<td><?php echo $row->create_date;?></td>
				<td><?php echo $row->author_user_id;?></td>
				<td><?php echo $row->start_date;?></td>
				<td><?php echo $row->end_date;?></td>
				<td><?php echo $row->client_id;?></td>
				<td><?php echo $row->status_id;?></td>
				<td><a href="<?php echo base_url();?>projects/form/<?php echo $row->project_id ?>">edition</a></td>	
			</tr>	
			<?php endforeach;?>					
		</table>
		<br>
		<!-- 
		<h3>Tâches</h3>
		<table>
			<tr>
				<th>Titre</th>
				<th>Description</th>
				<th>Date de création</th>
				<th>Auteur</th>			
				<th>Status</th>
			</tr>		
			<?php foreach ($task as $row):?>
			<tr>
				<td><a href="<?php echo base_url(); ?>tasks/detail/<?php echo $row->task_id?>"><?php echo $row->title;?></a></td>
				<td><?php echo $row->description;?></td>
				<td><?php echo $row->create_date;?></td>
				<td><?php echo $row->author_user_id;?></td>
				<td><?php echo $row->status_id;?></td>	
				<td>
					<form method="post" action="<?php echo base_url(); ?>tasks/delete">
						<input type="hidden" name="id" value="<?php echo $row->task_id;?>"/>
						<input type="hidden" name="project" value="<?php echo $this->uri->segment(3);?>"/>
						<input type="submit" value="Delete"/>
					</form>
				</td>			
			</tr>				
			<?php endforeach;?>
		</table> 
		<br/>
		<form method="post" action="<?php echo base_url(); ?>tasks/news">			
			<input type="hidden" name="date" value="<?php echo date ('Y-m-d')?>"/>
			<input type="hidden" name="status" value="1"/>
			<input type="hidden" name="project" value="<?php echo $this->uri->segment(3);?>"/>
			Titre : <input type="text" name="title" required/><br/>
			Description : <br/>
			<textarea name="descr" required></textarea><br/>
			Auteur:
			<select name="author">
			<?php foreach ($user as $row): ?>
				  <option value="<?php echo $row->user_id?>"><?php echo $row->prename." ".$row->name?></option>
			<?php endforeach;?>
			</select> <br/>
			
			Temps alloué:<input type="date" name="allowed"><br/>
			Temps éstimé:<input type="date" name="estimated">
			
			<br/>						
			<input type="submit" value="OK"/>
		</form>
	
		<br/>
		<h3>Commentaires</h3>	
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
					<form method="post" action="<?php echo base_url(); ?>comments/delete">
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
		
			<form method="post" action="<?php echo base_url(); ?>comments/news">			
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
			</form> -->
			<a href="http://localhost/gestion/">Retour</a>
	</body>
</html>