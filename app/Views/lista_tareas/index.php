<?= $this->extend('templates/admin_template') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Task Add</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Task Add</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <?php if(session('msg')):?>
            <div class="alert alert-<?=session('msg.type')?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-<?=session('msg.icon')?>"></i> Alert!</h5>
                <?=session('msg.body')?>
            </div>
            <?php endif;?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="<?= site_url('SaveTask')?>">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Nombre Tarea</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Detalles de la tarea</label>
                            <textarea id="description" name="description" class="form-control" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="id_category">Categorias</label>
                            <select id="id_category" class="form-control" name="id_category">
                                <?php $i = 0; foreach (CATEGORIAS as $category): ?>
                                <?php echo '<option value='.$i.'>'.$category.'</option>' ?>
                                <?php $i++; endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_status">Estado</label>
                            <select id="id_status" class="form-control" name="id_status">
                                <?php $i = 0; foreach (ESTADOS as $status): ?>
                                <?php echo '<option value='.$i.'>'.$status.'</option>' ?>
                                <?php $i++; endforeach;?>
                            </select>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-right">Guardar</button>
                    </div>
                </div>
            </form>
            <!-- /.card -->
        </div>

    </div>
    <div class="container-fluid">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista Tareas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="tableUsers" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Titulo</th>
                                            <th>Descripcion</th>
                                            <th>Categoria</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($tasks as $task): ?>
                                        <tr>
                                            <td><?php echo $task['id_task']?></td>
                                            <td><?php echo $task['title']?></td>
                                            <td><?php echo $task['description']?></td>
                                            <td><?php echo CATEGORIAS[$task['id_category']]?></td>
                                            <td><?php echo ESTADOS[$task['id_status']]?></td>
                                            <td>
                                                <a href="<?=site_url('EditTask/'.$task['id_task']);?>"
                                                    class="btn btn-primary" type="button">Editar</a>
                                                <a href="<?=site_url('DeleteTask/'.$task['id_task']);?>"
                                                    class="btn btn-danger" type="button">Eliminar</a>
                                            </td>

                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>

</section>
<!-- /.content -->
<?= $this->endSection('content') ?>