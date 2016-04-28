<?php $this->load->helper('url'); ?>
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
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
    </thead>

    <tbody>
      <?php foreach ($project as $row): ?>
	  <tr>
        <td><a href="<?php echo base_url(); ?>projects/detail/<?php echo $row->project_id; ?>"><?php echo $row->title; ?></a></td>
        <td><?php echo $row->description; ?></td>
        <td><?php echo $row->create_date; ?></td>
        <td><?php echo $row->author_user_id; ?></td>
		<td><?php echo $row->start_date;  ?></td>
		<td><?php echo $row->end_date;  ?></td>
		<td><?php echo $row->client_id;  ?></td>
        <td><?php echo $row->status_id;?></td>
        <td>
          <?php $attributs = array('onclick'=>"return confirm('Êtes-vous sûr de vouloir effacer ce projet ?')", 'class'=>'close'); 
          anchor(base_url()."projects/delete/".$row->project_id, '&times;', $attributs); ?>
        </td>
      </tr>
      <?php endforeach; ?>
	</tbody>
  </table>
</div>
<a href="<?php echo base_url(); ?>form" role="button" class="btn btn-primary btn-lg">Nouveau</a>