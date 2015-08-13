<?php $this->load->helper('url'); ?>
<html>
	<head>		
		<title>Menu</title>
	</head>
	<body>
		<h3>Projets</h3>
		<table>
			<tr>
				<th>Titre</th>
				<th>Description</th>
				<th>Date de création</th>
			<!-- 	<th>Auteur</th>			
				<th>Status</th> -->
			</tr>
			<?php foreach ($project as $row):?>
			<tr>		
				<td><a href="<?php echo base_url(); ?>projects/detail/<?php echo $row->project_id?>"><?php echo $row->title;?></a></td>
				<td><?php echo $row->description;?></td>
				<td><?php echo $row->create_date;?></td>
			<!-- 	<td><?php echo $row->author_user_id;?></td>
				<td><?php echo $row->status_id;?></td>	 -->
				<td>
				<?php $onclick = array('onclick'=>"return confirm('Are you sure?')");?>
				<?=anchor(base_url()."projects/delete/".$row->project_id, 'Delete', $onclick);?>
				<?php $onclick = array('onclick'=>"return confirm('Are you sure?')");?>
				</td>	
			</tr>
			<?php endforeach;?>
		</table>			
		<br/><a href="<?php echo base_url();?>projects/form">Nouveau</a>
	</body>
</html>