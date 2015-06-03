<!-- Display form validations errors -->
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url(); ?>admin/users/post">
  <div class="row">
    <div class="col-xs-6">
      <h1>Editar Usuario</h1>
    </div>
    <div class="col-xs-6">
      <div class="btn-group pull-right">
        <input type="submit" name="submit" class="btn btn-default" value="Guardar">
        <a href="<?php echo base_url(); ?>admin/users" class="btn btn-danger">Cancelar</a>
      </div>
    </div>
  </div><!-- /row buttons-->
  <div class="row">
    <div class="col-xs-12">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/dashboard"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> General</a></li>
        <li><a href="<?php echo base_url(); ?>admin/categories"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Usuarios</a></li>
        <li class="active"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear Usuario</li>
      </ol>
    </div>
  </div><!-- /row breadcumb-->

  <div class="row">
    <div class="col-xs-12">

      <div class="form-group">
        <label>Nombre de Usuario</label>
        <input type="text" name="username" class="form-control" value="<?php echo set_value('username'); ?>" placeholder="Usuario">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="<?php echo set_value('password'); ?>" placeholder="Password">
      </div>

      <div class="form-group">
        <label>Confirmar Password</label>
        <input type="password" name="confirm_password" class="form-control" value="<?php echo set_value('confirm_password'); ?>" placeholder="Confirmar Password">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>" placeholder="Email">
      </div>

      <div class="form-group">
        <label>Grupo de Usuarios</label>
          <select name="group" class="form-control">
            <option value="" selected="selecciona">Seleccionar grupo</option>
            <option value="admin">Admin</option>
            <option value="medium">Medium</option>
            <option value="register">Register</option>
          </select>
      </div>

    </div>
  </div><!-- /row form-controls-->
</form>