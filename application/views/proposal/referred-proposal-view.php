<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Project Proposal Wizard</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo site_url();?>assets/proposal/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo site_url();?>assets/proposal/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo site_url();?>assets/proposal/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo site_url();?>assets/proposal/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <!-- <link rel="shortcut icon" href="<?php echo site_url();?>assets/proposal/ico/favicon.png"> -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo site_url();?>assets/proposal/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo site_url();?>assets/proposal/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url();?>assets/proposal/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo site_url();?>assets/proposal/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

    
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
   <div class="container-fluid">
      <div class="row">
      <div style="color:red;"><?php if($this->session->flashdata('success')){echo $this->session->flashdata('success');} ?></div>
      <?php foreach($resObj as $project_name => $res):?>
      <?php foreach($res as $pd){
          $project_cat = $pd->project_cat;

      }?>
         <div class="col-md-12">
         <?php if($pd->is_reffered == '1'): ?>
          <h2>This Proposal Is Reffered to Another Teacher</h2>
         <?php elseif($pd->project_status == '0'): ?>
                 <h2 class="text-center text-danger">Referred Proposal</h2>
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
                    <h3>Objective:</h3>
                    <br>
                    <p>
                        <?php echo $pd->project_objective; ?> 
                    </p>
                    <br>
    <!--Key feature-->        
                    <h3>Key features:</h3>
                    <br>
                    <!-- <ul class="list-unstyled">
                        <li>-Project Planning</li>
                        <li>-Collaboration</li>
                        <li>-File Sharing</li>
                        <li>-Bug Tracking</li>
                        <li>-Milestone Tracking </li>
                        <li>-Task Management</li>
                        <li>-Resource Management </li>
                    </ul> -->
                    <p><?php echo $pd->project_features; ?> </p>
                    <br>
    <!--Number of module:-->        
                    <h3>Number of Modules:</h3>
                    <br>
                    <p>The system after careful analysis has been identified to be presented with the following modules: </p>
                    <!-- <ul class="list-unstyled">
                        <li>-User Module</li>
                        <li>-Project-board Module</li>
                    </ul> -->
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
                   
                
        </div>
        <br>
        <br>
            
         <?php  if($pd->project_status == '1'): ?>
                
        <?php endif;  ?>   
            <?php if($pd->project_status == '1'): ?>


            <?php else: ?>

            <div class="row">
            <div class="col-md-8 col-md-offset-4" id="accept-proposal">
                <?php if($pd->project_status == '0'): ?>
                    <a href='<?php echo site_url('accept-proposal/'.$pd->proposal_id); ?>' class='btn btn-success'>Accept</a>
                <?php  elseif($pd->project_status == '1'): ?>
                    <a href='<?php echo site_url('accept-proposal/'.$pd->proposal_id); ?>' class='btn btn-warning'>Update</a>
                <?php endif;  ?>   
             <a href="" class="btn btn-danger">Deny</a>
            </div>
        </div>

            <?php endif; ?>
       
        <?php endforeach; ?>
        <!-- <?php //endforeach; ?>  -->
     </div>
</div>
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- END MAIN --> 
                   

        <!-- Javascript -->
        <script src="<?php echo site_url();?>assets/proposal/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo site_url();?>assets/proposal/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo site_url();?>assets/proposal/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo site_url();?>assets/proposal/js/retina-1.1.0.min.js"></script>
        <script src="<?php echo site_url();?>assets/proposal/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
        <!--Add and Remove child-->
        <script type="text/javascript">
                $(document).ready(function () {
                //@naresh action dynamic childs
                var next = 0;
                $("#add-more").click(function(e){
                    e.preventDefault();
                    var addto = "#field" + next;
                    var addRemove = "#field" + (next);
                    next = next + 1;
                    if(next < 4){
                    var newIn = '<br><div id="field'+ next +'"><div class="form-group"> <label class="sr-only" for="f1-facebook">Name</label> <input type="text" name="member_name[]" placeholder="Enter Name" class="f1-facebook form-control" id="f1-facebook"> </div><div class="form-group"> <label class="sr-only" for="f1-twitter">Email</label> <input type="text" name="member_email[]" placeholder="Enter Email Address" class="f1-twitter form-control" id="f1-twitter"> </div><div class="form-group"> <label class="sr-only" for="f1-google-plus">Student ID</label> <input type="text" name="member_studentID[]" placeholder="Enter Your Student ID" class="f1-google-plus form-control" id="f1-google-plus"> </div><div class="form-group"> <label class="sr-only" for="f1-google-plus">Mobile Number</label> <input type="text" name="member_mobileNo[]" placeholder="Enter Your Mobile Number" class="f1-google-plus form-control" id="f1-google-plus"> </div></div>';
                    var newInput = $(newIn);
                    var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
                    var removeButton = $(removeBtn);
                    $(addto).after(newInput);
                    $(addRemove).after(removeButton);
                    $("#field" + next).attr('data-source',$(addto).attr('data-source'));
                    $("#count").val(next);  
                    
                        $('.remove-me').click(function(e){
                            e.preventDefault();
                            var fieldNum = this.id.charAt(this.id.length-1);
                            var fieldID = "#field" + fieldNum;
                            $(this).remove();
                            next = next - 1;
                            console.log(next);
                            $(fieldID).remove();
                        }); 
                    }else{
                        return alert('You can add only 4 members');
                    }
                    
                });

            });
    </script>  

    </body>

</html>