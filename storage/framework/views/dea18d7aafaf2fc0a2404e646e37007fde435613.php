<?php

use App\Parameter_pro;

use App\Parameterpro_cat;

?>



<?php

$t = 0;

?>



<?php $__currentLoopData = $groupIdParent2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



    <?php
        
        $t++;
        
    ?>



    <?php
        
        $paraInfo = Parameter_pro::find($parent);
        
        $paraEng = $paraInfo->paraEng;
        
    ?>



    <h1 class="filter-head"><?php echo e($paraInfo->para_title); ?></h1>



    <div class="filter-body row">



        <?php
            
            // $groupParaChildren = Parameterpro_cat::where([['parent_id', $parent], ['cat_id', $id]])->get();
            
            $groupParaChildren = Parameterpro_cat::whereIn('cat_id', $groupCatId)->get();
            
            // echo $groupParaChildren;
            
            $groupChildId = [];
            
            foreach ($groupParaChildren as $child) {
                if ($child->parent_id == $parent) {
                    $groupChildId[] = $child->para_id;
                }
            }
            
            $paraChildren = Parameter_pro::whereIn('id', $groupChildId)->get();
            
        ?>



        <?php $__currentLoopData = $paraChildren; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>



            <div class="item col-md-6 mb-1">



                <input type="checkbox" class="form-check-input  op<?php echo e($t); ?>"
                    id="<?php echo e($childItem->para_title); ?>" name="<?php echo e($paraEng); ?>[]" <?php $__currentLoopData = $op; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opHA): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(in_array($childItem->para_title, $opHA)): ?>
                    checked
                <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        value="<?php echo e($childItem->para_title); ?>">



        <label for="<?php echo e($childItem->para_title); ?>" class="form-check-label"><?php echo e($childItem->para_title); ?></label>



    </div>



<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



</div>



<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/manhhungunitopcv/public_html/resources/views/layouts/client-sidebar-2.blade.php ENDPATH**/ ?>