<!-- Display messages -->
<?php if ($this->session->flashdata('user_saved')) : ?>
  <?php echo '<p class="alert alert-success">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' .$this->session->flashdata('user_saved') . '</p>'; ?>
<?php endif; ?>
<?php if ($this->session->flashdata('user_deleted')) : ?>
  <?php echo '<p class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' .$this->session->flashdata('user_deleted') . '</p>'; ?>
<?php endif; ?>
<?php if ($this->session->flashdata('user_enabled')) : ?>
  <?php echo '<p class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' .$this->session->flashdata('user_enabled') . '</p>'; ?>
<?php endif; ?>
<?php if ($this->session->flashdata('user_disabled')) : ?>
  <?php echo '<p class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' .$this->session->flashdata('user_disabled') . '</p>'; ?>
<?php endif; ?>
<div class="col-xs-12 col-md-8 col-md-offset-2 col-lg-10 col-lg-offset-1">
  <h1 class="page-header">Usuarios</h1>
  <a href="<?php echo base_url(); ?>admin/users/post" class="btn btn-success pull-right">Crear Usuario</a><br><br>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <th>#</th>
        <th>Username</th>
        <th>Email</th>
        <th>Grupo</th>
        <th>Creación</th>
        <th>Actualización</th>
        <th>Editar</th>
        <th>Active</th>
        <th>Eliminar</th>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
          <td><?php echo $user->id_user; ?></td>
          <td><?php echo $user->username; ?></td>
          <td><?php echo $user->email; ?></td>
          <td><?php echo $user->group; ?></td>
          <td><?php echo $user->created; ?></td>
          <td><?php echo $user->last_update; ?></td>
          <td>
            <a href="<?php echo base_url(); ?>admin/users/put/<?php echo $user->id_user ?>" class="btn btn-primary"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a> 
          </td>
          <?php if($user->active == 1): ?>
          <td>
            <a href="<?php echo base_url(); ?>admin/users/disable/<?php echo $user->id_user ?>" class="btn btn-success"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a>
          </td>
          <?php elseif($user->active == 0): ?>
          <td>
            <a href="<?php echo base_url(); ?>admin/users/enable/<?php echo $user->id_user ?>" class="btn btn-warning"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
          </td>
          <?php endif; ?>
          <td>
            <a href="<?php echo base_url(); ?>admin/users/delete/<?php echo $user->id_user ?>" class="btn btn-danger" onclick="return delete_confirm();"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="col-xs-6 col-xs-offset-3"><?php echo $this->pagination->create_links(); ?></div>
  </div>
</div>