<?php $settings = App\Models\AdminSettings::first(); ?>


<?php $__env->startSection('title'); ?>Edit Application - <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('includes.startup-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<h1 class="margin-bottom-40">Funding Application</h1>
<form method="POST" action="" enctype="multipart/form-data" id="formUpdate">  
  <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
  <input type="hidden" name="id" value="<?php echo e($data->id); ?>">

  <div class="form-group">
    <label>Investment Sought</label>
    <div class="input-group has-success">
      <div class="input-group-addon"><?php echo e($settings->currency_symbol); ?></div>
      <input type="number" min="1" class="form-control input-lg" name="goal" id="goal" value="<?php echo e($data->goal); ?>" placeholder="10000">
    </div>
  </div>

  <div class="form-group">
    <label>Equity Offered</label>
    <div class="input-group">
      <div class="input-group-addon">%</div>
      <input type="number" step='0.01' max="100" class="form-control input-lg" name="equity" id="equity" value="<?php echo e($data->equity); ?>" placeholder="10.0">
    </div>
  </div>

  <div class="form-group">
    <label>Pre-Money Valuation</label>
    <div class="input-group">
      <div class="input-group-addon"><?php echo e($settings->currency_symbol); ?></div>
      <input type="number" readonly step='0' class="form-control input-lg" name="valuation" id="valuation" placeholder="10000">
    </div>
  </div>

  <!-- Start Form Group -->
  <div class="form-group">
    <label>Tax Relief</label>
      <select name="tax" id="tax" class="form-control input-lg" required>
        <option value="">Select One</option>
        <?php $__currentLoopData = App\Models\TaxReliefs::where('mode','on')->orderBy('id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taxreliefstatus): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <option <?php if( $taxreliefstatus->status == $data->tax ): ?> selected="selected" <?php endif; ?> value="<?php echo e($taxreliefstatus->status); ?>"><?php echo e($taxreliefstatus->status); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </select>
  </div>

  <!-- Start Form Group -->
  <div class="form-group">
    <?php $__currentLoopData = App\Models\Questions::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div id="TextBoxDiv<?php echo e($loop->iteration); ?>">
        <label><?php echo e($question->question); ?></label>
        <div >
          <textarea data-limit="300" rows="5" name="response_<?php echo e($loop->iteration); ?>" id="response_<?php echo e($loop->iteration); ?>" placeholder="Response" class="form-control input-lg"><?php echo e($data->{'response_'.$loop->iteration}); ?></textarea>
        </div>
      </div>
      <p></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>

  <div class="box-footer">
    <hr />
    <!-- Alert -->
    <div class="alert alert-success display-none" id="successAlert">
      <ul class="list-unstyled" id="success_update">
        <li>Saved!</li>
      </ul>
    </div><!-- Alert -->
    <button type="submit" id="buttonFormUpdate" class="btn btn-save custom-rounded">Save</button>
  </div>           
</form>
<?php echo $__env->make('includes.dashboard-end', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<!-- Calculate Valuation Fuction -->
<script type="text/javascript">
  function calculateValuation(){
    var goal = document.getElementById('goal').value;
    var equity = document.getElementById('equity').value;
    goal = isNaN(goal) ? 0 : goal;
    equity = isNaN(equity) ? 0 : equity;
    var valuation = Math.round(equity > 0 ? goal / (equity/100)-goal: NaN);
    document.getElementById('valuation').value = isNaN(valuation) ? 0 : valuation;
  }
  setInterval(function(){
    calculateValuation();
  }, 100);
</script>

<!-- Limit Textarea Function -->
<script type="text/javascript">
  $(document).ready(function () {
    $('textarea').on("propertychange keyup input paste",

      function () {
        var limit = $(this).data("limit");
        var remainingChars = limit - $(this).val().length;
        if (remainingChars <= 0) {
          $(this).val($(this).val().substring(0, limit));
        }
        $(this).next('span').text(remainingChars<=0?0:remainingChars);
      });
  });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>