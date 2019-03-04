<div class="row">

    <?php echo $this->Flash->render('message_add');?>
    <?php echo $this->Flash->render('message_edit');?>
    <?php echo $this->Flash->render('message_delete');?>

    <h2>Lets see all Posts</h2>
    <?php echo  $this->html->link('ADD NEW POST',
    ['action'=>'add'],
    ['class'=>'btn btn-primary']);?>

<!-- search -->





    <?php echo $this->Form->create(null, ['type' => 'get', 'url' => $this->Url->build(['action' => 'search'], true)]);?>

    <form class="form-horizontal">
        <fieldset>


            <div class="form-group">

                <div class="col-md-4">
                    <?php echo $this->Form->input('array_name_str',[
                        'class'=>'form-control',
                        'Placeholder'=>'Search here',
                        'required' => true
                    ]);?>
                </div>
                <div class="form-group">

                    <div class="col-md-4">
                        <?php echo  $this->Form->submit('Search', [
                            'class'=>'btn btn-primary'
                        ]);?>
                    </div>
                </div>
        </fieldset>
    </form>
    <?php echo $this->Form->end();?>



<table class="table table-striped table-hover ">
    <thead>
    <tr>

        <th>Title</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($posts)):?>
    <?php foreach ($posts as $post):?>
    <tr>

        <td><?php echo $post->title;?></td>
        <td><?php echo $post->description;?></td>
        <td>
            <?php echo $this->html->link(
            'View',['action'=>'view',$post->id],
                ['class'=>'btn btn-primary']
            );?>


        </td>

        <td>
            <?php echo $this->html->link(
                'Edit',['action'=>'edit',$post->id],
                ['class'=>'btn btn-success']
            );?>


        </td>


        <td>
            <?php echo $this->Form->postLink(
                'Delete',['action'=>'delete',$post->id],
                ['class'=>'btn btn-danger']
            );?>


        </td>


    <?php endforeach;?>
    <?php else:?>
    <td>No Record</td>
    <?php endif;?>
    </tbody>

</table>

</div>
