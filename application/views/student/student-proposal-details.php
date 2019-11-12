<!-- MAIN -->
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
   <div class="container-fluid">
      <div class="row">
    <?php if(!empty($resObj)) :?>
      <?php foreach($resObj as $project_name => $res):?>
      <?php foreach($res as $pd){
          $project_cat = $pd->project_cat;

      }?>
         <div class="col-md-12">
         <?php if($pd->project_status == '0'): ?>
                 <h2 class="text-center text-danger">Pending Proposal</h2>
             <?php  elseif($pd->project_status == '1'): ?>
             <h2 class="text-center text-success text-uppercase font-weight-bold">This Proposal has been accepted at <span style="color:red;font-weight:bold;"><?php echo date("d M, Y(h:i A)", strtotime($pd->accepted_at));  ?></span></h2>
            <?php endif;  ?>   
            <h3>Project Name: <strong><?php echo $project_name;?></strong></h3>
            <h3>Project Category: <strong><?php echo $project_cat; ?></strong></h3>
            <h3>Team Members:-</h3>
            <ul class="list-group">
           
            <?php foreach($res as $pd): ?>
                <li class="list-group-item"><p>Name: <?php echo $pd->member_name; ?> &nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp; Student ID: <?php echo $pd->member_student_id; ?></p></li>
            <?php endforeach; ?>    
            </ul>
            <br>
            <hr>
            <h2 class="text-center"><u>Project Details</u></h2>
             <!--Abstract:-->
             <h3>Abstract:</h3>
                    <br>
                    <p>
                         <?php echo $pd->project_abstract; ?> 
                    </p>
                    <br>
    <!--Objective:-->        
                    
                    <br>
    <!--Key feature-->        
                    <h3>Key features:</h3>
                    <br>
                    <p><?php echo $pd->project_features; ?> </p>
                    <br>
    <!--Number of module:-->        
                    <h3>Number of Modules:</h3>
                    <br>
                    <p>The system after careful analysis has been identified to be presented with the following modules: </p>
               
                    <p><?php echo $pd->project_modules; ?></p>
                    <br>
    <!--Software requirement:-->        
                    <h3>Software Requirements:</h3>
                    <br>
                    <p><?php echo $pd->project_tools; ?></p>
                    <br>
    <!--Conclusion:-->        
                    <h3>Conclusion:</h3>
                    <br>
                    <p><?php echo $pd->project_conclusion; ?></p>
                    <br>
                    <h3>Teacher's Comment:</h3>
                    <br>
                    <p><?php echo $pd->t_comment; ?></p>
                
        </div>
        <br>
        <br>
        
        <?php endforeach; ?>
        <?php else:?>
            <h2> You do not send any project proposal yet! </h2>
        <?php endif;?>
        <!-- <?php //endforeach; ?>  -->
     </div>
</div>
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN -->