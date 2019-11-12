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

        <!-- Top content -->
        <div class="top-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 form-box">
                        <?php echo form_open('submit-proposal', array('class' => 'proposal-submit-form f1', 'role' => 'form')); ?>

                    		<h3>Register To Project Proposal Wizard</h3>
                            <h4 class="alert-box">Read the form carefully before you write anything</h4>
                            <br>
                    		<div class="f1-steps">
                    			<div class="f1-progress">
                    			    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                    			</div>
                    			<div class="f1-step active">
                    				<div class="f1-step-icon"><i class="fa fa-pencil"></i></div>
                    				<p>Project Selection</p>
                    			</div>
                    			<div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-list-ol"></i></div>
                    				<p>Project Details</p>
                    			</div>
                    		    <div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-user"></i></div>
                    				<p>Student Details</p>
                    			</div>
                    		</div>
                    		
                    		<fieldset>
                    		    <h4></h4>
                    			<div class="form-group">
                    			    <label class="sr-only" for="f1-first-name">Project Name</label>
                                    Project name:<input type="text" name="project_name" placeholder="Enter Project Name" class="f1-first-name form-control" id="f1-first-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="f1-last-name">Project Category</label>
                                   
                                   Project Category:<select name="project_cat" id="1-first-name" class="f1-last-name form-control" required>
                                        <option value=" ">Select A Category</option>
                                        <option value="Web Application Development">Web Application Development</option>
                                        <option value="Mobile Application Development">Mobile Application Development</option>
                                        <option value="Game Development">Game Development</option>
                                        <option value="Thesis">Thesis</option>
        
                                    </select>
                                </div>
                                <div class="form-group">
                                <label class="sr-only" for="f1-last-name">Project Category</label>
                               
                                Course Code:<select name="course_code" id="" class="f1-last-name form-control">
                                        <option>Select Option</option>
                                        <option value="CSE-3300">CSE-3300</option>
                                        <option value="CSE-4400">CSE-4400</option>

                                    </select>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">

                                <div class="form-group">
                                   
                                    Abstract: <textarea name="abstract" cols="30" rows="10" class="f1-abstract form-control" id="abstract"></textarea>
                                </div>
                                <div class="form-group">
                                   
                                 Objective: <textarea name="objective" cols="30" rows="10" class="f1-abstract form-control" id="f1-objective"></textarea>
                                </div>
                                <div class="form-group">
                                   
                                    Key features: <textarea name="features"  cols="30" rows="10" class="f1-abstract form-control" id="f1-f1-key-features"></textarea>
                                </div>
                                
                                        </div>
                                        <div class="col-md-6">
                                        <div class="form-group">
                                   
                                    Number of module: <textarea name="modules"  cols="30" rows="10" class="f1-abstract form-control" id="f1-f1-key-features"></textarea>
                                </div>
                                <div class="form-group">
                                   
                                    Project Tools: <textarea name="tools"  cols="30" rows="10" class="f1-abstract form-control" id="f1-f1-key-features"></textarea>
                                </div>
                                <div class="form-group">
                                   
                                    Conclusion: <textarea name="conclusion"  cols="30" rows="10" class="f1-abstract form-control" id="f1-f1-key-features"></textarea>
                                </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="button" class="btn btn-next">Next</button>
                                </div>
                            </fieldset>

                            <fieldset>
                             <?php foreach($NewEmails as $e): ?> 
                            <div id="field">
                                <!-- <div class="form-group">
                                    <label for="sr-only" for="teamLead">Who is your team leader?</label>
                                    
                                <br>
                                    <input type="checkbox" name="team_lead" value="1">Yes I'm there team Leader
                                </div> -->
                                 <div id="field0">
                                <div class="form-group">
                                    <label class="sr-only" for="memberName">Name</label>
                                    <input type="text" name="member_name[]" placeholder="Enter Name" class="form-control" id="memberName">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="memberEmail">Email</label>
                                   
                                    <input type="text" name="member_email[]" placeholder="Enter Email Address" class="form-control" value="<?php echo $e['emails']; ?>" id="memberEmail" readonly>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="member_studentID">Student ID</label>
                                    <input type="text" name="member_studentID[]" placeholder="Enter Your Student ID" class="form-control" id="member_studentID">
                                </div>
                                <div class="IDError"></div>
                                <div class="form-group">
                                    <label class="sr-only" for="member_mobileNo">Mobile Number</label>
                                    <input type="text" name="member_mobileNo[]" placeholder="Enter Your Mobile Number" class="form-control" id="member_mobileNo">
                                </div>
                                </div>
                                </div>
                                <br>
                                <hr>
                                <!-- <div class="form-group">
                                    <button id="add-more" type="button" class="btn btn-warning">Add More</button>
                               </div> -->
                            <?php endforeach; ?>
                            <div class="from-group">
                            <label class="sr-only" for="f1-last-name">Project Category</label>
                                   
                                   Select Teacher As Your Supervisor:<select name="t_id" id="" class="f1-last-name form-control">
                                        <option value="Select A Teacher" readonly> ------ Select ----</option>
                                       
                                        <?php foreach($resObj as $total_pro => $res): ?>

                                        <?php foreach($res as  $t): ?>
                                         <option value="<?php echo $t->t_id; ?>"><?php echo ucwords($t->t_name).'(Total Projects Assign :- '. $total_pro.')'; ?></option>
                                        <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </select>
                            </div>
                            <br>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Previous</button>
                                    <button type="submit" class="btn btn-submit">Submit</button>
                                </div>
                            </fieldset>
                          
                    	<?php echo form_close(); ?>
                    </div>
                </div>
                    
            </div>
        </div>


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
                    var newIn = '<br><div id="field'+ next +'"><div class="form-group"> <label class="sr-only" for="f1-facebook">Name</label> <input type="text" name="member_name[]" placeholder="Enter Name" class="f1-facebook form-control" id="f1-facebook"> </div><div class="form-group"> <label class="sr-only" for="f1-twitter">Email</label> <input type="text" name="member_email[]" placeholder="Enter Email Address" class="f1-twitter form-control" id="f1-twitter"> </div><div class="form-group"> <label class="sr-only" for="f1-google-plus">Student ID</label> <input type="text" name="member_studentID[]" placeholder="Enter Your Student ID" class="f1-google-plus form-control" id="f1-google-plus"> </div><div class="IDError"></div><div class="form-group"> <label class="sr-only" for="f1-google-plus">Mobile Number</label> <input type="text" name="member_mobileNo[]" placeholder="Enter Your Mobile Number" class="f1-google-plus form-control" id="f1-google-plus"> </div></div>';
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
    <script>
       
        $('form.proposal-submits-form').on('submit', function(form){
			
				form.preventDefault();
			
				var URL = '<?php echo base_url();?>Proposal/GetProposalData';
			
				$.post(URL , $('form.proposal-submit-form').serialize(), function(data){

				if(data == '1'){
					
					//$('.ProposalSuccess').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-check-circle"></i> A Confirmation Link is sent te this email</div>');
					//setTimeout(function () { window.location.reload(); }, 10000);
                    setTimeout(function () { window.location.reload(); }, 1000);
                    window.location.href = "<?php echo site_url('Proposal/ProposalSuccess'); ?>";
				}
				
				if(data == '0'){
					
					$('.IDError').html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><i class="fa fa-warning"></i>This Student ID is already Registered to the server, Try another one</div>');
					//setTimeout(function () { window.location.reload(); }, 10000);
				}
				//console.log(data);
				
				
				
			})
		});
    </script>

    </body>

</html>