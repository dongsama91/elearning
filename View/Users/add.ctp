    <div class="row">  
    
	<?php echo $this->Session->flash(); ?>
    <div class="col-md-8 col-md-offset-2">  
      
    <?php echo $this->Form->create('User', array(  
      'inputDefaults' => array(  
        'div' => false,  
        'label' => false,  
        'wrapInput' => false,  
        'class' => 'form-control'  
      ),  
      'class' => 'well form-inline'  
    )); ?>  
      <?php echo $this->Form->input('username', array(  
        'placeholder' => 'Email',  
        'style' => 'width:180px;'
      )); ?>  
      <?php echo $this->Form->input('password', array(  
        'placeholder' => 'Password',  
        'style' => 'width:180px;'
      )); ?>  
      <?php echo $this->Form->submit('Sign up', array(  
        'div' => false,  
        'class' => 'btn btn-default'  
      )); ?>  
    <?php echo $this->Form->end(); ?>  
      
    </div>  
    </div>  