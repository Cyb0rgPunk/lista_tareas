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
            <form method="POST" action="<?= site_url('UpdateTask')?>">
                <input type="hidden" class="" name='id_task' value='<?= $task['id_task']?>'>
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
                            <input type="text" id="title" name="title" value='<?= $task['title']?>'
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description">Detalles de la tarea</label>
                            <textarea id="description" name="description" class="form-control"
                                rows="4"><?= $task['description']?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="id_category">Categorias</label>
                            <select class="form-control" name="id_category">
                                <?php foreach (CATEGORIAS as $index => $category): 
                                            if($index == $task['id_category'] ){
                                                $selected='selected';
                                            }else{
                                                $selected = '';    
                                            }      
                                        ?>
                                <?php echo '<option value='.$index.'" '.$selected.'  >'.$category.'</option>' ?>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_status">Estado</label>
                            <select class="form-control" name="id_status">
                                <?php foreach (ESTADOS as $index => $category): 
                                            if($index == $task['id_status'] ){
                                                $selected='selected';
                                            }else{
                                                $selected = '';    
                                            }      
                                        ?>
                                <?php echo '<option value='.$index.'" '.$selected.'  >'.$category.'</option>' ?>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                    </div>
                </div>
            </form>
            <!-- /.card -->
        </div>

    </div>

</section>
<!-- /.content -->
<?= $this->endSection('content') ?>