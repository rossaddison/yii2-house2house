<div class="row">
    <div class="col-md-8 col-md-offset-2">
         <h5>
         <div class="alert alert-primary" role="alert">   
          <?php echo "Paypal Agreement Id: " . $cancelled_agreement_id . "<br><br>";
                echo "Your annually renewable subscription of &pound; 5 per month has been cancelled with Paypal by yourself. ";
                echo "You will need to Create and Activate your monthly subscription in order to create a new subscription.";
                echo "<br>";
          ?>
         </div>     
     </h5>
     <?= Html::a('Activate a new subscription.', ['subscribe'], [
            'class' => 'btn btn-info',
            'data' => [
                'confirm' => 'Are you sure you want to Create and Activate a completely new subscription?',
                'method' => 'post',
            ],
            'title'=>'You will have access to your previous database if you use the same email address and password.',
            'data-toggle'=>'tooltip',
     ]) ?>
    </div>
</div>  