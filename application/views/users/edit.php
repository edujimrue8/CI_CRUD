<!-- Display form validations errors -->
<?php echo validation_errors('<p class="alert alert-dismissable alert-danger">'); ?>
<form method="post" action="<?php echo base_url(); ?>admin/users/put/<?php echo $user->id_user; ?>">
  <div class="row">
    <div class="col-xs-6">
      <h1>Editar Usuario</h1>
    </div>
    <div class="col-xs-6">
      <div class="btn-group pull-right">
        <input type="submit" name="submit" class="btn btn-default" value="Guardar">
        <a href="<?php echo base_url(); ?>admin/users" class="btn btn-danger">Cerrar</a>
      </div>
    </div>
  </div><!-- /row buttons-->
  <div class="row">
    <div class="col-xs-12">
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>admin/dashboard"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard</a></li>
        <li><a href="<?php echo base_url(); ?>admin/categories"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Articles</a></li>
        <li class="active"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Editar Usuario</li>
      </ol>
    </div>
  </div><!-- /row breadcumb-->

  <div class="row">
    <div class="col-xs-12">

      <div class="form-group">
        <label>Nombre de Usuario</label>
        <input type="text" name="username" class="form-control" value="<?php echo $user->username ?>" placeholder="Usuario">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="" placeholder="Password">
      </div>

      <div class="form-group">
        <label>Confirmar Password</label>
        <input type="password" name="confirm_password" class="form-control" value="" placeholder="Confirmar Password">
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control" value="<?php echo $user->email ?>" placeholder="Email">
      </div>

      <div class="form-group">
        <label>Grupo de Usuario</label>
        <select name="group" class="form-control">
            <option selected="<?php echo $user->group; ?>"><?php echo $user->group; ?></option>
            <option value="admin">admin</option>
            <option value="medium">medium</option>
            <option value="register">register</option>
        </select>
      </div>

    </div>
  </div><!-- /row form-controls-->
</form>